<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('common_head.php');

    $db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");

    if (!empty($_POST)) {
        if (!isset($_POST["action"])) {

        
        $query = "INSERT INTO room (room_number, can_be_extended, has_sea_view, has_mountain_view, room_capacity, price)
                  VALUES ('{$_POST["room_number"]}',
                          '{$_POST["can_be_extended"]}',
                          '{$_POST["has_sea_view"]}',
                          '{$_POST["has_mountain_view"]}',
                          '{$_POST["room_capacity"]}',
                          '{$_POST["price"]}')";
        
        $result = pg_query($db_connection, $query) or die('Query failed: ' . pg_last_error());

        }
        if ($_POST["action"] == "delete") {
            $result = pg_query($db_connection, "DELETE FROM hotel WHERE hotel_id = {$_GET["line"]["hotel_id"]}");
            header("Location: admin_CreateHotelChain.php");
        }

    }
    
    // Get Hotel information
    $query = "SELECT * 
              FROM hotel
              WHERE hotel_id = '{$_GET["line"]["hotel_id"]}'";

    $result = pg_query($db_connection, $query) or die('Query failed: ' . pg_last_error());


    $hotel = pg_fetch_array($result);
    ?>
</head>

<body>

    <?php include("header.php") ?>

    <div class="container-fluid">
        <div class="row">
            <form method="post">

                <!-- Section 1: Create Hotel Chain Panel -->
                <div class="col-xs-4">
                    <h1>Create a Room</h1>

                    <!-- Hotel_Chain_ID INTEGER,
	Hotel_ID INTEGER,
	Room_Number INTEGER,
	Can_be_Extended BOOLEAN,
	has_Sea_View BOOLEAN,
	has_Mountain_View BOOLEAN,
	Room_Capacity INTEGER,
	Price INTEGER -->

                    <!-- Input fields -->
                    <label for="room_number">Room Number</label>
                    <input type="usr" class="form-control" name="room_number">

                    <label for="can_be_extended">Can be Extended</label>
                    <input type="usr" class="form-control" name="can_be_extended">

                    <label for="has_sea_view">Has Sea View</label>
                    <input type="usr" class="form-control" name="has_sea_view">

                    <label for="has_mountain_view">Has Mountain View</label>
                    <input type="usr" class="form-control" name="has_mountain_view">

                    <label for="room_capacity">Room Capacity</label>
                    <input type="number" class="form-control" name="room_capacity">

                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price">
                    <!-- End of Input Fields -->

                    <input type="submit" name="submit">
                </div>
            </form>


            <div class="col-xs-1"></div>
            <!-- For spacing -->


            <!-- Section 2: Hotel Information-->
            <div class="col-xs-4">
                <h1>Hotel Information</h1>

                <!-- Information Fields-->
                <label for="hotel_name">Hotel Name:</label>
                <input type="usr" class="form-control" name="hotel_name" placeholder="<?php echo $hotel["hotel_name"]; ?>">

                <label for="hotel_City">Hotel City:</label>
                <input type="usr" class="form-control" name="hotel_city" placeholder="<?php echo $hotel["hotel_city"]; ?>">

                <label for="central_office">Contact Email:</label>
                <input type="usr" class="form-control" name="contact_email" placeholder="<?php echo $hotel["contact_email"]; ?>">

                <label for="contact_email">Rating:</label>
                <input type="email" class="form-control" name="rating" placeholder="<?php echo $hotel["rating"]; ?>">

                <input type="submit" name="submit" value="Update Information"><br><br>


                <a href="<?php echo " admin_PhoneNumbers.php?table=hotel_phonenumbers&id_type=hotel_id&id={$hotel[ "hotel_id"]} "; ?>" class="btn btn-primary" href="">Manage Phone Numbers</a>

                <form action="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"  method="post">
                    <input type="hidden" name="action" value="delete">
                    <input type="submit" class="btn btn-danger" name="submit" value="Delete Hotel">
                </form>
            </div>
        </div>
        <!-- End of row -->
        <div class="row">
            <div class="col-xs-1"></div>
            <!-- used for spacing -->
            <div class="col-xs-2">
                <a href="admin_CreateHotelChain.php" class="btn btn-primary">Back to Hotel Chain</a>
            </div>
        </div>

        <br>


        <!-- Section 3: Table -->
        <?php createTable("SELECT * FROM room WHERE hotel_id = '{$_GET["line"]["hotel_id"]}'",
                          "view", "admin_RoomInfoUpdate.php?");?>

    </div>



</body>

</html>