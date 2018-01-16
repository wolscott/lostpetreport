<?php
session_start();

include_once '../config/db.php';

if(isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])){
	$connection = connect();
	$username = $_POST['username'];
	$password = $_POST['password'];

	$valid = true;

	if(strcmp($username, "") == 0 || strcmp($password, "") == 0) {
		$_SESSION['message'] = "Bad username or password. Please try again.";

		$valid = false;
	}

	if($valid){
		$newUser = true;
		
		$qry = $connection->prepare("SELECT UserName, PasswordHash FROM user WHERE UserName=? AND ActiveStatus=?");
		
        $active = 1;
        $qry->bind_param('si', $username, $active);
        
        try {
            $qry->execute();
        
            $qry->store_result();
            
            $qry->bind_result($username, $passwordHash);

            if($qry->num_rows == 1){
                $qry->fetch();
    
                if(password_verify($password, $passwordHash)){
                    $_SESSION['username'] = $username;
                    $qry->close();
                    
                    $qry = $connection->prepare("SELECT AccessLevel FROM user WHERE UserName=?");
                    $qry->bind_param('s', $username);
                    
                    try {
                        $qry->execute();
                        $qry->store_result();
                        $qry->bind_result($accessLevel);
                        
                        if($qry->num_rows == 1){
                            $_SESSION['admin'] = $username;
                            
                            if($accessLevel == 1){
                                $_SESSION['superAdmin'] = $username;
                            }
                        }
                    }
                    catch(Exception $e){
                        echo "Permissions Check failed";
                        echo "Error: " . $e->getMessage();
                    }
                    
                    header("Location: index.php");	
                } else {
                    $_SESSION['message'] = "Login information is incorrect. Please try again.";
                }
            }
        }
        catch(Exception $e){
            echo "Account Check Failed";
            echo "Error: " . $e->getMessage();
        }
        $qry->close();
    }

    mysqli_close($connection);
}

?>

