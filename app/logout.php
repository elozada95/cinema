<?php
	require_once "../models/User.php";
	session_start();
	session_destroy();
	header("Location: login.php");
?>