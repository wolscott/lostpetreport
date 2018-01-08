<?php
include_once '../user_management/login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>L&F Pets - Login</title>
    <?php include "config.php"; ?>
</head>
<body>
    <?php include "header.php"; ?>
    <form action="login_page.php" method="post" role="form">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12"><h2>Please Log In</h2></div>
            </div>
            <div class="row">
                <div class="col-lg-4 text-right">User Name</div>
                <div class="col-lg-4 text-right"><input type="text" class="form-control" name="username"></div>
            </div>
            <div class="row">
                <div class="col-lg-4 text-right">Password</div>
                <div class="col-lg-4 text-right"><input type="password" class="form-control" name="password"></div>
                <div class="col-lg-4"></div>
            </div>
            <div class="row">
                <div class="col-lg-5"></div>
                <div class="col-lg-2"><button class="btn btn-block" name="login" value="login" type="submit">Log In</div></div>
                <div class="col-lg-5"></div>
            </div>
        </div>
    </form>
</body>
</html>