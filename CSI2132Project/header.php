<?php session_start(); ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home_redirect.php">eHotels</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="home_redirect.php">Home</a></li>
                <li><a href="profile_redirect.php">Profile</a></li>
                <li><a href="view_RoomsByArea.php">Rooms by Area</a></li>
                <li><a href="view_HotelRoomCapacity.php">Capacity by Hotel</a></li>
                <?php if($_SESSION["isEmployee"] == "admin") echo '<li><a href="admin_ArchiveView.php">View Archive</a></li>'; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="user_Registration.php?action=logout"><?php echo (isset($_SESSION["isEmployee"]) ? "LogOut" : "Sign Up") ?></a></li>
            </ul>

        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<!-- /.container -->
<br><br><br>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

