<?php
require_once "../models/User.php";
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
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
$tokensin = substr(uniqid(rand(), true),0,16);
//mandar token por mail
//encriptar token
$token = sha1($tokensin);
$user = new User($db);
$user->setSurname($post->surname);
echo $post->surname;
$user->setEmail($post->email);
$user->setName($post->name);
$user->setPassword($token);
$user->saveUser();

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'elozadav95@gmail.com';
$mail->Password = 'bmtzahmxhmoecbhx';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('elozadav95@gmail.com', 'Cinema');
$mail->addAddress($post->email);
$mail->addReplyTo('elozadav95@gmail.com', 'Cinema');

$mail->Subject = 'Cinema Account';
$mail->Body    = "Your login token is: \r\n \r\n" . $tokensin . "\r\n \r\nPlease use it as your password for your first login and then change it.";

$mail->send();

header("Location: login.php");
?>