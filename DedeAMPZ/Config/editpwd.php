<?php
error_reporting(E_ALL || ~E_NOTICE);
$action = $argv[1];
if($action=="DedeAMPZTestPwd")
{
	$conn  = mysql_connect('localhost','root',trim($argv[2])) Or die("密码错误！".'用户名：root 密码：'.trim($argv[2]));
	mysql_close($conn);
	die("密码正确！");
}
else
{
  $conn  = mysql_connect('localhost','root',trim($argv[1])) Or die("无法连接数据库，可能原始密码错误！" & mysql_error());
  $rs = mysql_query("Update mysql.user set `Password`=password('".trim($argv[2])."') where `User`='root' ",$conn);
  if(!$rs)
  {
  	die("修改密码失败！[".$argv[1].'] ==> ['.$argv[2].']'.mysql_error());
  	exit();
  }
  mysql_query(" flush privileges ",$conn);
  die("成功修改密码为：{$argv[2]}，下次修改密码时请务必记住你的新密码！");
}
?>