<?php 
error_reporting(0);
session_start () ;                   //初始session
global $login;
if (isset ($_SESSION['shili']))
{
header ("Location:shili.php") ;    //重新定向到其他页面
exit ;
}                       //登录过的话立即结束
$user_name=$_POST['id'] ;    //获取参数
$password=$_POST['password'] ;
$type=$_POST['kind'];
$sql="";
if($type=="admin"){
	$sql="select password from admin where name='$user_name'";
}else{
	$sql="select password from user where userid='$user_name'";
}
//验证管理员名称和密码是否正确,连接数据库
 $conntion=mysql_connect("localhost","root","")or die ("不能连接数据库:"); 
  mysql_query("set names gbk");
   $result=mysql_db_query("STM",$sql,$conntion) or die("查询失败！错误是：".mysql_error());
  $count=mysql_num_rows($result);
   if($count=="0"){
  echo "没有记录";
 }else{
	 $row=mysql_fetch_array($result);
 }
if ($password==$row['password'] and $type=="admin")
{
header ("Location:admin.php") ;    //登录成功重定向到管理页面
}else if($password==$row['password'] and $type=="student")
{
	$_SESSION['sid']=$user_name;
	// echo "<script language=javascript>alert({$_SESSION['sid']});</script>";
	 echo "<script language=javascript>alert('登陆成功!');</script>";
	header("Location: student.php");
}else
{
echo "<table width='100%' align=center><tr><td align=center>" ;
echo "账号或密码错误,或者不是管理员账号<br>" ;
echo "<font color=red>登录失败!</font><br><a href='login.html'>请重新输入</a>";
echo "</td></tr></table>" ;
}
mysql_close($connection);
?>