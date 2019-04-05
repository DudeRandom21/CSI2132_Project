<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('common_head.php');

    if (!empty($_POST)) {
        $db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");

        $query = "INSERT INTO hotel_chain (hotel_chain_name, central_office, contact_email) 
        VALUES ('{$_POST["hotel_chain_name"]}','{$_POST["central_office"]}',       
                          '{$_POST["contact_email"]}')";

        $result = pg_query($db_connection, $query) or die('Query failed: ' . pg_last_error());
    }
    ?>
</head>

<body>

    <?php include("header.php") ?>

    <div class="container-fluid">
        <div class="row">
                <!-- Section 1: Create Hotel Chain Panel -->
                <div class="col-xs-4">
                    <h1>Database Archive</h1>
                </div>

            <!-- http://localhost:8080/admin_CreateHotel.php?line%5Bhotel_chain_id%5D=1&line%5Bhotel_chain_name%5D=Holiday+Inn&line%5Bcentral_office%5D=Washington&line%5Bnumber_of_hotels%5D=0&line%5Bcontact_email%5D=Holiday_Inn%40Holiday_Inn.com -->


            <div class="col-xs-1"></div>
        </div>
        <!-- End of row -->


        <!-- Section 3: Table -->
        
        <?php createTable("SELECT   hotel_chain.hotel_chain_name,
                                    hotel_chain.contact_email,
                                    hotel_chain.central_office,
                                    hotel_chain.number_of_hotels,
                                    hotel.hotel_name,
                                    hotel.hotel_city,
                                    hotel.contact_email,
                                    hotel.number_of_rooms,
                                    hotel.rating,
                                    archive.time_created,
                                    archive.check_in_date,
                                    archive.check_out_date,
                                    archive.is_renting,
                                    archive.username,
                                    archive.is_paid,
                                    archive.room_number
                            FROM archive JOIN Hotel ON archive.hotel_id=hotel.hotel_id
                                            JOIN Hotel_Chain ON hotel.hotel_chain_id=hotel_chain.hotel_chain_id", "","");?>

    </div>



</body>

</html>