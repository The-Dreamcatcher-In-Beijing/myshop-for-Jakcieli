<html>
	<head>
		<title>商品信息管理</title>
	</head>
	<body>
		<center>
			<?php 
			
				
				//从数据库中获取要修改的信息
				//1.导入配置文件 
				require("../../public/dbconfig.php");

				//2.获取数据库连接，并判断
				$link = @mysql_connect(HOST,USER,PASS)or die('数据库连接失败！原因：'.mysql_error());

				//3.设置字符集编码，选择数据库
				mysql_set_charset("utf8");
				mysql_select_db(DBNAME,$link);
				
				//4. 获取修改的数据
				$sql ="select * from goods where id=".$_GET['k'];
				$result = mysql_query($sql,$link);
				//5. 解析
				if($result && mysql_num_rows($result)>0){
					$goods = mysql_fetch_assoc($result);
				}else{
					die('没有找到要修改的数据！');
				}
				//6.释放结果集，
				 mysql_free_result($result);
				
			?>
			
			<h3>修改商品信息</h3>
			<form action="action.php?action=update" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $goods['id'] ?>"/>
			<input type="hidden" name="oldpicname" value="<?php echo $goods['picname'] ?>"/>
			<table width="440" border="0">
				<tr>
					<td width="140" align="right">商品类别:</td>
					<td>
					<select name="typeid">
					<?php
						//获取商品类别信息并输出
						
						//4.准备sql，执行查询
						$sql = "select * from type order by concat(path,id) asc";
						$result = mysql_query($sql);
						
						//5.解析结果集，并遍历输出
						while($row = mysql_fetch_assoc($result)){
							$m = substr_count($row['path'],",")-1;
							$strpad=str_pad("",$m*12,"&nbsp;");
							$disabled = ($row['pid']==0)?"disabled":"";
							$selected = ($goods['typeid']==$row['id'])?"selected":""; //判断是否是当前商品的类别，若是就让他默认选中
							echo "<option value='{$row['id']}' {$selected} {$disabled}>{$strpad}{$row['name']}</option>";
						}
						
						//6.释放结果集，关闭数据库
						mysql_free_result($result);
						mysql_close($link);
					?>
					</select>
					</td>
				</tr>
				<tr>
					<td align="right">商品名称:</td>
					<td><input type="text" name="goods" value="<?php echo $goods['goods']; ?>"/></td>
				</tr>
				<tr>
					<td align="right">生产厂家:</td>
					<td><input type="text" name="company" value="<?php echo $goods['company']; ?>"/></td>
				</tr>
				<tr>
					<td align="right">单价:</td>
					<td><input type="text" name="price" size="12" value="<?php echo $goods['price']; ?>"/></td>
				</tr>
				<tr>
					<td align="right">库存量:</td>
					<td><input type="text" name="store" size="12" value="<?php echo $goods['store']; ?>"/></td>
				</tr>
				<tr>
					<td align="right">商品图片:</td>
					<td><input type="file" name="pic"/></td>
				</tr>
				<tr>
					<td align="right">当前状态:</td>
					<td>
					<?php
						//显示商品状态信息
						$state = array(1=>"新添加",2=>"在售",3=>"已下架");
						foreach($state as $k=>$v){
							$checked = ($k==$goods['state'])?"checked":"";
							echo "<input type='radio' name='state' value='{$k}' {$checked} />{$v} ";
						}
					?>
					</td>
				</tr>
				<tr>
					<td align="right" valign="top">简介:</td>
					<td><textarea rows="6" cols="30" name="descr"><?php echo $goods['descr']; ?></textarea></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" value="修改"/>&nbsp;&nbsp;
						<input type="reset" value="重置"/>
					</td>
				</tr>
			</table>
			</form>
			<img src="./image/<?php echo $goods['picname']; ?>"/>
		</center>
	</body>
</html>