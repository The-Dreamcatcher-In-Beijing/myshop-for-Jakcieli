<?php
//获取参数id
	$id=$_GET['id'];
	unset($_SESSION[DD]);
	$_SESSION[DD]=$id;
	$url="&id=$_SESSION[DD]";
//选择配置文件：			
	require('../public/dbconfig.php');
				
//连接数据库并判断是否连接成功：
	$link=mysql_connect(HOST,USER,PASS) or die("数据库连接失败！原因是：".mysql_erroe());

//选择字符集编码；准备数据库：
	mysql_set_charset('utf8');
	mysql_select_db(DBNAME,$link);

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	<meta charset="UTF-8">
	<title>旅行</title>
	<style>
		li{list-style:none;float:left;margin-left:40px;}
		span{font-size:20px;font-weight:bolder;line-height:10px;color:white;}
		a{text-decoration:none;color:black;font-size:12px;}
		a:hover{position:relative;top:1px;left:1px;}
		.list-outline{width:230px;height:380px;border:10px solid whitesmoke;z-index:2;float:left;}
		.photo{width:230px;height:230px;}
		.text{border:1px solid white;font-family:'微软雅黑';margin-top:0px;padding:10px;background-color:white;z-index:2;}
		.text .a{padding:5px;}
		.bottom-outline{;margin-top:0px;background-color:white;z-index:2;height:20px;width:230px;}
		.bottom-outline .price{float:left;margin-left:10px;margin-top:0px;color:black;}
		.bottom-outline .pid{float:right;margin-right:20px;margin-top:0px;color:black;}
		.fenye{width:100%;height:50px;font-size:20px;font-weight:bolder;text-align:center;float:left;z-index:2;}
		.fenye a{font-size:20px;font-weight:bolder;}	
		.bottom{float:left;text-align:center;margin-left:15%;font-size:18px;}
		.bottom a{font-size:15px;}
		
		
		
	
		.list-filter-category {
				margin-left:15%;
				padding: 20px 0 12px;
			}
					.list-filter-category-fixed {
				background-color: #FFFFFF;
				left: 0;
				position: fixed;
				top: 0;
				width: 100%;
				z-index: 1;
			}
		.list-filter-category .tag, .list-filter-category .tag:link, .list-filter-category .tag:visited {
			background-color: #FFFFFF;
			border: 1px solid #D3D3D3;
			border-radius: 12px 12px 12px 12px;
			color: #666666;
			float: left;
			height: 22px;
			line-height: 22px;
			margin: 0 5px 8px 0;
			padding: 0 10px;
			white-space: nowrap;
		}
		.list-filter-category .tag:hover {
			background-color: #E17A00;
			border-color: #E17A00;
			color: #FFFFFF;
		}
		.list-filter-category .tag:active {
			background-color: #EB6900;
		}
		.list-filter-category .curr:link, .list-filter-category .curr:visited, .list-filter-category .curr:hover {
			background-color: #E17A00;
			border-color: #E17A00;
			color: #FFFFFF;
		}

		
	</style>
	<link rel="stylesheet" href="2.css" type="text/css">
	
	</head>
	<body bgcolor='whitesmoke'>
		<div style="width:80%;height:40px;background-color:#B50100;border:10px solid #b50100;margin-left:10%;border-radius:12px 12px 12px 12px;">
			<ul>
				<li style='float:left;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>关于乐活</span></a></li>
				<li style='float:left;margin-left:20px;'><a href="index.php"><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>首页</span></a></li>
				<li style='float:left;margin-left:20px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>时尚数码</span></a></li>
				<li style='float:left;margin-left:20px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>乐活音乐</span></a></li>
				<li style='float:left;margin-left:20px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>居家</span></a></li>
				<li style='float:left;margin-left:20px;'><a href="lvlist.php"><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>旅行</span></a></li>
				<li style='float:left;margin-left:20px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>服饰</span></a></li>
				<li style='float:left;margin-left:20px;'><a href="list.php"><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>着迷</span></a></li>
				<li style='float:left;margin-left:20px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>联系我们</span></a></li><a name='top'>
				<li style='float:left;margin-left:20px;'><a href="selfcenter.php" target="_blank"><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>个人中心</span></a></li><a name='top'>
				<li style='float:left;margin-left:20px;'><a href="showCart.php"><span style='font-size:20px;font-weight:bolder;line-height:20px;color:white;'>购物车</span></a></li><a name='top'>
			</ul>
		</div>
		<div class="list-filter-category" style='width:980px;height:10px;'>
			<a class="tag curr" href="">旅行</a>
			<?php
				//查寻旅行的子类别
					$sql="select * from type where pid=6";
					$result=mysql_query($sql,$link);
					if(mysql_num_rows($result)>0){
						while($row=mysql_fetch_assoc($result)){
						echo "<a class='tag'  href='doselectlv.php?id={$row['id']}'>{$row['name']}</a>";
						
						}
					}	
					
			?>
			<a class="tag"  href="">相机</a>
			<a class="tag"  href="">其他</a>
		</div>
			
		
			<br>
			<?php
					
		//=======================数据分页处理=========================		
			$page=isset($_GET['p'])?$_GET['p']:1;		
			$pagesize=12;		
			$maxpage=0;
			$maxrows=0;
			
		//计算最大的页数：	
			$sql="select count(*) from goods  where state=2 and typeid={$_SESSION[DD]}";
			$result=mysql_query($sql,$link);
			$maxrows=@mysql_result($result,0,0);//获取数据条数
		//获取最大页数
			$maxpage=ceil($maxrows/$pagesize);
		//判断页是否越界
			if($page>$maxpage){
				$page=$maxpage;}
			if($page<1){
				$page=1;
			}
		
		//拼装分页sql语句（limit【当前页-1】*页大小，【页大小】）
			$limit=" limit ".($page-1)*$pagesize.",".$pagesize;
		
				//准备sql语句，并执行
				 $sql="select * from goods where state=2 and typeid={$_SESSION[DD]}".$limit;
				 $result=mysql_query($sql,$link);
			
			
			//解析结果集
			if($result){
			while($row = mysql_fetch_assoc($result)){
				$rest =mb_substr($row['descr'],0,30,utf8);  
					
				echo "<div class='content' style='background-color:whitesmoke;z-index:2;width:1000px;
					height:;margin-left:170px;'>";
					
					echo "<div  class='list-outline'>";
					echo	"<div class='photo'>";
					echo		"<a href='article.php?id={$row['id']}' target=_blank><img src='./include/image/m_{$row['picname']}'></a>";
					echo	"</div>";
					echo	"<div class='text'>";
					echo		"<a href='article.php?id={$row['id']}' target=_blank>{$rest}...</a>";
					echo	"</div>";
					echo	"<div class='bottom-outline'>";
					echo		"<span class='price'>";
					echo			"<i>￥</i>";
					echo				"<em>{$row['price']}</em>";
					echo		"</span>";
					echo		"<span class='pid'>";
					echo			"<em>{$row['id']}</em>";
					echo 		"</span>";
					echo	"</div>";
					echo "</div>";
				
				echo  "</div>";
			
				}}
				
				
	//====================输出分页信息===============================	
		echo "<div class='fenye'>";
		echo "当前页{$page}/{$maxpage}  共{$maxrows}个商品";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<a href='doselectlv.php?p=1'>首页|</a>";
		echo "<a href='doselectlv.php?p=".($page-1)."{$url}'>上一页|</a>";
		echo "<a href='doselectlv.php?p=".($page+1)."{$url}'>下一页|</a>";
		echo " <a href='doselectlv.php?p={$maxpage}'>末页</a> ";
		echo "</div>";
				
			?>
			
		<br><br><br><br>
		<div class="bottom" style=''>
			
			
			<hr width="950">
			
			<div class="fontcolor_blue" align="center">
			<a href="#">关于乐活 广告服务</a>
			<a href="#">合作伙伴</a>
			<a href="#">客户中心</a>
			<a href="#">诚征英才</a>
			<a href="#">联系我们</a>
			<a href="#">网站地图</a>
			<a href="#">热门品牌 版权说明</a>
			</div>
		
			
			<div align="center">
			全球乐活网 ：
			<a href="#">中国站</a>
			<a href="#">国际站 日文站 乐活站 支付宝 中国雅虎 口碑网  乐活推广联盟 </a>
			</div>
			
			<div align="center">Copyright 2010-2050, 版权所有 LOHAS.COM</div>
		
			<div class="fontcolor_blue" align="center">ICP证：京C2-20050291</div>
			
			<div align="center">广告经营许可证号：3301061000468</div>
			
		</div>
		






	
		
	</body>	
		
</html>		
		
		