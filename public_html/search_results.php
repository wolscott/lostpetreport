<?php 
session_start();

if(!isset($_SESSION['username'])){
		header('Location: login_page.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>L&F Pets - Search Results</title>
    <?php include "config.php"; ?>
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
    <div class="container main-container text-left">
        <div class="row">
                <div class="col-sm-1">
                    <a href="lost_dog.php" class="btn btn-block">Back</a><br/>
                </div>
                <div class="col-sm-8">
                </div>
                <div class="col-sm-3">
                </div>
            </div>
        <h2>Search Results:</h2>
        <div class="row">
            
            <div class="col-sm-2">
                Breed
            </div>
        
            <div class="col-sm-4">
                Color
            </div>
            <div class="col-sm-4">
                Location
            </div>
            
            <div class="col-sm-2">
                Age
            </div>
        </div>
    </div>
</body>
</html>