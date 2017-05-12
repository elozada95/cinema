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
$buleano = 0;
$db->beginTransaction();
$user = new User($db);
$user->setId($paysheet);
$user->setIdmovie($movid);
$user->setSeat($seatno);
$users = $user->getTicketForScreening();
foreach( $users as $user ) {
	if($user->seatnumber == $seatno){
		echo "SE REPITE ALV";
		$buleano = 1;
	}
}
$usera = new User($db);
$usera->setId($paysheet);
$usera->setIdmovie($movid);
$usera->setSeat($seatno);
if($buleano == 0){
	$usera->saveTicket();
}
if($buleano == 1){
	$db->rollBack();
	header("Location: screeningsUser.php");
}
else{
	$db->commit();
	header("Location: reservations.php");
}
?>