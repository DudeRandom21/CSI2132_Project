<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('common_head.php'); ?>

    <?php
        $db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");

        //processing hotel adding if any
        if (!empty($_POST)) {

            //TODO: the query for adding a hotel goes here!

            $result = pg_query($db_connection, $query) or die('Query failed: ' . pg_last_error());
        }
        
        // getting hotel chain information
        $query = "SELECT * FROM hotel_chain WHERE hotel_chain_id = '{$_GET["id"]}'";

        $result = pg_query($db_connection, $query) or die('Query failed: ' . pg_last_error());

        $hotel_chain = pg_fetch_array($result);

        include("scrollable_table.php");
    ?>

</head>

<body>

    <?php include("header.php") ?>

    <div class="container-fluid">
        <!-- TODO: Add action location -->
        <div class="row">
            <form action="#" method="post">

                <!-- Section 1: Create Hotel Chain Panel -->
                <div class="col-xs-4">
                    <h1>Create a Hotel</h1>

                    <!-- Input fields -->
                    <label for="hotel_name">Hotel Name</label>
                    <input type="usr" class="form-control" name="hotel_name">

                    <!-- TODO: Build ID method that user doesn't see for creation
                    <label for="hotel_chain_id">Hotel Chain Id</label>
                    <input type="number" class="form-control" name="hotel_chain_id">
                    -->

                    <label for="contact_email">Contact Email</label>
                    <input type="email" class="form-control" name="contact_email">

                    <label for="number_of_rooms">Number of Rooms</label>
                    <input type="number" class="form-control" name="number_of_rooms">

                    <label for="rating">Rating</label>
                    <input type="number" class="form-control" name="rating">
                    <!-- End of Input Fields -->

                    <input type="submit" name="submit">
                </div>
            </form>



            <div class="col-xs-1"></div>
            <!-- For spacing -->


            <!-- Section 2: Hotel Information-->

            <div class="col-xs-4">
                <h1>Hotel Chain Information</h1>

                <!-- Information Fields-->
                <li>Hotel Chain Name: <?php echo $hotel_chain["hotel_chain_name"]; ?></li>
                <li>Central Office: <?php echo $hotel_chain["central_office"]; ?></li>
                <li>Number of Hotels: <?php echo $hotel_chain["number_of_hotels"]; ?></li>
                <li>Contact Email: <?php echo $hotel_chain["contact_email"]; ?></li>
                <li>TODO: Phone Numbers</li>
                <!-- TODO: Handle multiple phone numbers -->


            </div>
        </div>
        <!-- End of row -->
        <br>

        <div class="row">
            <div class="col-xs-1"></div>
            <!-- used for spacing -->
            <div class="col-xs-2">
                <button type="button" class="btn btn-primary">Go to Hotel Chain</button>
            </div>
        </div>

        <br>


        <!-- Section 3: Table -->
        <?php createTable("SELECT * FROM hotel", "view", "admin_CreateRoom.php");?>

    </div>



</body>

</html>