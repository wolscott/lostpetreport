<?php 
session_start();

if(!isset($_SESSION['username'])){
		header('Location: login_page.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>L&F Pets - Login</title>
    <meta charset="utf-8"> 

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php include "config.php"; ?>
</head>
<body>
    <?php include "header.php"; ?>
    <div class="row">
        <div class="col-sm-6">
            <!--<a href="index.php" class="btn" id="backBlock">&lt Back</a>-->
        </div>
        <div class="col-sm-6">
            <?php include "nav.php"; ?>
        </div>
    </div>
    <div class="container main-container text-center">
        <h2>Enter a New Report or Search Existing Reports:</h2>
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-4">
                <a href="enter_report.php" class="btn btn-block" id="lost_dog">
                    Enter Lost Report
                </a>
            </div>
            <div class="col-lg-4">
                <a href="search_lost.php" class="btn btn-block" id="lost_dog">
                    Search Lost Reports
                </a>
            </div>
            <div class="col-lg-2">
            </div>
        </div> 
       
    </div>
</body>
</html>