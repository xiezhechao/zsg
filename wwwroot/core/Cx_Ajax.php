<?php 
  include_once "config.php";
  $Action=$_REQUEST['Action'];
  $acc=$_POST['Uname'];
  $passwd=$_POST['Upass'];
  if($_SESSION['tgid'] || $_SESSION['tgid'] != ""){
  $tgsid=$_SESSION['tgid'];
  }else{
  $tgsid=="";
  }
  //echo $Action;
  //exit;
  if($Action=='czdh')
  {
  	    $sql2="select * from $database.account where name='".$_SESSION['accountName']."'";
		$result2=mysql_query($sql2); 
		$row2=mysql_fetch_array($result2);
		if($row2['dj']<=0)
		{
			$array = array("info"=> "元宝不足兑换失败！","status" => "n" ,"url" => "../../member.php");
			echo json_encode($array);
			exit;
		}
  	  	$orderid = get_order_sn();
	    $amount=$row2['dj'];
	    $userid=$_SESSION['accountName'];
		$skey="sdfasf484j4lpe8we4ev09as";
		$rmb=ceil($amount/10);
		$sig2=getsig2($userid.$orderid.$amount.$rmb,$skey);
	    $url="http://127.0.0.1:8101/charge?userid=".$userid."&orderid=".$orderid."&amount=".$amount."&rmb=".$rmb."&sig2=".$sig2."&plantID=1&serverID=1";
	    $timeout = array(  
	    'http'=> array(  
     		   'timeout'=>30//设置一个超时时间，单位为秒  
		    )  
		);  
		$ctx = stream_context_create($timeout);  
		$response=file_get_contents($url,0, $ctx);
		
		if ($response == "1") { 
			mysql_query("update account set dj=0 where name='".$_SESSION['accountName']."'");
			$array = array("info"=> "兑换成功！","status" => "y" ,"url" => "../../member.php");   
			echo json_encode($array);
			exit; 
		} else {
			$array = array("info"=> "兑换失败，异常代码：".$response."","status" => "n" ,"url" => "member.php");   
			echo json_encode($array);
			exit;	
		} 
  	  
  }
  	        if($Action=='czdh2')
  {
  	    $sql2="select * from $database.account where name='".$_SESSION['accountName']."'";
		$result2=mysql_query($sql2); 
		$row2=mysql_fetch_array($result2);
		if($row2['dj']<=0)
		{
			$array = array("info"=> "元宝不足兑换失败！","status" => "n" ,"url" => "../../member.php");
			echo json_encode($array);
			exit;
		}
  	  	$order_id = date("ymdHis").mt_rand(1000000, 9999999);
		$time = time();
		$data = array(
                	'server_id' 	=> 2,
                	'order_id'		=> $order_id,
					'qid' 			=> $_SESSION['accountName'],
					'order_amount' 	=> $row2['dj'],  //金额
					'sign' 			=> md5($_SESSION['accountName'].$row2['dj'].$order_id."2".$login_key)
                );
		
		$url = "http://192.168.200.100:8131/pay?" . http_build_query($data);
		//echo $url;
		$recharge_result = file_get_contents($url);
		$recharge_result = json_decode($recharge_result, true);
		if ($recharge_result['ret'] == 0) { 
			mysql_query("update account set dj=0 where name='".$_SESSION['accountName']."'");
			$array = array("info"=> "兑换成功！","status" => "y" ,"url" => "../../member.php");   
			echo json_encode($array);
			exit; 
		} else {
			$array = array("info"=> "兑换失败，异常代码：".$recharge_result."","status" => "n" ,"url" => "../../member.php");
			echo json_encode($array);
			exit;	
		} 
  	  
  }
      if($Action=='czdh3')
  {
  	    $sql2="select * from $database.account where name='".$_SESSION['accountName']."'";
		$result2=mysql_query($sql2); 
		$row2=mysql_fetch_array($result2);
		if($row2['dj']<=0)
		{
			$array = array("info"=> "元宝不足兑换失败！","status" => "n" ,"url" => "../../member.php");
			echo json_encode($array);
			exit;
		}
  	  	$order_id = date("ymdHis").mt_rand(1000000, 9999999);
		$time = time();
		$data = array(
                	'server_id' 	=> 3,
                	'order_id'		=> $order_id,
					'qid' 			=> $_SESSION['accountName'],
					'order_amount' 	=> $row2['dj'],  //金额
					'sign' 			=> md5($_SESSION['accountName'].$row2['dj'].$order_id."3".$login_key)
                );
		
		$url = "http://192.168.200.100:8131/pay?" . http_build_query($data);
		//echo $url;
		$recharge_result = file_get_contents($url);
		$recharge_result = json_decode($recharge_result, true);
		if ($recharge_result['ret'] == 0) { 
			mysql_query("update account set dj=0 where name='".$_SESSION['accountName']."'");
			$array = array("info"=> "兑换成功！","status" => "y" ,"url" => "../../member.php");   
			echo json_encode($array);
			exit; 
		} else {
			$array = array("info"=> "兑换失败，异常代码：".$recharge_result."","status" => "n" ,"url" => "../../member.php");
			echo json_encode($array);
			exit;	
		} 
  	  
  }

      if($Action=='czdh4')
  {
  	    $sql2="select * from $database.account where name='".$_SESSION['accountName']."'";
		$result2=mysql_query($sql2); 
		$row2=mysql_fetch_array($result2);
		if($row2['dj']<=0)
		{
			$array = array("info"=> "元宝不足兑换失败！","status" => "n" ,"url" => "../../member.php");
			echo json_encode($array);
			exit;
		}
  	  	$order_id = date("ymdHis").mt_rand(1000000, 9999999);
		$time = time();
		$data = array(
                	'server_id' 	=> 4,
                	'order_id'		=> $order_id,
					'qid' 			=> $_SESSION['accountName'],
					'order_amount' 	=> $row2['dj'],  //金额
					'sign' 			=> md5($_SESSION['accountName'].$row2['dj'].$order_id."4".$login_key)
                );
		
		$url = "http://61.147.96.102:8048/pay?" . http_build_query($data);
		//echo $url;
		$recharge_result = file_get_contents($url);
		$recharge_result = json_decode($recharge_result, true);
		if ($recharge_result['ret'] == 0) { 
			mysql_query("update account set dj=0 where name='".$_SESSION['accountName']."'");
			$array = array("info"=> "兑换成功！","status" => "y" ,"url" => "../../member.php");   
			echo json_encode($array);
			exit; 
		} else {
			$array = array("info"=> "兑换失败，异常代码：".$recharge_result."","status" => "n" ,"url" => "../../member.php");
			echo json_encode($array);
			exit;	
		} 
  	  
  }

  if($Action=='lqsc'){

$sql2="select * from $database.account where name='".$_SESSION['accountName']."'";
$result2=mysql_query($sql2); 
$row2=mysql_fetch_array($result2);
$SCDJ=$row2['dj'];
if ($row2['dj']<1) {
/* $json='{"Ret:"2,"Messgae":"The account already exists"}'; 
echo $json;  */
//{"info":"\u767b\u9646\u6210\u529f\uff0c\u70b9\u51fb\u786e\u5b9a\u540e\u81ea\u52a8\u8df3\u8f6c\u81f3\u4f1a\u5458\u4e2d\u5fc3!!","status":"y","url":"\../../member.php"}
$array = array("info"=> "您已经领取过首充，每个账号只能领取一次!","status" => "n" ,"url" => "../../index.php");
echo json_encode($array);
exit;	
}else{ 
mysql_query("insert into pay_info(paytouser,paygold) values ('".$_SESSION['accountName']."','".$SCDJ."')");
mysql_query("update account set dj=0 where name='".$_SESSION['accountName']."'");
$array = array("info"=> "领取成功!每个账号只能领取一次!","status" => "y" ,"url" => "../../member.php");   
//$array = array("Ret" => 1 ,"Messgae" => "login success");   
echo json_encode($array);
exit; 
} }  
  if($Action=='SignOut'){
logout();
$array = array("info"=> "用户退出系统成功!","status" => "y" ,"url" => "../../index.php");
//$array = array("Ret" => 1 ,"Messgae" => "login success");   
echo json_encode($array);
exit; 
}  
  if($Action=='Login'){
  $sql="SELECT * FROM $database.account WHERE `name`='".$acc."' and password = '".$passwd."'";
$result=mysql_query($sql);
$total=mysql_num_rows($result);
if ($total<1) {
/* $json='{"Ret:"2,"Messgae":"The account already exists"}'; 
echo $json;  */
//{"info":"\u767b\u9646\u6210\u529f\uff0c\u70b9\u51fb\u786e\u5b9a\u540e\u81ea\u52a8\u8df3\u8f6c\u81f3\u4f1a\u5458\u4e2d\u5fc3!!","status":"y","url":"\../../member.php"}
$array = array("info"=> "登陆失败，请检查帐号密码是否正确","status" => "n" ,"url" => "../../index.php");
echo json_encode($array);
exit;	
}else{ 

$_SESSION['accountName'] = $acc;
$array = array("info"=> "登陆成功，点击确定后自动跳转至会员中心!!","status" => "y" ,"url" => "../../member.php");   
//$array = array("Ret" => 1 ,"Messgae" => "login success");   
echo json_encode($array);
exit; 
} 

  }
  //http://g.941mai.com/core/Cx_Ajax.php?Action=EditPass  Scode http://g.941mai.com/core/Cx_Ajax.php?Action=FindPass
  if($Action=='EditPass'){
$Scode=$_POST['Scode'];
$row4=dbst($database,"account","name='".$_SESSION['accountName']."'");
if($Scode==$row4['Scode'])
{
$sql="update account set  password='".$passwd."' WHERE `name`='".$_SESSION['accountName']."'";
$result=mysql_query($sql);
$array = array("info"=> "密码修改成功，请重新登陆","status" => "y"); 
echo json_encode($array);
exit;
}else{
$array = array("info"=> "安全码不正确，不能修改","status" => "n" ); 
echo json_encode($array);
exit;	
}
}
  if($Action=='FindPass'){
$Scode=$_POST['Scode'];
$row4=dbst($database,"account","name='".$acc."'");
if($Scode==$row4['Scode'])
{
$sql="update account set  password='".$passwd."' WHERE `name`='".$acc."'";
$result=mysql_query($sql);
$array = array("info"=> "密码修改成功，请重新登陆","status" => "y"); 
echo json_encode($array);
exit;
}else{
$array = array("info"=> "安全码不正确，不能修改","status" => "n" ); 
echo json_encode($array);
exit;	
}
}
if($Action=='Register'){
$Scode=$_POST['Scode'];

$sql="SELECT * FROM account WHERE `name`='".$acc."'";
$result=mysql_query($sql);
$total=mysql_num_rows($result);
if ($total>0) {
/* $json='{"Ret:"2,"Messgae":"The account already exists"}'; 
echo $json;  */
$array = array("info"=> "帐号已经存在，请换其他用户","status" => "n" ); 
echo json_encode($array);
exit;	
}
$srcDataStr = date("Y-m-d H:i:s");
$ip = GetIP();
$sql="insert into account (name,password,last_login_ip,last_login_time,Scode) values ('".$acc."','".$passwd."','".$ip."','".$srcDataStr."','".$Scode."')";
$result=mysql_query($sql);
$_SESSION['accountName'] = $acc;
if($tgsid!=''){  
		$sql="select * from spread where ip='".$ip."' and tid='".passport_decrypt($tgsid,"nimabi")."'";
		$result=mysql_query($sql);	
		$total=mysql_num_rows($result);
		if(!$total>0){		
		$sql = "insert into spread values('".passport_decrypt($tgsid,"nimabi")."','".$acc."','".$ip."','0')";  	
		$result=mysql_query($sql);
		 //echo passport_decrypt($Sid,"nimabi");
		}	
	}
$array = array("info"=> "注册成功，点击确定后自动跳转至会员中心!!","status" => "y" ,"url" => "../../member.php");   
//$array = array("Ret" => 1 ,"Messgae" => "login success");   
echo json_encode($array);
exit; 
}

 function logout() {
	$_SESSION['accountName'] = '';
} 
function get_order_sn()
{
    $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
    $orderSn = $yCode[intval(date('Y')) - 2011].date('Ymd'). strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%04d%02d',rand(1000, 9999),rand(0,99));
    return $orderSn;
}
?> 