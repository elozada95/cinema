<?php
require_once "../models/User.php";
if (empty($_POST['submit']))
{
	header("Location: login.php");
	exit;
}
$args = array(
	'idmovie'  => FILTER_SANITIZE_STRING,
	'room'  => FILTER_SANITIZE_STRING,
	'date'  => FILTER_SANITIZE_STRING,
	'time'  => FILTER_SANITIZE_STRING,
	);
echo "<pre>";
print_r($args); 
$post = (object)filter_input_array(INPUT_POST, $args);
$db = new Database;
$user = new User($db);
$user->setIdmovie($post->idmovie);
$user->setDate($post->date);
$user->setRoom($post->room);
$user->setTime($post->time);
$user->saveScreening();
echo $post->idmovie;
header("Location: screenings.php");
?>