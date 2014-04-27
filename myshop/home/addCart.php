<?php
session_start();
		$id=$_GET[id];
	//准备配置文件：
		require('../public/dbconfig.php');
		
	//连接数据库，并判断是否成功：
		$link=@mysql_connect(HOST,USER,PASS) or die("数据库连接失败!原因是:".mysql_error());

	//设置字符集编码，选择数据库：
		mysql_set_charset('utf8');
		mysql_select_db(DBNAME,$link);

	//准备sql语句，并执行：
		$sql="select * from goods where id={$id}";
		$result=mysql_query($sql,$link);



	if($result && mysql_num_rows($result)>0 ){
		  $row=mysql_fetch_assoc($result);
		  //在这里获取把购买信息放入session
			$row["num"]=1;//添加一个数量的字段
		  //放入购物车中（若已存在的商品实现数量累加）
			if(isset($_SESSION["shoplist"][$row['id']])){
			//若存在数量加加
				$_SESSION["shoplist"][$row['id']]["num"]++;
				header("Location:article.php?id={$id}");
				die();
				}else{
			//若不存在，作为新购买的商品添加到购物车中
				$_SESSION["shoplist"][$row['id']]=$row;
				echo "<script>alert('加入购物车成功！');window.history.back();</script>"; 
					}
						}else{
					echo "<script>alert('没有找到商品！');window.history.back();</script>"; 
				}
?>