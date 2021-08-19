<?php
	require 'connection.php';
	require 'rc4.php';
	session_start();
	$message = $_POST['message'];
	$encrypted_message = rc4($message);
	$username = $_SESSION['username'];
	$db = new MyDB() or die($db->lastErrorMsg());
	$sql ="SELECT * FROM users WHERE username = '$username'";
	$res = $db->querySingle($sql,true);
	$user_id = $res['user_id'];
	$query =<<<EOF
		INSERT INTO messages (message_id, message, timestamp, user_id) VALUES (NULL, '$encrypted_message', CURRENT_TIMESTAMP, '$user_id');
	EOF;
	$ret = $db->exec($query);
	if ($ret) {
		echo "Success";
	}
	else{
		echo $db->lastErrorMsg();
	}
?>