<?php
require_once "../models/User.php";
if (empty($_POST['submit']))
{
	header("Location: login.php");
	exit;
}
$args = array(
	'name'  => FILTER_SANITIZE_STRING,
	'synopsis'  => FILTER_SANITIZE_STRING,
	'date'  => FILTER_SANITIZE_STRING,
	'duration'  => FILTER_SANITIZE_STRING,
	'genere'  => FILTER_SANITIZE_STRING,
	'rating'  => FILTER_SANITIZE_STRING,
	);
echo "<pre>";
print_r($args); 
$post = (object)filter_input_array(INPUT_POST, $args);
$db = new Database;
$user = new User($db);
$user->setName($post->name);
$user->setSynopsis($post->synopsis);
$user->setDate($post->date);
echo $post->date;
$user->setDuration($post->duration);
$user->setGenere($post->genere);
$user->setRating($post->rating);
$user->saveMovie();
header("Location: movies.php");
?>