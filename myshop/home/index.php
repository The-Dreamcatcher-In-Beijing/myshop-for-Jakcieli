<?php  session_start();  ?> 
<?php
//选择配置文件：
	require('../public/dbconfig.php');

//连接数据库并判断是否连接成功：
	$link=mysql_connect(HOST,USER,PASS) or die("数据库连接失败！原因是：".mysql_error());

//选择字符集编码；准备数据库：
	mysql_set_charset('utf8');
	mysql_select_db(DBNAME,$link);
//查找点击次数最高的商品信息
	$sql="select * from goods order by clicknum desc limit 1 ";
		$result=mysql_query($sql,$link);
	$row=mysql_fetch_assoc($result);
	$sql2="select * from goods order by addtime desc limit 6";
		$result2=mysql_query($sql2,$link);
		while($row2=mysql_fetch_assoc($result2)){
			$a[]=$row2;
	}
	
//查找最热卖商品：
	$sql3="select  * from goods where typeid in ( select id from type where pid=6 ) order by num desc limit 1";
	$result=mysql_query($sql3,$link);
	$row3=mysql_fetch_assoc($result);


	
?>

<html lang="en">
<head>
<meta charset="UTF-8">
<title>商城首页</title>
	<style>
			body{z-index:0;background-color:gray;}

	a:hover{position:relative;top:2px;left:2px;}
	
	.title{width:60%;height:60px;margin-left:20%;
		z-index:4;background-color:white;border-radius:12px 12px 12px 12px;}
	.title a {line-height:60px;color:black;}
	
	.login{width:100px height:200px;float:left;z-index:4;}
	
			.eight{width:84%;height:480px;border:10px solid white;margin-left:8%;margin-top:20px;z-index:1;background:white;}
				.eight-a{ width:230px;height:220px;border:10px solid white;margin-right:12px;float:left;} 
					.eight-a a{
								border: 1px solid #D3D3D3;
								border-radius: 12px 12px 12px 12px;
								display: inline-block;
								height: 22px;
								line-height: 22px;
								margin: 5px 5px 5px 2px;
								padding: 0 10px;
							}
							.eight-a a:hover{
								background-color: #F08200;
								border-color: #E17A00;
								color: #FFFFFF;
							}
							.eight-a a:active{
								border-color: #C56B00;
								color: #FFFFFF;
							}
							.eight-a .special{
								color: #F08200;
							}
							eight-a .ico-triangle{
								border-color: transparent transparent transparent #333333;
								border-style: dashed dashed dashed solid;
								border-width: 4px 0 4px 4px;
								cursor: pointer;
								display: inline-block;
								height: 0;
								line-height: 0;
								margin-left: 3px;
								overflow: hidden;
								vertical-align: middle;
							}
							.eight-a a:hover .ico-triangle, eight-a a:active .ico-triangle{
								border-color: transparent transparent transparent #FFFFFF;
							}
							.category-tag-txt{
								display: inline-block;
								vertical-align: middle;
							}
			.eight-b{ width:230px;height:220px;border:10px solid white;opacity:;margin-right:18px;float:left;background:url('./include/image/<?php echo "m_{$a[0]['picname']}";  ?>') no-repeat;z-index:0;background-color:white;} 
				.eight-b-a{width:230px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
				.eight-b-a-a{width:50px;height:40;float:left;position:relative;top:25px;left:15px;font-weight:bord;z-index:2;}
				.eight-b-a-b{width:150px;height:10px;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:20px;font-size:13px;z-index;2;padding:5px;}
				
			.eight-c{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./include/image/<?php echo "m_{$a[1]['picname']}";  ?>') no-repeat;} 
				.eight-c-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:150px;background-color:white;z-index:2;opacity:0.5;}
				.eight-c-a-a{width:120px;height:40;float:left;position:relative;top:50px;left:15px;font-weight:bord;z-index:2;}
				.eight-c-a-b{width:120px;height:10px;border-left:1px solid gray;float:right;opacity:1;position:relative;top:30px;font-size:13px;z-index;2;padding:5px;}
			.eight-d{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./include/image/<?php echo "m_{$a[2]['picname']}";  ?>') no-repeat;} 
				.eight-d-a{width:230px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
				.eight-d-a-a{width:80px;height:50;float:left;position:relative;top:30px;left:15px;font-weight:bord;z-index:2;}
				.eight-d-a-b{width:120px;height:10px;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:25px;font-size:13px;z-index;2;padding:5px;}
            
			.nine-a{ width:230px;height:220px;border:10px solid white;opacity:;margin-right:12px;float:left;background:url('./include/image/<?php echo "m_{$a[3]['picname']}";  ?>') no-repeat;z-index:0;} 
				.nine-a-a{width:230px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
				.nine-a-a-a{width:80px;height:40;float:left;position:relative;top:30px;left:15px;font-weight:bord;z-index:2;}
				.nine-a-a-b{width:130px;height:10px;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:25px;font-size:13px;z-index;2;padding:5px;}
				
			.nine-b{ width:230px;height:220px;border:10px solid white;opacity:;margin-right:18px;float:left;background:url('./include/image/<?php echo "m_{$a[4]['picname']}";  ?>') no-repeat;z-index:0;} 
				.nine-b-a{width:230px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
				.nine-b-a-a{width:50px;height:40;float:left;position:relative;top:25px;left:15px;font-weight:bord;z-index:2;}
				.nine-b-a-b{width:150px;height:10px;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:20px;font-size:13px;z-index;2;padding:5px;}
				
			.nine-c{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./include/image/<?php echo "m_{$a[5]['picname']}";  ?>') no-repeat;} 
				.nine-c-a{width:230px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
				.nine-c-a-a{width:80px;height:40;float:left;position:relative;top:30px;left:15px;font-weight:bord;z-index:2;}
				.nine-c-a-b{width:120px;height:10px;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:25px;font-size:13px;z-index;2;padding:5px;}
			.nine-d{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./include/image/<?php echo "m_{$row['picname']}";  ?>') no-repeat;} 
				.nine-d-a{width:230px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
				.nine-d-a-a{width:100px;height:50;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
				.nine-d-a-b{width:100px;height:30px;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}
		.ten{width:84%;height:480px;border:10px solid white;margin-left:8%;margin-top:20px;z-index:1;background:white;}
		.ten-a{ width:230px;height:220px;border:10px solid white;margin-right:12px;float:left;} 
			.ten-a a{
						border: 1px solid #D3D3D3;
						border-radius: 12px 12px 12px 12px;
						display: inline-block;
						height: 22px;
						line-height: 22px;
						margin: 5px 5px 5px 2px;
						padding: 0 10px;
					}
					.ten-a a:hover{
						background-color: #F08200;
						border-color: #E17A00;
						color: #FFFFFF;
					}
					.ten-a a:active{
						border-color: #C56B00;
						color: #FFFFFF;
					}
					.ten-a .special{
						color: #F08200;
					}
					ten-a .ico-triangle{
						border-color: transparent transparent transparent #333333;
						border-style: dashed dashed dashed solid;
						border-width: 4px 0 4px 4px;
						cursor: pointer;
						display: inline-block;
						height: 0;
						line-height: 0;
						margin-left: 3px;
						overflow: hidden;
						vertical-align: middle;
					}
					.ten-a a:hover .ico-triangle, ten-a a:active .ico-triangle{
						border-color: transparent transparent transparent #FFFFFF;
					}
					.category-tag-txt{
						display: inline-block;
						vertical-align: middle;
					}



	.ten-b{ width:230px;height:220px;border:10px solid white;opacity:;margin-right:18px;float:left;background:url('./image/shuma1.jpg') no-repeat;z-index:0;} 
		.ten-b-a{width:228px;height:60px;valign:bottom;border:1px solid white;position:relative;top:160px;background-color:white;z-index:2;opacity:0.5;}
		.ten-b-a-a{width:50px;height:40;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.ten-b-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}
		
	.ten-c{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image/shuma2.jpg') no-repeat;} 
		.ten-c-a{width:228px;height:60px;valign:bottom;border:1px solid white;position:relative;top:160px;background-color:white;z-index:2;opacity:0.5;}
		.ten-c-a-a{width:80px;height:40;float:left;position:relative;top:30px;left:15px;font-weight:bord;z-index:2;}
		.ten-c-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;font-size:13px;z-index;2;padding:5px;}
	.ten-d{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image/shuma3.jpg') no-repeat;} 
		.ten-d-a{width:228px;height:60px;valign:bottom;border:1px solid white;position:relative;top:160px;background-color:white;z-index:2;opacity:0.5;}
		.ten-d-a-a{width:50px;height:40px;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.ten-d-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}


	.eleven-a{ width:230px;height:220px;border:10px solid white;opacity:;margin-right:12px;float:left;background:url('./image/shuma4.jpg') no-repeat;z-index:0;} 
		.eleven-a-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.eleven-a-a-a{width:50px;height:40;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.eleven-a-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}

	.eleven-b{ width:230px;height:220px;border:10px solid white;opacity:;margin-right:18px;float:left;background:url('./image/shuma5.jpg') no-repeat;z-index:0;} 
		.eleven-b-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.eleven-b-a-a{width:50px;height:40;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.eleven-b-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}
		
	.eleven-c{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image/shuma6.jpg') no-repeat;} 
		.eleven-c-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.eleven-c-a-a{width:80px;height:40;float:left;position:relative;top:30px;left:15px;font-weight:bord;z-index:2;}
		.eleven-c-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;font-size:13px;z-index;2;padding:5px;}
	.eleven-d{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image/shuma7d.jpg') no-repeat;} 
	.eleven-d{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image/shuma7.jpg') no-repeat;} 
		.eleven-d-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.eleven-d-a-a{width:50px;height:50;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.eleven-d-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}
	
	
		
		
		.twelve{width:84%;height:480px;border:10px solid white;margin-left:8%;margin-top:20px;z-index:1;background:white;}
		.twelve-a{ width:230px;height:220px;border:10px solid white;margin-right:12px;float:left;} 
			.twelve-a a{
						border: 1px solid #D3D3D3;
						border-radius: 12px 12px 12px 12px;
						display: inline-block;
						height: 22px;
						line-height: 22px;
						margin: 5px 5px 5px 2px;
						padding: 0 10px;
					}
					.twelve-a a:hover{
						background-color: #F08200;
						border-color: #E17A00;
						color: #FFFFFF;
					}
					.twelve-a a:active{
						border-color: #C56B00;
						color: #FFFFFF;
					}
					.twelve-a .special{
						color: #F08200;
					}
					twelve-a .ico-triangle{
						border-color: transparent transparent transparent #333333;
						border-style: dashed dashed dashed solid;
						border-width: 4px 0 4px 4px;
						cursor: pointer;
						display: inline-block;
						height: 0;
						line-height: 0;
						margin-left: 3px;
						overflow: hidden;
						vertical-align: middle;
					}
					.twelve-a a:hover .ico-triangle, twelve-a a:active .ico-triangle{
						border-color: transparent transparent transparent #FFFFFF;
					}
					.category-tag-txt{
						display: inline-block;
						vertical-align: middle;
					}



	.twelve-b{ width:230px;height:220px;border:10px solid white;opacity:;margin-right:18px;float:left;background:url('./image/liuxing.jpg') no-repeat;z-index:0;} 
		.twelve-b-a{width:228px;height:60px;valign:bottom;border:1px solid white;position:relative;top:160px;background-color:white;z-index:2;opacity:0.5;}
		.twelve-b-a-a{width:50px;height:40;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.twelve-b-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}
		
	.twelve-c{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image/gudian.jpg') no-repeat;} 
		.twelve-c-a{width:228px;height:60px;valign:bottom;border:1px solid white;position:relative;top:160px;background-color:white;z-index:2;opacity:0.5;}
		.twelve-c-a-a{width:80px;height:40;float:left;position:relative;top:30px;left:15px;font-weight:bord;z-index:2;}
		.twelve-c-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;font-size:13px;z-index;2;padding:5px;}
	.twelve-d{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image/langman.jpg') no-repeat;} 
		.twelve-d-a{width:228px;height:60px;valign:bottom;border:1px solid white;position:relative;top:160px;background-color:white;z-index:2;opacity:0.5;}
		.twelve-d-a-a{width:50px;height:40px;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.twelve-d-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}


	.thirteen-a{ width:230px;height:220px;border:10px solid white;opacity:;margin-right:12px;float:left;background:url('./image/balei.jpg') no-repeat;z-index:0;} 
		.thirteen-a-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.thirteen-a-a-a{width:50px;height:40;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.thirteen-a-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}
		



	.thirteen-b{ width:230px;height:220px;border:10px solid white;opacity:;margin-right:18px;float:left;background:url('./image/jindai.jpg') no-repeat;z-index:0;} 
		.thirteen-b-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.thirteen-b-a-a{width:50px;height:40;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.thirteen-b-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}
		
	.thirteen-c{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image/shinei.jpg') no-repeat;} 
		.thirteen-c-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.thirteen-c-a-a{width:120px;height:40;float:left;position:relative;top:30px;left:15px;font-weight:bord;z-index:2;}
		.thirteen-c-a-b{width:100px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;font-size:13px;z-index;2;padding:5px;}
	.thirteen-d{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image/xiandai.jpg') no-repeat;} 
		.thirteen-d-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.thirteen-d-a-a{width:100px;height:50;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.thirteen-d-a-b{width:100px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}
	
	
	.fourteen{width:84%;height:480px;border:10px solid white;margin-left:8%;margin-top:20px;z-index:1;background:white;}
		.fourteen-a{ width:230px;height:220px;border:10px solid white;margin-right:12px;float:left;} 
			.fourteen-a a{
						border: 1px solid #D3D3D3;
						border-radius: 12px 12px 12px 12px;
						display: inline-block;
						height: 22px;
						line-height: 22px;
						margin: 5px 5px 5px 2px;
						padding: 0 10px;
					}
					.fourteen-a a:hover{
						background-color: #F08200;
						border-color: #E17A00;
						color: #FFFFFF;
					}
					.fourteen-a a:active{
						border-color: #C56B00;
						color: #FFFFFF;
					}
					.fourteen-a .special{
						color: #F08200;
					}
					fourteen-a .ico-triangle{
						border-color: transparent transparent transparent #333333;
						border-style: dashed dashed dashed solid;
						border-width: 4px 0 4px 4px;
						cursor: pointer;
						display: inline-block;
						height: 0;
						line-height: 0;
						margin-left: 3px;
						overflow: hidden;
						vertical-align: middle;
					}
					.fourteen-a a:hover .ico-triangle, fourteen-a a:active .ico-triangle{
						border-color: transparent transparent transparent #FFFFFF;
					}
					.category-tag-txt{
						display: inline-block;
						vertical-align: middle;
					}



	.fourteen-b{ width:230px;height:220px;border:10px solid white;opacity:;margin-right:18px;float:left;background:url('./image1/huayuan.jpg') no-repeat;z-index:0	;background-color:white;} 
		.fourteen-b-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.fourteen-b-a-a{width:50px;height:40;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.fourteen-b-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}
		
	.fourteen-c{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image1/zahuo.jpg');} 
		.fourteen-c-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:160px;background-color:white;z-index:2;opacity:0.5;}
		.fourteen-c-a-a{width:80px;height:40;float:left;position:relative;top:30px;left:15px;font-weight:bord;z-index:2;}
		.fourteen-c-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;font-size:13px;z-index;2;padding:5px;}
	.fourteen-d{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image1/chuangyi.jpg');} 
		.fourteen-d-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:160px;background-color:white;z-index:2;opacity:0.5;}
		.fourteen-d-a-a{width:80px;height:50;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.fourteen-d-a-b{width:120px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}


	.fifteen-a{ width:230px;height:220px;border:10px solid white;opacity:;margin-right:12px;float:left;background:url('./image1/shouna.jpg') no-repeat;z-index:0;} 
		.fifteen-a-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.fifteen-a-a-a{width:50px;height:40;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.fifteen-a-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}
		



	.fifteen-b{ width:230px;height:220px;border:10px solid white;opacity:;margin-right:18px;float:left;background:url('./image1/chufang.jpg') no-repeat;z-index:0;} 
		.fifteen-b-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.fifteen-b-a-a{width:50px;height:40;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.fifteen-b-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}
		
	.fifteen-c{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image1/dengju.jpg');} 
		.fifteen-c-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:160px;background-color:white;z-index:2;opacity:0.5;}
		.fifteen-c-a-a{width:80px;height:40;float:left;position:relative;top:30px;left:15px;font-weight:bord;z-index:2;}
		.fifteen-c-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;font-size:13px;z-index;2;padding:5px;}
	.fifteen-d{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image1/jiashi.jpg');} 
		.fifteen-d-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:160px;background-color:white;z-index:2;opacity:0.5;}
		.fifteen-d-a-a{width:80px;height:50;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.fifteen-d-a-b{width:120px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}


	.sixteen{width:84%;height:480px;border:10px solid white;margin-left:8%;margin-top:20px;z-index:1;background:white;}
			.sixteen-a{ width:230px;height:220px;border:10px solid white;margin-right:12px;float:left;} 
			.sixteen-a a{
						border: 1px solid #D3D3D3;
						border-radius: 12px 12px 12px 12px;
						display: inline-block;
						height: 22px;
						line-height: 22px;
						margin: 5px 5px 5px 2px;
						padding: 0 10px;
					}
					.sixteen-a a:hover{
						background-color: #F08200;
						border-color: #E17A00;
						color: #FFFFFF;
					}
					.sixteen-a a:active{
						border-color: #C56B00;
						color: #FFFFFF;
					}
					.sixteen-a .special{
						color: #F08200;
					}
					sixteen-a .ico-triangle{
						border-color: transparent transparent transparent #333333;
						border-style: dashed dashed dashed solid;
						border-width: 4px 0 4px 4px;
						cursor: pointer;
						display: inline-block;
						height: 0;
						line-height: 0;
						margin-left: 3px;
						overflow: hidden;
						vertical-align: middle;
					}
					.sixteen-a a:hover .ico-triangle, sixteen-a a:active .ico-triangle{
						border-color: transparent transparent transparent #FFFFFF;
					}
					.category-tag-txt{
						display: inline-block;
						vertical-align: middle;
					}



	.sixteen-b{ width:230px;height:220px;border:10px solid white;opacity:;margin-right:18px;float:left;background:url('./image1/shangzhuang.jpg') no-repeat;z-index:0	;background-color:white;} 
		.sixteen-b-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.sixteen-b-a-a{width:50px;height:40;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.sixteen-b-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}
		
	.sixteen-c{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image1/shoubiao.jpg');} 
		.sixteen-c-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:160px;background-color:white;z-index:2;opacity:0.5;}
		.sixteen-c-a-a{width:80px;height:40;float:left;position:relative;top:30px;left:15px;font-weight:bord;z-index:2;}
		.sixteen-c-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;font-size:13px;z-index;2;padding:5px;}
	.sixteen-d{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image1/waitao.jpg');} 
		.sixteen-d-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.sixteen-d-a-a{width:80px;height:50;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.sixteen-d-a-b{width:120px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}


	.seventeen-a{ width:230px;height:220px;border:10px solid white;opacity:;margin-right:12px;float:left;background:url('./image1/tiaowen.jpg') no-repeat;z-index:0;} 
		.seventeen-a-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.seventeen-a-a-a{width:50px;height:40;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.seventeen-a-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}
		



	.seventeen-b{ width:230px;height:220px;border:10px solid white;opacity:;margin-right:18px;float:left;background:url('./image1/qunzi.jpg') no-repeat;z-index:0;} 
		.seventeen-b-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.seventeen-b-a-a{width:50px;height:40;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.seventeen-b-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}
		
	.seventeen-c{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image1/xiazhuang.jpg') no-repeat;} 
		.seventeen-c-a{width:220px;height:60px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.seventeen-c-a-a{width:80px;height:50;float:left;position:relative;top:25px;left:15px;font-weight:bord;z-index:2;}
		.seventeen-c-a-b{width:150px;height:20px;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:0px;font-size:13px;z-index;2;padding:5px;}
	.seventeen-d{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image1/shoushi.jpg');} 
		.seventeen-d-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:160px;background-color:white;z-index:2;opacity:0.5;}
		.seventeen-d-a-a{width:80px;height:50;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.seventeen-d-a-b{width:120px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}

	.eighteen{width:84%;height:480px;border:10px solid white;margin-left:8%;margin-top:20px;z-index:1;background:white;}
		.eighteen-a{ width:230px;height:220px;border:10px solid white;margin-right:12px;float:left;} 
			.eighteen-a a{
						border: 1px solid #D3D3D3;
						border-radius: 12px 12px 12px 12px;
						display: inline-block;
						height: 22px;
						line-height: 22px;
						margin: 5px 5px 5px 2px;
						padding: 0 10px;
					}
					.eighteen-a a:hover{
						background-color: #F08200;
						border-color: #E17A00;
						color: #FFFFFF;
					}
					.eighteen-a a:active{
						border-color: #C56B00;
						color: #FFFFFF;
					}
					.eighteen-a .special{
						color: #F08200;
					}
					eighteen-a .ico-triangle{
						border-color: transparent transparent transparent #333333;
						border-style: dashed dashed dashed solid;
						border-width: 4px 0 4px 4px;
						cursor: pointer;
						display: inline-block;
						height: 0;
						line-height: 0;
						margin-left: 3px;
						overflow: hidden;
						vertical-align: middle;
					}
					.eighteen-a a:hover .ico-triangle, eighteen-a a:active .ico-triangle{
						border-color: transparent transparent transparent #FFFFFF;
					}
					.category-tag-txt{
						display: inline-block;
						vertical-align: middle;
					}



	.eighteen-b{ width:230px;height:220px;border:10px solid white;opacity:;margin-right:18px;float:left;background:url('./include/image/<?php echo "m_{$row3['picname']}";  ?>') no-repeat;z-index:0;} 
		.eighteen-b-a{width:228px;height:60px;valign:bottom;border:1px solid white;position:relative;top:160px;background-color:white;z-index:2;opacity:0.5;}
		.eighteen-b-a-a{width:100px;height:40px;float:left;position:relative;top:40px;left:15px;font-weight:bord;z-index:2;}
		.eighteen-b-a-b{width:130px;height:10px;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:0px;font-size:13px;z-index;2;padding:5px;}
		
	.eighteen-c{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image1/dianying.jpg');} 
		.eighteen-c-a{width:228px;height:60px;valign:bottom;border:1px solid white;position:relative;top:160px;background-color:white;z-index:2;opacity:0.5;}
		.eighteen-c-a-a{width:80px;height:40;float:left;position:relative;top:30px;left:15px;font-weight:bord;z-index:2;}
		.eighteen-c-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;font-size:13px;z-index;2;padding:5px;}
	.eighteen-d{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image1/huaijiu.jpg');} 
		.eighteen-d-a{width:228px;height:60px;valign:bottom;border:1px solid white;position:relative;top:160px;background-color:white;z-index:2;opacity:0.5;}
		.eighteen-d-a-a{width:50px;height:40px;float:left;position:relative;top:30px;left:15px;font-weight:bord;z-index:2;}
		.eighteen-d-a-b{width:150px;height:30px;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:15px;font-size:13px;z-index;2;padding:5px;}


	.nineteen-a{ width:230px;height:220px;border:10px solid white;opacity:;margin-right:12px;float:left;background:url('./image/shu.jpg') no-repeat;z-index:0;} 
		.nineteen-a-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.nineteen-a-a-a{width:50px;height:40;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.nineteen-a-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}
		



	.nineteen-b{ width:230px;height:220px;border:10px solid white;opacity:;margin-right:18px;float:left;background:url('./image1/wano.jpg') no-repeat;z-index:0;} 
		.nineteen-b-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.nineteen-b-a-a{width:50px;height:40;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.nineteen-b-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}
		
	.nineteen-c{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image/wenju.jpg') no-repeat;} 
		.nineteen-c-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.nineteen-c-a-a{width:80px;height:40;float:left;position:relative;top:30px;left:15px;font-weight:bord;z-index:2;}
		.nineteen-c-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;font-size:13px;z-index;2;padding:5px;}
	.nineteen-d{ width:230px;height:220px;border:10px solid white;margin-right:18px;float:left;background:url('./image1/tece.jpg') no-repeat;} 
		.nineteen-d-a{width:220px;height:50px;valign:bottom;border:1px solid white;position:relative;top:170px;background-color:white;z-index:2;opacity:0.5;}
		.nineteen-d-a-a{width:50px;height:50;float:left;position:relative;top:20px;left:15px;font-weight:bord;z-index:2;}
		.nineteen-d-a-b{width:150px;height:50;border-left:1px solid gray;float:right;opacity:0.8;position:relative;top:10px;font-size:13px;z-index;2;padding:5px;}
		
	.twenty{width:85%;height:100px;margin-left:8%;margin-top:20px;z-index:1;}			
			
	</style>
		<link rel="stylesheet" href="style1.css" type="text/css">
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link href="css/layout.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css">
				
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/cufon-yui.js" type="text/javascript"></script>
		<script src="js/cufon-replace.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/Josefin_Sans_600.font.js"></script>
		<script type="text/javascript" src="js/Lobster_400.font.js"></script>
		<script type="text/javascript" src="js/sprites.js"></script>
		<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
		<script type="text/javascript" src="js/jquery.jplayer.settings.js"></script>
		<script type="text/javascript" src="js/gSlider.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<!--[if lt IE 7]> <div style=' clear: both; height: 59px; padding:0 0 0 15px; position: relative;'> <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div> <![endif]-->
<!--[if lt IE 9]><script src="js/html5.js" type="text/javascript"></script><![endif]-->
<!--[if IE]><link href="css/ie_style.css" rel="stylesheet" type="text/css" /><![endif]-->
</head>
<body id="page1">
	
<div id="main">
	<header>
	<!--	<nav>
			<ul>
			<li class="active"><a href="index.html">About</a></li>
			<li><a href="index-1.html">Audio</a></li>
			<li><a href="index-2.html">Video</a></li>
			<li><a href="index-3.html">Gallery</a></li>
			<li><a href="index-4.html">Tour Dates</a></li>
			<li><a href="index-5.html">Contacts</a></li>
		</ul>
	</nav>     
									-->
			<br><br>						
			<div class='title'>
				<span style="color:teal;font-weight:bolder;font-family:'隶书';font-size:25px;line-height:30px;text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;你好<?php echo $_SESSION['adminuser']['name']; ?>！欢迎来到乐活网,让我们一起追求：
				&nbsp;Lifestyles of Health  and  Sustainability!</span>
			</div>
	
	<h1><a href="index.php">Lohas'it!</a></h1>
	<div class="header-slider">
		<ul>
			<li>鸣沙山，据史书记载，在天气晴朗时，即使风停沙静，也会发出丝竹管弦之音，犹如奏乐，
故“沙岭晴鸣”为敦煌一景。这是大自然现象中的一种奇观，古往今来以“沙漠奇观”著称于世，被誉为“塞外风光之一绝”。</li>
			<li>《忆江南》中“江南好，风景旧曾谙。日出江花红胜火，春来江水绿如蓝。能不忆江南？”描写的是苏杭美景。</li>
			<li>张掖丹霞地貌在方圆一百平方山地丘陵地带，有造型奇特，色彩斑谰，气势磅礴的丹霞地貌。丹霞是指红色砂砾岩经长期风化剥离和流水侵蚀，形成的孤立的山峰和陡峭的奇岩怪石。</li>
		</ul>
	</div>
	<a href="#" class="hs-prev"><img src="images/prev.png" alt=""></a>
	<a href="#" class="hs-next"><img src="images/next.png" alt=""></a>
	<a href="#" class="header-more">Read More</a>
</header><div class="inner_copy"> </div>
  <div class="tumbvr">
	<div class="tumbvr-mask"></div>
	<ul>
		<li><img src="images/01.jpg" alt=""></li>
		<li><img src="images/02.jpg" alt=""></li>
		<li><img src="images/03.jpg" alt=""></li>
		<li><img src="images/04.jpg" alt=""></li>
		<li><img src="images/05.jpg" alt=""></li>
		<li><img src="images/06.jpg" alt=""></li>
		<li><img src="images/07.jpg" alt=""></li>
		<li><img src="images/08.jpg" alt=""></li>
		<li><img src="images/09.jpg" alt=""></li>
		<li><img src="images/10.jpg" alt=""></li>
	</ul>
  </div>
  <article id="content" style='width:1200px;'>
	<div class="col-1">
		
		<div class="p2">
		<h2>New Video</h2>
		<a href="video/video_AS3.swf?width=512&amp;height=288&amp;fileVideo=temp_video.flv" rel="prettyPhoto"><img class="p1" src="images/col1-video-thumb1.jpg" alt=""></a>
		<div class="alc"><a href="index-2.html">More Videos</a></div>
		</div>
	</div>
	<div class="col-2">
		<!-- audio player begin -->
		<div id="jplayer"></div>
		<div class="jp-audio">
		<h2>New Song</h2>
		<div class="jp-type-single">
			<div id="jp_interface_1" class="jp-interface">
			<ul class="jp-controls">
				<li><a href="#" class="jp-play"></a></li>
				<li><a href="#" class="jp-pause"></a></li>
				<li><a href="#" class="jp-prev">Previous Track</a></li>
				<li><a href="#" class="jp-next">Next Track</a></li>
				<li><a href="#" class="jp-more-songs">Listen to More Songs</a></li>
			</ul>
			<div class="jp-progress">
				<div class="jp-seek-bar">
				<div class="jp-play-bar"></div>
				</div>
			</div>
			<div class="jp-title"></div>
			</div>
		</div>
		</div>
		<!-- audio player end -->
	</div>
	<div class="login"<?php if($_SESSION['adminuser']['name']){echo "style='display:none;' ";} ?> >
		
		<form action='dologin.php' method='post'>
			<table width='50'height='50' cellspacing='10'>
				<br><br>
				<caption>
				<span style="color:teal;font-size:30px;font-family:'serif'"><h2>user login</h2></span>
				</caption>
				<tr>
					<td style='color:white;'>username:</td>
					<td><input type='text' name='username'></td>
				</tr>
				<tr>
					<td style='color:white;'>password:</td>
					<td><input type='password'name='password'></td>
				<tr>
					<td colspan='2' align='center'>
						<input type='submit'name='submit'value='submit'>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type='reset'name='reset'value='reset'>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="./zhuce.php" target="_blank"><input type='button' value='register'></a>
					</td>
				</tr>
			</table>
		</form>
		<?php
		//判断登陆是否成功：
		echo "<center>";
		switch($_GET['p']){
			case 1:
			echo "<span style='color:white'>ok!</span>";
			break;
			case 2:
			echo "<span style='color:whiter'>Please try again!</span>";	
			break;			
			case 3:
			echo "<span style='color:whiter'>Please login,first!</span>";	
			break;		
			case 4:
			echo "<span style='color:whiter'>Ok,you can login now!</span>";	
			break;		
			
			}
			
		echo "</center>";

		?>

	</div>
	<div style='font-size:15px;z-index:4;margin-top:50px;' >
		 <?php
            //用户登录注销操作：
            if($_SESSION['adminuser']['name'])
            {
                echo '当前成功登录用户名：'.$_SESSION['adminuser']['name'].'<br/>';
				echo "点击<a href='./loginout.php'>注销</a>当前登录";
            }           
        ?>   
	</div>
  </article>
</div>
<!--========================上文结束《id=main》===========================-->
<!--========================插入正文===========================-->
	<div style="width:84%;height:40px;background-color:#B50100;border:10px solid #b50100;margin-top:100px;margin-left:8%;border-radius:12px 12px 12px 12px;">
	<ul>
		<li style='float:left;margin-left:40px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:40px;color:white;'>关于乐活</span></a></li>
		<li style='float:left;margin-left:40px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:40px;color:white;'>首页</span></a></li>
		<li style='float:left;margin-left:40px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:40px;color:white;'>时尚数码</span></a></li>
		<li style='float:left;margin-left:40px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:40px;color:white;'>乐活音乐</span></a></li>
		<li style='float:left;margin-left:40px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:40px;color:white;'>居家</span></a></li>
		<li style='float:left;margin-left:40px;'><a href="lvlist.php"><span style='font-size:20px;font-weight:bolder;line-height:40px;color:white;'>旅行</span></a></li>
		<li style='float:left;margin-left:40px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:40px;color:white;'>服饰</span></a></li>
		<li style='float:left;margin-left:40px;'><a href="list.php"><span style='font-size:20px;font-weight:bolder;line-height:40px;color:white;'>着迷</span></a></li>
		<li style='float:left;margin-left:40px;'><a href=""><span style='font-size:20px;font-weight:bolder;line-height:40px;color:white;'>联系我们</span></a></li><a name='top'>
		<li style='float:left;margin-left:40px;'><a href="selfcenter.php" target="_blank"><span style='font-size:20px;font-weight:bolder;line-height:40px;color:white;'>个人中心</span></a></li>
	</ul>
	</div>
	<div class='three'>
			
		<div class='three-content-outline'>
			<div class='seek-outline'>
				<div class="one" align="top" >	
					<form action='doselect' method='post'>
					<img width="50" height="40" src="./include/image/lohas2.png" align="left">
						<br>
					<select name="search_type">
						<option selected="" value="auction">搜索</option>
					</select>
					<input type="text" name="textfield">
					<select id="cat" name="cat">
						<option selected="" value="">书香门第</option>
						<option value="25">住房/家具</option>
						<option value="50008075">健身</option>
						<option value="50007216">出行/郊游</option>
						<option value="50003757">乐活运动</option>
						<option value="50003758">天然衣库</option>
						<option value="50003759">瑜伽</option>
						<option value="50003750">节能用具</option>
					</select>	
						
							<input type="submit" value=" 搜 索 " name="submit">
						
							让我们一起追求:自然、健康、极致!<a href="index.php">【首页】</a><br>
						<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
						<span style="color:red;"><b>热门搜索:</b></span>&nbsp;节能厨具 棉麻外衣 山地车  户外防护   帐篷  
						<a href="zaliang.php" target="_blank">谷物</a>  &nbsp;社区义工  二手房	
					<a href="showCart.php">【购物车】</a>
					</form>
				</div>
			</div>
			<div class='three-content-one'>
			
			<a href='list.php' style='z-index:3;' ><img src="./image/shishangshuma.png" width='390'height='180'></a>
			</div>
			<div class='three-content-two'>
				<img src="./image/yinyue.jpg" width='390'height='180'>
			</div>
			<div class='three-content-three'>
			<a href='#anchor_one'><img src="./image/jujia.jpg" width='390'height='180'></a>
			</div>
			<div class='three-content-four'>
			<a href='lvlist.php'><img src="./image/lvxing.jpg" width='390'height='180'></a>
			</div>
			
			
		</div>
		<div class="three-outline">
				<div class="three-a"></div>
				<div class="three-b">
				<ol style="line-height:30px;font-weight:bolder;">
					<li><a href="" ><span style='color:red;'>热销产品Top100</span></a></li>
					<li><a href="">我的乐活网</a></li>
					<li><a href="">500万商品任你选</a></li>
					<li><a href="">成立2周年大礼</a></li>
					<li><a href="">心灵音乐最新上架</a></li>
					<li><a href="">推荐：黑莓节能手机</a></li>
					<li><a href="">推荐：吴松妹《我的印度之旅》</a></li>
					<li><a href="">推荐：《LOHAS》</a></li>
					<li><a href="">最新DIY产品</a></li>
					<li><a href="">最新美国节能车</a></li>	
					<li><a href="">推荐：背包客的西藏经历</a></li>
				</ol>
				</div>
			</div>
			
			
		
				
	</div>
			
			<!-- ================图片轮现开始========================-->
			<div class='fudong'>
				<div class="lunxian">
            	<script type="text/javascript">
				<!--焦点图开始-->
        
					var focus_width=690;
					var focus_height=300;
					var text_height=0;
					var swf_height = focus_height+text_height;
					var pics='./image/1.jpg|./image/2.jpg|./image/3.jpg|./image/4.jpg|./image/5.jpg';
					var links='#|#|#|#|#|#|#';
					var texts='网上商城|网上商城|网上商城|网上商城|网上商城'; 
					document.write('<object ID="focus_flash" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ focus_width +'" height="'+ swf_height +'">');
					document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="image/pix.swf"><param name="quality" value="high"><param name="wmode" value="transparent">');
					document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
					document.write('<param name="FlashVars" value="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'">');
					document.write('<embed ID="focus_flash" src="image/pix.swf" wmode="opaque" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'" menu="false" quality="high" width="'+ focus_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'); 
					document.write('</object>');
				   
				<!--焦点图结束-->
							</script>
				</div>
				<div class='www'>
				<a href='list.php'><img src="./image/mingxinpian.jpg" width='370'height='290'></a>
				</div>
				
			</div>	
		<!-- ================图片轮现结束========================-->
			
		<!--=============================商品分类展示======================================-->	
			<div  class="ten">
				<div class='ten-a'>	
						
						<div>
							
							<b><span style='color:black;font-size:30px;line-height:30px;'>时尚数码</span></b>
							<div class="category-title-desc">
							<a target="_blank" href="">每日精选</a>
							
							</div>				
						</div>
					
						<div>
							<a class="special"  href="">电脑</a>
								<a  href="">平板</a>
								<a href="">果迷</a>
								<a  href="">尼康</a>
								<a class="special" href="">佳能</a>
							
								<a href="">摄像机</a>
								<a href="">镜头</a>
								<a  href="">更多</a>
								
					</div>
				</div>
				<div class='ten-b'>
					<div class='ten-b-a'>
						<div class='ten-b-a-a'><b>果粉</b></div>
						<div class='ten-b-a-b'>2013年最新款式时尚Mac笔记本电脑...</div>
					</div>
				</div>
				<div class='ten-c'>
					<div class='ten-c-a'>
						<div class='ten-c-a-a'><b>平板</b></div>
						<div class='ten-c-a-b'>2013年最新款式win8时尚平板电脑...</div>
					</div>
				</div>
				<div class='ten-d'>
					<div class='ten-d-a'>
						<div class='ten-d-a-a'><b>手机</b></div>
						<div class='ten-d-a-b'>乔布斯留世经典之作限量版iphone4s...</div>
					</div>
				</div>
				
			
			
				<div class='eleven-a'>	
					<div class='eleven-a-a'>
						<div class='eleven-a-a-a'><b>尼康</b></div>
						<div class='eleven-a-a-b'>最美的风景尽在尼康...</div>
					</div>	
				</div>
				<div class='eleven-b'>
					<div class='eleven-b-a'>
						<div class='eleven-b-a-a'><b>摄像</b></div>
						<div class='eleven-b-a-b'>记录全家人的快乐时光...</div>
					</div>
				</div>
				<div class='eleven-c'>
					<div class='eleven-c-a'>
						<div class='eleven-c-a-a'><b>显示</b></div>
						<div class='eleven-c-a-b'>还原你最初的色彩，尽在...</div>
					</div> 
				</div>
				<div class='eleven-d'>
					<div class='eleven-d-a'>
						<div class='eleven-d-a-a'><b>佳能</b></div>
						<div class='eleven-d-a-b'>记录经典赛事的瞬间，怎么没有我佳能1Dx...</div>
					</div>
				</div>
			</div>
			
			
			
			<div  class="twelve">
				<div class='twelve-a'>	
						<div>
							<b><span style='color:black;font-size:30px;line-height:30px;'>乐活音乐</span></b>
							<div class="category-title-desc">
							<a target="_blank" href="">每日精选</a>
							</div>				
						</div>
					
						<div>
							<a class="special"  href="">古典主义</a>
								<a  href="">芭蕾舞剧</a>
								<a href="">浪漫主义</a>
								<a  href="">巴洛克时代</a>
								<a class="special" href="">近代音乐</a>
								<a href="">现代音乐</a>
								<a href="">室内乐</a>
								<a  href="">更多</a>
						</div>
				</div>
				<div class='twelve-b'>
					<div class='twelve-b-a'>
						<div class='twelve-b-a-a'><b>流行</b></div>
						<div class='twelve-b-a-b'>2011、2012销售冠军！全球销量突破2700万，再造全球十七国销量冠军...</div>
					</div>
				</div>
				<div class='twelve-c'>
					<div class='twelve-c-a'>
						<div class='twelve-c-a-a'><b>古典</b></div>
						<div class='twelve-c-a-b'>莫扎特第-C小调21，降E大调10...</div>
					</div>
				</div>
				<div class='twelve-d'>
					<div class='twelve-d-a'>
						<div class='twelve-d-a-a'><b>浪漫</b></div>
						<div class='twelve-d-a-b'>浪漫古典101...</div>
					</div>
				</div>
				
			
			
				<div class='thirteen-a'>	
					<div class='thirteen-a-a'>
						<div class='thirteen-a-a-a'><b>芭蕾</b></div>
						<div class='thirteen-a-a-b'>Tchaikovsky:BalletSuites柴可夫斯基：三大芭蕾组曲...</div>
					</div>	
				</div>
				<div class='thirteen-b'>
					<div class='thirteen-b-a'>
						<div class='thirteen-b-a-a'><b>近代</b></div>
						<div class='thirteen-b-a-b'>Tchaikovsky:BalletSuites柴可夫斯基：三大芭蕾组曲...</div>
 					</div>
				</div>
				<div class='thirteen-c'>
					<div class='thirteen-c-a'>
						<div class='thirteen-c-a-a'><b>室内乐</b></div>
						<div class='thirteen-c-a-b'>跳动的音符：炎黄口琴室内乐团重奏专辑...</div>
					</div>
				</div>
				<div class='thirteen-d'>
					<div class='thirteen-d-a'>
						<div class='thirteen-d-a-a'><b>现代主义</b></div>
						<div class='thirteen-d-a-b'>普罗科菲耶夫：动物狂欢节...</div>
					</div>
				</div>
			</div>
			
			
			
			<div  class="fourteen">
				<div class='fourteen-a'>	
						<div>
							<b><span style='color:black;font-size:30px;line-height:30px;'>居家</span></b>
							<div class="category-title-desc">
							<a target="_blank" href="">每日精选</a>
							</div>				
						</div>
					
						<div>
							<a class="special"  href="">创意设计</a>
								<a  href="">客厅</a>
								<a href="">卧室</a>
								<a href="">厨房</a>
								<a  href="">卫浴</a>
								<a href="">花园</a>
								<a href="">杂货</a>
								<a  href="">更多</a>
								
						</div>
				</div>
				<div class='fourteen-b'>
					<div class='fourteen-b-a'>
						<div class='fourteen-b-a-a'><b>花园</b></div>
						<div class='fourteen-b-a-b'>白色陶瓷巴黎铁塔花瓶，做工很细腻，就...</div>
					</div>
				</div>
				<div class='fourteen-c'>
					<div class='fourteen-c-a'>
						<div class='fourteen-c-a-a'><b>杂货</b></div>
						<div class='fourteen-c-a-b'>今年过节不收礼呀，，，还记得这个广...</div>
					</div>
				</div>
				<div class='fourteen-d'>
					<div class='fourteen-d-a'>
						<div class='fourteen-d-a-a'><b>创意设计</b></div>
						<div class='fourteen-d-a-b'>德国Philippi CONO 笔筒...</div>
					</div>
				</div>
				
			
			
				<div class='fifteen-a'>	
					<div class='fifteen-a-a'>
						<div class='fifteen-a-a-a'><b>收纳</b></div>
						<div class='fifteen-a-a-b'>原木手工制，用最天然的材料制作，会保...</div>
					</div>	
				</div>
				<div class='fifteen-b'>
					<div class='fifteen-b-a'>
						<div class='fifteen-b-a-a'><b>厨房</b></div>
						<div class='fifteen-b-a-b'>宜家简约陶瓷压蒜器，方便研磨食物，外...</div>
					</div>
				</div>
				<div class='fifteen-c'>
					<div class='fifteen-c-a'>
						<div class='fifteen-c-a-a'><b>灯具</b></div>
						<div class='fifteen-c-a-b'>LED蜡烛灯杯营造出最逼真的烛光，将温馨...</div>
					</div>
				</div>
				<div class='fifteen-d'>
					<div class='fifteen-d-a'>
						<div class='fifteen-d-a-a'><b>家饰</b></div>
						<div class='fifteen-d-a-b'>个性另类创意DIY组合，适合办公室...</div>
					</div>
				</div>
			</div>
			
			
			<div  class="eight">
				<div class='eight-a'>	
						<div>
							<b><a href='./lvlist.php' style="border-style:none;"><span style='color:black;font-size:30px;line-height:30px;'>旅行</span></a></b>
							<div class="category-title-desc">
							<a target="_blank" href="">每日精选</a>
							</div>				
						</div>
					
						<div>
							<a class="special"  href="">骑行车友</a>
								<a  href="">急救包</a>
								<a href="">地图指南</a>
								<a href="">帐篷</a>
								<a  href="">小工具</a>
								<a href="">生活用品</a>
								<a href="">防护用品</a>
								<a  href="">更多</a>
								
						</div>
				</div>
				<div class='eight-b'>
					<div class='eight-b-a'>
						<div class='eight-b-a-a'><b><?php echo $a[0]['goods'];  ?></b></div>
						<div class='eight-b-a-b'><a href='article.php?id=<?php echo $a[0]['id']; ?>'>最新商品展示...</a></div>
					</div>
				</div>
				<div class='eight-c'>
					<div class='eight-c-a'>
						<div class='eight-c-a-a'><b><?php echo $a[1]['goods'];  ?></b></div>
						<div class='eight-c-a-b'><a href='article.php?id=<?php echo $a[1]['id']; ?>'>最新商品展示...</a></div>
					</div>
				</div>
				<div class='eight-d'>
					<div class='eight-d-a'>
						<div class='eight-d-a-a'><b><?php echo $a[2]['goods'];  ?></b></div>
						<div class='eight-d-a-b'><a href='article.php?id=<?php echo $a[2]['id']; ?>'>最新商品展示...</a></div>
					</div>
				</div>
				
			
			
				<div class='nine-a'>	
					<div class='nine-a-a'>
						<div class='nine-a-a-a'><b><?php echo $a[3]['goods'];  ?></b></div>
						<div class='nine-a-a-b'><a href='article.php?id=<?php echo $a[3]['id']; ?>'>最新商品展示...</a></div>
					</div>	
				</div>
				<div class='nine-b'>
					<div class='nine-b-a'>
						<div class='nine-b-a-a'><b><?php echo $a[4]['goods'];  ?></b></div>
						<div class='nine-b-a-b'><a href='article.php?id=<?php echo $a[4]['id']; ?>'>最新商品展示...</a></div>
					</div>
				</div>
				<div class='nine-c'>
					<div class='nine-c-a'>
						<div class='nine-c-a-a'><b><?php echo $a[5]['goods'];  ?></b></div>
						<div class='nine-c-a-b'><a href='article.php?id=<?php echo $a[5]['id']; ?>'>最新商品展示...</a></div>
					</div>
				</div>
				<div class='nine-d'>
					<div class='nine-d-a'>
						<div class='nine-d-a-a'><b><?php echo $row['goods'];  ?></b></div>
						<div class='nine-d-a-b'><a href='article.php?id=<?php echo $row['id']; ?>'>旅行中最热的商品...</a></div>
					</div>
				</div>
			</div>
			
			
			
			
			
			
			
			
			
			
			
			<div class='sixteen'>
					<div class='sixteen-a'>	
						<div>
							<b><span style='color:black;font-size:30px;line-height:30px;'>服饰</span></b>
							<div class="category-title-desc">
							<a target="_blank" href="">每日精选</a>
							</div>				
						</div>
					
						<div>
							<a  href="">裙子</a>
								<a	class="special" href="">泳装</a>
								<a href="">牛仔</a>
								<a class="special" href="">首饰</a>
								<a  href="">内衣</a>
								<a href="">上装</a>
								<a href="">原单</a>
								<a  href="">更多</a>

						</div>
				</div>
				<div class='sixteen-b'>
					<div class='sixteen-b-a'>
						<div class='sixteen-b-a-a'><b>上装</b></div>
						<div class='sixteen-b-a-b'>海军领的上衣，有点儿复古的日本学生妹...</div>
					</div>
				</div>
				<div class='sixteen-c'>
					<div class='sixteen-c-a'>
						<div class='sixteen-c-a-a'><b>配饰</b></div>
						<div class='sixteen-c-a-b'>童话般的一款手表，表面上的马车很容易...</div>
					</div>
				</div>
				<div class='sixteen-d'>
					<div class='sixteen-d-a'>
						<div class='sixteen-d-a-a'><b>外套</b></div>
						<div class='sixteen-d-a-b'>中长款呢子大衣 极简风格 合体修身剪裁...</div>
					</div>
				</div>
				
			
			
				<div class='seventeen-a'>	
					<div class='seventeen-a-a'>
						<div class='seventeen-a-a-a'><b>条纹</b></div>
						<div class='seventeen-a-a-b'>有点儿复古范儿的条纹衬衫，棉麻质地的...</div>
					</div>	
				</div>
				<div class='seventeen-b'>
					<div class='seventeen-b-a'>
						<div class='seventeen-b-a-a'><b>裙子</b></div>
						<div class='seventeen-b-a-b'>学院+优雅的完美单品，越看越爱的藏青色...</div>
					</div>
				</div>
				<div class='seventeen-c'>
					<div class='seventeen-c-a'>
						<div class='seventeen-c-a-a'><b>下装</b></div>
						<div class='seventeen-c-a-b'>简洁略宽松，西装裤剪裁，显瘦显腿直...</div>
					</div>
				</div>
				<div class='seventeen-d'>
					<div class='seventeen-d-a'>
						<div class='seventeen-d-a-a'><b>首饰</b></div>
						<div class='seventeen-d-a-b'>海蓝色亚克力皇冠戒指。很可爱的爱心设...</div>
					</div>
				</div>
			</div>
			
			</div>
			
			<div  class="eighteen">
				<div class='eighteen-a'>	
						<div>
								<b><a href='./list.php' style="border-style:none;"><span style='color:black;font-size:30px;line-height:30px;'>着迷</span></a></b>
							<div class="category-title-desc">
							<a target="_blank" href="">每日精选</a>
							</div>				
						</div>
					
						<div>
							<a class="special"  href="">果粉</a>
								<a  href="">电影</a>
								<a href="">玩偶</a>
								<a  href="">特产</a>
								<a class="special" href="">怀旧</a>
								<a href="">文具</a>
								<a href="">书</a>
								<a  href="">更多</a><a name="anchor_one" style="border-style:none;">

					</div>
				</div>
				<div class='eighteen-b'>
					<div class='eighteen-b-a'>
						<div class='eighteen-b-a-a'><b><span style='color:black;'><?php  echo $row3['goods'] ?></span></b></div>
						<div class='eighteen-b-a-b'><a href='article.php?id=<?php echo $row3['id'];  ?>'>最热卖展示...</a></div>
					</div>
				</div>
				<div class='eighteen-c'>
					<div class='eighteen-c-a'>
						<div class='eighteen-c-a-a'><b>电影</b></div>
						<div class='eighteen-c-a-b'><a href='list.php'>强烈推荐的一款明信片。里面包含30部欧...</a></div>
					</div>
				</div>
				<div class='eighteen-d'>
					<div class='eighteen-d-a'>
						<div class='eighteen-d-a-a'><b>怀旧</b></div>
						<div class='eighteen-d-a-b'><a href='list.php'>老上海老洋货，民国老剃须刀，有盒子剃...</a></div>
					</div>
				</div>
				
			
				<div class='nineteen-a'>
					<div class='nineteen-a-a'>
						<div class='nineteen-a-a-a'><b>书</b></div>
						<div class='nineteen-a-a-b'><a href='list.php'>难以忘怀的经典...</a></div>
					</div>
				</div>
					
				<div class='nineteen-b'>
					<div class='nineteen-b-a'>
						<div class='nineteen-b-a-a'><b>玩偶</b></div>
						<div class='nineteen-b-a-b'><a href='list.php'>木制数独棋，九宫格可以打开，棋盘下带...</a></div>
					</div>
				</div>
				<div class='nineteen-c'>
					<div class='nineteen-c-a'>
						<div class='nineteen-c-a-a'><b>文具</b></div>
						<div class='nineteen-c-a-b'><a href='list.php'>模拟鸭蛋的形状设计，乳胶触感犹如少女...</a></div>
					</div>
				</div>
				<div class='nineteen-d'>
					<div class='nineteen-d-a'>
						<div class='nineteen-d-a-a'><b>特产</b></div>
						<div class='nineteen-d-a-b'><a href='list.php'>上海真老大房多味云片糕。口味独特，质...</a></div>
					</div>
				</div>
			</div>
		<!--=============================商品分类展示结束========================================-->	
		<!--============================浮动图开始========================================-->	
			
			<div class='twenty'>
            	<script type="text/javascript">
				<!--焦点图开始-->
        
					var focus_width=1095;
					var focus_height=100;
					var text_height=0;
					var swf_height = focus_height+text_height;
					var pics='./image/6.jpg|./image/7.jpg|./image/8.jpg|./image/6.jpg|./image/7.jpg';
					var links='#|#|#|#|#|#|#';
					var texts='网上商城|网上商城|网上商城|网上商城|网上商城'; 
					document.write('<object ID="focus_flash" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ focus_width +'" height="'+ swf_height +'">');
					document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="image/pix.swf"><param name="quality" value="high"><param name="wmode" value="transparent">');
					document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
					document.write('<param name="FlashVars" value="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'">');
					document.write('<embed ID="focus_flash" src="image/pix.swf" wmode="opaque" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'" menu="false" quality="high" width="'+ focus_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'); 
					document.write('</object>');
				   
				<!--焦点图结束-->
							</script>
			</div>
	<!--============================浮动图结束========================================-->	
		<div class='zhiding'>
		
			<a href='#top'><span style="color:teal">回到顶端</span></a>
			<a href='#top'><span style="color:teal;float:right;">回到顶端</span></a>
		
		</div>

<!--========================正文结束===========================-->
<!--========================页脚===========================-->
	<div class="bottom">
		<hr width="1000">
			关于乐活 
			广告服务
			合作伙伴
			客户中心
			诚征英才
			联系我们
			网站地图
			热门品牌 版权说明
	
			<div align="center">
			全球乐活网 ：
			中国站
			国际站 日文站 乐活站 支付宝 中国雅虎 口碑网  乐活推广联盟 
			</div>
			
			<div align="center">Copyright 2010-2050, 版权所有 LOHAS.COM</div>
		
			<div class="fontcolor_blue" align="center">ICP证：京C2-20050291</div>
			
			<div align="center">广告经营许可证号：3301061000468</div>
			
	</div>
	<!--==================================================================-->
<script type="text/javascript">Cufon.now()
$(function(){
	$('nav,.more,.header-more').sprites()

	$('.header-slider').gSlider({
		prevBu:'.hs-prev',
		nextBu:'.hs-next'
	})
})
$(window).load(function(){
	$('.tumbvr')._fw({tumbvr:{
		duration:2000,
		easing:'easeOutQuart'
	}})
	.bind('click',function(){
		location="index-3.html"
	})
	
	$('a[rel=prettyPhoto]').each(function(){
		var th=$(this),
			pb
		th
			.append(pb=$('<span class="playbutt"></span>').css({opacity:.7}))
		pb
			.bind('mouseenter',function(){
				$(this)
					.stop()
					.animate({opacity:.9})
			})
			.bind('mouseleave',function(){
				$(this)
					.stop()
					.animate({opacity:.7})
			})
	})
	.prettyPhoto({theme:'dark_square'})
})
</script>
</body>
</html>
