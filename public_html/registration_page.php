<?php 
session_start();

if(isset($_SESSION['regcode'])){
    $regcode = $_SESSION['regcode'];
    unset($_SESSION['regcode']);
}
else {
    $regcode = "";
}
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    unset($_SESSION['email']);
}
else {
    $email = "";
}
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    unset($_SESSION['username']);
}
else {
    $username = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>L&F Pets - Register</title>
    <?php include "config.php"; ?>
</head>
<body>
    <?php include "header.php"; ?>
    <div class="row">
            <div class="col-sm-6">
                <a href="login_page.php" class="btn" id="backBlock">&lt Back</a>
            </div>
            <div class="col-sm-6">
                <?php include "nav.php"; ?>
            </div>
        </div>
    <form action="registration_action_required_page.php" method="post" role="form">
        <div class="container text-center">
            <?php include "message.php"; ?>
            <div class="row">
                <div class="col-lg-12"><h2>Register A New Account</h2></div>
            </div>
            <div class="row">
                <div class="col-lg-4 text-right">Registration Code</div>
                <div class="col-lg-4 text-right"><input type="text" class="form-control" name="regcode" value="<?php echo $regcode; ?>"></div>
            </div>
            <div class="row">
                <div class="col-lg-4 text-right">Email Address</div>
                <div class="col-lg-4 text-right"><input type="text" class="form-control" name="email" value="<?php echo $email; ?>"></div>
            </div>
            <div class="row">
                <div class="col-lg-4 text-right">User Name</div>
                <div class="col-lg-4 text-right"><input type="text" class="form-control" name="username" value="<?php echo $username; ?>"></div>
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