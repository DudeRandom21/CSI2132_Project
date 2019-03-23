<?php
session_start();

if($_SESSION["isEmployee"] == "user") {
	header('Location: ./user_HomePage.php');
}

if($_SESSION["isEmployee"] == "employee") {
	header('Location: employee_HomePage.php');
}

?>