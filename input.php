<html>
	<head>
		<title>超简易留言板</title>
	</head>
<body>


<center><h1>超简易留言板</h1></center>


<!-- 输出已有内容 -->
<?php
@$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("msgs", $con);

$result = mysql_query("SELECT * FROM msgv3 order by msgID asc");
echo "<table border='1' width='100%'>";
while($row = mysql_fetch_array($result))
  {
  echo "<tr height='100'>";
  echo "<td>floor:" . $row['msgID'] . "</td>";
  echo "<td width='15%'>" . $row['msgdate'] . "</td>";
  echo "<td>IP:" . $row['ip'] . "</td>";
  echo "<td width='60%'>" . $row['messagetext'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
echo "<br>"; 
mysql_close($con);
?>
<?php
if(isset($_COOKIE["username"]))    //若有cookie则可以编辑留言
{
?>
<center>
<table border="0">
<form action="input.php" method="post">

<caption><h1>添加留言</h1></caption>
	<tr>
		<td><textarea name="message" rows="15" cols="150"></textarea></td>
	</tr>

	<tr>
		<td colspan="2" align="center">
			<input type="submit" name="submit" value="提交">
			<input type="reset" name="reset" value="重置">
		</td>
	</tr>
</form>
</table>
</center>
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
}    //开头的if结尾
?>
<center>
<table border="0">
<form action="input.php" method="post">
	<tr>
		<td colspan="2" align="center">
			<input type="submit" name="sub" value="管理员界面">
		</td>
	</tr>
</form>
</table>
</center>
<?php
if( isset($_POST['sub'])){	
header("Location:login.php");
exit();
}
?>

</body>
</html>
