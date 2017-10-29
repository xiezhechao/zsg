<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
    include_once "core/config.php";
    $row4 = dbst($database, "account", "name='" . $_SESSION['accountName'] . "'");
    if (!$_SESSION['accountName']) exit("<script> alert('请登陆后使用！');location.href='index.php';</script>");
    $url1 = $weburl . 'index.php?tid=' . passport_encrypt($_SESSION['accountName'], "nimabi");

    ?>
    <title><?php echo $WebTitle ?></title>
    <meta name="description" content="古剑奇侠一款将Q版风格演绎得淋漓尽致,画面梦幻,令人如痴如醉的仙侠页游"/>
    <meta name="keywords" content="古剑奇侠,公益服,古剑奇侠公益服,古剑奇侠免费,古剑奇侠好玩吗,古剑奇侠无限元宝"/>
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
                    <a class="button button-little bg-yellow" href="./Spread.php">我要推广</a>
                    <button class="button button-little bg-sub"
                            onclick="OpenApp('%7B%22Url%22%3A%22%5C%2Fapp%5C%2Fsys%5C%2Feditpass.php%22%2C%22title%22%3A%22%5Cu4fee%5Cu6539%5Cu5bc6%5Cu7801%22%2C%22Is_Max%22%3A%220%22%2C%22W_w%22%3A%22480%22%2C%22W_h%22%3A%22350%22%2C%22fn%22%3A%22%22%7D'); ">
                        修改密码
                    </button>
                    <button class="button button-little bg-dot" onclick="Ajax_Action('','SignOut')">退出系统</button>
                </strong>
                <hr/>
                <div class="media-inline">
                    <div class="media text-center User_Login">
                        <p class="text-white"><?php echo $WebTitle ?>公益服 诚邀你的加入! </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="Main_Content" class="bg border border-main">
        <div class="margin">
            <p>尊敬的 <strong class="text-dot"><?php echo $_SESSION['accountName'] ?></strong> 玩家，欢迎进入推广系统!</p>
            <blockquote class="border-main"><strong>推广宣传词（请自行复制以下内容）</strong>

                <p><?php echo $WebTitle ?>-新游戏上线送元宝，送首冲<br/>
                    新区今日震撼公测福利多 来玩送钱.送装备.送坐骑.送宠物<br/>
                    【新区预告】◆今日【首区】火爆激情开放！◆<br/>
                    【独家版】注册领首冲，送上送元宝！<br/>
                    【联系客服】<?php echo $qq ?><br/>
                    【游戏福利】注册领充值币送首冲，进游戏送元宝领大礼包<br/>
                    【网站特权】◆独家.稀有.最无极.网页游戏◆复古仿古仿◆同步官方◆持续更新<br/>
                    【官方网站】网站：<?php echo $url1 ?><br/>
                </p>
                <hr/>
                <div class="text-left"><?php echo $url1 ?></div>
                玩家推广时间
                <SCRIPT language=JavaScript>
                    <!--
                    ---------
                        today = new Date();
                    var date;
                    var centry;
                    centry = "";
                    if (today.getFullYear() < 2000)
                        centry = "19";
                    date1 = centry + (today.getFullYear()) + "年" + (today.getMonth() + 1 ) + "月" + today.getDate() + "日  ";
                    date2 = "";
                    document.write(date1 + date2);
                    //----->
                </SCRIPT>
            </blockquote>
            <br>
            <blockquote class="border-dot">
                <strong>论坛资源 (我们提供广大玩家游戏论坛推广资源)</strong>

                <div class="doc-input">
                    <a target="_blank" class="button border-dot" href="http://www.wanux.cn">WANUX论坛</a>
                    <a target="_blank" class="button border-dot" href="http://www.sougm.com">sougm论坛</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.99nets.me">99nets论坛</a>
                    <a target="_blank" class="button border-dot" href="http://www.hgyouxi.net">火光论坛</a>
                    <a target="_blank" class="button border-dot" href="http://www.iopq.com">宝湾论坛</a>
                    <a target="_blank" class="button border-dot" href="http://www.mcncc.com">mc网单论坛</a>
                    <a target="_blank" class="button border-dot" href="http://www.99tianji.com">天迹社区</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.houdao.com">猴岛论坛</a>
                    <a target="_blank" class="button border-dot" href="http://www.168gamer.com">168gamer</a>
                    <a target="_blank" class="button border-dot" href="http://www.9uxy.com">9U稀游社区</a>
                    <hr/>
                    <a target="_blank" class="button border-dot" href="http://tieba.baidu.com/f?kw=网页游戏公益服">网页游戏公益服吧</a>
                    <a target="_blank" class="button border-dot" href="http://tieba.baidu.com/f?kw=网页游戏公益">页游公益服吧</a>
                    <a target="_blank" class="button border-dot" href="http://tieba.baidu.com/f?kw=公益游戏">公益游戏吧</a>
                    <a target="_blank" class="button border-dot" href="http://tieba.baidu.com/f?kw=最新网页游戏">最新网页游戏吧</a>
                    <a target="_blank" class="button border-dot" href="http://tieba.baidu.com/f?kw=网游公益服">网游公益服吧</a>
                    <a target="_blank" class="button border-dot" href="http://tieba.baidu.com/f?kw=网页游戏开服表">开服表吧</a>
                    <a target="_blank" class="button border-dot" href="http://tieba.baidu.com/f?kw=网页游戏">网页游戏吧</a>
                    <a target="_blank" class="button border-dot" href="http://tieba.baidu.com/f?kw=公益服">公益吧</a>
                    <hr/>
                    <a target="_blank" class="button border-dot" href="http://tieba.baidu.com/f?kw=古剑奇侠公益服">古剑奇侠吧</a>
                    <a target="_blank" class="button border-dot" href="http://tieba.baidu.com/f?kw=百战天下公益服">百战天下吧</a>
                    <a target="_blank" class="button border-dot" href="http://tieba.baidu.com/f?kw=风云无双公益服">风云无双吧</a>
                    <a target="_blank" class="button border-dot" href="http://tieba.baidu.com/f?kw=大闹天宫公益服">大闹天宫吧</a>
                    <a target="_blank" class="button border-dot" href="http://tieba.baidu.com/f?kw=黑暗之光公益服">黑暗之光吧</a>
                    <a target="_blank" class="button border-dot" href="http://tieba.baidu.com/f?kw=盛世三国2公益服">盛世三国2吧</a>
                    <a target="_blank" class="button border-dot" href="http://tieba.baidu.com/f?kw=大天使之剑公益服">大天使之剑吧</a>
                    <a target="_blank" class="button border-dot" href="http://tieba.baidu.com/f?kw=凡人修真2公益服">凡人修真2吧</a>
                    <hr/>
                    <a target="_blank" class="button border-dot" href="http://bbs.265g.com">265g论坛</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.91wan.com">91wan论坛</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.duowan.com">多玩论坛</a>
                    <a target="_blank" class="button border-dot" href="http://gamebbs.51.com">51论坛</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.52pk.com">52pk论坛</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.youjia.cn">4399论坛</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.766.com">766论坛</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.yzz.cn">YZZ论坛</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.yegame.com">页游论坛</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.9377.com">9377</a>
                    <hr/>
                    <a target="_blank" class="button border-dot" href="http://www.tanwanmao.com">贪玩猫</a>
                    <a target="_blank" class="button border-dot" href="http://www.ucwawa.com">游戏娃娃</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.yeyoubbs.com">页游论坛</a>
                    <a target="_blank" class="button border-dot" href="http://www.youcsky.com">游戏天空</a>
                    <a target="_blank" class="button border-dot" href="http://www.godbu.com">小布论坛</a>
                    <a target="_blank" class="button border-dot" href="http://www.aayx.net">游戏者之家</a>
                    <a target="_blank" class="button border-dot" href="http://www.17wansf.com">17WANSF</a>
                    <a target="_blank" class="button border-dot" href="http://bbs2.0570fc.com">FC论坛</a>
                    <a target="_blank" class="button border-dot" href="http://www.265gsf.com">页游天地</a>
                    <a target="_blank" class="button border-dot" href="http://www.1144.cc">1144</a>
                    <hr/>
                    <a target="_blank" class="button border-dot" href="http://www.1w8.cc">要玩论坛</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.916yy.com">916yy论坛</a>
                    <a target="_blank" class="button border-dot" href="http://www.52xinyouxi.com">52新游戏</a>
                    <a target="_blank" class="button border-dot" href="http://www.wanwan88.com">玩玩88</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.4342.cc">4342论坛</a>
                    <a target="_blank" class="button border-dot" href="http://www.17wansf.cc">一起玩</a>
                    <a target="_blank" class="button border-dot" href="http://www.11yx.com">11游戏</a>
                    <a target="_blank" class="button border-dot" href="http://17zz.com">一起找找</a>
                    <a target="_blank" class="button border-dot" href="http://www.qiqiweb.com">七七游戏</a>
                    <a target="_blank" class="button border-dot" href="http://www.yysf.cc">YYSF论坛</a>
                    <hr/>
                    <a target="_blank" class="button border-dot" href="http://bbs.tgbus.com">巴士论坛</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.17173.com">17173论坛</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.178.com">178论坛</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.18183.com">81813论坛</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.ewoka.com">E蜗卡论坛</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.3761.com">3761论坛</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.2323wan.com">2323wan论坛</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.8090yxs.com">8090yxs论坛</a>
                    <a target="_blank" class="button border-dot" href="http://bbs.7mgame.com">齐名游戏</a>
                </div>
                <br>
                <strong>企鹅资源 (我们提供广大玩家游戏QQ推广资源)</strong>

                <div class="doc-input">
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=eMreS3">00.残剑风云</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=So0H4P">00.圣诞风云</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=WfLc5u">00.神武风云</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=Zqm8yG">00.诺克风云</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=Ukv6Y7">00.吾爱风云</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=bUd0JR">00.传说风云</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=SpRE6i">00.千年风云</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=dDxdBd">00.风云辅助</a>
                    <hr/>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=Z79NGh">01.梦幻百战</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=UDkc0M">01.百战辅助</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=cNApGm">01.PPS百战</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=eJ9vPS">01.光宇百战</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=YFcxhi">01.百战美女</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=Y3t8Ap">01.酷我百战</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=TqhKIj">01.乐视百战</a>
                    <a target="_blank" class="button border-dot"
                       href="http://jq.qq.com/?_wv=1027&k=ZnbPdP">01.6.CN百战</a>
                    <hr/>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=bj3pwd">02.至尊奇侠</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=WqrfnX">02.英雄古剑</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=YjyJGi">02.神话古剑</a>
                    <a target="_blank" class="button border-dot"
                       href="http://jq.qq.com/?_wv=1027&k=SndVaU">02.4399古剑</a>
                    <a target="_blank" class="button border-dot"
                       href="http://jq.qq.com/?_wv=1027&k=aH9LWU">02.4399古剑</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=ZdJJZp">02.792古剑</a>
                    <a target="_blank" class="button border-dot"
                       href="http://jq.qq.com/?_wv=1027&k=aW0RRD">02.4399凡人</a>
                    <a target="_blank" class="button border-dot"
                       href="http://jq.qq.com/?_wv=1027&k=YvFEzV">02.i3301天界</a>
                    <hr/>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=f5XGrk">03.仙缘刀剑</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=YYnFtx">03.雄霸论剑</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=VQBLDZ">03.稀有手机</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=cGQOig">03.页游私服</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=dUkcMK">03.天天页游</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=YBiGGN">03.页游稀有</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=Vse76C">03.页游发布</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=ZoI3NV">03.页游私服</a>
                    <hr/>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=c13uUg">04.仙缘刀剑</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=biNGK0">04.雄霸论剑</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=Y1oxt1">04.手游交流</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=e9vY3i">04.网页交流</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=Z4ZpEz">04.页游互推</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=UeWnaa">04.骄傲大天使</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=ZxSr09">04.大天使剑</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=XA47yc">04.大天使交易</a>
                    <hr/>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=VG66Hh">05.大天使吧</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=bl06Fh">05.37大天使</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=auh7Rf">05.大天使SF</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=ZEbkp8">05.YY大天使</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=WzgqCW">05.kw大天使</a>
                    <a target="_blank" class="button border-dot"
                       href="http://jq.qq.com/?_wv=1027&k=aCEczP">05.360大天使</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=WYoCBY">05.37大天使</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=YRG57i">05.xl大天使</a>
                    <hr/>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=Ysua99">06.迅雷霸业</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=XswutY">06.大闹贴吧</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=aopsdM">06.好玩大闹</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=XNxYPe">06.逍遥大闹</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=XDvyhD">06.美人粉丝</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=bQlbny">06.英雄攻城</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=XmWbJL">06.攻城巅峰</a>
                    <a target="_blank" class="button border-dot" href="http://jq.qq.com/?_wv=1027&k=TE9soA">06.名人攻城</a>
                </div>
            </blockquote>
            <br>
            <blockquote class="border-dot"><strong>推广规则</strong>
                1、当您将以上推广信息复制粘贴QQ、YY、论坛、贴吧、微博可获得推广收益。
                <hr/>
                2、收益获得是您将推广信息发布后被推广人通过信息注册账户从中充值消费获得推广收益。

            </blockquote>
            <br>
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

