<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	<meta charset="UTF-8">
	<title>用户注册</title> 
	<style>
		a:hover{position:relative;top:2px;right:2px;}
		li{list-style:none;}
		table{font-family:'仿宋';font-weight:bolder;border-radius:12px 12px 12px 12px;z-index:2;}
	</style>
	<link rel="stylesheet" href="2.css" type="text/css">
	
	</head> 
	<body bgcolor='whitesmoke'>
	<div style="width:80%;height:40px;background-color:#B50100;border:10px solid #b50100;margin-left:9%;border-radius:12px 12px 12px 12px;">
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
		<br>
	<div id="content">
		<script type="text/javascript" language="javascript">
		
		function validateform(){
		if(checkUserName() && sNameCheck() && passCheck()&& emailcheck() && bdaycheck() && genderCheck())
		return true;
		else
		return false;
		}
		
		function checkUserName(){
		
		var lname = document.userfrm.lname.value;
		
		// Validate last name
		if(lname.length != 0){
		for(j=0;j<lname.length;j++){
		var ltext = lname.substring(j,j+1);
		if(ltext < 9 || ltext > 0){
		alert("真实姓名中包含数字 \n"+"请删除真实姓名中的数字和特殊字符");
		document.userfrm.lname.focus();
		document.userfrm.lname.select();
		return false
		}
		}
		}
		else{
		alert("“真实姓名”文本框为空");
		document.userfrm.lname.focus();
		return false;
		}
		return true;
		}
		// Login Name Validation
		function sNameCheck(){
		var sname = document.userfrm.sname.value;
		var illegalChars = /\W/;
		if(sname.length != 0){
		if(illegalChars.test(sname)){
		alert("账号无效");
		document.userfrm.sname.select();
		return false;
		}
		}
		else{
		alert("是否忘记输入账号？");
		document.userfrm.sname.focus();
		return false
		}
		return true;
		}
		//Validate password
		function passCheck(){
		var userpass = document.userfrm.pass.value;
		var ruserpass = document.userfrm.rpass.value;
		var illegalChars = /[\W_]/;// allow only charactors and numbers
		// Check if Password field is blank.
		if(userpass == "" || ruserpass == ""){
		alert("未输入密码 \n" + "请输入密码");
		document.userfrm.pass.focus();
		return false;
		}
		// Check if password length is less than 6 charactor.
		if(userpass.length < 6){
		alert("密码必须多于或等于 6 个字符。\n");
		document.userfrm.pass.focus();
		return false;
		}
		//check if password contain illigal charactors.
		else if(illegalChars.test(userpass)){
		alert("密码包含非法字符");
		document.userfrm.pass.select();
		return false;
		}
		else if(userpass != ruserpass){
		alert("密码不符");
		document.userfrm.rpass.select();
		return false;
		}
		return true;
		}
		// Email Validation
		function emailcheck(){
		var usermail = document.userfrm.email.value;
		if(usermail.length == "0"){
		alert("Email 文本框为空")
		document.userfrm.email.focus();
		return false;
		}
		if( usermail.indexOf("@") < 0 || usermail.indexOf(".") < 0 || usermail.indexOf("@") > usermail.indexOf(".")){
		alert("Email 地址无效");
		return false;
		}
		return true;
		}
		function bdaycheck(){
		var bmonth = document.userfrm.bmon.value;
		var bday = document.userfrm.bday.value;
		var byear = document.userfrm.byear.value;
		//alert(bmonth + "/" + bday + "/" + byear);
		if(bmonth == "" || bday == "" || byear == "" || bday=="dd" || byear == "yyyy"){
		alert("请输入您的生日");
		document.userfrm.bmon.focus();
		return false;
		}
		for(i=0; i<bday.length; i++){
		var bnum = bday.substring(i,i+1)
		if(!(bnum < 9 || bnum > 0)){
		alert("生日无效");
		document.userfrm.bday.focus();
		return false;
		}
		}
		for(j=0; j<byear.length; j++){
		var bynum = byear.substring(j,j+1)
		if(!(bynum < 9 || bynum > 0)){
		alert("生日无效");
		document.userfrm.byear.focus();
		return false;
		}
		}
		//验证出生年月日是否在指定的范围内
		if (byear<1900||byear>2120){
		alert("您输入的出生年份超出范围！\n请重新输入！");
		document.userfrm.byear.focus();
		return(false);
		}
		else
		if(bmonth<0||bmonth>12){
		alert("您输入的月份超出范围！\n请重新输入！");
		document.userfrm.bmon.focus();
		return(false);
		}
		else
		if(bday<0||bday>31){
		alert("您输入的日期超出范围!\n请重新输入！");
		return(false);
		}
		return true;
		}
		//check sex
		function genderCheck(){
		var usergen = document.userfrm.gen.length;
		for(i=0;i<usergen;i++){
		if(document.userfrm.gen[i].checked){
		return true;
		}
		if (i==usergen-1){
		alert("请选择性别");
		return false;
		}
		}
		return true;
		}
		</script>
		<?php
			echo "<center>";
			switch($_GET['p']){
				case 2:
				echo "注册失败！";
				break;
			echo "</center>";
			}
		?>
		<table  align="center" cellspacing="15" cellpadding="0" style="background-color:white;">
		<form onsubmit="return validateform()" action="dozhuce.php"  method="post" name="userfrm">
		<tbody>
		<tr width="80%" align="center">
			<th colspan="2" >用 户 注 册</th>
		</tr>
	
		<tr class="register_table_line">
		<td width="160"  align="right">真实姓名：</td>
		<td align="left" bordercolor="#E7E3E7">
		<input id="lname" class="register_textBroader" type="text" size="24" name="lname">
		</td>
		</tr>
		<tr class="register_table_line">
		<td width="160"  align="right">账号：</td>
		<td align="left" bordercolor="#E7E3E7">
		<input id="sname" class="register_textBroader" type="text" size="24" name="sname">
		（可包含 a-z、0-9 和下划线）
		</td>
		</tr>
		<tr class="register_table_line">
		<td width="160"  align="right">密码：</td>
		<td align="left" bordercolor="#E7E3E7">
		<input id="pass" class="register_textBroader" type="password" size="26" name="pass">
		（至少包含 6 个字符）
		</td>
		</tr>
		<tr class="register_table_line">
		<td width="160"  align="right" height="0">再次输入密码：</td>
		<td align="left" height="0" bordercolor="#E7E3E7">
		<input id="rpass" class="register_textBroader" type="password" size="26" name="rpass">
		</td>
		</tr>
		<tr class="register_table_line">
		<td width="160"  align="right" height="0">电子邮箱：</td>
		<td align="left" height="0" bordercolor="#E7E3E7">
		<input id="email" class="register_textBroader" type="text" size="24" name="email">
		（必须包含 @ 字符）
		</td>
		</tr>
		<tr class="register_table_line">
		<td width="160"  align="right">性别：</td>
		<td align="left" bordercolor="#E7E3E7">
		<input type="radio" checked="" value="0" name="gen">男&nbsp;
		<input class="input" type="radio" value="1" name="gen">女
		</td>
		</tr>
		<tr>
			<th align='right'>电话:</th>
			<td><input type='text' name='phone'></td>
		</tr>
		<tr>
			<th align='right'> 邮编:</th>
			<td><input type='text' name='code'></td>
		</tr>
		<tr>
			<th align='right'>地址:</th>
			<td><input type='text' name='address' size='50'></td>
		</tr>
		<tr class="register_table_line">
		<td width="160"  align="right">爱好：</td>
		<td align="left" bordercolor="#E7E3E7">
		<label>
		<input type="checkbox" value="checkbox" name="checkbox">
		</label>
		运动&nbsp;&nbsp;
		<label>
		<input type="checkbox" value="checkbox" name="checkbox2">
		</label>
		聊天&nbsp;&nbsp;
		<label>
		<input type="checkbox" value="checkbox" name="checkbox22">
		</label>
		听音乐
		</td>
		</tr>
		<tr class="register_table_line">
		<td width="160"  align="right">出生日期：</td>
		<td align="left" bordercolor="#E7E3E7">
		<input id="byear" class="register_textBroader" maxlength="4" size="4" value="yyyy" onfocus="this.value=''" name="byear">
		&nbsp;年&nbsp;&nbsp;
		<select name="bmon">
		<option selected="" value="">[选择月份] </option>
		<option value="0">一月 </option>
		<option value="1">二月 </option>
		<option value="2">三月 </option>
		<option value="3">四月 </option>
		<option value="4">五月 </option>
		<option value="5">六月 </option>
		<option value="6">七月 </option>
		<option value="7">八月 </option>
		<option value="8">九月 </option>
		<option value="9">十月 </option>
		<option value="10">十一月 </option>
		<option value="11">十二月 </option>
		</select>
		&nbsp;月&nbsp;&nbsp;
		<input id="bday" class="register_textBroader" maxlength="2" size="2" value="dd" onfocus="this.value=''" name="bday">
		日
		</td>
		</tr>
		<tr class="register_table_line">
		<td width="160"  align="right" height="35">
		<input type="reset" value=" 重 填 " name="Reset">
		</td>
		<td align="left" height="35" bordercolor="#E7E3E7">
		<input type="submit" value="同意以下服务条款，提交注册信息" name="Button">
		</td>
		</tr>
		<tr>
		<td colspan="2">
		<table width="760" border="0">
		<tbody>
		<tr>
		<td height="36">
		<h4>
		<img width="50" height="40" src="lohas2.png">
		阅读乐活网服务协议
		</h4>
		</td>
		</tr>
		<tr>
		<td height="120">
		<textarea rows="6" cols="120" name="textarea">欢迎阅读服务条款协议，本协议阐述之条款和条件适用于您使用www.lohas.com网站的各种工具和服务。 本服务协议双方为乐活与乐活网用户，本服务协议具有合同效力。 乐活的权利和义务 1.乐活有义务在现有技术上维护整个网上交易平台的正常运行，并努力提升和改进技术，使用户网上交易活动的顺利。 2.对用户在注册使用乐活网上交易平台中所遇到的与交易或注册有关的问题及反映的情况，乐活应及时作出回复。 3.对于在乐活网网上交易平台上的不当行为或其它任何乐活认为应当终止服务的情况，乐活有权随时作出删除相关信息、终止服务提 供等处理，而无须征得用户的同意。 4.因网上交易平台的特殊性，乐活没有义务对所有用户的注册资料、所有的交易行为以及与交易有关的其他事项进行事先审查。 </textarea>
		</td>
		</tr>
		</tbody>
		</table>
		</td>
		</tr>
		</tbody>
		</form>
		</table>
	</div>
		
		<div id="foot">
		<div class="five">
		
		
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