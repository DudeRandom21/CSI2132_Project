<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('common_head.php'); ?>

    <?php
        $db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");

        if (!empty($_POST)) {
            //processing hotel adding if any
            if (isset($_POST["hotel_name"])) {
                
                $query = "INSERT INTO hotel (hotel_chain_id, hotel_name, hotel_city, hotel_contact_email, rating)
                      VALUES ('{$_GET["line"]["hotel_chain_id"]}',
                              '{$_POST["hotel_name"]}',
                              '{$_POST["hotel_city"]}',
                              '{$_POST["hotel_contact_email"]}',
                              '{$_POST["rating"]}')
                              RETURNING hotel_id";
                
                $result = pg_query($db_connection, $query) or die('Query failed: ' . pg_last_error());

                if ($_POST["manager_ssn"] != "") {
                    echo "test";
                    $hotel_id = pg_fetch_array($result)["hotel_id"];
                    $result = pg_query($db_connection, "UPDATE hotel SET manager_ssn = {$_POST["manager_ssn"]} WHERE hotel_id = {$hotel_id}");
                }

            }
            
            if (isset($_POST["hotel_chain_name"])) {
                foreach ($_POST as $key => $value) {
                    if ($value != "" && $key != "submit") {
                        $result = pg_query($db_connection, "UPDATE hotel_chain SET {$key} = " . (is_numeric($value) ? $value : "'{$value}'") . " WHERE hotel_chain_id = {$_GET["line"]["hotel_chain_id"]}") or die('Query failed: ' . pg_last_error());
                    }
                }
            }
            if ($_POST["action"] == "delete") {
                $result = pg_query($db_connection, "DELETE FROM hotel_chain WHERE hotel_chain_id = {$_GET["line"]["hotel_chain_id"]}");
                header("Location: admin_CreateHotelChain.php");
            }
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
            <form action="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"  method="post">

                <!-- Section 1: Create Hotel Panel -->
                <div class="col-xs-4">
                    <h1>Create a Hotel</h1>

                    <!-- Input fields -->
                    <label for="hotel_name">Hotel Name(*)</label>
                    <input type="usr" class="form-control" name="hotel_name" required="true">
                    <!-- TODO: Currently only used for name -->

                    <label for="city">Hotel City(*)</label>
                    <input type="usr" class="form-control" name="hotel_city" required="true">

                    <label for="hotel_contact_email">Contact Email(*)</label>
                    <input type="email" class="form-control" name="hotel_contact_email" required="true">

                    <label for="rating">Rating(*)</label>
                    <input type="number" class="form-control" name="rating" required="true">

                    <label for="manager_ssn">Manager SSN</label>
                    <input type="text" pattern="\d*" class="form-control" name="manager_ssn" maxlength="9">
                    <!-- End of Input Fields -->

                    <input type="submit" name="submit">
                </div>
            </form>



            <div class="col-xs-1"></div>
            <!-- For spacing -->


            <!-- Section 2: Hotel Information-->

            <div class="col-xs-4">
                <h1>Hotel Chain Information</h1>

                <form action="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"  method="post">
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
                    
                    <label  for="number_of_hotels">Number of Hotels: <?php echo $hotel_chain["number_of_hotels"]; ?></label>
                    <br>
                    
                    <input type="submit" name="submit" value="Update Information"><br><br>
                </form>

                <a href="<?php echo "admin_PhoneNumbers.php?table=hotelchain_phonenumbers&id_type=hotel_chain_id&id={$hotel_chain["hotel_chain_id"]}"; ?>" class="btn btn-primary" href="">Manage Phone Numbers</a>

                <form action="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"  method="post">
                    <input type="hidden" name="action" value="delete">
                    <input type="submit" class="btn btn-danger" name="submit" value="Delete Hotel Chain">
                </form>


            </div>
        </div>
        <!-- End of row -->
        <br>

        <div class="row">
            <div class="col-xs-1"></div>
            <!-- used for spacing -->
            <div class="col-xs-2">
                <a href="admin_CreateHotelChain.php" class="btn btn-primary">Back to Hotel Chain</a>
            </div>
        </div>
        

        <br>


        <!-- Section 3: Table -->
        <?php createTable("SELECT * FROM hotel WHERE hotel_chain_id = {$hotel_chain["hotel_chain_id"]}", "view", "admin_CreateRoom.php?");?>
        
        <!-- 


    </div>



</body>

</html>