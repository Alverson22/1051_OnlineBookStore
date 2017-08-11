<?php
	include "db_conn.php";
	
	$ISBN_BEFORE = isset($_GET['id']) ? $_GET['id'] : "";
	$ISBN = $_POST["ISBN"];
	$Author = $_POST["Author"];
	$Type = $_POST["Type"];
	$BookName = $_POST["BookName"];
	
	$sql = "UPDATE books SET ISBN = '$ISBN',Author = '$Author',Type = '$Type',BookName = '$BookName' WHERE ISBN = '$ISBN_BEFORE'";
	mysqli_query($db,$sql);
	//echo "修改成功 請稍後";
	header("Refresh: 0; url=book_edit.php");
?>