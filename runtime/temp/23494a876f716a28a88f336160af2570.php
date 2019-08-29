<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/www/wwwroot/c.yaoget.cn/public/../application/index/view/index/index.html";i:1566901711;}*/ ?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link href="/index/css/mui.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/index/css/swiper.min.css"/>
    <link rel="stylesheet" type="text/css" href="/index/iconfont/iconfont.css"/>
</head>
<style>
    .mui-bar-tab .mui-tab-item{
        font-size: 12px;
        padding: 10px 0 0;
        line-height: 17px;
    }
    .mui-bar {
        position: fixed;
        z-index: 10;
        right: 0;
        left: 0;
        height: 44px;
        padding-right: 10px;
        padding-left: 10px;
        border-bottom: 0;
        background-color: #f7f7f7;
        -webkit-box-shadow: 0 0 0px rgba(0,0,0,.85);
        box-shadow: 0 0 0px rgba(0,0,0,.85);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }
</style>
<body>
<nav class="mui-bar mui-bar-tab" style="background: #FBFBFC;">
    <a href="/index/index/home" class="mui-tab-item mui-active" id="defaultTab">
        <span class="iconfont" style="font-size: 20px;">&#xe60d;</span>
        <span class="mui-tab-label" style="display:block;">首页</span>
    </a>

    <a href="#" class="mui-tab-item">
        <span class="iconfont" style="font-size: 24px;">&#xe66b;</span>
        <span class="mui-tab-label" style="display:block;">在线课程</span>
    </a>
    <a href="/index/userinfo/share" class="mui-tab-item">
        <span class="iconfont" style="font-size: 20px;">&#xe662;</span>
        <span class="mui-tab-label" style="display: block;">二维码</span>
    </a>
    <a href="/index/userinfo/index" class="mui-tab-item">
        <span class="iconfont" style="font-size: 20px;">&#xe61f;</span>
        <span class="mui-tab-label" style="display:block;">我的</span>
    </a>
</nav>

<script src="/index/js/mui.min.js"></script>
<script src="/index/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/index/js/swiper.min.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
    mui.init()
</script>
<script type="text/javascript">
    //启用双击监听
    mui.init({
        gestureConfig: {
            doubletap: true
        },
        subpages: [{
            url: '/index/index/home',
            id: 'MainViwe',
//					styles: {
//						top: '30px',
//						bottom: '51px'
//					}
        }]
    });

    mui('.mui-scroll-wrapper').scroll({
        deceleration: 0.0005 //flick 减速系数，系数越大，滚动速度越慢，滚动距离越小，默认值0.0006
    });

    //底部选项卡切换跳转
    (function jumpPage() {
        //跳转页面
        var subpages = ['/index/index/home','setting.html','message.html',];
        var subpage_style = {
            top: '44px',
            bottom: '51px'
        };
        var Index = 0;
        var actTab = subpages[Index],
            tittle = document.querySelector('.mui-title');

        var aniShow = {}; //动画显示

        //首次启动切滑效果
        //当前激活选项
        var activeTab = subpages[0];
        //选项卡点击事件
        mui('.mui-bar-tab').on('tap', 'a', function(e) {
            //修改对应分页
            var targetTab = this.getAttribute('href');
            $('#MainViwe').attr('src', targetTab);


        });
        //自定义事件，模拟点击“首页选项卡”
        document.addEventListener('gohome', function() {
            var defaultTab = document.getElementById("defaultTab");
            //模拟首页点击
            mui.trigger(defaultTab, 'tap');
            //切换选项卡高亮
            var current = document.querySelector(".mui-bar-tab>.mui-tab-item.mui-active");
            if(defaultTab !== current) {
                current.classList.remove('mui-active');
                defaultTab.classList.add('mui-active');
            }

        });
    })()
</script>
</body>

</html>