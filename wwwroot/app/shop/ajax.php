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

if($serverid==0){
if($Action=='GoShop'){
$array = array("status"=> "y","Url"=> "list.php");
echo json_encode($array);
exit;
}

}
//GID:90
if($serverid==0){
if($Action=='ShopBuy'){
$GID=$_POST['GID'];
$array = array("info"=>"客官你购买的物品,已经送达!!.","status"=> "y");
echo json_encode($array);
exit;
}

}
?>