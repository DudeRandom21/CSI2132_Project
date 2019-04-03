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
                <h1>View rooms available by Area</h1><br><br>

                <!-- Input fields -->
                <label for="hotel_chain_name">Enter your Area</label><br>
                <input type="usr" class="form-control" name="hotel_chain_name"
                                                       placeholder="<City Name Here>">
                <br>
                <a href="<?php echo "admin_PhoneNumbers.php?table=hotelchain_phonenumbers&id_type=hotel_chain_id&id={$hotel_chain["hotel_chain_id"]}"; ?>" class="btn btn-primary" href="">Search</a>
            </div>
        </div>
        
        
        
        <!-- Section 3: Table -->
        <?php createTable("SELECT * FROM hotel WHERE hotel_chain_id = {$hotel_chain["hotel_chain_id"]}", "view", "admin_CreateRoom.php?");?>

    </div>

</body>

</html>