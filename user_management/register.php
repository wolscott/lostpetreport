<?php
/* this file performs 2 tasks:
    first, information is passed to it via POST it is inserting a new row in the user table of an inactive user
    second, when information is passed to it via GET, it is checking if that user exists in the table and activating it if it does
*/

session_start();

include_once '../config/db.php';

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['regcode']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $regcode = $_POST['regcode'];
    $password = $_POST['password'];
    
    $connection = connect();
    
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


        if($qry->num_rows == 1){
            /* then the regcode is valid. insert the inactive user and then delete the regcode */
            $qry->close();
            
            $stmt = "INSERT INTO user (UserName, Email, CreationDate, PasswordHash, RegistrationCode, ActiveStatus)
                     VALUES (?, ?, NOW(), ?, ?, ?)";
    
            if(!($stmt = $connection->prepare($stmt))){
                echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
            }
            
            $stmt->bind_param('ssssi', $username, $email, password_hash($password, PASSWORD_DEFAULT), $regcode, 0);
            
            try {
                $stmt->execute();
                include_once 'send_email.php';
            }
            catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }

        }
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

/* username, email, and regcode passed via "get" in email link
 */


if(isset($_GET['username']) && isset($_GET['email']) && isset($_GET['regcode'])){
	$username = $_GET['username'];
    $email = $_GET['email'];
    $regcode = $_GET['regcode'];

    $connection = connect();
    
	if($valid){
		$newUser = true;
		
		$qry = "SELECT * FROM user WHERE username='$username'";
		
		$result = $connection->query($qry);
		
		if($result->num_rows == 1){
			$row = $result->fetch_assoc();
			if(password_verify($password, $row['PasswordHash'])){
				$_SESSION['username'] = $username;
				header("Location: index.php");	
			} else {
				$_SESSION['message'] = "incorrect password! Please try again.";

			}
		}
    }

    mysqli_close($connection);
}

?>

