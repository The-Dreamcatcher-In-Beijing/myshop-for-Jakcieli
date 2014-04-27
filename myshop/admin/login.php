<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<<html xmlns="http://www.w3.org/1999/xhtml"><head id="Head1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css">
	   BODY
        {
            font-size: 12px;
            color: #ffffff;
            font-family: 宋体;
        }
        TD
        {
            font-size: 12px;
            color: #ffffff;
            font-family: 宋体;
        }
    </style>
    <meta content="MSHTML 6.00.6000.16809" name="GENERATOR">
</head>
<body>
   
    <script type="text/javascript">
<!--
var theForm = document.forms['form1'];
if (!theForm) {
    theForm = document.form1;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
// -->
    </script>

    <script src="login_files/WebResource.axd" type="text/javascript"></script>

    <script src="login_files/WebResource(1).axd" type="text/javascript"></script>

    <script src="login_files/ScriptResource.axd" type="text/javascript"></script>

    <script src="login_files/ScriptResource(1).axd" type="text/javascript"></script>

    <script type="text/javascript">
<!--
function WebForm_OnSubmit() {
if (typeof(ValidatorOnSubmit) == "function" && ValidatorOnSubmit() == false) return false;
return true;
}
// -->
    </script>

    <script type="text/javascript">
//<![CDATA[
Sys.WebForms.PageRequestManager._initialize('ScriptManager1', document.getElementById('form1'));
Sys.WebForms.PageRequestManager.getInstance()._updateControls(['tUpdatePanel1'], [], [], 90);
//]]>
    </script>

    <div id="UpdatePanel1">
        <div id="div1" style="left: 0px; position: absolute; top: 0px; background-color: #0066ff">
        </div>
        <div id="div2" style="left: 0px; position: absolute; top: 0px; background-color: #0066ff">
        </div>

        <script language="JavaScript"> 
var speed=20;
var temp=new Array(); 
var clipright=document.body.clientWidth/2,clipleft=0 
for (i=1;i<=2;i++){ 
	temp[i]=eval("document.all.div"+i+".style");
	temp[i].width=document.body.clientWidth/2;
	temp[i].height=document.body.clientHeight;
	temp[i].left=(i-1)*parseInt(temp[i].width);
} 
function openit(){ 
	clipright-=speed;
	temp[1].clip="rect(0 "+clipright+" auto 0)";
	clipleft+=speed;
	temp[2].clip="rect(0 auto auto "+clipleft+")";
	if (clipright<=0)
		clearInterval(tim);
} 
tim=setInterval("openit()",100);
        </script>

        <div>
            &nbsp;&nbsp;
        </div>
        <div>
		<form action='doLogin.php' method='post'>
            <table cellspacing="0" cellpadding="0" width="900" align="center" border="0">
                <tbody>
                    <tr>
                        <td style="height: 105px">
                            <img src="login_files/login_1.gif" border="0">
                        </td>
                    </tr>
                    <tr>
                        <td background="login_files/login_2.jpg" height="300">
						
                            <table height="300" cellpadding="0" width="900" border="0">
                                <tbody>
                                    <tr>
                                        <td colspan="2" height="35">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="360">
                                        </td>
                                        <td>
                                            <table cellspacing="0" cellpadding="2" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="height: 28px" width="80" >
                                                            <span style="color:black;">登 录 名：</span>
                                                        </td>
                                                        <td style="height: 28px" width="150">
                                                            <input id="txtName" style="width: 130px" name="username">
                                                        </td>
                                                        <td style="height: 28px" width="370">
                                                            <span id="RequiredFieldValidator3" style="font-weight: bold; visibility: hidden;
                                                                color: white">请输入登录名</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="height: 28px">
                                                            <span style="color:black">登录密码：</span>
                                                        </td>
                                                        <td style="height: 28px">
                                                            <input id="txtPwd" style="width: 130px" type="password" name="userpass">
                                                        </td>
                                                        <td style="height: 28px">
                                                            <span id="RequiredFieldValidator4" style="font-weight: bold; visibility: hidden;
                                                                color: white">请输入密码</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="height: 28px">
                                                          <span style="color:black;">  验证码：</span>
                                                        </td>
                                                        <td style="height: 28px">
                                                            <input id="txtcode" style="width: 130px" name="usercode">
													<img src='../public/code.php' height='30' onclick="javascript:this.src='../public/code.php?tm='+Math.random()" >
                                                        </td>
                                                        <td style="height: 28px">
                                                            &nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="height: 18px">
                                                        </td>
                                                        <td style="height: 18px">
                                                        </td>
                                                        <td style="height: 18px">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        </td>
                                                        <td>
                                                           <input type='submit' value='登陆'style='border-style:none;'> &nbsp;&nbsp;
                                                           <input type='reset' value='重置' style='border-style:none;'>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
													<?php
																	
																	
													//登陆错误信息提示
													switch($_GET['eno']){
														case 1:$info="不是后台有效管理账户";break;
														case 2:$info="验证码错误";break;
														case 3:$info="账号或密码错误";break;
													}
														echo "<span style='color:red'>{$info}</span>";
													?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
						
                        </td>
                    </tr>
                </tbody>
            </table>
			</form>
        </div>
    </div>

    <script type="text/javascript">
<!--
var Page_Validators =  new Array(document.getElementById("RequiredFieldValidator3"), document.getElementById("RequiredFieldValidator4"));
// -->
    </script>

    <script type="text/javascript">
<!--
var RequiredFieldValidator3 = document.all ? document.all["RequiredFieldValidator3"] : document.getElementById("RequiredFieldValidator3");
RequiredFieldValidator3.controltovalidate = "txtName";
RequiredFieldValidator3.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
RequiredFieldValidator3.initialvalue = "";
var RequiredFieldValidator4 = document.all ? document.all["RequiredFieldValidator4"] : document.getElementById("RequiredFieldValidator4");
RequiredFieldValidator4.controltovalidate = "txtPwd";
RequiredFieldValidator4.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
RequiredFieldValidator4.initialvalue = "";
// -->
    </script>



    <script type="text/javascript">
<!--
var Page_ValidationActive = false;
if (typeof(ValidatorOnLoad) == "function") {
    ValidatorOnLoad();
}

function ValidatorOnSubmit() {
    if (Page_ValidationActive) {
        return ValidatorCommonOnSubmit();
    }
    else {
        return true;
    }
}
// -->
    </script>

    <script type="text/javascript">
<!--
Sys.Application.initialize();
// -->
    </script>

  
</body>
</html>
