<?php 

	$db = mysqli_connect("localhost", "root", "", "newstoday");

	if($db){
	    // echo "Database connection established!";
	}else{
	    echo "Database connection error!";
	}

?>