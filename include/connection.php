<?php

	$host= "localhost";
	$user= "root";
	$password= "";
	$db_name= "helpdesksystem";


	$connection= new mysqli ($host, $user, $password, $db_name);

	if($connection->errno) {
		die($connection->error);
	}

?>