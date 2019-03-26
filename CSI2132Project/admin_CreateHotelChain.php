<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('common_head.php');

    if (!empty($_POST)) {
        $db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");

        $query = "INSERT INTO hotel_chain (hotel_chain_name, central_office, contact_email) VALUES ('{$_POST["hotel_chain_name"]}', '{$_POST["central_office"]}', '{$_POST["contact_email"]}')";

        $result = pg_query($db_connection, $query) or die('Query failed: ' . pg_last_error());
    }
    include("scrollable_table.php");
    ?>
</head>

<body>

    <?php include("header.php") ?>

    <div class="container-fluid">
        <div class="row">
            <form method="post">
                <!-- Section 1: Create Hotel Chain Panel -->
                <div class="col-xs-4">
                    <h1>Create a Hotel Chain</h1>

                    <!-- Input fields -->
                    <label for="hotel_chain_name">Hotel Chain Name</label>
                    <input type="usr" class="form-control" name="hotel_chain_name">

                    <label for="central_office">Central Office</label>
                    <input type="usr" class="form-control" name="central_office">

                    <label for="number_of_hotels">Number of Hotels</label>
                    <input type="number" class="form-control" name="number_of_hotels">

                    <label for="contact_email">Contact Email</label>
                    <input type="email" class="form-control" name="contact_email">
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
                <li>Hotel Chain Name:</li>
                <li>Central Office:</li>
                <li>Number of Hotels:</li>
                <li>Contact Email:</li>
                <li>TODO: Phone Numbers</li>
                <!-- TODO: Handle multiple phone numbers -->


            </div>
        </div>
        <!-- End of row -->


        <!-- Section 3: Table -->
        <?php createTable("SELECT * FROM hotel_chain", "view", "admin_CreateHotel.php");?>

    </div>



</body>

</html>