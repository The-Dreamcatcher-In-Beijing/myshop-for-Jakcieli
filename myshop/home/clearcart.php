<?php
//删除购物车中的信息
session_start();
//判断是删除还是清空购物车
if($_GET['id']){
  //从指定信息中删除
  unset($_SESSION['shoplist'][$_GET['id']]);
}else{
unset($_SESSION['shoplist']);
}
header("Location:showCart.php");
?>	