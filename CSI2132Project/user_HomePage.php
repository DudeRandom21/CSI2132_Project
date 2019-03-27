<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("common_head.php");
    include("scrollable_table.php"); 

    $db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");
    if (!empty($_GET)) {

        //This is the core part of the query, it joins hotel_chain hotel and room then removes all booked rooms.
        $tableQuery = "SELECT * FROM hotel_chain JOIN hotel ON hotel_chain.hotel_chain_id = hotel.hotel_chain_id JOIN room ON hotel.hotel_id = room.hotel_id WHERE (room.hotel_id, room.room_number) NOT IN
        (SELECT hotel_id, room_number FROM booking WHERE '{$_GET["start_date"]}' < check_out_date AND '{$_GET["end_date"]}' > check_in_date)";

        //These are other optional options
        if($_GET["room_capacity"] != "") {
            $tableQuery = $tableQuery . "AND room_capacity >= {$_GET["room_capacity"]}";
        }
        if($_GET["hotel_chain"] != "") {
            $tableQuery = $tableQuery . "AND hotel_chain.hotel_chain_name = '{$_GET["hotel_chain"]}'";
        }
        if($_GET[""] != "") { //TODO: what is category of hotel??
            $tableQuery = $tableQuery . "AND hotel_chain_name = {$_GET[""]}";
        }
        if($_GET["total_number_of_rooms"] != "") {
            $tableQuery = $tableQuery . "AND room.hotel_id IN (SELECT hotel_id FROM room WHERE room.hotel_id = hotel.hotel_id GROUP BY hotel_id HAVING count(*) >= {$_GET["total_number_of_rooms"]})";
        }
        if($_GET["price_of_room"] != "") {
            $tableQuery = $tableQuery . "AND price <= {$_GET["price_of_room"]}";
        }
    }
?>
</head>

<body>

<?php include("header.php") ?>
    <!-- SECTION 1: Form -->
    <div class="container-fluid">
        <form method="get">
            <div class="row">
                <div class="col-xs-4">
                    <h1>Find a room today!</h1>
                    <!-- Dates -->
                    <label>Welcome: <?php echo $_SESSION["usr"]; ?></label><br>
                    <label for="start_date">Start Date</label>
                    <input type="usr" class="form-control" id="startDate" name="start_date" value="<?php echo $_GET["start_date"] ?>">
                    <label for="end_date">End Date</label>
                    <input type="usr" class="form-control" id="pwd" name="end_date" value="<?php echo $_GET["end_date"] ?>">
                    
                    <!-- Room Capacity -->
                    <label for="room_capacity">Minimum Room Capacity</label>
                    <input type="usr" class="form-control" id="room_capacity" name="room_capacity" value="<?php echo $_GET["room_capacity"] ?>">
                    
                    <!-- Hotel Chain -->
                    <label for="hotel_chain">Hotel Chain</label>
                    <input type="usr" class="form-control" id="hotel_chain" name="hotel_chain" value="<?php echo $_GET["hotel_chain"] ?>">
                    
                    <!-- Category of Hotel -->
                    <label for="category_of_hotel">Category of Hotel</label>
                    <input type="usr" class="form-control" id="category_of_hotel" name="category_of_hotel" value="<?php echo $_GET["category_of_hotel"] ?>">
                    
                    <!-- Total number of rooms in hotel -->
                    <label for="total_number_of_rooms">Total number of rooms in hotel</label>
                    <input type="usr" class="form-control" id="total_number_of_rooms" name="total_number_of_rooms" value="<?php echo $_GET["total_number_of_rooms"] ?>">
                    
                    <!-- Price of the rooms-->
                    <label for="price_of_room">Price of rooms</label>
                    <input type="usr" class="form-control" id="price_of_room" name="price_of_room" value="<?php echo $_GET["price_of_room"] ?>">
                    
                    <input type="submit" value="Search">
                </div>
            </div>
        </form>
        <?php if (isset($tableQuery)) createTable($tableQuery, "Book Now!", ""); ?>
    </div>
    
</body>

</html>