<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/userinfo/team.html";i:1568430163;s:63:"/www/wwwroot/c.yaoget.cn/application/index/view/common/nav.html";i:1568191990;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta charset="UTF-8">
    <title>我的学员</title>
    <link href="/index/css/mui.min.css" rel="stylesheet" />
</head>
<style>
    body{
        background: #F1F1F5;
        margin: 0;
        padding: 0;
    }
    .head{
        margin:5% 5% 0 5%;
    }
    .tit{
        float: left;
        line-height: 30px;
        width:50%;
        text-align: center;
        color: #777;
        /*height: 50px;*/
        /*border-bottom: 1px solid #ddd;*/
    }
    .img{
        float: left;
        margin-left: 15%;
    }
    .hehuo{
        text-align: center;
        color: #777;
        position: relative;
    }
    .hc{
        float: left;
        width: 25%;
        height: 25px;
        line-height: 25px;
        margin-top: 15px;
    }
    .btn{
        border-radius: 15px;
        height: 25px;
        border: 1px solid #dadada;
        width:25%;

    }
    .actives{
        background: #FFC104;
        border-radius: 25px;
        color:white;
    }

</style>
<body>

<div class="head" style="position: relative">

    <div style="color: #666;float: left;">我的学员(<?php echo count($student)?>)</div>
    <div style="float: right;color: #666;font-size: 13px"><?php if($info['quota'] != 0): ?>剩余高级课名额：<?php echo $info['quota']; endif; ?></div>
    <br>
    <div style="position: relative;margin-top: 10px;width: 100%;height: 40px;border-bottom: 1px solid #ddd;" class="course">

            <div class="tit">
                <div><img src="/index/images/member.png" alt="" width="30" class="img">已购买课程(<?php echo $num; ?>)</div>
                <input type="hidden" id="buy" value="1">
            </div>


        <div class="tit">
            <div><img src="/index/images/member.png" alt="" width="30" class="img">未购买课程(<?php echo count($student) - $num?>)</div>
            <input type="hidden" id="buy" value="0">
        </div>

    </div>


</div>
<div class="hehuo">
    <div class="hc">合伙人 <input type="hidden" id="dengji" value="0"> </div>
    <div class="hc actives" id="all">所有学员</div>
    <div class="hc">中级学员 <input type="hidden" id="dengji" value="1"></div>
    <div class="hc">高级学员 <input type="hidden" id="dengji" value="2"></div>
</div>
<div style="margin-top: 60px;color: #666">

    <form action="/index/userinfo/team" method="post">
        <span>查找:</span>
        <input type="text" name="keywords" placeholder="名字/手机号/微信昵称" style="border-radius: 15px;width:60%;height: 25px;border: 1px solid #dadada;text-align: center;font-size: 12px" value="<?php echo $keyword; ?>">
        <input type="submit" value="搜索" class="btn" style="line-height: 10px;width: 23%;">
    </form>
</div>
<div style="margin-top: 5px;">
    <button style="background: #0A90C3;width:100%;height: 35px;border:#0A90C3;border-radius: 5px;color: white" id="study">一级学员</button>
</div>
<div style="position: relative;color: #666;border-bottom: 1px solid #ccc;">
    <div style="width: 90%;height: 30px;margin:20px 5% 0 5%;font-size: 14px;">
        <div style="float: left">头像/微信昵称</div>
        <div style="float: right">姓名/电话</div>
    </div>
</div>
<div id="content">
    <?php if(is_array($student) || $student instanceof \think\Collection || $student instanceof \think\Paginator): $i = 0; $__LIST__ = $student;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['name'] != null or $vo['phone'] != null): ?>
    <div style="position: relative;text-align: center;border-bottom: 1px solid #ccc;width: 100%;height: 45px">
        <div style="width: 90%;height: 35px;margin:10px 5% 0 5%;font-size: 13px;">
            <div style="float: left">
                <img src="<?php echo $vo['avatar']; ?>" alt="" width="40" style="">
            </div>
            <div style="margin-left: 10px;float: left;line-height: 1.6;">
                <span><?php echo $vo['nickname']; ?></span><br>
                <span style="color:#666"><?php echo date("Y-m-d",$vo['createtime']); ?></span>
            </div>
            <div style="float: right;border-left: 1px solid #777;height: 35px;width: 25%;line-height: 1.6;padding-left: 10px;">
                <span><?php echo $vo['name']; ?></span>
                <br>
                <span style="color:#666"><?php echo $vo['phone']; ?></span>
            </div>
        </div>
    </div>
    <?php endif; endforeach; endif; else: echo "" ;endif; ?>

</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<link rel="stylesheet" href="/index/iconfont/tab/iconfont.css">
<style>
    .footer{
        position:fixed;
        z-index:40;
        width:100%;
        /*max-width:640px;*/
        bottom:0px;
        height: 9%;
        background: #FBFBFC;
    }
    .tab-icon{
        margin: 0 auto;
        padding: 8px 0 0;
        width: 25%;
        float: left;
        text-align: center;
        line-height: 20px;
    }

    .active{
        color: #4285f4;
    }

    .footer a{
    	color: #A4A4A8;
    	position: relative;
    }
</style>
<body>
    <div class="footer">
        <div>
        	<a href="/index/index/index/openid/<?php echo \think\Request::instance()->session('wechat_user.original.openid'); ?>" class="tab-item">
            <div class="tab-icon">
                <i class="icon iconfont" style="font-size: 22px;">&#xe615;</i>
                <p>首页</p>
            </div>

        </a>
        </div>
        <div>
        	<a href="/index/course/index/openid/<?php echo \think\Request::instance()->session('wechat_user.original.openid'); ?>" class="tab-item">
            <div class="tab-icon">
                <i class="icon iconfont" style="font-size: 22px;">&#xe600;</i>
                <p>在线课程</p>
            </div>

        </a>
        </div>
        <div>
        	<a href="/index/userinfo/share" class="tab-item">
            <div class="tab-icon">
                <i class="icon iconfont" style="font-size: 22px;">&#xe646;</i>
                <p>二维码</p>
            </div>

        </a>
        </div>
        <div>
        	<a href="/index/userinfo/index" class="tab-item">
            <div class="tab-icon">
                <i class="icon iconfont" style="font-size: 22px;">&#xe6a8;</i>
                <p>我的</p>
            </div>

        </a>
        </div>
    </div>
</body>
<script type="text/javascript" src="/index/js/jquery-3.1.1.min.js"></script>
<script>
    //a链接点击之后 选中当前
    $(".footer a").each(function () {
    if ($(this)[0].href == String(window.location)) {
        $(this).find('.tab-icon').addClass("active").siblings().removeClass("active");
    }
});
</script>
</html>
</body>
<script>
    $('#all').click(function () {
        location.href = '/index/userinfo/team';
    });
    $('.tit').click(function () {
        $(this).addClass('actives').siblings().removeClass('actives');
        $('.hehuo').find('.hc').removeClass('actives');

        var status = $(this).find('#buy').val();
        // console.log(22255);
        $.ajax({
            type:'post',
            data:{status:status},
            dataType:'json',
            url:"/index/userinfo/buycourse",
            success: function (data) {

                if(data.code != 200){
                    var html = '<img src=\'/index/images/loaded.png\' width=\'300\' style=\'margin-left: 10%;margin-top: 10px\'>';
                    $('#content').html(html);
                }
                var data = data.data;
                var html='';
                $.each(data,function (index) {
                    console.log(data[index].avatar);
                    html += `<div style="position: relative;text-align: center;border-bottom: 1px solid #777;width: 100%;height: 45px">
                    <div style="width: 90%;height: 35px;margin:10px 5% 0 5%;font-size: 13px;">
                        <div style="float: left">
                            <img src="${data[index].avatar}" alt="" width="40" style="">
                        </div>
                        <div style="margin-left: 10px;float: left;line-height: 1.6;">
                            <span>${data[index].nickname}</span><br>
                            <span style="color:#666">${data[index].createtime}</span>
                        </div>
                        <div style="float: right;border-left: 1px solid #777;height: 35px;width: 25%;line-height: 1.6;padding-left: 10px;">
                            <span>${data[index].name}</span>
                            <br>
                            <span style="color:#666">${data[index].phone}</span>
                        </div>
                    </div>
                    </div>`;
                    $('#content').html(html);
                })

            }
        })

    });
    $('.hc').click(function () {
        $(this).addClass('actives').siblings().removeClass('actives');
        $('.course').find('.tit').removeClass('actives');
        var status = $(this).find('#dengji').val();
        var html = $('#study').html()

        if(status == 1){
            $('#study').html('中级学员')
        }else if(status == 2){
            $('#study').html('高级学员')
        }else if(status == 0){
            $('#study').html('合伙人')
        }


        $.ajax({
            type:'post',
            data:{status:status},
            dataType:'json',
            url:"/index/userinfo/shenfen",
            success: function (data) {
                if(data.code != 200){
                    var html = '<img src=\'/index/images/loaded.png\' width=\'300\' style=\'margin-left: 10%;margin-top: 10px\'>';
                    $('#content').html(html);
                }

                var data = data.data;

                var html = '';
                $.each(data,function (index) {
                    // console.log(data[index].avatar);
                    html += `<div style="position: relative;text-align: center;border-bottom: 1px solid #777;width: 100%;height: 45px">
                    <div style="width: 90%;height: 35px;margin:10px 5% 0 5%;font-size: 13px;">
                        <div style="float: left">
                            <img src="${data[index].avatar}" alt="" width="40" style="">
                        </div>
                        <div style="margin-left: 10px;float: left;line-height: 1.6;">
                            <span>${data[index].nickname}</span><br>
                            <span style="color:#666">${data[index].createtime}</span>
                        </div>
                        <div style="float: right;border-left: 1px solid #777;height: 35px;width: 25%;line-height: 1.6;padding-left: 10px;">
                            <span>${data[index].name}</span>
                            <br>
                            <span style="color:#666">${data[index].phone}</span>
                        </div>
                    </div>
                    </div>`;

                    $('#content').html(html);
                })

            }
        })
    });
</script>
</html>