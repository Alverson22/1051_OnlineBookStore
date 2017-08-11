<?php
	include "db_conn.php";
	session_start();
	
	$Loaner = isset($_GET['id']) ? $_GET['id'] : "";
	$LoanerCellphone = isset($_GET['id2']) ? $_GET['id2'] : "";
	$BookName = isset($_GET['id3']) ? $_GET['id3'] : "";
	$ISBN = isset($_GET['id4']) ? $_GET['id4'] : "";
	
	$sql = "INSERT INTO loaner VALUE('$Loaner', '$LoanerCellphone', '$BookName', '$ISBN', '', '$_SESSION[username]')";
	mysqli_query($db,$sql);
	$query = "SELECT Cellphone, Name FROM members where $_SESSION[StudentID] = StudentID";
	if($stmt = $db->query($query)){
		$result = mysqli_fetch_object($stmt);
		$BorrowerName = $result->Name;
		$BorrowerCellphone = $result->Cellphone;
		$sql2 = "INSERT INTO borrower VALUE('$_SESSION[username]', '$BorrowerCellphone', '$BookName', '$ISBN', '', '$Loaner')";
		mysqli_query($db,$sql2);
	}
	$sql3 ="DELETE FROM books WHERE ISBN = '$ISBN'";
	mysqli_query($db,$sql3);
	echo "租借成功 正在進行轉跳...";
	header("Refresh: 2; url=book.php");
?>