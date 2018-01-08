<?php

function connect(){
	$username = 'username';
	$password = 'password';
	
	$connection = new mysqli('localhost', "$username", "$password", 'lost_and_found_pets');
	if ($connection->connect_error) {
    		die('Connect Error (' . $connection->connect_errno . ') '
        	    . $connection->connect_error);
	}
	return $connection;
}
?>
