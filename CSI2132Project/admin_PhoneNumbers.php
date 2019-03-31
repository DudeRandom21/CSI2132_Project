<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include('common_head.php');
    include("scrollable_table.php"); 
		
    $db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");

    if($_GET["action"] == "delete") {
        $phone_number = unserialize($_POST["line"])["phone_number"];
    	$result = pg_query("DELETE FROM {$_GET["table"]} WHERE phone_number = {$phone_number}") or die('Query failed: ' . pg_last_error());
    }
    if($_GET["action"] == "add") {
    	$result = pg_query("INSERT INTO {$_GET["table"]} ({$_GET["id_type"]}, phone_number) VALUES ({$_GET["id"]}, {$_POST["phone_number"]})") or die('Query failed: ' . pg_last_error());
    }

?>
</head>

<body>

<?php include("header.php") ?>    
    <!-- SECTION 1: Form -->
    <div class="container-fluid">
	    <div class="row">
	        <div class="col-xs-4">
	        	<form action="<?php echo "http://{$_SERVER[HTTP_HOST]}{$_SERVER[REQUEST_URI]}&action=add"; ?>"  method="post">
			        <label for="phone_number">New Phone Number</label>
			        <input type="phone_number" class="form-control" id="phone_number" name="phone_number">
    				<input type="submit" class="btn btn-primary" name="submit" value="Add">
	        	</form>
			</div>
		</div>
        <?php createTable("SELECT phone_number FROM {$_GET["table"]} WHERE {$_GET["id_type"]} = {$_GET["id"]}", "Remove", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]&action=delete", "post"); ?>
    </div>

</body>

</html>