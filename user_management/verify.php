<?php

include_once '../config/db.php';

if(isset($_GET['username']) && isset($_GET['email']) && isset($_GET['regcode'])){
    
	$username = $_GET['username'];
    $email = $_GET['email'];
    $regcode = $_GET['regcode'];

    $connection = connect();
    
    $qry = $connection->prepare("SELECT UserName FROM user WHERE UserName=? AND Email=? AND RegistrationCode=?");

    $qry->bind_param('sss', $username, $email, $regcode);

    try {
        $qry->execute();

        $qry->store_result();

        $qry->bind_result($username, $passwordHash);

        if($qry->num_rows == 1){
            $qry->close();

            $stmt = "UPDATE user SET ActiveStatus = 1
                     WHERE UserName=? AND Email=? AND RegistrationCode=?";

            if(!($stmt = $connection->prepare($stmt))){
                echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
            }

            $hashword = password_hash($password, PASSWORD_DEFAULT);
            $activeStatus = 0;

            $stmt->bind_param('sss', $username, $email, $regcode);

            try {
                $stmt->execute();
                $_SESSION['messageHeader'] = "<h2>Your Account has been Activated</h2>";
                $_SESSION['messageBody'] = "You will now be able to log in.";
            }
            catch(Exception $e){
                echo "Error: " . $e->getMessage();
            }

            $stmt->close();
        }
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    $qry->close();
    
    mysqli_close($connection);
}


?>