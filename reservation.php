<?php
$page_title = "Reservation";
include ("header.inc");
?>



<!-- Page unique content -->
<div id = "main">
<?php
	session_start();
	if (isset($_SESSION['availability'])){
		echo $_SESSION['availability'];
	}
?>
	<form action = "" method = "post">
		<p>
			<label for = "checkInDate">Pick Check In Date:</label>
			<input type = "text" id = "checkInDate" name = "checkInDate" size = "10">
		</p>
		<p>
			<label for = "checkOutDate">Pick Check Out Date:</label>
			<input type = "text" id= "checkOutDate" name = "checkOutDate" size = "10">
		</p>
		<p>
			<label for = "roomType">Pick Room Type:</label>
			<select name = "roomType">
				<option value = "Single">Single</option>
				<option value = "Double">Double</option>
				<option value = "Family">Family</option>
			</select>
		</p>
		<p>
			<input type = "submit" name = "submit" value = "Make Reservation">
		</p>
	</form>
	<?php
		if (isset($_POST['submit'])){
			// connect to the server
			INCLUDE ("DBConn.php");
			connDB();

			//Set variables from form data
			$checkInDate = $_POST['checkInDate'];
			$checkOutDate = $_POST['checkOutDate'];
			$roomType = $_POST['roomType'];
			$confirmNumber = uniqid();

			// need room type id
			$idstatement = "SELECT room_type_id,total_room FROM room_type WHERE room_type_name = '$roomType'";
			if ($result = mysqli_query($mysqli, $idstatement)){
			while ($row = mysqli_fetch_object($result)){
				$roomTypeId = $row->room_type_id;
				$noOfRoom = $row->total_room;
				}
			}
			// find out how many rooms are not available
			$statement = "SELECT COUNT(*) AS roomReserved FROM reservation WHERE room_type_id = '$roomTypeId' AND (begin_date <='$checkInDate' AND end_date > '$checkInDate' OR begin_date <'$checkOutDate' AND end_date >='$checkOutDate' OR begin_date >'$checkInDate' AND end_date <'$checkOutDate') ";
			if ($result = mysqli_query($mysqli, $statement)){
				
				while ($row = mysqli_fetch_object($result)){
					$roomTaken = $row->roomReserved;
				}
			}
			$available = $noOfRoom - $roomTaken;
			// insert reservation
			if ($available > 0){
				$insertStatement = "INSERT INTO reservation (room_type_id, begin_date, end_date, confirm_number) VALUES ('$roomTypeId','$checkInDate','$checkOutDate','$confirmNumber')";
				if (mysqli_query($mysqli, $insertStatement)){
					echo "<p>Reservation success! Your confirmation is $confirmNumber</p>";
				} else {
					echo "<p>Sorry, not available. Select a different date or a different room type</p>";
					// echo 
				}
				mysqli_close($mysqli);
			}
	}
	

?>
	</div>
<?php
	include ("footer.inc");
?>