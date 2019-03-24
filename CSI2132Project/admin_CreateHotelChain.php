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
                    <h1>Create a Hotel Chain</h1>

                    <!-- Input fields -->
                    <label for="hotel_chain_name">Hotel Chain Name</label>
                    <input type="usr" class="form-control" name="hotel_chain_name">

                    <!-- TODO: Build ID method that user doesn't see for creation
                    <label for="hotel_chain_id">Hotel Chain Id</label>
                    <input type="number" class="form-control" name="hotel_chain_id">
                    -->

                    <label for="central_office">Central Office</label>
                    <input type="usr" class="form-control" name="central_office">

                    <label for="number_of_hotels">Number of Hotels</label>
                    <input type="number" class="form-control" name="number_of_hotels">

                    <label for="contact_email">Contact Email</label>
                    <input type="email" class="form-control" name="contact_email">
                    <!-- End of Input Fields -->

                    <input type="submit" name="submit">
                </div>


                <div class="col-xs-1"></div>
                <!-- For spacing -->


                <!-- Section 2: Hotel Information-->

                <div class="col-xs-4">
                    <h1>Hotel Information</h1>

                    <!-- Information Fields-->
                    <li>Hotel Chain Name:</li>
                    <li>Central Office:</li>
                    <li>Number of Hotels:</li>
                    <li>Contact Email:</li>
                    <li>TODO: Phone Numbers</li>
                    <!-- TODO: Handle multiple phone numbers -->


                </div>
            </div>
            <!-- End of row -->

            <!--  Used for buttons not needed on hotel chain
            <div class = "row">
                <div class = "col-xs-10"></div>
                <div class="col-sm-1">
                    <button type="button" class="btn btn-primary">Primary</button>
                </div>
            </div>
            -->


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