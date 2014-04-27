<?php
$pid=0;
$path="0,";
$name="跟类别";
if(isset($_GET['pid'])&&isset($_GET['name'])&&isset($_GET['path'])){
	$pid=$_GET['pid'];
	$name=$_GET['name'];
	$path=$_GET['path'].$pid.",";
}
?>
<html>
	<head>	
	<title>添加商品的类别</title>
	</head>
	<body>
		<center>
		<h3>添加商品分类<h3>
		<form action="action.php?action=add" method='post'>
			<table width='400' border='1' cellpadding='5' cellspacing='0'>
			<input type="hidden" name="pid" value="<?php echo $pid; ?>"/>
			<input type="hidden" name="path" value="<?php echo $path; ?>"/>
				<tr>
					<td width="200" align="right" ='50'>父类别名</td>
					<td><input type="text" name="name" value='<?php echo $name; ?>'/></td>
				</tr>
				<tr>
					<td width="200" align="right">类别名称：</td>
					<td><input type="text" name="name"/></td>
				</tr>
				<tr>
					<td colspan='2' align='center'>
					<input type='submit' name='tijiao' value='提交'>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
					<input type='reset' name='chongzhi' value='重置'>
					</td>
				</tr>
			</table>
			<?php
				switch ($_GET['e']) {
					case '0':
						echo "ok";
						break;
					
					case '1':
						echo "no";
						break;
				}



			?>


		</form>
		</center>
	<body>
</html>




