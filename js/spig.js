window.setInterval(getkoto,6000); 
function getkoto(){
	$.post("https://www.fczbl.vip/api/hitokoto/",function(hitokoto) {
		$(".hitokoto").html(hitokoto);
	});
}
jQuery(document).ready(function ($) {
    $("#spig").mousedown(function (e) {
        if(e.which==3){
        showMessage("秘密通道:<br />    <a href=\"https://www.fczbl.vip\" title=\"首页\">首页</a>    <a href=\"https://www.fczbl.vip/pay.html\" title=\"打赏\">打赏</a>    <a href=\"https://www.fczbl.vip/wp-admin/\" title=\"后台\">后台</a> ",10000);
}
});
$("#spig").bind("contextmenu", function(e) {
    return false;
});
});
$(document).on('copy', function (){
    showMessage('你都复制了些什么呀，转载要记得加上出处哦', 5000);
});
jQuery(document).ready(function ($) {
    $("#message").hover(function () {
       $("#message").fadeTo("100", 1);
     });
});
jQuery(document).ready(function ($) {
    $(".mumu").mouseover(function () {
       $(".mumu").fadeTo("300", 0.3);
       msgs = ["我隐身了，你看不到我", "我会隐身哦！嘿嘿！", "别动手动脚的，把手拿开！", "喵喵喵？", "把手拿开我才出来！"];
       var i = Math.floor(Math.random() * msgs.length);
        showMessage(msgs[i]);
    });
    $(".mumu").mouseout(function () {
        $(".mumu").fadeTo("300", 1)
    });
});
jQuery(document).ready(function ($) {
    if (isindex) {
        var now = (new Date()).getHours();
        if (now > 0 && now <= 3) {
            showMessage('你是夜猫子呀？还不睡觉，明天起的来么？', 6000);
        } else if (now > 5 && now <= 8) {
            showMessage('早上好！早起的鸟儿有虫吃，早起的虫儿被鸟吃~你是鸟儿还是虫儿？嘻嘻~', 6000);
        } else if (now > 11 && now <= 13) {
            showMessage('中午了，吃饭了么？不要饿着了，饿死了谁来挺我呀！', 6000);
        } else if (now > 13 && now <= 14) {
            showMessage('午后的时光真难熬！还好有你在！', 6000);
        } else {
            showMessage('嗨~快来逗我玩吧！', 6000);
        }
    }
    else {
        showMessage('欢迎阅读 ' + title + ' ', 6000);
    }
    $(".spig").animate({
        top: $(".spig").offset().top + 300,
        left: document.body.offsetWidth - 200
    },
	{
	    queue: false,
	    duration: 1000
	});
});
jQuery(document).ready(function ($) {
    $('h2 a').click(function () {
        showMessage('加载<span style="color:#0099cc;">' + $(this).text() + '</span>中...请稍候');
    });
    $('h2 a').mouseover(function () {
        showMessage('要看看<span style="color:#0099cc;">' + $(this).text() + '</span>么？');
    });
    $('.prev').mouseover(function(){
        showMessage('要翻到上一页吗?');
    });
    $('.next').mouseover(function(){
        showMessage('要翻到下一页吗?');
    });
    $('#index-links li a').mouseover(function () {
        showMessage('去 <span style="color:#0099cc;">' + $(this).text() + '</span> 逛逛吧');
    });
    $('#submit').mouseover(function () {
        showMessage('呐 首次评论需要审核，请耐心等待哦~');
    });
    $('.search-box').mouseover(function () {
        showMessage('找不到想要的？试试搜索吧！');
    });
    $('#search').focus(function () {
        showMessage('输入你想搜索的关键词再按Enter键就可以搜索啦!');
    });
    $('.nav-previous').mouseover(function () {
        showMessage('点它可以后退哦！');
    });
    $('.nav-next').mouseover(function () {
        showMessage('点它可以前进哦！');
    });
    $('.desc a h2, .desc a span').mouseover(function () {
        showMessage('点它就可以回到首页啦！');
    });
    $('.comment-reply-link').mouseover(function(){
        showMessage('要说点什么吗');
    });
    $('.Donate').mouseover(function(){
        showMessage('要打赏我嘛？好期待啊~');
    });
    $('.Love').mouseover(function(){
        showMessage('我是不是棒棒哒~快给我点赞吧！');
    });
    $('.must-log-in').mouseover(function(){
        showMessage('登陆才可以继续哦~');
    });
    $('.Share').mouseover(function(){
        showMessage('好东西要让更多人知道才行哦');
	});
    $('#footer p a i.fa-weibo').mouseover(function(){
        showMessage('微博？求关注喵！');
	});
    $('#footer p a i.fa-envelope').mouseover(function(){
        showMessage('邮件我会及时回复的！');
	});
    $('#footer p a i.fa-twitter').mouseover(function(){
        showMessage('Twitter?好像是不存在的东西?');
	});
    $('#footer p a i.fa-facebook-official').mouseover(function(){
        showMessage('emmm...FB已经好久没上了...');
	});
    $('#footer p a i.fa-github').mouseover(function(){
        showMessage('GayHub！我是新手！');
	});
	$('.cd-gb-a').mouseover(function(){
        showMessage('既然来了就留下点什么吧~');
	});
	$('#weixin-img').mouseover(function(){
        showMessage('这是我的微信二维码~');
	});
	$('.cd-top').mouseover(function(){
        showMessage('要回到开始的地方么？');
	});
});
jQuery(document).ready(function ($) {
    window.setInterval(function () {
        msgs = [$("#hitokoto").text()];
        var i = Math.floor(Math.random() * msgs.length);
        showMessage(msgs[i], 10000);
    }, 35000);
});
jQuery(document).ready(function ($) {
    window.setInterval(function () {
        msgs = ["乾坤大挪移！", "我飘过来了！~", "我飘过去了", "我得意地飘！~飘！~"];
        var i = Math.floor(Math.random() * msgs.length);
        s = [0.1, 0.2, 0.3, 0.4, 0.5, 0.6,0.7,0.75,-0.1, -0.2, -0.3, -0.4, -0.5, -0.6,-0.7,-0.75];
        var i1 = Math.floor(Math.random() * s.length);
        var i2 = Math.floor(Math.random() * s.length);
            $(".spig").animate({
            left: document.body.offsetWidth/2*(1+s[i1]),
            top:  (window.innerHeight+document.documentElement.scrollTop-170)-(window.innerHeight-170)/2*(1+s[i2])
        },
			{
			    duration: 2000,
			    complete: showMessage(msgs[i])
			});
    }, 45000);
});
jQuery(document).ready(function ($) {
    $("#author").click(function () {
        showMessage("留下你的尊姓大名！");
        $(".spig").animate({
            top: $("#author").offset().top - 70,
            left: $("#author").offset().left - 170
        },
		{
		    queue: false,
		    duration: 1000
		});
    });
    $("#email").click(function () {
        showMessage("留下你的邮箱，不然就是无头像人士了！");
        $(".spig").animate({
            top: $("#email").offset().top - 70,
            left: $("#email").offset().left - 170
        },
		{
		    queue: false,
		    duration: 1000
		});
    });
    $("#url").click(function () {
        showMessage("快快告诉我你的家在哪里，好让我去参观参观！");
        $(".spig").animate({
            top: $("#url").offset().top - 70,
            left: $("#url").offset().left - 170
        },
		{
		    queue: false,
		    duration: 1000
		});
    });
    $("#comment").click(function () {
        showMessage("一定要认真填写喵~");
        $(".spig").animate({
            top: $("#comment").offset().top - 70,
            left: $("#comment").offset().left - 170
        },
		{
		    queue: false,
		    duration: 1000
		});
    });
});
jQuery(document).ready(function ($) {
    var f = $(".spig").offset().top;
    $(window).scroll(function () {
        $(".spig").animate({
            top: $(window).scrollTop() + f +300
        },
		{
		    queue: false,
		    duration: 1000
		});
    });
});
jQuery(document).ready(function ($) {
    var stat_click = 0;
    $(".mumu").click(function () {
        if (!ismove) {
            stat_click++;
            if (stat_click > 4) {
                msgs = ["你有完没完呀？", "你已经摸我" + stat_click + "次了", "非礼呀！救命！OH，My ladygaga"];
                var i = Math.floor(Math.random() * msgs.length);
            } else {
                msgs = ["筋斗云！~我飞！", "我跑呀跑呀跑！~~", "别摸我，大男人，有什么好摸的！", "惹不起你，我还躲不起你么？", "不要摸我了，我会告诉老婆来打你的！", "干嘛动我呀！小心我咬你！"];
                var i = Math.floor(Math.random() * msgs.length);
            }
        s = [0.1, 0.2, 0.3, 0.4, 0.5, 0.6,0.7,0.75,-0.1, -0.2, -0.3, -0.4, -0.5, -0.6,-0.7,-0.75];
        var i1 = Math.floor(Math.random() * s.length);
        var i2 = Math.floor(Math.random() * s.length);
            $(".spig").animate({
            left: document.body.offsetWidth/2*(1+s[i1]),
            top:  (window.innerHeight+document.documentElement.scrollTop-170)-(window.innerHeight-170)/2*(1+s[i2])
            },
			{
			    duration: 500,
			    complete: showMessage(msgs[i])
			});
        } else {
            ismove = false;
        }
    });
});
function showMessage(a, b) {
    if (b == null) b = 10000;
    jQuery("#message").hide().stop();
    jQuery("#message").html(a);
    jQuery("#message").fadeIn();
    jQuery("#message").fadeTo("1", 1);
    jQuery("#message").fadeOut(b);
};
var _move = false;
var ismove = false;
var _x, _y;
jQuery(document).ready(function ($) {
    $("#spig").mousedown(function (e) {
        _move = true;
        _x = e.pageX - parseInt($("#spig").css("left"));
        _y = e.pageY - parseInt($("#spig").css("top"));
     });
    $(document).mousemove(function (e) {
        if (_move) {
            var x = e.pageX - _x; 
            var y = e.pageY - _y;
            var wx = $(window).width() - $('#spig').width();
            var dy = $(document).height() - $('#spig').height();
            if(x >= 0 && x <= wx && y > 0 && y <= dy) {
                $("#spig").css({
                    top: y,
                    left: x
                });
            ismove = true;
            }
        }
    }).mouseup(function () {
        _move = false;
    });
});