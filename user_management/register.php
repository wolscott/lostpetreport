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
            header('Location: ../public_html/registration_page.php');
        }
        else{
    
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
                    echo "<h2>Invalid Registration Code</h2>";
                    echo "This code has been user or has expired. Contact your administrator.";

                }
            }
            catch(Exception $e){
                echo "Error: " . $e->getMessage();
            }
        }
    }
    catch(Exception $e){
        echo "Error: " . $e->getMessage();
    }
    
    mysqli_close($connection);
}

?>

