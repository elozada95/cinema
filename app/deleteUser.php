<?php
require_once "../models/User.php";
if (empty($_GET['id']))
{
	echo "hola";
	header("Location: admin.php");
	exit;
}

session_start();
$type = $_SESSION['type'];
if($type != 0)
{
	header("Location: logout.php");
}


$args = array(
	'id'  => FILTER_SANITIZE_STRING,
);
echo "<pre>";
print_r($args); 
$post = (object)filter_input_array(INPUT_GET, $args);
$db = new Database;
$user = new User($db);
$user->setId($post->id);
$user->deleteUsuario();
header("Location: seeUsers.php");
?>