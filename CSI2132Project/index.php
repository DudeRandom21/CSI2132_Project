<!DOCTYPE html>
<html lang="en">

<head>
<?php include("common_head.php"); ?>
</head>

<body>

<?php include("header.php") ?>

    <!-- SECTION 1: Main Form -->
    <div class="container-fluid">
        <form action="./signin_redirect.php" method="post">
            <div class="row">
                <div class="col-xs-4">
                    <h1>Login Page</h1>
                    <?php if($_GET["action"] == "fail") echo '<label class="text-danger">Incorrect Username/Password</label><br>'; ?>
                    <label for="username">User name:</label>
                    <input type="usr" class="form-control" name="usr">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="pwd">
                    <input type="submit" name="submit">
                </div>
            </div>
        </form>
    </div>
    <!-- end of container fluid -->


</body>

</html>