<?php
//todavia no esta
require_once "../models/User.php";
if (empty($_POST['submit']))
{
	header("Location: login.php");
	exit;
}
$args = array(
	'name'  => FILTER_SANITIZE_STRING,
);
session_start();
$type = $_SESSION['type'];
 $paysheet = $_SESSION['paysheet'];
if($type != 1)
{
	header("Location: logout.php");
}
echo "<pre>";
print_r($args); 
$post = (object)filter_input_array(INPUT_POST, $args);
$db = new Database;
$user = new User($db);
$user->setSurname($post->surname);
echo $post->surname;
$user->setEmail($post->email);
$user->setName($post->name);
$user->setPassword($token);
$user->saveUser();
header("Location: login.php");
?>