<?php
	include_once 'cookies_checking.php';
	if(isset($_SESSION['login'])){
		header('location:home.php');
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container" >
		<div class="header" style="justify-content: center;"><h1>Login</h1></div>
		<?php
				if (isset($_GET[md5('message')])) {
					$msg = $_GET[md5('message')];
					if ($msg === md5('gagal')) {
						echo "<p style='text-align: center;margin: 20px;padding: 10px 0;background-color: red'>Wrong Username or Password</p>";
					}
					else{
						echo "<p style='text-align: center;margin: 20px;padding: 10px 0;background-color: red'>Username is not registered</p>";	
					}
				}
		?>
		<form class="form-login" style="max-width: 446px;" method="POST" action="login.php">
			
			<input type="text" name="username" placeholder="Username" autofocus autocomplete="Off">
			<input type="password" name="password" placeholder="Password">
			<button type="submit"><i class="fa fa-sign-in"></i></button>
			<div class="remember">
				<input type="checkbox" name="remember">
				<p>Remember Me</p>
			</div>
		</form>
		<div class="daftar-button">
			<p style="margin-bottom: 10px;">Don't have an acount?<a href="register_view.php" style="background-color: transparent; padding-left: 5px;"> Register</a></p>
		</div>
	</div>
	
</body>
</html>