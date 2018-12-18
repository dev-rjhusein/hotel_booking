<?php
$page_title = "Testimonials";
include ("header.inc");
?>
<div id = "main">
<!-- Page unique content -->
<form action = "" method = "post" enctype="multipart/form-data">
<p>Your name:
<br>
<input type = "text" name = "name" size = "30" maxlength = "30">
</p>
<p>Your comments:
<br>
<textarea name = "comment" rows = "7" cols = "35">
</textarea>
</p>
<label for = "myPhoto">Upload file:</label>
<input type = "file" id ="myPhoto" name = "myPhoto">
<br>
<input type = "submit" name = "submit" value = "Submit">
<input type = "submit" name = "view" value = "View">
<br>
</form>
<?php
if (isset($_POST['submit']))
{
// handle the uploaded file
$destination = "";
move_uploaded_file($_FILES['myPhoto']['tmp_name'],
$destination.$_FILES['myPhoto']['name']);
// save to the file
$myFile = "testimonials.txt";
// write
if(is_writable($myFile)){
file_put_contents($myFile, $_POST['name'].PHP_EOL, FILE_APPEND);
file_put_contents($myFile, $_FILES['myPhoto']['name'].PHP_EOL, FILE_APPEND);
file_put_contents($myFile, $_POST['comment'].PHP_EOL, FILE_APPEND);
file_put_contents($myFile, date('m/d/Y').PHP_EOL,FILE_APPEND);
echo "<p>Thank you!</p>";
} else {
	echo "<p>Something is wrong.</p>";
}
}
// read
if (isset($_POST['view']))
{
	$allComments = file("testimonials.txt");
	for($i=0; $i <count($allComments); $i+=4){
	echo $allComments[$i];
	echo "<br>";
	$image = $allComments[$i+1];
	echo "<img src=\"$image\"width=\"100\"height=\"100\">";
	echo "<br>";
	echo $allComments[$i+2];
	echo "<br>";
	echo $allComments[$i+3];
	echo "<br>";
	}
}
?>
</div>
<?php
include ("footer.inc");
?>