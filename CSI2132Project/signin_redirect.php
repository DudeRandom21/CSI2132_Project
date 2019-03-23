<?php
session_start();

$db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");

if($_POST["isEmployee"] == "user")
	$query = "SELECT * FROM users WHERE username = '{$_POST["usr"]}'";

else if($_POST["isEmployee"] == "employee")
	$query = "SELECT * FROM employee WHERE name = '{$_POST["usr"]}'";

$result = pg_query($db_connection, $query) or
	die('Query failed: ' . pg_last_error());

$row = pg_fetch_row($result);


//Incorect password
if ($row[1] != $_POST["pwd"])
	header('Location: index.php'); //TODO: give the login page some error message if this happens.
else {
	//Assign session variables and continue to home page
	$_SESSION["isEmployee"] = $_POST["isEmployee"];
	$_SESSION["usr"] = $_POST["usr"];

	header('Location: ./home_redirect.php');	
}

?>