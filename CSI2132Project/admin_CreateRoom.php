<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('common_head.php'); ?>
</head>

<body>

    <?php include("header.php") ?>

    <div class="container-fluid">
        <form action="#" method="post">
            <!-- TODO: Add action location -->
            <div class="row">

                <!-- Section 1: Create Hotel Chain Panel -->
                <div class="col-xs-4">
                    <h1>Create a Room</h1>
                    
    <!-- Hotel_Chain_ID INTEGER,
	Hotel_ID INTEGER,
	Room_Number INTEGER,
	Can_be_Extended BOOLEAN,
	has_Sea_View BOOLEAN,
	has_Mountain_View BOOLEAN,
	Room_Capacity INTEGER,
	Price INTEGER
                    
                    <!-- Input fields -->
                    <label for="room_number">Room Number</label>
                    <input type="usr" class="form-control" name="room_number">

                    <!-- TODO: Build ID method that user doesn't see for creation
                    <label for="hotel_chain_id">Hotel Chain Id</label>
                    <input type="number" class="form-control" name="hotel_chain_id">
                    -->

                    <label for="can_be_extended">Can be Extended</label>
                    <input type="usr" class="form-control" name="can_be_extended">

                    <label for="has_sea_view">Has Sea View</label>
                    <input type="usr" class="form-control" name="has_sea_view">

                    <label for="has_mountain_view">Has Mountain View</label>
                    <input type="usr" class="form-control" name="has_mountain_view">
                    
                    <label for="room_capacity">Room Capacity</label>
                    <input type="number" class="form-control" name="room_capacity">
                    
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price">
                    <!-- End of Input Fields -->

                    <input type="submit" name="submit">
                </div>


                <div class="col-xs-1"></div>
                <!-- For spacing -->


                <!-- Section 2: Hotel Information-->

                <div class="col-xs-4">
                    <h1>Room Information</h1>

                    <!-- Information Fields-->
                    <li>Room Number:</li>
                    <li>Can be extended:</li>
                    <li>Has sea view:</li>
                    <li>Has mountain view:</li>
                    <li>Room capacity:</li>
                    <li>Price:</li>



                </div>
            </div>
            <!-- End of row -->
            <br>

            <div class = "row">
                <div class="col-xs-1"></div> <!-- used for spacing -->
                <div class="col-xs-2">
                    <button type="button" class="btn btn-primary">Go to Hotel</button>
                </div>
            </div>
            
            <br>


            <!-- Section 3: Table -->
            <div class="table-wrapper-scroll-y my-custom-scrollbar">

                <table class="table table-bordered table-striped mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </form>
    </div>



</body>

</html>