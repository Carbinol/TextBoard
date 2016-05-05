<?php
@$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("msgs", $con);
mysql_query("delete from cookiezi2 where coodate<date_sub(now(),interval 3600 SECOND)");
$sql = 'select count(*) as num from cookiezi2';
$num = mysql_fetch_assoc(mysql_query($sql));
if(!isset($_COOKIE["username"]) && $num['num'] <= 20)
{
$cookienum=rand(10000000,99999999);
setcookie("username",$cookienum,time()+3600,'/');
$ins="INSERT INTO cookiezi2 (cookieID, number, coodate)
VALUES
(null,$cookienum,now())";
if (!mysql_query($ins,$con))
  {
  die('Error: ' . mysql_error());
  }
}
mysql_close($con);
header("Location:input.php");
exit();
?>
