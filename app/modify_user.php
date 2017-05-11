 <?php
require_once "../models/User.php";
if (empty($_POST['submit']))
{
	header("Location: usuario.php");
	exit;
}

session_start();
$type = $_SESSION['type'];
 $paysheet = $_SESSION['paysheet'];

if($type != 1)
{
	header("Location: logout.php");
}

$args = array(
	'id'  => FILTER_SANITIZE_STRING,
	'name'  => FILTER_SANITIZE_STRING,
	'surname'  => FILTER_SANITIZE_STRING,
	'email'  => FILTER_SANITIZE_STRING,
	
	);
echo "<pre>";
print_r($args); 
$post = (object)filter_input_array(INPUT_POST, $args);
$db = new Database;
$user = new User($db);
$user->setId($post->id);
$user->setEmail($post->email);
$user->setName($post->name);
$user->setSurname($post->surname);
echo $post->id;
echo $post->email;
echo $post->name;
echo $post->surname;
$user->updateUser();
header("Location: usuario.php");
?>