<?php
session_start();
if (isset($_POST['submit']))
	{
	// connect to the server
	INCLUDE ("DBConn.php");
	connDB();

	//Set variables from form data
	$checkInDate = $_POST['checkin'];
	$checkOutDate = $_POST['checkout'];
	$roomType = $_POST['roomtype'];


	$statement = "SELECT room_type_id, total_room FROM room_type WHERE room_type_name = '$roomType';";
	if ($result = mysqli_query($mysqli,$statement))
	{
	while ($row = mysqli_fetch_object($result))
	{
		$roomTypeId = $row->room_type_id;
		$noOfRoom = $row->total_room;
	}
}

// find out how many rooms are not available
$statement = "SELECT COUNT(*) AS roomReserved From reservation WHERE room_type_id = '$roomTypeId' AND (begin_date <='$checkInDate' AND end_date > '$checkInDate' OR begin_date <'$checkOutDate' AND end_date >='$checkOutDate' OR begin_date >'$checkInDate' AND end_date < '$checkOutDate') ";
if ($result = mysqli_query($mysqli, $statement)){
	while ($row = mysqli_fetch_object($result)){
		$roomTaken = $row->roomReserved;
	}
}
$available = $noOfRoom - $roomTaken;
echo "</p>";
if ($available > 0){
	$_SESSION['availability'] = "A $roomType room is available. Reserve your room now";
} else {
	$_SESSION['availability'] = "Sorry, not available. Select a different date or a different room type";
}
header("Location: reservation.php");

mysqli_close($mysqli);
}
?>