<?php
//接收登录信息，保存session
if(!empty($_POST['sub'])){
 if($_POST['username']=="admin" && $_POST['pwd']=="admin"){    //偷懒了
  echo "登录成功";
  session_start();//开启session
  $_SESSION['username'] = $_POST['username'];//将登录名保存到session中
  header("Location:control.php");
  exit();
 }else{
  header("Location: login.php?errno=1");
  exit();
 }
}else{
 header("Location: login.php?errno=2");
 exit();
}
?>
