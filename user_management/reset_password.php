<?php

session_start();

include_once '../config/db.php';

if(isset($_POST['username']) && !isset($_GET['rt'])){

    $username = $_POST['username'];
    
    /* generate reset token */
    $chars = "0123456789ABCDEFGHJKLMNPQRSTUVWXYZ";
    $token = "";

    for ($j = 0; $j < 6; $j++) {
        $token .= $chars[mt_rand(0, strlen($chars)-1)];
    }
    
    $connection = connect();

    $stmt = "INSERT INTO resetToken(Username, Token, RequestDateTime) VALUES(?, ?, NOW())";
    if(!($stmt = $connection->prepare($stmt))){
        echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
    }

    $stmt->bind_param('ss', $username, $token);

    try {
        $stmt->execute();
        $_POST['token'] = $token;
        
        $qry = "SELECT Email FROM user WHERE UserName=?";
        if(!($qry = $connection->prepare($qry))){
            echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
        }
        
        $qry->bind_param('s', $username);
        try {
            $qry->execute();
            $qry->bind_result($email);
            if($qry->fetch()){
                $_POST['email'] = $email;
                include_once 'send_email.php';
            }
            
        }
        catch(Exception $e){
            echo "Error: " . $e->getMessage() . "<br>";
        }
    
        
    }
    catch(Exception $e){
        echo "Error: " . $e->getMessage() . "<br>";
    }
    
    mysqli_close($connection);
}

if(isset($_GET['rt']) && isset($_GET['username'])){
    $token = $_GET['rt'];
    $username = $_GET['username'];
    
    $connection = connect();
    
    $stmt = "SELECT UserName FROM resetToken WHERE UserName=? AND Token=?";
    
    if(!($stmt = $connection->prepare($stmt))){
        echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
    }
    
    $stmt->bind_param('ss', $username, $token);
}


?>

