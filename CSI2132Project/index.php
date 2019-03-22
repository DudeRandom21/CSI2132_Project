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
                        <input type="radio" class="radioID" name="isEmployee" value="customer"> Customer<br>
                        <input type="radio" class="radioID" name="isEmployee" value="employee"> Employee<br>
                        <input type="radio" class="radioID" name="isEmployee" value="employee"> Admin<br>
                    </div>
                    <input type="submit" name="submit">
                    <!-- <a href="/seemore.html" class="btn btn-primary-active add-top-padding">Login</a> -->
                </div>
            </div>
        </form>
    </div>
    <!-- end of container fluid -->


</body>

</html>