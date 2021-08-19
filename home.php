<?php
	include_once 'cookies_checking.php';
	if(!isset($_SESSION['login'])){
		header('location:index.php');
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Discussion Group</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script> -->
</head>
<body>
	<div class="container">
		<div class="header">
			<h3>Hallo, <?= $_SESSION['username']; ?></h3>
			<a href="logout.php">Logout</a>
		</div>
		<div class="message-box" id="message-box">			
		</div>
		<form action="send.php" method="POST" onsubmit="sendMessage(); return false;">
			<input type="text" name="message" placeholder="Type Message" id="message" autocomplete="off" autofocus>
			<button type="submit" id="btn-send"><i class="fa fa-send"></i></button>
		</form>
	</div>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>