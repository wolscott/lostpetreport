<?php 
session_start();

if(!isset($_SESSION['username'])){
		header('Location: login_page.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lost Dog Report</title>
        <?php include "config.php" ?>
        <link rel="stylesheet" href="lost_report_style.css">

    </head>
    <body>
        <?php include "header.php";?>
        <div class="row">
            <div class="col-sm-6">
                <a href="enter_report.php" class="btn" id="backBlock">&lt Back</a>
            </div>
            <div class="col-sm-6">
                <?php include "nav.php"; ?>
            </div>
        </div>
        <div class="container main-container">
            <h2 class="text-center">Report a Lost Dog:</h2>
            <form action="report_submit.php" method="post" role="form">
                <div class="row">
                </div>
                <?php include "dog_form.html"; ?>
                <button class="btn" name="submitReport" value="submit" type="submit">Submit Report</button>
            </form>
        </div>
    </body>
</html>