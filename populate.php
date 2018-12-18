<?php

	INCLUDE ("DBConn.php");
	connDB();

	$statement = "
		INSERT INTO room_type (room_type_name) VALUES ('Single');
		INSERT INTO room_type (room_type_name) VALUES ('Double');
		INSERT INTO room_type (room_type_name) VALUES ('Family');
	";

	if (mysqli_multi_query($mysqli, $statement)){
		echo "<p>Rows inserted successfully.</p>";
	}else{
		echo "<p>Something is wrong.</p>";
	}
		
	// mysqli_close($mysqli);

?>
