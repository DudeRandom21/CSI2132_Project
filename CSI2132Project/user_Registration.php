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

            <!-- Section 1: Create Hotel Chain Panel -->
            <form action="#" method="post">
                <div class="col-xs-6">
                    <h1>Create Your Account</h1>
                    <br>

                    <!-- Input fields -->
                    <label for="room_number">Choose Your Username</label>
                    <input type="usr" class="form-control" name="room_number">

                    <label for="room_number">Create a Password</label>
                    <input type="password" class="form-control" name="room_number">

                    <div class="row">
                        <div class="col-xs-6"></div>
                        <!-- For spacing -->
                        <div class="col-xs-6">
                            <br><br>
                            <button type="button" class="btn btn-primary">Create Account</button>
                        </div>
                    </div>

                    <!-- End of Input Fields -->

                    <!--
                    <input type="submit" name="submit"> -->
                </div>
            </form>



            <div class="col-xs-1"></div>
            <!-- For spacing -->



        </div>
    </div>
    <!-- End of row -->


</body>

</html>