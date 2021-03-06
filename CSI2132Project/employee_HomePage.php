<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("common_head.php"); 

    $db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");
    

    /*
    *
    * Section to handle bottom table
    *
    */
    //Add start and end dates if none were chosen
    if (!isset($_GET["start_date"]) || !isset($_GET["end_date"]))
        header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" . (empty($_GET) ? "?" : "&") . "start_date=" . date("Y-m-d") . "&end_date=" . date("Y-m-d", strtotime('tomorrow')));

    //Handle the case where either field was left blank
    if ($_GET["start_date"] == "")
        $_GET["start_date"] = date("Y-m-d");
    if ($_GET["end_date"] == "")
        $_GET["end_date"] = date("Y-m-d", strtotime('tomorrow'));
    
    //This is the core part of the query, it joins hotel_chain hotel and room then removes all booked rooms.
    $tableQuery = "SELECT hotel.hotel_id, hotel_name, room_number, hotel.contact_email, hotel_city, rating, has_mountain_view, has_sea_view, room_capacity, price FROM hotel_chain JOIN hotel ON hotel_chain.hotel_chain_id = hotel.hotel_chain_id JOIN room ON hotel.hotel_id = room.hotel_id WHERE hotel.hotel_id = {$_SESSION["hotel_id"]} AND (room.hotel_id, room.room_number) NOT IN
    (SELECT hotel_id, room_number FROM booking WHERE '{$_GET["start_date"]}' < check_out_date AND '{$_GET["end_date"]}' > check_in_date)";

    //These are other optional options
    if($_GET["room_capacity"] != "") {
        $tableQuery = $tableQuery . "AND room_capacity >= {$_GET["room_capacity"]}";
    }
    if($_GET["hotel_chain"] != "") {
        $tableQuery = $tableQuery . "AND hotel_chain.hotel_chain_name = '{$_GET["hotel_chain"]}'";
    }
    if($_GET["total_number_of_rooms"] != "") {
        $tableQuery = $tableQuery . "AND room.hotel_id IN (SELECT hotel_id FROM room WHERE room.hotel_id = hotel.hotel_id GROUP BY hotel_id HAVING count(*) >= {$_GET["total_number_of_rooms"]})";
    }
    if($_GET["price_of_room"] != "") {
        $tableQuery = $tableQuery . "AND price <= {$_GET["price_of_room"]}";
    }

    /*
    *
    * Section to handle requests from table buttons
    *
    */
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "book") {
            $line = unserialize($_POST["line"]);
            $result = pg_query("INSERT INTO booking (check_in_date, check_out_date, hotel_id, room_number, is_renting, is_paid) VALUES ('{$_GET["start_date"]}', '{$_GET["end_date"]}', {$line["hotel_id"]}, {$line["room_number"]}, true, true)") or die('Query failed: ' . pg_last_error());
        }
        if ($_GET["action"] == "confirm") {
            $line = unserialize($_POST["line"]);
            $result = pg_query("UPDATE booking SET is_renting = true, is_paid = true WHERE booking_id = {$line["booking_id"]}") or die('Query failed: ' . pg_last_error());
        }
    }



?>
</head>

<body>

    <?php include("header.php") ?>
    <!-- SECTION 1: Form -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-4">
                    <h1>Find a Room For Your Customer</h1>
                    <label for="usr">Enter your Customer's User Name</label>
                    <form action="" method="get">
                        <input type="usr" class="form-control" id="pwd" name="usr">
                        <br>
                        <input type="submit" class="btn btn-primary" value="View Customer Bookings">
                    </form>
                    <br><br>

                    <!-- Section: SEARCH BOOKINGS  -->
                    <div class="col-xs-12">

                        <h1>Search for available bookings</h1>
                        <form method="get">
                            <label for="start_date">Start Date</label>
                            <input type="usr" class="form-control" id="startDate" name="start_date" value="<?php echo $_GET[" start_date "] ?>">
                            <label for="end_date">End Date</label>
                            <input type="usr" class="form-control" id="pwd" name="end_date" value="<?php echo $_GET["end_date"] ?>">

                            <!-- Room Capacity -->
                            <label for="room_capacity">Minimum Room Capacity</label>
                            <input type="usr" class="form-control" id="room_capacity" name="room_capacity" value="<?php echo $_GET["room_capacity"] ?>">

                            <!-- Total number of rooms in hotel -->
                            <label for="total_number_of_rooms">Total number of rooms in hotel</label>
                            <input type="usr" class="form-control" id="total_number_of_rooms" name="total_number_of_rooms" value="<?php echo $_GET["total_number_of_rooms"] ?>">

                            <!-- Price of the rooms-->
                            <label for="price_of_room">Price of rooms</label>
                            <input type="usr" class="form-control" id="price_of_room" name="price_of_room" value="<?php echo $_GET["price_of_room"] ?>">

                            <input type="submit" value="Search">
                        </form>

                    </div>
                    <!-- END OF SECTION --  SEARCH BOOKINGS  -->
                </div>

                <div class="col-xs-6">
                    <h1>Your Customers Bookings</h1>
                    <form>

                    </form>
                </div>
                <div class="col-xs-8">
                    <?php createTable("SELECT * FROM booking WHERE username = '{$_GET["usr"]}'", "Confirm", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]&action=confirm", "post"); ?>
                </div>
            </div>
        </div>


        <?php createTable($tableQuery, "Book Now!", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]&action=book", "post"); ?>
    </div>

</body>

</html>