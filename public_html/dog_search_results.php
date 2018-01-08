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
        <title>Lost Dog Search Results</title>
        <?php include "config.php" ?>
        <link rel="stylesheet" href="lost_report_style.css">

    </head>
    <body>
        <?php include "header.php";?>
        <div class="row">
            <div class="col-sm-6">
                <a href="lost_dog_search.php" class="btn" id="backBlock">&lt Back</a>
            </div>
            <div class="col-sm-6">
                <?php include "nav.php"; ?>
            </div>
        </div>
        <div class="container main-container">
            <h2 class="text-center">Matching Lost Dog Reports:</h2>
            <form action="dog_search_results.php" method="post" role="form">
                <div class="row">
                </div>
                <?php include "../sql/dog_query.php"; ?>
                
            </form>
        </div>
    </body>
</html>