 <?php
require_once "../models/User.php";
if (empty($_POST['submit']))
{
	header("Location: usuario.php");
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
	'name'  => FILTER_SANITIZE_STRING,
	'synopsis'  => FILTER_SANITIZE_STRING,
	'releasedate'  => FILTER_SANITIZE_STRING,
	'duration'  => FILTER_SANITIZE_STRING,
	'gen'  => FILTER_SANITIZE_STRING,
	'rating'  => FILTER_SANITIZE_STRING,
	);
echo "<pre>";
print_r($args); 
$post = (object)filter_input_array(INPUT_POST, $args);
$db = new Database;
$user = new User($db);
$user->setId($post->id);
$user->setName($post->name);
$user->setSynopsis($post->synopsis);
$user->setRelease($post->releasedate);
$user->setDuration($post->duration);
$user->setGenere($post->gen);
$user->setRating($post->rating);
$user->updateMovie();
header("Location: movies.php");
?>