<?php
include_once "../../core/config.php";
//
//Rid:4506898162254646   获取的角色ID
$U_DH_Num=$_POST['U_DH_Num'];
if($U_DH_Num<0){
$array = array("info"=>"元宝不能小于0！","status"=>"n");    
echo json_encode($array);
exit;
}
$Action=$_GET['Action'];
$serverid=$_POST['FQ'];
if($Action=='Get_GameUser'){
//<label class="button margin-top"><input name="Rid" value="4506898162254646"  type="radio" data-validate="radio:请选择游戏角色"> 燕唯松</label>
$array = array("status"=>"y","html"=>"<label class=\"button margin-top\"><input name=\"Rid\" value=\"4506898162254646\"  type=\"radio\" data-validate=\"radio:请选择游戏角色\"> s".$serverid.".".$_SESSION['accountName']."</label>");   
echo json_encode($array);
exit;
}


if($Action=='DHYB'){
$sql="SELECT a.name FROM $database.account a,$database.spread b,octgame.player c WHERE b.tid='".$_SESSION['accountName']."' and b.lid=a.`name` AND a.`name`=c.account  AND c.lv>=".$lv." and b.islq=0";
	$instr = "";
	$result=mysql_query($sql);
	$tgnum=mysql_num_rows($result);
	while($c=mysql_fetch_array($result)){
	$instr.= "'".$c[0]."'".",";
}
$instr.="'9999999999999999999999999999'";
	$yuanbao=$tgnum*$tgyuanbao;
if ($tgnum<1){
	$array = array("info"=>"你推广数不足无法兑换！","status"=>"n");    
echo json_encode($array);
exit;
	}else{
	$sql="update $database.spread set islq=1 where lid in ($instr)";
	  $result=mysql_query($sql);
	$sql="INSERT INTO $database.`pay_info` (`paytouser`, `paygold`) VALUES ('".$_SESSION['accountName']."', '".$yuanbao."')";
	$result=mysql_query($sql);
	$array = array("info"=>"兑换元宝成功，请进入游戏查收","status"=>"y");    
	echo json_encode($array);
	exit;
}

}

?>