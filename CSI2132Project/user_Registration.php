<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('common_head.php');

    //This is a hack, it signs you out while letting me use the same link for sign up and logout
    if($_GET["action"] = "logout" && isset($_SESSION["isEmployee"])) {
        unset($_SESSION["isEmployee"]);
        unset($_SESSION["usr"]);
        unset($_SESSION["hotel_id"]);
     
        header('Location: index.php');
    }
    
    if (!empty($_POST)) {
        $db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");


        $query = "INSERT INTO users (username, password, type) VALUES ('{$_POST["usr"]}', '{$_POST["pwd"]}', '{$_POST["type"]}')";

        $result = pg_query($db_connection, $query) or die('Query failed: ' . pg_last_error());

        //Assign session variables and continue to home page
        $_SESSION["isEmployee"] = $_POST["type"];
        $_SESSION["usr"] = $_POST["usr"];

        if ($_POST["type"] == "employee") {
            $employeeQuery = "INSERT INTO employee (ssn, name, username, hotel_id) VALUES ({$_POST["ssn"]}, '{$_POST["usr"]}', '{$_POST["name"]}', {$_POST["hotel_id"]})";

            $result = pg_query($db_connection, $employeeQuery) or die('Query failed: ' . pg_last_error());

            $_SESSION["hotel_id"] = $_POST["hotel_id"];
        }

        header('Location: ./home_redirect.php');
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
                    <h1>Create Your Account</h1>
                    <br>

                    <!-- Input fields -->
                    <label for="room_number">Choose Your Username(*)</label>
                    <input type="usr" class="form-control" name="usr" required="true">

                    <label for="room_number">Create a Password(*)</label>
                    <input type="password" class="form-control" name="pwd" required="true">

                    <div class="container-fluid">
                        <input type="radio" class="radioID" name="type" value="user" id="hidemenu"> Customer<br>
                        <input type="radio" class="radioID" name="type" value="employee" id="showmenu"> Employee<br>
                        <input type="radio" class="radioID" name="type" value="admin" id="hidemenu2"> Admin<br>
                    </div><br>
                    
                    <div class="menu" style="display: none">
                        <label for="ssn">Enter your SSN</label>
                        <input type="number" class="form-control" name="ssn">
                    
                        <label for="ssn">Enter your Name</label>
                        <input type="usr" class="form-control" name="name">
                    
                        <label for="ssn">Enter your Hotel ID</label>
                        <input type="number" class="form-control" name="hotel_id">
                    </div>

                    <div class="row">
                        <div class="col-xs-6"></div>
                        <!-- For spacing -->
                        <div class="col-xs-6 pull-right">
                            <br><br>
                            <input type="submit" class="btn btn-primary" value="Create Account">
                        </div>
                    </div>
                </div>
            </form>



            <div class="col-xs-1"></div>
            <!-- For spacing -->



        </div>
    </div>
    <!-- End of row -->
    
    <script>
     $(document).ready(function() {
        $('#showmenu').click(function() {
            $('.menu').css('display', 'inline-block');
        });
     });
    
     $(document).ready(function() {
         $('#hidemenu').click(function() {
             $('.menu').css('display', 'none');
         });
     });
    
     $(document).ready(function() {
         $('#hidemenu2').click(function() {
             $('.menu').css('display', 'none');
         });
     });
    </script>
    

</body>

</html>