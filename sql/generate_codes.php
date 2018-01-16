<?php

include_once '../config/db.php';
$connection = connect();

if(isset($_POST['generate'])){
    if(isset($_POST['numCodes'])){
        for ($i = 0; $i < $_POST['numCodes']; $i++){
            $chars = "0123456789ABCDEFGHJKLMNPQRSTUVWXYZ";
            $code = "";

            for ($i = 0; $i < 6; $i++) {
                $code .= $chars[mt_rand(0, strlen($chars)-1)];
            }

            $stmt = "INSERT INTO regcode(RegCode) VALUES(?)";
            if(!($stmt = $connection->prepare($stmt))){
                echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
            }
            
            $stmt->bind_param('s', $code);
            
            try {
                $stmt->execute();
                echo "$code<br>"
            }
            catch(Exception $e){
                echo "Error: " . $e->getMessage() . "<br>";
            }
        }
    }
}

mysqli_close($connection);

?>