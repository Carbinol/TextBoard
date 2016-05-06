<html>
	<head>
		<title>超简易留言板</title>
	</head>
<body>


<!-- 表单内容写入数据库 -->

<?php
@$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
if( isset($_POST['submit'])){
mysql_select_db("msgs", $con);
$sql="INSERT INTO msgv3 (msgID, messagetext, ip, msgdate)
VALUES
(null,'$_POST[message]','{$_SERVER["REMOTE_ADDR"]}',now())";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
}
mysql_close($con);
?>

<center><img src="success.png"></center>
<?php
echo "<meta http-equiv=\"refresh\" content=\"3; url=input.php\">"; 
?>
</body>
</html>
