<?php
	include_once 'cookies_checking.php';
	if(isset($_SESSION['login'])){
		header('location:home.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container" >
		<div class="header" style="justify-content: center;"><h1>Register</h1></div>
		<form class="form-register" style="flex-direction: column;" method="POST" action="register.php">
			<?php
				if(isset($_GET[md5('message')])){
					$msg = $_GET[md5('message')];
					if($msg === md5('Berhasil')){
						echo "<p>Register Success!</p>";
					}
					else{
						if($msg == "UNIQUE constraint failed: users.username"){
							echo "<p style='background-color: red'>Username have already taken.</p>";	
						}
						else{
							echo "<p style='background-color: red'>Register Failed, please try again.</p>";	
						}
					}
				}
			?>			
			<input type="text" name="username" placeholder="Username" autofocus autocomplete="Off">
			<input type="password" name="password" placeholder="Password">
			<input type="submit" name="submit" value="Register" class="register-btn">
		</form>
		<div class="login-button">
			<p style="margin-bottom: 10px;">Already have an acount?<a href="index.php" style="background-color: transparent; padding-left: 5px;"> Login</a></p>
		</div>
	</div>
</body>
</html>