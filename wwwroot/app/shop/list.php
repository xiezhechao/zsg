<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="./WebRes/Css/pintuer.css">
<link rel="stylesheet" href="./WebRes/Css/my.css">
<script src="./WebRes/Js/jquery.js"></script>
<script src="./WebRes/Js/pintuer.js"></script>
<!--[if lt IE 9]><script src="./WebRes/Js/html5.js"></script><![endif]-->
<!--[if IE 6]><script src="./WebRes/Js/DD_belatedPNG.js"></script><![endif]-->
<script src="./WebRes/Js/jquery.SuperSlide.2.1.1.js"></script>
<script src="./WebRes/Js/layer.min.js"></script>
<script src="./WebRes/Js/core.js"></script>
<script src="./webres/js/cookie.js"></script>
<script src="./WebRes/Js/respond.js"></script></head>
	<body>
		<br><br>
<div class="container padding-big-left padding-big-right">
 	<strong class="text-yellow margin-top">天天《古剑奇侠》公益服--在线商城</strong> 
 	<strong class="text-yellow margin float-right">嗨,clzpb1  你当前的积分余额为:5</strong> 
	<hr class="bg-main" />
    <!--筛选列表-->
    <br>
    <div class="line-big margin-bottom border-bottom border-dotted">
          <dl class="margin clearfix">
            	<dd>
	            	<form method="GET">
	            	<ul class=" input-group ">
		            	   <div class="addbtn">
			          		<div class="button-group">
					            <button type="button" class="button bg-main dropdown-toggle">商品分类<span class="downward"></span></button>
					            <ul class="drop-menu">
						           <li><a href="?LB=0">默认</a></li><li><a href="?LB=1">常用</a></li><li><a href="?LB=2">宝石</a></li><li><a href="?LB=3">材料</a></li><li><a href="?LB=4">丹药</a></li><li><a href="?LB=5">时装</a></li><li><a href="?LB=6">坐骑</a></li><li><a href="?LB=7">宠物</a></li><li><a href="?LB=8">特卖</a></li><li><a href="?LB=9">礼包</a></li>					            </ul>
			          		</div>
				        </div> 
				        <div class="addbtn">
			          		<div class="button-group">
					            <button type="button" class="button bg-yellow dropdown-toggle">热门商品<span class="downward"></span></button>
					            <ul class="drop-menu">
						           <li><a href="?SP_Name=商品测试1">商品测试1</a></li><li><a href="?SP_Name=商品测试2">商品测试2</a></li><li><a href="?SP_Name=商品测试3">商品测试3</a></li>					            </ul>
			          		</div>
				        </div>    	
		            	<input type="text" class="input" name="SP_Name" value="" size="10" placeholder="关键词" />
		          		<span class="addbtn"><button type="submit" href="" class="button bg-dot"><span class="icon-search margin-right"></span>商品搜索</button></span>
	            	</ul>
	            	</form>
	            </dd>
          </dl>
          
    </div>
<div class="table">
	<table class="table table-bordered table-hover">
	  <tbody>
		  <tr><th>商品名称</th><th>商品说明</th><th>商品类别</th><th>消耗积分</th><th>商品操作</th></tr>
		  <tr><td width="14%">玫瑰情深</td><td width="46%" class="tips" data-toggle="hover" data-place="top" data-image="../../WebRes/shop/pic.png">生命+200000 攻击+10000 防御+16000</td><td width="10%">默认</td><td width="10%">1</td><td width="15%"><button class="button bg-red" onclick= "Buy_Item(90)" >立即购买</button></td></tr><tr><td width="14%">花舞红颜</td><td width="46%" class="tips" data-toggle="hover" data-place="top" data-image="../../WebRes/shop/pic.png">生命+400000 攻击+16000 防御+30000</td><td width="10%">默认</td><td width="10%">1</td><td width="15%"><button class="button bg-red" onclick= "Buy_Item(91)" >立即购买</button></td></tr><tr><td width="14%">秀韵芳华</td><td width="46%" class="tips" data-toggle="hover" data-place="top" data-image="../../WebRes/shop/pic.png">生命+200000 攻击+10000 防御+16000</td><td width="10%">默认</td><td width="10%">1</td><td width="15%"><button class="button bg-red" onclick= "Buy_Item(92)" >立即购买</button></td></tr><tr><td width="14%">4399三百战神</td><td width="46%" class="tips" data-toggle="hover" data-place="top" data-image="../../WebRes/shop/pic.png">生命+30000 攻击+3000 防御+3000 暴击+3000 命中+3000 坚韧+3000 破击+3000</td><td width="10%">默认</td><td width="10%">1</td><td width="15%"><button class="button bg-red" onclick= "Buy_Item(93)" >立即购买</button></td></tr><tr><td width="14%">91wan百服至尊</td><td width="46%" class="tips" data-toggle="hover" data-place="top" data-image="../../WebRes/shop/pic.png">生命+20000 攻击+2000 防御+2000 暴击+2000 命中+2000 坚韧+2000 破击+2000</td><td width="10%">默认</td><td width="10%">1</td><td width="15%"><button class="button bg-red" onclick= "Buy_Item(94)" >立即购买</button></td></tr><tr><td width="14%">古剑情义</td><td width="46%" class="tips" data-toggle="hover" data-place="top" data-image="../../WebRes/shop/pic.png">生命+1000000 攻击+100000 防御+100000 火抗+100000 雷抗+100000 冰抗+100000</td><td width="10%">默认</td><td width="10%">75000</td><td width="15%"><button class="button bg-red" onclick= "Buy_Item(100)" >立即购买</button></td></tr><tr><td width="14%">梦中红颜</td><td width="46%" class="tips" data-toggle="hover" data-place="top" data-image="../../WebRes/shop/pic.png">生命+200000 攻击+20000 防御+20000 火抗+20000 雷抗+20000 冰抗+20000</td><td width="10%">默认</td><td width="10%">5000</td><td width="15%"><button class="button bg-red" onclick= "Buy_Item(101)" >立即购买</button></td></tr><tr><td width="14%">古剑美姬</td><td width="46%" class="tips" data-toggle="hover" data-place="top" data-image="../../WebRes/shop/pic.png">生命+200000 攻击+20000 防御+20000 火抗+20000 雷抗+20000 冰抗+20000</td><td width="10%">默认</td><td width="10%">5000</td><td width="15%"><button class="button bg-red" onclick= "Buy_Item(102)" >立即购买</button></td></tr><tr><td width="14%">古剑娇娥</td><td width="46%" class="tips" data-toggle="hover" data-place="top" data-image="../../WebRes/shop/pic.png">生命+200000 攻击+20000 防御+20000 火抗+20000 雷抗+20000 冰抗+20000</td><td width="10%">默认</td><td width="10%">5000</td><td width="15%"><button class="button bg-red" onclick= "Buy_Item(103)" >立即购买</button></td></tr><tr><td width="14%">双百至尊</td><td width="46%" class="tips" data-toggle="hover" data-place="top" data-image="../../WebRes/shop/pic.png">生命+200000 攻击+20000 防御+20000 火抗+20000 雷抗+20000 冰抗+20000</td><td width="10%">默认</td><td width="10%">5000</td><td width="15%"><button class="button bg-red" onclick= "Buy_Item(104)" >立即购买</button></td></tr>		</tbody>
	</table>
	<br><br>
	<div class='container text-center'><ul class='pagination border-main pagination-big'><li class='margin-left disabled'><a href='#' class='next'>上一条</a></li><li class='margin-left disabled'><a href='#' class='first'>首页</a></li><li class='active margin-left'><a href='#'>1</a></li><li class='margin-left'><a href='?LB=999&page=2'>2</a></li><li class='margin-left'><a href='?LB=999&page=3'>3</a></li><li class='margin-left'><a href='?LB=999&page=4'>4</a></li><li class='margin-left'><a href='?LB=999&page=5'>5</a></li><li class='margin-left'><a href='?LB=999&page=6'>6</a></li><li class='margin-left'><a href='?LB=999&page=7'>7</a></li><li class='margin-left'><a href='?LB=999&page=8'>8</a></li><li class='margin-left'><a href='?LB=999&page=9'>9</a></li><li class='margin-left'><a href='?LB=999&page=14' class='last'>尾页</a></li><li class='margin-left'><a href='?LB=999&page=2' class='next'>下一条</a></li></ul></div>	<br><br><br>
	
</div>
  

</div>
<script type="text/javascript">
	function Buy_Item(GID) {//ajax 提交整个表单
		layer.confirm('确定要购买该商品吗?', function(){
			var loadi = layer.load(0); 
			Tjdata={GID:GID};//序列化表单选项
			$("#S_GameUser").empty(); 
			DoAjax("ajax.php?Action=ShopBuy",Tjdata,function (data) {
				if(data.status == 'y'){
					layer.alert(data.info, 1, function(){
					   window.location.reload();
					});	
				}else{
					layer.alert(data.info, 5, '温馨提示!');
				}
				layer.close(loadi);
			});
		});
	}
</script>
</body>
</html>