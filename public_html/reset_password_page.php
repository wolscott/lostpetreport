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
    <title>L&F Pets - Reset Password</title>
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
    <form action="reset_password.php" method="post" role="form">
        <div class="container text-center">
            <?php 
            include "message.php"; 
            if(isset($_GET['username']) && isset($_GET['rt']){
                include "reset_form.php";
            }
            else {
                include "reset_request_form.php";
            }
            ?>
        </div>
    </form>
</body>
</html>