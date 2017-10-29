<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
    include_once "core/config.php";
    if ($_REQUEST['tid']) {
        $_SESSION['tgid'] = $_REQUEST['tid'];
    }
    //echo $_REQUEST['tid'];
    ?>
    <title><?php echo $WebTitle ?></title>
    <meta name="description" content="<?php echo $WebTitle ?>一款将Q版风格演绎得淋漓尽致,画面梦幻,令人如痴如醉的仙侠页游"/>
    <meta name="keywords" content="<?php echo $WebTitle ?>,公益服,古剑奇侠公益服,古剑奇侠免费,古剑奇侠好玩吗,古剑奇侠无限元宝"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="./WebRes/Css/pintuer.css">
    <link rel="stylesheet" href="./WebRes/Css/my.css">
    <script src="./WebRes/Js/jquery.js"></script>
    <script src="./WebRes/Js/pintuer.js"></script>
    <!--[if lt IE 9]>
    <script src="./WebRes/Js/html5.js"></script><![endif]-->
    <!--[if IE 6]>
    <script src="./WebRes/Js/DD_belatedPNG.js"></script><![endif]-->
    <script src="./WebRes/Js/jquery.SuperSlide.2.1.1.js"></script>
    <script src="./WebRes/Js/layer.min.js"></script>
    <script src="./WebRes/Js/core.js"></script>
    <script src="./webres/js/cookie.js"></script>
    <script src="./WebRes/Js/respond.js"></script>
</head>
<body class="body_2">
<div class="main_bj">
    <div class="Cx_Nav">
        <div class="DH_Panel float-left">
            <?php
            require 'top.php';//引用模板
            ?>
        </div>
        <div class="User_Panel bg-main float-right">
            <img src="./webres/img/logo1.png" class="margin" width="80" height="80"/>

            <div class="margin float-right User_Xx">
                <strong class="text-white">亲爱的玩家,欢迎回家! </strong>
                <strong class="float-right margin-big-right">
                    <button class="button button-little bg-yellow"
                            onclick="OpenApp('%7B%22Url%22%3A%22app%5C%2Fsys%5C%2Flogin.php%22%2C%22title%22%3A%22%5Cu4f1a%5Cu5458%5Cu767b%5Cu9646%22%2C%22Is_Max%22%3A%220%22%2C%22W_w%22%3A%22480%22%2C%22W_h%22%3A%22350%22%2C%22fn%22%3A%22%22%7D'); ">
                        立即登陆
                    </button>
                    <button class="button button-little bg-dot"
                            onclick="OpenApp('%7B%22Url%22%3A%22app%5C%2Fsys%5C%2Freg.php%22%2C%22title%22%3A%22%5Cu4f1a%5Cu5458%5Cu6ce8%5Cu518c%22%2C%22Is_Max%22%3A%220%22%2C%22W_w%22%3A%22480%22%2C%22W_h%22%3A%22410%22%2C%22fn%22%3A%22%22%7D'); ">
                        马上注册
                    </button>
                </strong>
                <hr/>
                <div class="media-inline">
                    <div class="media text-center User_Login">
                        <p class="text-white">《<?php echo $WebTitle ?>》公益服 诚邀你的加入! </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="Main_Content" class="bg border border-main">
        <div class="margin">
            <p style="TEXT-ALIGN: center; PADDING-BOTTOM: 6px; PADDING-LEFT: 6px; PADDING-RIGHT: 6px; MARGIN-BOTTOM: 5px; BACKGROUND: #da434e; COLOR: #ffffff; FONT-SIZE: 18px; FONT-WEIGHT: bold; PADDING-TOP: 6px">
                &nbsp; &nbsp; <?php echo $WebTitle ?>:<?php echo $qq ?><br/></p>

            <p style="TEXT-ALIGN: center; PADDING-BOTTOM: 6px; PADDING-LEFT: 6px; PADDING-RIGHT: 6px; MARGIN-BOTTOM: 5px; BACKGROUND: #da434e; COLOR: #ffffff; FONT-SIZE: 18px; FONT-WEIGHT: bold; PADDING-TOP: 6px">
                &nbsp; &nbsp; <?php echo $WebTitle ?>正式开服，上线就首冲！<br/></p>

            <p style="TEXT-ALIGN: center; PADDING-BOTTOM: 6px; PADDING-LEFT: 6px; PADDING-RIGHT: 6px; MARGIN-BOTTOM: 5px; BACKGROUND: #31a66b; COLOR: #ffffff; FONT-SIZE: 18px; FONT-WEIGHT: bold; PADDING-TOP: 6px">
                本服独家,商城价格超低,长期稳定不关服,服务器已经续费1年！</p>

            <p style="TEXT-ALIGN: center; PADDING-BOTTOM: 6px; PADDING-LEFT: 6px; PADDING-RIGHT: 6px; MARGIN-BOTTOM: 5px; BACKGROUND: #6b51c0; COLOR: #ffffff; FONT-SIZE: 18px; FONT-WEIGHT: bold; PADDING-TOP: 6px"><?php echo $WebTitle ?>
                独家稀有网页游戏！</p>

            <p style="TEXT-ALIGN: center; PADDING-BOTTOM: 6px; PADDING-LEFT: 6px; PADDING-RIGHT: 6px; MARGIN-BOTTOM: 5px; BACKGROUND: #169ADA; COLOR: #ffffff; FONT-SIZE: 18px; FONT-WEIGHT: bold; PADDING-TOP: 6px">
                &nbsp; &nbsp; IE8以下浏览器用户游戏中出现黑屏问题或进不去？我们推荐您下载使用 <a title="http://chrome.360.cn/" target="_blank"
                                                                   href="http://chrome.360.cn/"><span
                        style="color:#ffff00">360急速浏览器</span></a> <a title="http://www.oupeng.com/operapc"
                                                                     target="_blank"
                                                                     href="http://www.oupeng.com/operapc"><span
                        style="color:#ffff00">欧朋浏览器</span></a> <a title="http://www.firefox.com.cn/" target="_blank"
                                                                  href="http://www.firefox.com.cn/"><span
                        style="color:#ffff00">火狐浏览器</span></a></p>

            <p></p>
            <blockquote class="border-main"><strong>本服特色<p>
                        独家福利：送<span style="color:#ff0000">首冲3000元宝(开启vip4)</span>，进入游戏送100000元宝 <br>
                </strong></p></blockquote>
            <p></p>
            <blockquote class="border-dot"><strong>推广赠送
                    <br/>推广：不累计、不接任何游戏推广群，只接游戏开服群，推广群一律无效！
                    <br/>推广：以后每日推广1个群=1000元宝,1个论坛=3000元宝！</strong></p></blockquote>
            <p></p>
            <blockquote class="quote border-yellow doc-quoteyellow"><strong>赞助优惠</strong>

                <p>充值比例1：3000元宝（充值后会员中心领取）----网银送10%,支付宝送8%，话费卡送5%<br/>

                <p>单笔充值满额送：50送5元，100送20元，200送60元，500送200元，1000送600元，1500送1200元，2000送2000元！<br/>
                </p>
            </blockquote>
            <p></p>
            <blockquote class="quote border-yellow doc-quoteyellow"><strong>版本介绍</strong>

                <p>活动全开，独家稀有网页游戏<br/>

                <p>复古仿官方版本，长久稳定服！<br/>

                <p>持续更新，添加新装备新玩法！<br/>

                <p>欢迎大家提供宝贵建议！<br/>
                </p>
            </blockquote>
            <p></p>
            <blockquote class="border-sub"><strong>如何获得首冲？</strong>

                <p>自行在会员中心领取元宝。</p><strong>如何获得元宝？</strong>

                <p>充值可获得元宝，推广可获得元宝。</p></blockquote>
            <p><span style="FONT-FAMILY: 微软雅黑, Microsoft YaHei"><br/></span></p>
        </div>
    </div>
</div>
<div class="bg-inverse" id="footer">
    <div class="navbar">
        <div class="navbar-body nav-navicon" id="navbar-footer">
            <div class="navbar-text"><?php echo $WebTitle ?>&nbsp;&nbsp;&nbsp;网站开发:(QQ:不知道)</div>
        </div>
    </div>
</div>
</body>
</html>
</tr>
</table>
