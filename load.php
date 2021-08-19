<?php
	require 'connection.php';
	require 'rc4.php';
	session_start();
	$username = $_SESSION['username'];
	$db = new MyDB() or die($db->lastErrorMsg());
	$sql ="SELECT * FROM users WHERE username = '$username'";
	$res = $db->querySingle($sql,true);
	$user_id = $res['user_id'];

	$query = <<<EOF
		SELECT * FROM messages;
	EOF;
	$ret = $db->query($query);
	while($row = $ret->fetchArray(SQLITE3_ASSOC)){
		if ($user_id === $row['user_id']) {
			$time = strtotime($row['timestamp']);
			$timestamp = date("H:i",$time);
			echo '<div class="mine"><span></span><div class="chat"><div></p><p class="pesan">'.rc4($row['message']).'</p><p class="timestamp">'.$timestamp.'</p></div></div></div>';	
		}
		else{
			$id = $row['user_id'];
			$sql ="SELECT * FROM users WHERE user_id = '$id'";
			$res = $db->querySingle($sql,true);
			$time = strtotime($row['timestamp']);
			$timestamp = date("H:i",$time);
			echo '<div class="other"><span></span><div class="chat"><div><p id="name-contact">'.$res['username'].'</p><p class="pesan">'.rc4($row['message']).'</p><p class="timestamp">'.$timestamp.'</p></div></div></div>';
		}
	}

?>