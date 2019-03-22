<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap Starter Template</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php
        $db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");
    ?>
</head>

<body>

<?php include("header.php") ?>
    <!-- SECTION 1: Form -->
    <div class="container-fluid">
        <form action="/action_page.php">
            <div class="row">
                <div class="col-xs-4">
                    <h1>Find a room today!</h1>
                    <!-- Dates -->
                    <label>Welcome: <?php echo $_GET["usr"]; ?></label><br>
                    <label for="start_date">Start Date</label>
                    <input type="usr" class="form-control" id="startDate">
                    <label for="end_date">End Date</label>
                    <input type="usr" class="form-control" id="pwd">
                    
                    <!-- Room Capacity -->
                    <label for="room_capacity">Room Capacity</label>
                    <input type="usr" class="form-control" id="room_capcity">
                    
                    <!-- Hotel Chain -->
                    <label for="hotel_chain">Hotel Chain</label>
                    <input type="usr" class="form-control" id="hotel_chain">
                    
                    <!-- Category of Hotel -->
                    <label for="category_of_hotel">Category of Hotel</label>
                    <input type="usr" class="form-control" id="category_of_hotel">
                    
                    <!-- Total number of rooms in hotel -->
                    <label for="total_number_of_rooms">Total number of rooms in hotel</label>
                    <input type="usr" class="form-control" id="total_number_of_rooms">
                    
                    <!-- Price of the rooms-->
                    <label for="price_of_room">Price of rooms</label>
                    <input type="usr" class="form-control" id="price_of_room">
                    
                    <input type="submit" value="Search">
                </div>
            </div>
        </form>
    </div>
    
</body>

</html>