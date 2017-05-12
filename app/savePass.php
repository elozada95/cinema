<?php
require_once "../models/User.php";
if (empty($_POST['submit']))
{
	header("Location: logout.php");
	exit;
}

session_start();
$type = $_SESSION['type'];
 $paysheet = $_SESSION['paysheet'];

if($type != 1)
{
	header("Location: logout.php");
}

$idusr = $paysheet;

if(!$idusr){
	header("Location: logout.php");
}

$args = array(
	'password'  => FILTER_SANITIZE_STRING,
);
echo "<pre>";
print_r($args); 
$post = (object)filter_input_array(INPUT_POST, $args);
$db = new Database;
$user = new User($db);
//ponerle sha1
//$user->setPassword(sha1($post->password));
$user->setPassword(sha1($post->password));
$user->setId($idusr);
$user->updatePassword();
header("Location: usuario.php");
?>