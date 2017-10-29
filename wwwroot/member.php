<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
    include_once "core/config.php";
    $row4 = dbst($database, "account", "name='" . $_SESSION['accountName'] . "'");
    if (!$_SESSION['accountName']) exit("<script> alert('请登陆后使用！');location.href='index.php';</script>");
    $sql = "SELECT a.name FROM $database.account a,$database.spread b,octgame.player c WHERE b.tid='" . $_SESSION['accountName'] . "' and b.lid=a.`name` AND a.`name`=c.account  AND c.lv>=" . $lv . " and b.islq=0";
    $result = mysql_query($sql);
    $tgnum = mysql_num_rows($result);
    $yuanbao = $tgnum * $tgyuanbao;
    $sql2 = "select * from $database.account where name='" . $_SESSION['accountName'] . "'";
    $result2 = mysql_query($sql2);
    $row2 = mysql_fetch_array($result2);
    $SCDJ = $row2['dj'];
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
    <script src="./WebRes/js/cookie.js"></script>
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
            <img src="./WebRes/img/logo1.png" class="margin" width="80" height="80"/>

            <div class="margin float-right User_Xx">
                <strong class="text-white">嗨! <strong class="text-dot"><?php echo $_SESSION['accountName'] ?></strong>
                    欢迎回家! </strong>
                <strong class="float-right margin-big-right">
                    <a class="button button-little bg-yellow" href="/Spread.php">我要推广</a>
                    <!--<button class="button button-little bg-dot" onclick="Ajax_Action('','lqsc')">领取首充</button>-->
                    <button class="button button-little bg-sub"
                            onclick="OpenApp('%7B%22Url%22%3A%22%5C%2Fapp%5C%2Fsys%5C%2Feditpass.php%22%2C%22title%22%3A%22%5Cu4fee%5Cu6539%5Cu5bc6%5Cu7801%22%2C%22Is_Max%22%3A%220%22%2C%22W_w%22%3A%22480%22%2C%22W_h%22%3A%22350%22%2C%22fn%22%3A%22%22%7D'); ">
                        修改密码
                    </button>
                    <button class="button button-little bg-dot" onclick="Ajax_Action('','SignOut')">退出系统</button>
                </strong>
                <hr/>

            </div>
        </div>
    </div>
    <div id="Main_Content" class="bg border border-main">
        <div class="margin">
            <div class="container-layout">
                <br>

                <div class="tab" data-toggle="hover">
                    <div class="media-inline">
                        <div class="media text-center User_Login">
                            <div class="txt bg-main" title="用户当前未领取的充值元宝"><strong><?php echo $SCDJ ?></strong><br>未领元宝
                            </div>
                        </div>
                        <button class="button button-little bg-dot" onclick="Ajax_Action('','czdh')">[一区]充值兑换</button>
                        <!--<button class="button button-little bg-dot" onclick="Ajax_Action('','czdh2')">[二区]充值兑换</button>
                        <button class="button button-little bg-dot" onclick="Ajax_Action('','czdh3')">[三区]充值兑换</button>
                        <button class="button button-little bg-dot" onclick="Ajax_Action('','czdh4')">[四区]充值兑换</button>-->
                    </div>
                    <div class="tab-head">
                        <ul class="tab-nav ">
                            <li class="active"><a href="#tab-0">游戏应用</a></li>
                            <!--li class="margin-left"><a href="#tab-1">休闲应用</a></li><li class="margin-left"><a href="#tab-2">特权应用</a--></li>
                        </ul>
                    </div>
                    <div class="tab-body">
                        <div class="tab-panel active" id="tab-0">
                            <div class="line-small ">
                                <div class="x4">
                                    <div class="pro radius-big  border border-dashed border-small ">
                                        <div class="wait"><a href="game.php"><img
                                                    src="./WebRes/img/gcds-dragon-512.png"/></a>

                                            <div class="margin-big-top">
                                                <a href="game.php"
                                                   class="button button-block  button-big bg-main">开始游戏</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="x4">
                                <div class="pro radius-big  border border-dashed border-small " >
                                <div class="wait"><a href="http://925wan.com/925%E7%8E%A9%E9%A1%B5%E6%B8%B8%E5%B9%B3%E5%8F%B0.exe"  target="_black" ><img src="./WebRes/img/wdxz.png" /></a>
                                <div class="margin-big-top">
                                <a href="http://925wan.com/925%E7%8E%A9%E9%A1%B5%E6%B8%B8%E5%B9%B3%E5%8F%B0.exe"  target="_black" class="button button-block  button-big bg-main">微端下载</a>
                                </div>
                                </div>
                                </div>
                                </div><!--
                                <div class="x4">
                                <div class="pro radius-big  border border-dashed border-small " >
                                <div class="wait"><img src="./WebRes/img/gcds-red-envelope-512.png" />
                                <div class="margin-big-top">
                                <a onclick="OpenApp('%7B%22Url%22%3A%22%5C%2Fapp%5C%2Fdh%5C%2Findex.php%22%2C%22title%22%3A%22%5Cu5145%5Cu503c%5Cu5151%5Cu6362%22%2C%22Is_Max%22%3A%220%22%2C%22W_w%22%3A%22600%22%2C%22W_h%22%3A%22600%22%2C%22fn%22%3A%22%22%7D');" class="button button-block  button-big bg-main">推广兑换</a>
                                </div>
                                </div>
                                </div>
                                </div><!--div class="x4"><div class="pro radius-big  border border-dashed border-small " ><div class="wait"><img src="./WebRes/img/gcds-lantern-512.png" /><div class="margin-big-top"><a onclick="OpenApp('%7B%22Url%22%3A%22%5C%2Fapp%5C%2Fshop%5C%2F%22%2C%22title%22%3A%22%5Cu79ef%5Cu5206%5Cu5546%5Cu57ce+%28%5Cu79ef%5Cu5206%5Cu8d2d%5Cu88c5%5Cu5907%29%22%2C%22Is_Max%22%3A%220%22%2C%22W_w%22%3A%221280%22%2C%22W_h%22%3A%22750%22%2C%22fn%22%3A%22%22%7D');" class="button button-block  button-big bg-main">积分商城 (积分购装备)</a></div></div></div></div-->
                                <!--div class="x4"><div class="pro radius-big  border border-dashed border-small " ><div class="wait"><img src="./WebRes/img/gcds-firecracker-512.png" /><div class="margin-big-top"><a onclick="OpenApp('%7B%22Url%22%3A%22http%3A%5C%2F%5C%2Fw.qq.com%22%2C%22title%22%3A%22%5Cu7f51%5Cu9875QQ%22%2C%22Is_Max%22%3A%220%22%2C%22W_w%22%3A%22500%22%2C%22W_h%22%3A%22650%22%2C%22fn%22%3A%22%22%7D');" class="button button-block  button-big bg-main">网页QQ</a></div></div></div></div><!--div class="x4"><div class="pro radius-big  border border-dashed border-small " ><div class="wait"><img src="./WebRes/img/gcds-fudao-512.png" /><div class="margin-big-top"><a href="/yy.com/25369000" target="_blank" class="button button-block button-big bg-main">官方歪歪</a></div></div></div></div><div class="x4"><div class="pro radius-big  border border-dashed border-small " ><div class="wait"><img src="./WebRes/img/gcds-firecracker-512.png" /><div class="margin-big-top"><a href="/www.sougm.com/index.php?s=/group/index/group/id/20.html" target="_blank" class="button button-block button-big bg-main">官方论坛</a></div></div></div></div></div></div><div class="tab-panel" id="tab-1"><div class="line-small "><div class="x4"><div class="pro radius-big  border border-dashed border-small " ><div class="wait"><img src="./WebRes/img/music.png" /><div class="margin-big-top"><a onclick="OpenApp('%7B%22Url%22%3A%22http%3A%5C%2F%5C%2Fdouban.fm%5C%2Fpartner%5C%2Fbaidu%5C%2Fdoubanradio%22%2C%22title%22%3A%22%5Cu5929%5Cu5929%5Cu7535%5Cu53f0%22%2C%22Is_Max%22%3A%220%22%2C%22W_w%22%3A%22480%22%2C%22W_h%22%3A%22260%22%2C%22fn%22%3A%22%22%7D');" class="button button-block  button-big bg-main">休闲电台</a></div></div></div></div><div class="x4"><div class="pro radius-big  border border-dashed border-small " ><div class="wait"><img src="./WebRes/img/cinema.png" /><div class="margin-big-top"><a onclick="OpenApp('%7B%22Url%22%3A%22http%3A%5C%2F%5C%2Fwww.qiyi.com%5C%2Fmini%5C%2Fqplus.html%22%2C%22title%22%3A%22%5Cu5929%5Cu5929%5Cu5f71%5Cu9662%22%2C%22Is_Max%22%3A%220%22%2C%22W_w%22%3A%22980%22%2C%22W_h%22%3A%22680%22%2C%22fn%22%3A%22%22%7D');" class="button button-block  button-big bg-main">休闲影院</a></div></div></div></div><div class="x4"><div class="pro radius-big  border border-dashed border-small " ><div class="wait"><img src="./WebRes/img/tv.png" /><div class="margin-big-top"><a onclick="OpenApp('%7B%22Url%22%3A%22http%3A%5C%2F%5C%2Fapp.aplus.pptv.com%5C%2Ftgapp%5C%2Fbaidu%5C%2Flive%5C%2Fmain%22%2C%22title%22%3A%22%5Cu5929%5Cu5929TV%5Cu76f4%5Cu64ad%22%2C%22Is_Max%22%3A%220%22%2C%22W_w%22%3A%22802%22%2C%22W_h%22%3A%22575%22%2C%22fn%22%3A%22%22%7D');" class="button button-block  button-big bg-main">休闲TV直播</a></div></div></div></div><div class="x4"><div class="pro radius-big  border border-dashed border-small " ><div class="wait"><img src="./WebRes/img/mv.png" /><div class="margin-big-top"><a onclick="OpenApp('%7B%22Url%22%3A%22http%3A%5C%2F%5C%2Fwww.yinyuetai.com%5C%2Fbaidu%5C%2Fhao123%22%2C%22title%22%3A%22%5Cu5929%5Cu5929%5Cu97f3%5Cu60a6%5Cu53f0%22%2C%22Is_Max%22%3A%220%22%2C%22W_w%22%3A%22747%22%2C%22W_h%22%3A%22550%22%2C%22fn%22%3A%22%22%7D');" class="button button-block  button-big bg-main">休闲音悦台</a></div></div></div></div><div class="x4"><div class="pro radius-big  border border-dashed border-small " ><div class="wait"><img src="./WebRes/img/kd.png" /><div class="margin-big-top"><a onclick="OpenApp('%7B%22Url%22%3A%22http%3A%5C%2F%5C%2Fwww.kuaidi100.com%5C%2Fframe%5C%2F360%5C%2F360desktop%5C%2F%22%2C%22title%22%3A%22%5Cu5929%5Cu5929%5Cu5feb%5Cu9012%22%2C%22Is_Max%22%3A%220%22%2C%22W_w%22%3A%22542%22%2C%22W_h%22%3A%22420%22%2C%22fn%22%3A%22%22%7D');" class="button button-block  button-big bg-main">休闲快递</a></div></div></div></div><div class="x4"><div class="pro radius-big  border border-dashed border-small " ><div class="wait"><img src="./WebRes/img/rili.png" /><div class="margin-big-top"><a onclick="OpenApp('%7B%22Url%22%3A%22http%3A%5C%2F%5C%2Fwww.365rili.com%5C%2F360wnl%5C%2Fwnl.html%22%2C%22title%22%3A%22%5Cu5929%5Cu5929%5Cu65e5%5Cu5386%22%2C%22Is_Max%22%3A%220%22%2C%22W_w%22%3A%22752%22%2C%22W_h%22%3A%22630%22%2C%22fn%22%3A%22%22%7D');" class="button button-block  button-big bg-main">休闲日历</a></div></div></div></div-->
                            </div>
                        </div>
                        <div class="tab-panel" id="tab-2">
                            <div class="line-small "></div>
                        </div>
                    </div>
                </div>
            </div>
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

