var rate = 1;// 播放倍率
// 快进
function fast() {
    rate < 2 ? rate = rate + 0.5 : rate = 1;
    // 视频元素
    var video = document.getElementById('video');
    video.playbackRate = rate;
    video.play(); // 播放视频
    document.getElementById('rateDom').innerHTML = rate;
    document.getElementById('playIcon').style.display = 'none';
    document.getElementById('stopIcon').style.display = 'block';
}

// 视频播放暂停
function btnPlay() {
    var video = document.getElementById('video');
    video.playbackRate = rate;
    if (video.paused) {
        video.play(); // 播放视频
        document.getElementById('playIcon').style.display = 'none';
        document.getElementById('stopIcon').style.display = 'block';

        document.getElementById('videoPlay').style.display = 'none'; // 隐藏video上的播放小图标
    } else {
        video.pause(); // 暂停视频
        document.getElementById('stopIcon').style.display = 'none';
        document.getElementById('playIcon').style.display = 'block';

        document.getElementById('videoPlay').style.display = 'flex'; // 显示video上的播放小图标
    }
}

// 点击切换
// 参数 id = 要跳转元素的id
function introduce(e, id) {

    var offsetTop = document.getElementById(id).offsetTop; // 获取到需要跳转元素的位置
    document.body.scrollTop = offsetTop-50; // 滚动到指定位置
    // 添加样式
    var item = document.getElementById('introduceList').getElementsByClassName("item");
    for (var i = 0; i < item.length; i++) {
        item[i].classList.remove('act')
    }
    e.classList.add('act')
}

// 介绍文本查看更多
function lookIntroduce(e) {
    var obj = document.getElementById('contentIntroduce')
    obj.style.display = "block";
    e.style.display = "none";
}

// 介绍文本查看更多
function lookIntroduce(e) {
    var obj = document.getElementById('contentIntroduce')
    obj.style.display = "block";
    e.style.display = "none";
}

// 收藏切换
function collection(e) {
    if (e) {
        document.getElementById('stars').style.display = 'none';
        document.getElementById('stars_s').style.display = 'block';
    } else {
        document.getElementById('stars_s').style.display = 'none';
        document.getElementById('stars').style.display = 'block';
    }
}

// 显示播放列表
function showPlayWin() {
    document.getElementById('playWin').style.display = 'block'
}

// 隐藏播放列表
function hidePlayWin() {
    document.getElementById('playWin').style.display = 'none'
}

// 评论输入框输入事件
function input(e) {
    var val = e.value;
    if (val.length) {
        document.getElementById('submit').classList.add('submit-s')
    } else {
        document.getElementById('submit').classList.remove('submit-s')
    }
}

function scoreEvent(t, e) {
    // var score = document.getElementsByClassName('score-item-icon')
    // for (var i = 0; i < score.length; i++) {
    //     score[i].style.display = 'none';
    // }
    // if (e) {
    //     document.getElementById('submit').classList.add('submit-s')
    // } else {
    //
    // }
}

// 显示评论弹窗
function showCommentWin() {
    document.getElementById('commtentWin').style.display = 'block'
}

