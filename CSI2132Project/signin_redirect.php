<?php

//TODO: Authenticate the user/employee here and add their primary key to the $_SESSION variable

if($_POST["isEmployee"] == "customer") {
	header('Location: ./user_HomePage.php?usr=' . $_POST["usr"]); //This is really a hack it should be removed when auth is fixed
}
if($_POST["isEmployee"] == "employee") {
	header('Location: employee_HomePage.html');
}
?>