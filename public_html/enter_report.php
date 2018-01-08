<?php 
session_start();

if(!isset($_SESSION['username'])){
		header('Location: login_page.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>L&F Pets - New Lost Report</title>
    <?php include "config.php"; ?>
</head>
<body>
    <?php include "header.php";?>
    <div class="row">
        <div class="col-sm-6">
            <a href="index.php" class="btn" id="backBlock">&lt Back</a>
        </div>
        <div class="col-sm-6">
            <?php include "nav.php"; ?>
        </div>
    </div>
    <div class="container main-container text-center">
        <h2>Enter a New Report for:</h2>
        <div class="row">
            
            <div class="col-sm-2">
            </div>
        
            <div class="col-sm-4">
                <a href="lost_dog_report.php" class="btn btn-block" id="lost_dog">
                    Lost Dog
                </a>
            </div>
            <div class="col-sm-4">
                <a href="lost_cat.php" class="btn btn-block" id="lost_cat">
                    Lost Cat
                </a>
            </div>
            
            <div class="col-sm-2">
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <div class="btn btn-block" id="lost_other">
                    Other Lost Animal
                </div>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
    </div>
</body>
</html>