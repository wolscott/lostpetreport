<?php 
session_start();

/* redirect if logged in user is not also an admin */
if(!(isset($_SESSION['username'])) && isset($_SESSION['admin'])){
		header('Location: login_page.php');
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Tools</title>
        <?php include "config.php" ?>
        <link rel="stylesheet" href="lost_report_style.css">

    </head>
    <body>
        <?php include "header.php";?>
        <div class="row">
            <div class="col-sm-6">
                <a href="search_lost.php" class="btn" id="backBlock">&lt Back</a>
            </div>
            <div class="col-sm-6">
                <?php include "nav.php"; ?>
            </div>
        </div>
        <div class="container main-container">
            <h2 class="text-center">Reg Codes</h2>
            <?php include "message.php"; ?>
            <form action="display_codes.php" method="post" role="form">
                <div class='row'>
                    <div class='col-lg-12'>Generate Registration Codes</div>
                </div>
                <div class='row'>
                    <div class='col-lg-12'>
                        <?php require "../sql/generate_codes.php"; ?>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>