<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('common_head.php');

        $db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");
        
        if($_GET["action"] == "del") {

            $query = "DELETE FROM users WHERE username = '{$_SESSION["usr"]}'";

            $result = pg_query($db_connection, $query) or die('Query failed: ' . pg_last_error());

            session_unset();

            header('Location: index.php');
        }

        if(!empty($_POST)) {

            $usr = $_SESSION["usr"];

            $query = "UPDATE users SET ";

            if($_POST["usr"] != "") {
                $query = $query . "username = '{$_POST["usr"]}'";
                $_SESSION["usr"] = $_POST["usr"];
            }
            if($_POST["usr"] != "" && $_POST["pwd"] != "") {
                $query = $query . ", ";
            }
            if($_POST["pwd"] != "") {
                $query = $query . "password = '{$_POST["pwd"]}'";
            }

            $query = $query . " WHERE username = '{$usr}'";

            if ($_POST["usr"] != "" || $_POST["pwd"] != "") {
                $result = pg_query($db_connection, $query) or die('Query failed: ' . pg_last_error());
            }

            if ($_SESSION["isEmployee"] == "employee") {

                $query = "UPDATE employee SET ";

                if($_POST["ssn"] != "") {
                    $query = $query . "ssn = '{$_POST["ssn"]}'";
                }
                if($_POST["ssn"] != "" && $_POST["name"] != "") {
                    $query = $query . ", ";
                }
                if($_POST["name"] != "") {
                    $query = $query . "name = '{$_POST["name"]}'";
                }
                if(($_POST["ssn"] != "" || $_POST["name"] != "") && $_POST["hotel_id"] != "") {
                    $query = $query . ", ";
                }
                if($_POST["hotel_id"] != "") {
                    $query = $query . "hotel_id = {$_POST["hotel_id"]}";
                }

                $query = $query . " WHERE username = '{$usr}'";

                if ($_POST["ssn"] != "" || $_POST["name"] != "" || $_POST["hotel_id"] != "") {
                    $result = pg_query($db_connection, $query) or die('Query failed: ' . pg_last_error());
                }
            }

        }

    ?>
</head>

<body>

    <?php include("header.php") ?>

    <div class="container-fluid">
        <div class="row">

            <!-- Section 1: Create Hotel Chain Panel -->
            <form method="post">
                <div class="col-xs-6">
                    <h1> <?php echo $_SESSION["usr"] ?>'s Profile</h1>
                    <br>

                    <!-- Input fields -->
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="room_number">Enter a new username below to change it</label>
                            <input type="usr" class="form-control" name="usr">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="room_number">Enter a new password below to change it </label>
                            <br>
                            <input type="password" class="form-control" name="pwd">
                        </div>
                    </div>
                    <?php
                        if ($_SESSION["isEmployee"] == "employee") {
                            echo '<div class="row">
                                    <div class="col-xs-6">
                                        <label for="ssn">Enter a new SSN below to change it</label>
                                        <input type="number" class="form-control" name="ssn">                            
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="ssn">Enter a new name below to change it</label>
                                        <input type="usr" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="ssn">Enter a new hotel_id below to change it</label>
                                        <input type="number" class="form-control" name="hotel_id">
                                    </div>
                                </div>';
                        }
                    ?>
                    <br>
                    <div class="row">
                        <div class="col-xs-6"></div> <!-- for spacing -->
                        <div class="col-xs-6">
                            <input type="submit" class="btn btn-primary" name="Change", value="Change">
                            <a href="?action=del" class="btn btn-danger">Delete Account</a>
                        </div>
                    </div>
                </div>
            </form>



            <div class="col-xs-1"></div>
            <!-- For spacing -->



        </div>
    </div>
    <!-- End of row -->


</body>

</html>