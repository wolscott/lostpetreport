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
		
		$qry = $connection->prepare("SELECT UserName, PasswordHash FROM user WHERE UserName=?");
		
        $qry->bind_param('s', $username);
        
        try {
            $qry->execute();
        
            $qry->store_result();
            
            $qry->bind_result($username, $passwordHash);

            if($query->num_rows == 1){
                $qry->fetch();
    
                if(password_verify($password, $passwordHash)){
                    $_SESSION['username'] = $username;
                    header("Location: index.php");	
                } else {
                    $_SESSION['message'] = "Login information is incorrect. Please try again.";
                }
            }
        }
        catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
        $qry->close();
    }

    mysqli_close($connection);
}

?>

