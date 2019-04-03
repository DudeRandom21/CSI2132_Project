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
        
            // 
            $query = "INSERT INTO hotel (contact_email, rating, hotel_address)
                  VALUES ('{$_POST["contact_email"]}',
                          '{$_POST["rating"]}',
                          '{$_POST["hotel_address"]}')"; // TODO: currently just name
        }
        // getting hotel chain information
        $query = "SELECT * 
                  FROM hotel_chain 
                  WHERE hotel_chain_id = '{$_GET["line"]["hotel_chain_id"]}'";

        $result = pg_query($db_connection, $query) or die('Query failed: ' . pg_last_error());
            
        $hotel_chain = pg_fetch_array($result);

    ?>

</head>

<body>

    <?php include("header.php") ?>

    <div class="container-fluid">
        <div class="row">
            <form method="post">

                <!-- Section 1: Create Hotel Panel -->
                <div class="col-xs-4">
                    <h1>Create a Hotel</h1>

                    <!-- Input fields -->
                    <label for="hotel_name">Hotel Name</label>
                    <input type="usr" class="form-control" name="hotel_name">
                    <!-- TODO: Currently only used for name -->

                    <label for="city">Hotel City</label>
                    <input type="email" class="form-control" name="hotel_city">

                    <label for="contact_email">Contact Email</label>
                    <input type="email" class="form-control" name="contact_email">

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
                <label  for="hotel_chain_name">Hotel Chain Name:</label>
                <input  type="usr" class="form-control" name="hotel_chain_name"
                        placeholder="<?php echo $hotel_chain["hotel_chain_name"]; ?>">
                
                <label  for="central_office">Central Office:</label>
                <input  type="usr" class="form-control" name="central_office"
                        placeholder="<?php echo $hotel_chain["central_office"]; ?>">
                
                <label  for="contact_email">Contact Email:</label>
                <input type="email" class="form-control" name="contact_email"
                           placeholder="<?php echo $hotel_chain["contact_email"]; ?>">
                
                <label  for="number_of_hotels">Number of Hotels: <?php echo $hotel_chain["number_of_hotels"]; ?></label><br>
                
                <input type="submit" name="submit" value="Update Information"><br><br>

                <a href="<?php echo "admin_PhoneNumbers.php?table=hotelchain_phonenumbers&id_type=hotel_chain_id&id={$hotel_chain["hotel_chain_id"]}"; ?>" class="btn btn-primary" href="">Manage Phone Numbers</a>


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
        <?php createTable("SELECT * FROM hotel WHERE hotel_chain_id = {$hotel_chain["hotel_chain_id"]}", "view", "admin_CreateRoom.php?");?>
        
        <!-- 


    </div>



</body>

</html>