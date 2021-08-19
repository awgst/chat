<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('chat.sqlite');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }
   // Create Users table
   $sql =<<<EOF
      CREATE TABLE users
      (user_id INTEGER PRIMARY KEY  NOT NULL,
      username           TEXT    NOT NULL UNIQUE,
      password        CHAR(50));
EOF;
   $res = $db->exec($sql);
   if(!$res){
   		echo $db->lastErrorMsg();
   }
   else{
   	// Create Messages table with foregin key
	   $sql =<<<EOF
	      CREATE TABLE messages
	      (message_id INTEGER PRIMARY KEY   NOT NULL,
	      message           TEXT    NOT NULL UNIQUE,
	      timestamp TEXT,
	      user_id INTEGER,
	      FOREIGN KEY(user_id) REFERENCES users(user_id));
	EOF;
	   $res = $db->exec($sql);
	   if(!$res){
	   	echo $db->lastErrorMsg();
	   }
	   else{
	   	echo "Created table successfully!";
	   }
   }

?>