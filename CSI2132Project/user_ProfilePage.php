<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('common_head.php'); ?>
</head>

<body>

    <?php include("header.php") ?>

    <div class="container-fluid">
        <!-- TODO: Add action location -->
        <div class="row">

            <!-- Section 1: Profile Options Panel -->
            <form action="#" method="post">
                <div class="col-xs-6">
                    <h1>"Your name" Profile</h1>
                    <br>

                    <!-- Input fields -->
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="room_number">To change your username, enter a new username below</label>
                            <input type="usr" class="form-control" name="room_number">
                        </div>
                        <div class="col-xs-6">
                            <br><br>
                            <button type="button" class="btn btn-primary">Change Username</button>
                        </div>
                    </div>



                    <!-- TODO: Build ID method that user doesn't see for creation
                    <label for="hotel_chain_id">Hotel Chain Id</label>
                    <input type="number" class="form-control" name="hotel_chain_id">
                    -->

                    <div class="row">
                        <div class="col-xs-6">
                            <label for="room_number">To change your password, enter a new password below</label>
                            <input type="usr" class="form-control" name="room_number">
                        </div>
                        <div class="col-xs-6">
                            <br><br>
                            <button type="button" class="btn btn-primary">Change Password</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6"></div>
                        <!-- For spacing -->
                        <div class="col-xs-6">
                            <br><br>
                            <button type="button" class="btn btn-danger">Delete Account</button>
                        </div>
                    </div>

                    <!-- End of Input Fields -->

                    <!--
                    <input type="submit" name="submit"> -->
                </div>
            </form>





        </div>
    </div>
    <!-- End of row -->


</body>

</html>