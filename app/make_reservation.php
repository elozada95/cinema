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
$seatno = filter_input(INPUT_POST, 'seatn');
if(!$seatno){
	header("Location: logout.php");
}
session_start();
$type = $_SESSION['type'];
$paysheet = $_SESSION['paysheet'];
$movid = $_SESSION['movid'];
if($type != 1)
{
	header("Location: logout.php");
}
if(!$paysheet){
	header("Location: logout.php");
}
if(!$movid){
    header("Location: logout.php");
  }
echo "<pre>";
print_r($args); 
$post = (object)filter_input_array(INPUT_POST, $args);
$db = new Database;
$user = new User($db);
$user->setId($paysheet);
$user->setIdmovie($movid);
$user->setSeat($seatno);
$user->saveTicket();
header("Location: reservations.php");
?>