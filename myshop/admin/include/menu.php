<?php session_start();  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧导航menu</title>
<link href="css/css.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/sdmenu.js"></script>
<script type="text/javascript">
	// <![CDATA[
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};
	// ]]>
</script>
<style type=text/css>
html{ SCROLLBAR-FACE-COLOR: #538ec6; SCROLLBAR-HIGHLIGHT-COLOR: #dce5f0; SCROLLBAR-SHADOW-COLOR: #2c6daa; SCROLLBAR-3DLIGHT-COLOR: #dce5f0; SCROLLBAR-ARROW-COLOR: #2c6daa;  SCROLLBAR-TRACK-COLOR: #dce5f0;  SCROLLBAR-DARKSHADOW-COLOR: #dce5f0; overflow-x:hidden;}
body{overflow-x:hidden; background:url(images/main/leftbg.jpg) left top repeat-y #f2f0f5; width:194px;}
</style>
</head>
<body onselectstart="return false;" ondragstart="return false;" oncontextmenu="return false;">
<div id="left-top">
	<div><img src="images/main/member.gif" width="44" height="44" /></div>
    <span>用户：<?php echo $_SESSION['user']['name']; ?><br>角色：超级管理员</span>
</div>
    <div style="float: left" id="my_menu" class="sdmenu">
      <div class="collapsed">
        <span>用户管理</span>
        <a href="../users/index.php" target="main" onFocus="this.blur()">浏览用户</a>
        <a href="../users/add.php" target="main" onFocus="this.blur()">添加用户</a>
        <a href="../users/index1.php" target="main" onFocus="this.blur()">分页浏览用户</a>
        <a href="../users/index2.php" target="main" onFocus="this.blur()">搜索用户信息</a>
        <a href="../users/index3.php" target="main" onFocus="this.blur()">分页搜索&浏览用户信息</a>
      </div>
      <div>
        <span>类别管理</span>
        <a href="../type/index.php" target="main" onFocus="this.blur()">浏览类别</a>
        <a href="../type/index2.php" target="main" onFocus="this.blur()">下拉框浏览</a>
        <a href="../type/add.php" target="main" onFocus="this.blur()">添加类别</a>
        <a href="" target="" onFocus="this.blur()">自定义权限</a>
      </div>
      <div>
        <span>商品管理</span>
        <a href="../goods/index.php" target="main" onFocus="this.blur()">浏览商品信息</a>
        <a href="../goods/add.php" target="main" onFocus="this.blur()">添加商品信息</a>
     
      
      </div>
      <div>
        <span>商品订单</span>
		<a href="../orders/index.php" target="main" onFocus="this.blur()">浏览全部订单</a>
		<a href="../orders/index1.php" target="main" onFocus="this.blur()">浏览新订单</a>
        <a href="../orders/pastorders.php" target="main" onFocus="this.blur()">浏览历史订单</a>
      </div>
    </div>
</body>
</html>