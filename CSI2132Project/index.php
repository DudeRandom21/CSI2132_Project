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
                    <label for="username">User name:</label>
                    <input type="usr" class="form-control" name="usr">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="pwd">
                    <div class="container-fluid">
                        <input type="radio" class="radioID" name="isEmployee" value="user" checked> Customer<br>
                        <input type="radio" class="radioID" name="isEmployee" value="employee"> Employee<br>
                        <input type="radio" class="radioID" name="isEmployee" value="admin"> Admin<br>
                    </div>
                    <input type="submit" name="submit">
                </div>
            </div>
        </form>
    </div>
    <!-- end of container fluid -->


</body>

</html>