<?php
error_reporting(E_ALL || ~E_NOTICE);
$action = $argv[1];
if($action=="DedeAMPZTestPwd")
{
	$conn  = mysql_connect('localhost','root',trim($argv[2])) Or die("�������".'�û�����root ���룺'.trim($argv[2]));
	mysql_close($conn);
	die("������ȷ��");
}
else
{
  $conn  = mysql_connect('localhost','root',trim($argv[1])) Or die("�޷��������ݿ⣬����ԭʼ�������" & mysql_error());
  $rs = mysql_query("Update mysql.user set `Password`=password('".trim($argv[2])."') where `User`='root' ",$conn);
  if(!$rs)
  {
  	die("�޸�����ʧ�ܣ�[".$argv[1].'] ==> ['.$argv[2].']'.mysql_error());
  	exit();
  }
  mysql_query(" flush privileges ",$conn);
  die("�ɹ��޸�����Ϊ��{$argv[2]}���´��޸�����ʱ����ؼ�ס��������룡");
}
?>