<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>

<?php include('common_head.php'); 
		
    $db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");

    if($_GET["action"] == "delete") {
        $amenity = unserialize($_POST["line"])["amenity"];
    	$result = pg_query("DELETE FROM room_amenities WHERE amenity = '{$amenity}' AND room_number = {$_GET["room_number"]}") or die('Query failed: ' . pg_last_error());
    }

    if($_GET["action"] == "add") {
    	$result = pg_query("INSERT INTO room_amenities (room_number, hotel_id, amenity) VALUES ({$_GET["room_number"]}, {$_GET["hotel_id"]}, '{$_POST["amenity"]}')") or die('Query failed: ' . pg_last_error());
    }

?>
</head>

<body>

    <?php include("header.php") ?>
    <!-- SECTION 1: Form -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-8">
                <form action="<?php echo "http://{$_SERVER[HTTP_HOST]}{$_SERVER[REQUEST_URI]}&action=add"; ?>" method="post">
                    <div class="col-xs-12">
                        <h1>Add a Room Amenity</h1>
                    </div>
                    <div class="col-xs-6">
                        <input type="amenity" class="form-control" id="amenity" name="amenity" placeholder="<Amenity Here>">
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
            <?php createTable("SELECT amenity FROM room_amenities WHERE room_number = {$_GET["room_number"]}", "Remove", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]&action=delete", "post"); ?>
        </div>
    </div>

</body>

</html>