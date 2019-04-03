<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('common_head.php'); ?> ?>
</head>

<body>
    <?php include("header.php") ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-4" align="center">
                <h1>Room capacity of Hotels</h1><br><br>

                <!-- TODO: either add search functionality or add name of hotel to this file -->
                <!-- Input fields -->
<!--                 <label for="hotel_chain_name">Enter Your Hotel Chain Name</label><br>
                <input type="usr" class="form-control" name="hotel_chain_name"
                                                       placeholder="<Hotel Chain Name Here>">
                <br>
                <label for="hotel_chain_name">Enter Your Hotel Name</label><br>
                <input type="usr" class="form-control" name="hotel_chain_name"
                                                       placeholder="<Hotel Name Here>">
                <br>
                <a href="<?php echo "admin_PhoneNumbers.php?table=hotelchain_phonenumbers&id_type=hotel_chain_id&id={$hotel_chain["hotel_chain_id"]}"; ?>" class="btn btn-primary" href="">Search</a> -->
                <?php createTable("SELECT * FROM hotel_room_capacity");?>
            </div>
        </div>
    </div>

</body>

</html>