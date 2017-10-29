<?php
session_start();
$WebTitle='三国志';
//$weburl='http://127.0.0.1/';   //游戏地址，结尾要带/
$weburl='http://127.0.0.1/webgames/zsg/wwwroot/';
$wwwurl='http://127.0.0.1/';   //官方网址，结尾要带/
$db_type='mysql';
$db_charset='utf8';
$db_host='127.0.0.1';
$db_username='root';
$db_password='root';
$database='zsg_web';
$database1='zsg_rc';
$database2='db_zl_game';
$tgyuanbao='1';         //每个IP获得元宝数
$lv='20';   //推广到达等级
$kg='1';   //游戏是否开启，1：开启，0：没有开启
$maxnum="20000";   //单个IP最大注册次数
$qq='QQ群: 客服QQ:'; //客服QQ、YY等  QQ群:1234 QQ:1234
//////////////////充值接口/////////
$yxjiekou="http://127.0.0.1/game.html";
$pay_key='7eecb09bc1d7861f0e260d703743cfec';
$login_key='ZD05OTk5';
///////////////////////////
$adapp="http://127.0.0.1";  //安卓app下载链接
$pgapp="http://127.0.0.1";	//苹果app下载链接
//
$roleset="http://127.0.0.1/selectUser.php";
$rolekey="7eecb09bc1d7861f0e260d703743cfec";



$tgurl="";
if(empty($tgurl)) $url_this = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
else $url_this =$tgurl;
$conn = @mysql_connect("$db_host","$db_username","$db_password") or die ("服务器维护中~详情联系 ".$qq."。");
@mysql_select_db("$database",$conn) or die ("数据库表不存在或者未连接。请联系管理员 。");
mysql_query("set names UTF8"); //使用文件编码，防止出错
function getIP()
{
if(!empty($_SERVER["HTTP_CLIENT_IP"]))
   $ip = $_SERVER["HTTP_CLIENT_IP"];
else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
   $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
else if(!empty($_SERVER["REMOTE_ADDR"]))
   $ip = $_SERVER["REMOTE_ADDR"];
else
   $ip = "无法获取！";
return $ip;
}

function passport_encrypt($txt, $key) { 
srand((double)microtime() * 1000000); 
$encrypt_key = md5(rand(0, 32000)); 
$ctr = 0; 
$tmp = ''; 
for($i = 0;$i < strlen($txt); $i++) { 
$ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr; 
$tmp .= $encrypt_key[$ctr].($txt[$i] ^ $encrypt_key[$ctr++]); 
} 
return base64_encode(passport_key($tmp, $key)); 
} 

function passport_decrypt($txt, $key) { 
$txt = passport_key(base64_decode($txt), $key); 
$tmp = ''; 
for($i = 0;$i < strlen($txt); $i++) { 
$md5 = $txt[$i]; 
$tmp .= $txt[++$i] ^ $md5; 
} 
return $tmp; 
} 

function passport_key($txt, $encrypt_key) { 
$encrypt_key = md5($encrypt_key); 
$ctr = 0; 
$tmp = ''; 
for($i = 0; $i < strlen($txt); $i++) { 
$ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr; 
$tmp .= $txt[$i] ^ $encrypt_key[$ctr++]; 
} 
return $tmp; 
}

function dbst($db,$table,$type) {
$dbselect=mysql_query("SELECT * FROM `$db`.`$table` where $type");
$rowdbselect=mysql_fetch_array($dbselect);
return $rowdbselect;
}
function dbgx($db,$table,$type,$type1) {
$dbgengxin=mysql_query("UPDATE `$db`.`$table` set $type where $type1");
return $dbgengxin;
}
function sysmd5($str,$key='',$type='sha1'){
	$key =  $key ?  $key : '702042941817d99ec8625d4deea81043';
	//return $key;
	return hash ( $type, $str.$key );
} 
function loginurl($webapiurl,$acc,$key){
	$acc = $acc;//	login_account(帐号)
	$t = time();//login_time(登录时间戳)	
	$s = md5($acc . $t . "0".$key);
    $r = "{$webapiurl}?&user={$acc}&time={$t}&flag={$s}";
    return $r;
}

function pay($acc,$yb,$order_id,$server){
    $s['type'] = 1;
    $s['order_id'] = $order_id;
    $s['appkey'] = '8aa6198d3f158e44013f1d842b7849gg';
	$s['login_account'] = $acc;//	login_account(帐号)
	$s['login_time'] = time();//login_time(登录时间戳)
	$s['money'] = $yb;
    $s['server'] = $server;//server(服务器id，从1开始)
	ksort($s);
    //reset($s);
    //var_dump($s);
    $ss = "test_1353515541.01".$s['login_account']."{$yb}".$server.$s['login_time']."8aa6198d3f158e44013f1d842b7849f2";
    $ss = md5($ss);
    $r = "http://127.0.0.1/request?cmd=user_charge&PayToUser=".$s['login_account']."&ServerId=".$s['server']."&PayGold={$yb}&PayMoney=100&PayTime=".$s['login_time']."&PayNum=test_1353515541.01&ticket={$ss}";
	//exit($r);
    @file_get_contents($r);
 
}
function getsig2($str,$key){
	$len=15;
	$sig=md5($str.$key);
	$sig1=strrev(substr($sig,0,$len));
	$sig2=strrev(substr($sig,$len+1));
	return $sig1.$sig2;
}
?>
