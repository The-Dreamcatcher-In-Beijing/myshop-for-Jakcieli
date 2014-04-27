<?php
//导入配置文件
	require('../../public/dbconfig.php');
	include('functions.php');
//连接数据库，判断是否连接成功；
	$link=@mysql_connect(HOST,USER,PASS) or die("连接失败,原因".mysql_error());
//设置结果集编码，选择数据库
	mysql_set_charset('utf8');
	mysql_select_db(DBNAME,$link);
//准备sql语句，并执行；

	$path='./image';
	$typelist=array("image/jpeg","image/png","image/gif","image/jpg","image/pjpeg","image/xpng");
	$typeid=$_POST['typeid'];
	$goods=$_POST['name'];
	$company=$_POST['company'];
	$price=$_POST['price'];
	$state=$_POST['state'];
	$store=$_POST['store'];
	$num=$_POST['num'];
	$descr=$_POST['descr'];
	$pic=$_FILES['pic'];
	$addtime=time();
	
switch($_GET['action']){
	case add:
	//处理图片上传	
		$res = uploadfile($pic,$path,$typelist);
			if($res[error]){	
			echo "上传成功.<br>";}else{
			echo "上传失败!".$res['info'].'<br>';}
		$picname=$res['info'];	
		updateImage($picname,$path,"s_",50,50);
		updateImage($picname,$path,"m_",230,230);
		updateImage($picname,$path,"",380,380);
		
		//处理结果集
		$sql="insert into goods values(null,'{$typeid}','{$goods}','{$company}','{$descr}','{$price}','{$picname}','{$state}','{$store}','{$num}',0,'{$addtime}')";
	//	echo $sql;
		$result=mysql_query($sql,$link);
	//	echo $result;
		echo "提交成功！";
		break;

		case dodel:
		$sql="delete from goods where id={$_GET['k']}";
		$result=mysql_query($sql,$link);
		if(mysql_affected_rows($link)){
			echo "删除成功！";
			}else{
			echo "删除失败！";}
			break;
		
	/*	case update:
				$path='./image';
				$typelist=array("image/jpeg","image/png","image/gif","image/jpg","image/pjpeg","image/xpng");
				$typeid=$_POST['typeid'];
				$goods=$_POST['name'];
				$company=$_POST['company'];
				$price=$_POST['price'];
				$state=$_POST['state'];
				$store=$_POST['store'];
				$num=$_POST['num'];
				$descr=$_POST['descr'];
				$pic=$_FILES['pic'];
				$addtime=time();
			
			$oldpinname=$POST['oldpicname'];
				
			//判断是否有图片上传：
			if($_FILES['pic']['error']!=4){
				//执行图片上传：处理
				$picinfo=uploadfile($_FILES['pic'],$path,$typelist);
			//判断上传是否成功
				if($picinfo['error']===false){
					die("商品图片上传失败！原因是：".$picinfo['info']);
				}
				$picname=$picinfo['info'];
			
			//对上传的商品图片进行压缩处理
				@updateImage($picname,$path,"$_",50,50);
				@updateImage($picname,$path,"m_",230,230);
				@updateImage($picname,$path,"",380,380);
				//没有指定前缀则覆盖原图
			}else{
				//没有伤处图片：
				$picname=$oldpicname;
			}
			
			//拼装修改sql语句
			$sql="update goods set typeid='{$typeid}',goods='{$goods}',company='{$company}',price='{$price}',store='{$store}',descr='{$descr}',state='{$state}',picname='{$picname}',addtime='{$addtime}'";
				mysql_query($sql,$link);	
			
			//判断（通过获取影响的行数来判断是否修改成功）
			if(mysql_affected_rows($link)>0){
				//判断是否有图片上传：
				if($_FILES['pic']['error']==0){
				//删除原图片
				@unlink($path."/".$oldpicname);
				@unlink($path."/m_".$oldpicname);
				@unlink($path."/s_".$oldpicname);
				}
				
			//修改成功（跳转到浏览页）
		//		header("Location:index.php");
			}else{
				///修改失败：
				//判断是否有新图片上传：
				if($_FILES['pic']['error']==0){
				//删除新上传图片
				@unlink($path."/".$picinfo['info']);
				@unlink($path."/m_".$picinfo['info']);
				@unlink($path."/s_".$picinfo['info']);}
				echo "<script>alter('修改失败！');window.history.back();</script>";
				}
			break;   																				*/
			
	case "update": //执行修改
		//获取要修改的信息
		$id = $_POST['id'];
		$typeid = $_POST['typeid'];
		$goods = $_POST['goods'];
		$company = $_POST['company'];
		$price = $_POST['price'];
		$store = $_POST['store'];
		$descr = $_POST['descr'];
		$state = $_POST['state']; //商品状态 1：新添加、2：在售、3：下架
		$oldpicname = $_POST['oldpicname']; //获取源图片

		//判断是否有图片上传
		if($_FILES['pic']['error']!=4){
			//执行图片上传处理
			$picinfo = uploadfile($_FILES['pic'],$path,$typelist);
			//判断上传是否成功
			if($picinfo['error']===false){
				die("商品图片上传失败！原因：".$picinfo['info']);
			}
			$picname=$picinfo['info'];//获取上传图片名
			
			//对上传的商品图片进行压缩处理
			@updateImage($picname,$path,"s_",50,50);
			@updateImage($picname,$path,"m_",230,230);
			@updateImage($picname,$path,"",380,380); //没有指定前缀则覆盖原图
		}else{
			//没有图片上传
			$picname=$oldpicname;
		}
	
		//拼装修改sql语句
		$sql = "update goods set typeid='{$typeid}',goods='{$goods}',company='{$company}',price='{$price}',store='{$store}',descr='{$descr}',state='{$state}',picname='{$picname}' where id={$id}";
		mysql_query($sql,$link);

		//判断（获取影响的行数来判断是否成功）
		if(mysql_affected_rows($link)>0){
			//判断是否有图片上传
			if($_FILES['pic']['error']==0){
				//删除原图片
				@unlink($path."/".$oldpicname);
				@unlink($path."/m_".$oldpicname);
				@unlink($path."/s_".$oldpicname);
			}
			//修改成功(跳转到浏览页)
			header("Location:index.php");
		}else{
			//失败
			//判断有新图片上传
			if($_FILES['pic']['error']==0){
				//删除原图片
				@unlink($path."/".$picinfo['info']);
				@unlink($path."/m_".$picinfo['info']);
				@unlink($path."/s_".$picinfo['info']);
			}
			echo "<script>alert('修改失败！');window.history.back();</script>"; 
			}
		break;







			
		}
		

//关闭连接
		mysql_close($link);






?>

