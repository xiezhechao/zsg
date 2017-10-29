<?php
include_once "../../core/config.php";
//session_start();
if (!$_SESSION['accountName'] || !$_GET['FQ']) exit("<script> alert('请登陆后使用！');location.href='../../index.php';</script>");

$server = $_GET['FQ'];
$sql = "select * from $database.server where fcm='$server'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$newtime = time();
if ($row['opentime'] > $newtime) {
    $array = array("info" => "", "status" => "y", "url" => "../../member.php");
    echo "<script>alert('还没到开区时间哦！(" . $row['name'] . ")开区时间是(" . $row['jieshao'] . ")');location.href='../../member.php'</script>";
    exit;
}
$usersql = "select * from $database.account where name='" . $_SESSION['accountName'] . "'";
$userresult = mysql_query($usersql);
$userrow = mysql_fetch_array($userresult);
$userid = $userrow["name"];
$inviteuser = "0";
$vip = "1";
$nickname = $userrow["name"];
$skey = "sdfasf484j4lpe8we4ev09as";
$time1 = time();
$sig = getsig2($userid . $inviteuser . $vip . $time1 . $nickname, $skey);
$ssurl = "http://" . $row['ip'] . ":" . $row['duankou'] . "/certify?userid=" . $userid . "&nickname=" . $nickname . "&face=&time=" . $time1 . "&inviteuser=" . $inviteuser . "&callback=&sig=" . $sig . "&vip=" . $vip . "&antiaddiction=0&bi_platform_id=1&rand=" . $time1 . "";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo $row['name']; ?><?php echo $row['id']; ?>服</title>
    <script type="text/javascript" src="http://web.game-center.youkia.com/templates/js/js/jquery.min.js"></script>

    <style type="text/css">
        <!--
        Smarty-- >
        html {
            height: 100%;
        }

        <!--
        Smarty-- >
    </style>
</head>

<body style="margin:0; padding:0;  background:#000;" bgcolor="transprent">
<div id="game_flash" style="color:#fff;">正在登陆...<br/>如果长时间未响应，请刷新页面重试!</div>
<script language="javascript">
    //document.domain='youkia.com';
    var game_login_url = '<?php echo $ssurl;?>';
    var flashvars = '';
    var platform_pay_url = '<?php echo $weburl;?>pay.php';
    var userid = '';
    var flash_url = "<?php echo $weburl;?>client/index.swf?" + Math.random();
    var game_str = '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0"  width="" height="" id="game_swf_1" align="middle" SCALE="noscale">';
    game_str += '<param name="quality" value="high" /><param name="bgcolor" value="#000000" /><param value="window" name="wmode"><param name="allowScriptAccess" value="always" /><param name="movie" value="' + flash_url + '" /><param name="SCALE" value="noscale"> <param name="flashvars" value="plantID=1&serverID=1&&game_sid" /><param name="base" value="' + flash_url + '" /> <embed  width="" bgcolor="#000000" height="" allowScriptAccess="always" type="application/x-shockwave-flash" wmode="window" id="game_swf_2" flashvars="plantID=1&serverID=1&&game_sid" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" swliveconnect="true" quality="high" src="<?php echo $weburl;?>client/index.swf?' + Math.random() + '" base="<?php echo $weburl;?>client/index.swf?' + Math.random() + '"/></object>';

    var swf_img = new Image();
    swf_img.src = flash_url;

    <!--Smarty-->
    String.prototype.replaceAll = function (s1, s2) {
        return this.replace(new RegExp(s1, "gm"), s2);
    }

    $(document).ready(function () {
        $.getJSON(game_login_url + '&jsoncallback=?', function (data) {
            if (data.sid) {
                $.each(data, function (k, v) {
                    flashvars += k + '=' + v + '&';
                });

                flashvars = flashvars.replaceAll('\\$', '$$$$');
                game_str = game_str.replaceAll('game_sid', flashvars);
                $('#game_flash').remove();
                $("body").prepend(game_str);

                resizeFlash();
            }
            else {
                $('#game_flash').html(data.error);
            }
            //setPageHeight();
        });
    });

    $(window).resize(function () {
        resizeFlash();
    });

    function resizeFlash() {
        var height = $(window).height();
        var width = $(window).width();
        $('#game_swf_1').attr('height', height);
        $('#game_swf_2').attr('height', height);
        $('#game_swf_1').attr('width', width);
        $('#game_swf_2').attr('width', width);
    }

    //充值
    function gameCenterApi(type, value) {
        switch (type) {
            case 'pay':
            {
                window.open(platform_pay_url);

                break;
            }
        }
    }


    function setText() {
        var t = document.getElementById("share_link_url");
        t.select();
        try {
            window.clipboardData.setData('text', t.createTextRange().text);
            alert('复制成功，现在你可以在QQ窗口中使用Ctrl+V将地址发给好友了！');
        } catch (e) {
            alert('你的浏览器不支持自动复制，请手动使用Ctrl+C复制！');
        }
    }


    var me;

    function getFlash() {
        if (navigator.appName.indexOf("Microsoft") != -1) {
            return window["game_swf_1"];
        }
        else {
            return document["game_swf_2"];
        }

    }
    function start() {

        me = getFlash();

    }
    window.onbeforeunload = onbeforeunload_handler;
    function onbeforeunload_handler() {
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