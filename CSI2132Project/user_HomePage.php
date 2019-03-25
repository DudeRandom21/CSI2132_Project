<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("common_head.php");
    include("scrollable_table.php"); 

    $db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");
    if (!empty($_GET)) {

        $tableQuery = "SELECT * FROM hotel_chain JOIN hotel ON hotel_chain_id = hotel.hotel_chain_id JOIN room ON hotel_chain_id = rooms.hotel_chain_id AND hotel_id = rooms.hotel_id WHERE ";

        if($_GET["room_capacity"] != "") {
            $tableQuery = $tableQuery . "and room_capacity >= $_GET["room_capacity"]";
        }
        if($_GET["hotel_chain"] != "") {
            $tableQuery = $tableQuery . "and hotel_chain_name = $_GET["hotel_chain"]";
        }
        if($_GET[""] != "") { //TODO: what is category of hotel??
            $tableQuery = $tableQuery . "and hotel_chain_name = $_GET[""]";
        }
        if($_GET[""] != "") { //TODO: this query is kind of long and complicated and I don't feel like figuring it out right now
            $tableQuery = $tableQuery . "and hotel_chain_name = $_GET[""]";
        }
        if($_GET["price_of_room"] != "") {
            $tableQuery = $tableQuery . "and price <= $_GET["price_of_room"]";
        }



        $result = pg_query($db_connection, $query) or die('Query failed: ' . pg_last_error());
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
                    <input type="usr" class="form-control" id="startDate">
                    <label for="end_date">End Date</label>
                    <input type="usr" class="form-control" id="pwd">
                    
                    <!-- Room Capacity -->
                    <label for="room_capacity">Room Capacity</label>
                    <input type="usr" class="form-control" id="room_capacity">
                    
                    <!-- Hotel Chain -->
                    <label for="hotel_chain">Hotel Chain</label>
                    <input type="usr" class="form-control" id="hotel_chain">
                    
                    <!-- Category of Hotel -->
                    <label for="category_of_hotel">Category of Hotel</label>
                    <input type="usr" class="form-control" id="category_of_hotel">
                    
                    <!-- Total number of rooms in hotel -->
                    <label for="total_number_of_rooms">Total number of rooms in hotel</label>
                    <input type="usr" class="form-control" id="total_number_of_rooms">
                    
                    <!-- Price of the rooms-->
                    <label for="price_of_room">Price of rooms</label>
                    <input type="usr" class="form-control" id="price_of_room">
                    
                    <input type="submit" value="Search">
                </div>
            </div>
        </form>
        <?php createTable($tableQuery, "Book Now!", "");?>
    </div>
    
</body>

</html>