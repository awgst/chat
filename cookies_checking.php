<?php
	require 'connection.php';
	session_start();
	if(isset($_COOKIE['value']) && isset($_COOKIE['key'])){
		$id = $_COOKIE['value'];
		$key = $_COOKIE['key'];
		$db = new MyDB() or die($db->lastErrorMsg());
		$query = "SELECT * FROM users WHERE user_id = '$id'";
		$res = $db->querySingle($query,true);
		if(md5($res['username'])===$key){
			$_SESSION['login'] = true;
			$_SESSION['username'] = $res['username'];
		}
	}
?>