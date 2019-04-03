<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('common_head.php'); ?>
</head>

<body>
    <?php include("header.php") ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-4" align="center">
                <h1>View rooms available by Area</h1><br><br>

                <?php createTable("SELECT * FROM rooms_by_area");?>
            </div>
        </div>
    </div>

</body>

</html>