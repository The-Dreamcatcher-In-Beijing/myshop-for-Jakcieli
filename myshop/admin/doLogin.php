<?php

//ִ���û���¼������
session_start();
//��ȡ��½��Ϣ
$username=$_POST['username'];//�˺�
$userpass=$_POST['userpass'];//����	
$usercode=$_POST['usercode'];//
$code=$_SESSION['code'];

//��֤�Ƿ��̨��Ч�˻�
if($username!="admin"){
	header("Location:login.php?eno=1");
	exit();
}
//�ж���֤��
if($usercode!=$code){  
	header("Location:login.php?eno=2");
	exit();
	}


//ִ���û���Ϣ�����ݿ���Ϣ��½��֤����
//1�������ݿ������ļ�
require('../public/dbconfig.php');

//2�������ݿⲢ�ж�����
$link=@mysql_connect(HOST,USER,PASS) or die("���ݿ�����ʧ�ܣ�ԭ���ǣ�".mysql_error());
//�����ַ�����ѡ�����ݿ�
mysql_select_db(DBNAME,$link);
mysql_set_charset('utf8');

//3׼��sql��䲢ִ��
$sql="select * from users where username='{$username}' and pass='".md5($userpass)."'";
$result=mysql_query($sql,$link);

//4����
if($result && mysql_num_rows($result)>0){
	//��¼�ɹ�
	$user=mysql_fetch_assoc($result);//��¼��Ϣ
	$_SESSION['user']=$user;//����¼��Ϣ���뵽session��
	header("Location:index.php");
	}else{
	//��¼ʧ��
	header("Location:login.php?eno=3");
	exit();
	}
//5�ͷţ��ر�

mysql_free_result($result);
mysql_close($link);


?>