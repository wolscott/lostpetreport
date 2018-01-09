<!DOCTYPE html>
<html lang="en">
<head>
    <title>L&F Pets - Register</title>
    <?php include "config.php"; ?>
</head>
<body>
    <?php include "header.php"; ?>
    <form action="registration_action_required_page.php" method="post" role="form">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12"><h2>Register A New Account</h2></div>
            </div>
            <div class="row">
                <div class="col-lg-4 text-right">Registration Code</div>
                <div class="col-lg-4 text-right"><input type="text" class="form-control" name="regcode"></div>
            </div>
            <div class="row">
                <div class="col-lg-4 text-right">Email Address</div>
                <div class="col-lg-4 text-right"><input type="text" class="form-control" name="email"></div>
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
                <div class="col-lg-2"><button class="btn btn-block" name="register" value="register" type="submit">Register</div></div>
                <div class="col-lg-5"></div>
            </div>
        </div>
    </form>
</body>
</html>