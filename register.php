<?php
	require 'connection.php';
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$db = new MyDB() or die($db->lastErrorMsg());

	$sql =<<<EOF
		INSERT INTO users ('user_id', 'username', 'password') VALUES(NULL, '$username', '$password');
	EOF;
	$res = $db->exec($sql);
	$msg = md5('message');
	if($res){
		header('location:register_view.php?'.$msg.'='.md5('Berhasil'));
	}
	else{
		header('location:register_view.php?'.$msg.'='.$db->lastErrorMsg());
	}
?>