<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("common_head.php"); ?>
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
                    <label>Welcome: <?php echo $_SESSION["usr"]; ?></label><br>
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