<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// 创建数据库
if (mysql_query("CREATE DATABASE msgs",$con))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }
mysql_select_db("msgs", $con);
// 留言存储表
$sql = "CREATE TABLE msgv3
(
msgID int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(msgID),
messagetext text,
ip varchar(30),
msgdate datetime
)";
// cookie存储表
$sql1 = "CREATE TABLE cookiezi2 
(
cookieID int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(cookieID),
number int,
coodate datetime
)";
mysql_query($sql1,$con);
$sql2 = "CREATE TABLE cookiezi2 
(
cookieID int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(cookieID),
number int,
coodate datetime
)";
mysql_query($sql2,$con);
mysql_close($con);
?>
