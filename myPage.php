<?php
	include"db_conn.php";
?>
<html lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="http://kkbruce.tw/Content/AssetsBS3/img/favicon.ico">
	<title>myPage.php</title>
		<link href="dist\css\bootstrap.min.css" rel="stylesheet">
		<link href="dist\css\starter-template.css" rel="stylesheet"> 
		
		<script src="\dist\js\bootstrap.js"></script>
		<script src="\dist\js\bootstrap.min.js"></script>
		<script src="\dist\js\npm.js"></script>
	<script>
	function add()
	{
		document.getElementById("bookform").action = "book_add.php";
		document.getElementById("bookform").submit();
	}
	</script>
	</head>
		<body>
		<form id = "bookform" method = "post" action = "edit.php">
			<input type="hidden" id="ISBN" name="ISBN" value="<?php echo isset($_POST["ISBN"])?$_POST["ISBN"]:""?>">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container"><div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> 
					<span class="sr-only">Toggle navigation</span> 
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
				</button> 
				<a class="navbar-brand" href="Main.php">海大學生線上租借書籍系統</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li>
						<a href="book.php">瀏覽書單</a>
					</li>
					<li>
						<a href="book_edit.php">編輯書單</a>
					</li>
					<li>
						<a href="member.php">會員資訊</a>
					</li>
				</ul>
				<?php
						session_start();
						if(isset($_SESSION['username']))
						{
							echo '<ul class="nav navbar-nav navbar-right">
							 <li><a href="myPage.php">你好 ! '.$_SESSION["username"].'</a></li>
							 <li><a href="logOut.php"><span class="glyphicon glyphicon-log-in"></span>登出</a></li></form>
							</ul>';
						}
						else
						{
							 echo '<ul class="nav navbar-nav navbar-right">;
							 <li><a href="signUp.php"><span class="glyphicon glyphicon-user"></span>註冊</a></li>
							 <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>登入</a></li>;
							</ul>';
						}
					?>
			</div>
			</div>
			</nav>
			<div class="container" style = "padding-top:20px;">
			<div class="col-md-offset-8">
			</div>
				
				
				<div style = "float:left;width:50%"><center><font color = "darkblue" size = '6' face='微軟正黑體'><strong>LOAN TO</font></center></div>
				<div style = "float:left;width:50%"><center><font color = "darkblue" size = '6' face='微軟正黑體'><strong>BORROW FROM</font></center></div>
				<br><br>
				<table class= 'table table-hover' style="width:50%;float:left;" >
				<?php
					include "db_conn.php";
					$query = ("SELECT * FROM borrower");
					$query2 = ("SELECT * FROM books");
					$stmt2 = $db->query($query2);
					$result2=mysqli_fetch_object($stmt2);
					if($stmt = $db->query($query)){
						$count = 1;
						
						echo "<thead>";
						echo "<tr>";
						echo "<th>#</th>";
						echo "<th>借閱者姓名</th>";
						echo "<th>借閱者電話</th>";
						echo "<th>書名</th>";
						echo "<th>ISBN</th>";
						echo "<th></th>";
						echo "</tr></thead><tbody>";
							while($result=mysqli_fetch_object($stmt))
							{
								if(!strcmp($result->Loaner, $_SESSION['username'])) {
									echo "<tr>";
									echo "<th>".$count."</th>";
									echo "<td>".$result->Borrower."</td>";
									echo "<td>".$result->Cellphone."</td>";
									echo "<td>".$result->BookName."</td>";
									echo "<td>".$result->ISBN."</td>";
									echo "</tr>";
									$count++;
								}
							}
							echo "</tbody></table>";
					}
				
				?>
				
				
			
				<table class= 'table table-hover'style="width:50%;float:left;border-left:20px;">
				<?php
					include "db_conn.php";
					$query = ("SELECT * FROM loaner");
					$query2 = ("SELECT * FROM books");
					$stmt2 = $db->query($query2);
					$result2=mysqli_fetch_object($stmt2);
					if($stmt = $db->query($query)){
						$count = 1;
						
						echo "<thead>";
						echo "<tr>";
						echo "<th>#</th>";
						echo "<th>借閱者姓名</th>";
						echo "<th>借閱者電話</th>";
						echo "<th>書名</th>";
						echo "<th>ISBN</th>";
						echo "<th></th>";
						echo "</tr></thead><tbody>";
							while($result=mysqli_fetch_object($stmt))
							{
								if(!strcmp($result->Borrower, $_SESSION['username'])) {
									echo "<tr>";
									echo "<th>".$count."</th>";
									echo "<td>".$result->Loaner."</td>";
									echo "<td>".$result->Cellphone."</td>";
									echo "<td>".$result->BookName."</td>";
									echo "<td>".$result->ISBN."</td>";
									echo "</tr>";
									$count++;
								}
							}
							echo "</tbody></table>";
					}
				
				?>
				</div>
					
		</div>
	</body>
</html>