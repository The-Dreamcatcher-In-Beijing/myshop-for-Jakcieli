<?php
//退出登录状态：
	session_start();
unset($_SESSION['adminuser']);//删除session中的某条账户信息
header("Location:index.php");

?>