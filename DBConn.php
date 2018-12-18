<?php
//Make the DB connection reusable
function connDB(){
	global $mysqli;
	// connect to the database
	$mysqli = mysqli_connect("localhost",'user','password',"hotelDB");

	// if failed
	if (mysqli_connect_errno()){
		printf("Connection failed: %s\n ",mysqli_connect_error());
		exit();
	}
}
?>
