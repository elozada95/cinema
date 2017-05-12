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
	'room'  => FILTER_SANITIZE_STRING,
	'date'  => FILTER_SANITIZE_STRING,
	'time'  => FILTER_SANITIZE_STRING,
	);
echo "<pre>";
print_r($args); 
$post = (object)filter_input_array(INPUT_POST, $args);
$db = new Database;
$user = new User($db);
$user->setId($post->id);
$user->setRoom($post->room);
$user->setDate($post->date);
$user->setTime($post->time);
$user->updateScreening();
header("Location: screenings.php");
?>