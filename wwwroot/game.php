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
                <strong class="text-white">嗨! <strong class="text-dot"><?php echo $_SESSION['accountName'] ?></strong>
                    欢迎回家! </strong>
                <strong class="float-right margin-big-right">
                    <a class="button button-little bg-yellow" href="./Spread.php">我要推广</a>
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
                            <li class="active"><a href="#tab-0">游戏分区</a></li>
                            <!--li class="margin-left"><a href="#tab-1">休闲应用</a></li><li class="margin-left"><a href="#tab-2">特权应用</a--></li>
                        </ul>
                    </div>
                    <div class="tab-body">
                        <div class="tab-panel active" id="tab-0">
                            <div id="test" class="container margin-large-top">
                                <?php
                                //include_once "../../core/config.php";
                                $sql = "select * from $database.server order by fqid desc limit 0,1000";
                                $result = mysql_query($sql);
                                while ($row = mysql_fetch_array($result)) {
                                    ?><a  class="button button-large bg-main badge-corner margin-large"
                                          href="./app/Game/game.php?FQ=<?php echo $row['fcm'] ?>"
                                          target="_black"><?php echo $row['name'] ?><span
                                        class="badge text-big bg-dot"><?php echo $row['jieshao'] ?></span></a><?php } ?>
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
            <div class="navbar-text"><?php echo $WebTitle ?>&nbsp;&nbsp;&nbsp;网站开发:(www.18youxi.com)</div>
        </div>
    </div>
</div>
</body>
</html>

