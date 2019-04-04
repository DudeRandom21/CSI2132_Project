<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('common_head.php');

    $db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");

    if (!empty($_POST)) {        
        if (isset($_POST["room_number"])) {

            $query = "INSERT INTO room (room_number, can_be_extended, has_sea_view, has_mountain_view, room_capacity, price) VALUES ('{$_POST["room_number"]}', '{$_POST["can_be_extended"]}', '{$_POST["has_sea_view"]}', '{$_POST["has_mountain_view"]}', '{$_POST["room_capacity"]}', '{$_POST["price"]}')";
        
            $result = pg_query($db_connection, $query) or die('Query failed: ' . pg_last_error());
        }

        if (isset($_POST["room_number"])) {
            foreach ($_POST as $key => $value) {
                if ($value != "" && $key != "submit") {
                    $result = pg_query($db_connection, "UPDATE room_number SET {$key} = " . (is_numeric($value) ? $value : "'{$value}'") . " WHERE hotel_id = {$_GET["line"]["hotel_id"]}") or die('Query failed: ' . pg_last_error());
                }
            }
        }
        if ($_POST["action"] == "delete") {
            $result = pg_query($db_connection, "DELETE FROM room WHERE hotel_id = {$_GET["line"]["hotel_id"]} AND room_number = {$_GET["line"]["room_number"]}");
            header("Location: admin_CreateHotelChain.php");
        }
    }
    
    // Get Hotel information
    $query = "SELECT * 
              FROM room
              WHERE hotel_id = '{$_GET["line"]["hotel_id"]}' AND
                    room_number ='{$_GET["line"]["room_number"]}'";

    $result = pg_query($db_connection, $query) or die('Query failed: ' . pg_last_error());


    $room = pg_fetch_array($result);
    ?>
</head>

<body>

    <?php include("header.php") ?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-xs-1"></div><!-- For spacing -->

                <!-- Section 2: Hotel Information-->
                <div class="col-xs-4">
                    <h1>Room Information</h1>
                    
                    <form action="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" method="post">


                    <!-- Information Fields-->
                    <h3>Room Number: <?php echo $_GET["line"]["room_number"] ?></h3>
                    <label for="can_be_extended">Can Be Extended?</label>
                    <input type="usr" class="form-control" name="can_be_extended" placeholder="<?php echo $room["can_be_extended"]; ?>">

                    <label for="has_sea_view">Has Sea View?</label>
                    <input type="usr" class="form-control" name="has_sea_view" placeholder="<?php echo $room["has_sea_view"]; ?>">

                    <label for="has_mountain_view">Has Mountain View?</label>
                    <input type="usr" class="form-control" name="has_mountain_view" placeholder="<?php echo $room["has_mountain_view"]; ?>">

                    <label for="room_capacity">Room Capacity:</label>
                    <input type="number" class="form-control" name="room_capacity" placeholder="<?php echo $room["room_capacity"]; ?>">

                    <label for="price">Price:</label>
                    <input type="number" class="form-control" name="price" placeholder="<?php echo $room["price"]; ?>">

                    <input type="submit" name="submit" value="Update Information"><br><br>
                    
                </form>
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-xs-1"></div>
            <!-- used for spacing -->
            <div class="col-xs-2">
                <a href="admin_CreateHotelChain.php" class="btn btn-primary">Back to Hotel Chain</a> 
                <form action="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"  method="post">
                    <input type="hidden" name="action" value="delete">
                    <input type="submit" class="btn btn-danger" name="submit" value="Delete Room">
                </form>


            </div>
        </div>

        <br>
    </div>


</body>

</html>