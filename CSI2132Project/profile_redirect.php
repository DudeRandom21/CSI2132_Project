<?php
session_start();

if($_SESSION["isEmployee"] == "user") {
	header('Location: user_Profile.php');
}

if($_SESSION["isEmployee"] == "employee") {
	header('Location: employee_Profile.php');
}

if($_SESSION["isEmployee"] == "admin") {
	header('Location: admin_Profile.php');
}

?>