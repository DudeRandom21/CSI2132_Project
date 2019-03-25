<?php
session_start();

if(!isset($_SESSION["isEmployee"])) {
	header('Location: index.php');
}

if($_SESSION["isEmployee"] == "user") {
	header('Location: user_HomePage.php');
}

if($_SESSION["isEmployee"] == "employee") {
	header('Location: employee_HomePage.php');
}

if($_SESSION["isEmployee"] == "admin") {
	header('Location: admin_CreateHotelChain.php');
}

?>