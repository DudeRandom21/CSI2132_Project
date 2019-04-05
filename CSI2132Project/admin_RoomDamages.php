<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>

<?php include('common_head.php'); 
		
    $db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");

    if(isset($_GET["action"]) && ($_GET["action"] == "delete")) {
        $phone_number = unserialize($_POST["line"])["phone_number"];
    	$result = pg_query("DELETE FROM {$_GET["table"]} WHERE phone_number = {$phone_number}") or die('Query failed: ' . pg_last_error());
    }
    if(isset($_GET["action"]) && ($_GET["action"] == "add")) {
    	$result = pg_query("INSERT INTO {$_GET["table"]} ({$_GET["id_type"]}, phone_number) VALUES ({$_GET["id"]}, {$_POST["phone_number"]})") or die('Query failed: ' . pg_last_error());
    }

?>
</head>

<body>

    <?php include("header.php") ?>
    <!-- SECTION 1: Form -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-8">
                <form action="<?php echo " http://{$_SERVER[HTTP_HOST]}{$_SERVER[REQUEST_URI]}&action=add "; ?>" method="post">
                    <div class="col-xs-12">
                        <h1>Add a New Phone Number</h1>
                    </div>
                    <div class="col-xs-6">
                        <input type="phone_number" class="form-control" id="phone_number" name="phone_number" placeholder="<Phone Number Here>">
                    </div>
                    <div class="col-xs-2">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add">
                    </div>
                    <div class="col-xs-3">
                        <a href="admin_CreateHotelChain.php" class="btn btn-primary">Back to Hotel Chain</a>
                    </div>
                </form>
            </div>
        </div><br>
        <div class="col-xs-12">
            <?php createTable("SELECT phone_number FROM {$_GET["table"]} WHERE {$_GET["id_type"]} = {$_GET["id"]}", "Remove", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]&action=delete", "post"); ?>
        </div>
    </div>

</body>

</html>