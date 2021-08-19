<?php
	require 'connection.php';
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$db = new MyDB() or die($db->lastErrorMsg());
	$sql ="SELECT * FROM users WHERE username = '$username'";
	$res = $db->querySingle($sql,true);
	if (isset($res['username'])) {
		if ($res['password']===md5($password)) {
			$_SESSION['login'] = true;
			$_SESSION['username'] = $res['username'];
			if(isset($_POST['remember'])){
				setcookie('value', $res['user_id'], time() + 86400);
				setcookie('key', md5($res['username']), time() + 86400);
			}
			header('location:home.php');
		}
		else{
			header('location:index.php?'.md5('message').'='.md5('gagal'));	
		}
	}
	else{
		header('location:index.php?'.md5('message').'='.$db->lastErrorMsg());
	}
?>