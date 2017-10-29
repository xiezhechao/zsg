<?php

   include_once "../inc/config.inc.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三国志-1服</title>
<script type="text/javascript" src="http://web.game-center.youkia.com/templates/js/js/jquery.min.js"></script>

<style type="text/css">
<!--Smarty-->	
html{
height:100%;
}
<!--Smarty-->	
</style>
</head>

<body style="margin:0; padding:0;  background:#000;" bgcolor="transprent">
<div id="game_flash" style="color:#fff;">正在登陆...<br />如果长时间未响应，请刷新页面重试!</div>	
<script language="javascript">
//document.domain='youkia.com';
var game_login_url = '<?php echo $_SESSION["ssurl"]?>';
var flashvars = '';
var platform_pay_url = 'http://res.li991.com/';
var userid='<?php echo $_SESSION["accountName"]?>';
var flash_url = "http://res.li991.com/client/index.swf?"+Math.random();
var game_str='<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0"  width="" height="" id="game_swf_1" align="middle" SCALE="noscale">';
	game_str+='<param name="quality" value="high" /><param name="bgcolor" value="#000000" /><param value="window" name="wmode"><param name="allowScriptAccess" value="always" /><param name="movie" value="'+flash_url+'" /><param name="SCALE" value="noscale"> <param name="flashvars" value="plantID=1&serverID=1&&game_sid" /><param name="base" value="'+flash_url+'" /> <embed  width="" bgcolor="#000000" height="" allowScriptAccess="always" type="application/x-shockwave-flash" wmode="window" id="game_swf_2" flashvars="plantID=1&serverID=1&&game_sid" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" swliveconnect="true" quality="high" src="http://res.li991.com/client/index.swf?'+Math.random()+'" base="http://res.li991.com/client/index.swf?'+Math.random()+'"/></object>';

var swf_img = new Image();
swf_img.src=flash_url;

<!--Smarty-->	
String.prototype.replaceAll = function(s1,s2) { 
    return this.replace(new RegExp(s1,"gm"),s2); 
}

$(document).ready(function(){
	$.getJSON(game_login_url+'&jsoncallback=?',function(data){
		if(data.sid)
		{
			$.each(data, function(k, v) {
				flashvars+=k+'='+v+'&';
			});
			
			flashvars=flashvars.replaceAll('\\$','$$$$');
			game_str=game_str.replaceAll('game_sid',flashvars);
			$('#game_flash').remove();
			$("body").prepend(game_str);
			
			resizeFlash();
		}
		else
		{
			$('#game_flash').html(data.error);
		}
		//setPageHeight();
	});
});

$(window).resize(function(){
  resizeFlash();
}); 

function resizeFlash()
{
	var height=$(window).height();
	var width=$(window).width();
	$('#game_swf_1').attr('height',height);
	$('#game_swf_2').attr('height',height);
	$('#game_swf_1').attr('width',width);
	$('#game_swf_2').attr('width',width);
}

//充值
function gameCenterApi(type,value)
{
	switch(type)
	{
		case 'pay':
		{
			window.open(platform_pay_url);

			break;
		}
	}	
}



function setText()
{
    var t=document.getElementById("share_link_url"); 
    t.select();  
    try{
        window.clipboardData.setData('text',t.createTextRange().text); 
        alert('复制成功，现在你可以在QQ窗口中使用Ctrl+V将地址发给好友了！'); 
    }catch(e){
        alert('你的浏览器不支持自动复制，请手动使用Ctrl+C复制！');
    } 
}


var me;

function getFlash()
{
	if (navigator.appName.indexOf("Microsoft") != -1)
	{
		return window["game_swf_1"];
	} 
	else 
	{
		return document["game_swf_2"];
	}
	
}
function start(){
	
	me=getFlash();
	
}
window.onbeforeunload = onbeforeunload_handler;   
function onbeforeunload_handler(){
	me.close();
}

/*window.onbeforeunload = function () 
{ 
	var browser = navigator.appName;
	var showinfo=me.showInfo();
	if (showinfo !='') 
	{
		if (browser == "Netscape") 
		{
				return showinfo;
		}
		else 
		{
				window.event.returnValue = showinfo;
		}
	}
}*/

<!--Smarty-->	
</script>
</body>
</html>