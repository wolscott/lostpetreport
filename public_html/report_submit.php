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
                <a href="enter_report.php" class="btn" id="backBlock">&lt Back</a>
            </div>
            <div class="col-sm-6">
                <?php include "nav.php"; ?>
            </div>
        </div>
        <div class="container main-container">
            
                <div class="row">
                </div>

<?php    include "../sql/insert_dog.php";
/*
    echo "<h3> PHP List All Session Variables</h3>";
    foreach ($_POST as $key=>$val){
        echo $key." ".$val."<br/>";
    }
*/
?>
                
        </div>
    </body>
</html>