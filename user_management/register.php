<?php

session_start();

include_once '../config/db.php';

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['regcode']) && isset($_POST['password'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $regcode = $_POST['regcode'];
    $password = $_POST['password'];
    
    /* check if password is too short */
    if(strlen($password) < 8){
        header("Location: /registration_page.php");
        $_SESSION['messageHeader'] = "<h2>Invalid Password</h2>";
        $_SESSION['messageBody'] = "Passwords must be at least 8 character. Please choose a longer one.";
        $_SESSION['regcode'] = $regcode;
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username;
        /* exit script */
        exit();
    }
    
    /* check if username is too short */
    if(strlen($username) < 1){
        header("Location: /registration_page.php");
        $_SESSION['messageHeader'] = "<h2>Invalid Username</h2>";
        $_SESSION['messageBody'] = "You must enter a username.";
        $_SESSION['regcode'] = $regcode;
        $_SESSION['email'] = $email;
        /* exit script */
        exit();
    }
    
    $connection = connect();
    /* first check if username is available */
    $qry = "SELECT UserName FROM user WHERE UserName=?";
    if(!($qry = $connection->prepare($qry))){
        echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
    }
    $qry->bind_param('s', $username);
    
    try {
        $qry->execute();

        $qry->store_result();

        if($qry->num_rows == 1){
            /* username already exists */
            $qry->close();
            header("Location: /registration_page.php");
            $_SESSION['messageHeader'] = "<h2>Invalid Username</h2>";
            $_SESSION['messageBody'] = "This username already exists. Please choose a different one.";
            $_SESSION['regcode'] = $regcode;
            /* exit script */
            exit();
        }
    }
    catch(Exception $e){
        echo "Error: " . $e->getMessage();
    }
    /* first check if the regcode is valid 
     */
    $qry = "SELECT RegCode FROM regcode WHERE RegCode=?";
    if(!($qry = $connection->prepare($qry))){
        echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
    }
    $qry->bind_param('s', $regcode);
    
    try {
        $qry->execute();

        $qry->store_result();

        if($qry->num_rows >= 1){
            /* then the regcode is valid. insert the inactive user and then delete the regcode */
            $qry->close();
            
            $stmt = "INSERT INTO user (UserName, Email, CreationDate, PasswordHash, RegistrationCode, ActiveStatus)
                     VALUES (?, ?, NOW(), ?, ?, ?)";
    
            if(!($stmt = $connection->prepare($stmt))){
                echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
            }
            
            $hashword = password_hash($password, PASSWORD_DEFAULT);
            $activeStatus = 0;
            
            $stmt->bind_param('ssssi', $username, $email, $hashword, $regcode, $activeStatus);
            
            try {
                $stmt->execute();
                include_once 'send_email.php';
                /* the email has been sent, delete the regcode */
                $delete = "DELETE FROM regcode WHERE RegCode=?";
                
                if(!($delete = $connection->prepare($delete))){
                    echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
                }
                $delete->bind_param('s', $regcode);
                try {
                    $delete->execute();
                }
                catch(Exception $e){
                    echo "Error: " . $e->getMessage();
                }
                
                $delete->close();
            }
            catch(Exception $e){
                echo "Error: " . $e->getMessage();
            }
            
            $stmt->close();

        }
        else {
            /* registration code is not valid */
            header("Location: /registration_page.php");
            $_SESSION['messageHeader'] = "<h2>Invalid Registration Code</h2>";
            $_SESSION['messageBody'] = "This code has been used or has expired. Contact your administrator.";
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
            exit();
        }
    }
    catch(Exception $e){
        echo "Error: " . $e->getMessage();
    }
    
    mysqli_close($connection);
}

?>

