<?php
require_once "../models/User.php";
if (empty($_POST['submit']))
{
	header("Location: login.php");
	exit;
}
$args = array(
	'name'  => FILTER_SANITIZE_STRING,
	'surname'  => FILTER_SANITIZE_STRING,
	'email'  => FILTER_SANITIZE_STRING,
	);
echo "<pre>";
print_r($args); 
$post = (object)filter_input_array(INPUT_POST, $args);
$db = new Database;
$token = substr(uniqid(rand(), true),0,16);
//mandar token por mail
//encriptar token
//$token = sha1($token);
//$token = ($token);
//hacer que sea token y no secretsss
$token = "secret";
$user = new User($db);
$user->setSurname($post->surname);
echo $post->surname;
$user->setEmail($post->email);
$user->setName($post->name);
$user->setPassword($token);
$user->saveUser();
header("Location: login.php");
?>