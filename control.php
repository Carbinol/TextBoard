<?php    //管理员页面
ob_start();
session_start();
if(empty($_SESSION['username'])){
 header("Location: login.php?errno=3");
 exit();
}
?>
<html>
	<head>
		<title>超简易管理员界面</title>
	</head>
<body>

<center><h1>留言板内容</h1></center>
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
  echo "<td>楼层:" . $row['msgID'] . "</td>";
  echo "<td width='15%'>" . $row['msgdate'] . "</td>";
  echo "<td>IP:" . $row['ip'] . "</td>";
  echo "<td width='60%'>" . $row['messagetext'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>

<!-- 表单内容 -->


<table border="0">
<form action="control.php" method="post">
	<tr>
		<td>请输入想要删除的楼层 <input type="text" name="setID"></td>
		<td colspan="2" align="center">
			<input type="submit" name="submit" value="提交">
			<input type="reset" name="reset" value="重置">
		</td>
	</tr>
</form>
</table>

<?php
@$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("msgs", $con);

@mysql_query("DELETE FROM msgv3 WHERE msgID='$_POST[setID]'");

mysql_close($con);
?>

<h1>已存在的cookie</h1>
<?php
@$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("msgs", $con);

$result = mysql_query("SELECT * FROM cookiezi2 order by cookieID asc");
echo "<table border='1'>";
while($row = mysql_fetch_array($result))
{

  echo "<tr>";
  echo "<td>cookie序号:" . $row['cookieID'] . "</td>";
  echo "<td>cookie编号:" . $row['number'] . "</td>";
  echo "<td>cookie建立日期" . $row['coodate'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>
<table border="0">
<form action="control.php" method="post">
	<tr>
		<td>请输入想要删除的cookie的编号 <input type="text" name="cooID"></td>
		<td colspan="2" align="center">
			<input type="submit" name="submit" value="提交">
			<input type="reset" name="reset" value="重置">
		</td>
	</tr>
</form>
</table>
<?php
@$con2 = mysql_connect("localhost","root","");
if (!$con2)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("msgs", $con2);
if( isset($_POST['submit'])){
@mysql_query("DELETE FROM cookiezi2 WHERE number='$_POST[cooID]'");
@setcookie("username",$_POST[cooID],time()-1);}
mysql_close($con2);
ob_end_flush();
?>
</body>
</html>
