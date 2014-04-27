<?php
$select=$_POST['textfield'];
if($select=='着迷'){
header("Location:list.php");
}
if($select=='zhaomi'){
header("Location:list.php");
}
if($select=='旅行'){
header("Location:lvlist.php");
}else{
	echo "正在完善中！"; }

?>