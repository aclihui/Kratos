(function() {
	'use strict';
	var shareMenu = function() {
		$(".Share").click(function() {
			$(".share-wrap").fadeToggle("slow");
		});
		$('.qrcode').each(function(index, el) {
			var url = $(this).data('url');
			if ($.fn.qrcode) {
				$(this).qrcode({
					text: url,
					width: 150,
					height: 150,
				});
			}
		});
	}
	var topStart = function() {
		$('#top-Start').click(function() {
			$('html,body').animate({
				scrollTop: $('#kratos-blog').offset().top
			}, 1000);
		});
	};
	var isiPad = function() {
		return (navigator.platform.indexOf("iPad") != -1);
	};
	var isiPhone = function() {
		return (
			(navigator.platform.indexOf("iPhone") != -1) ||
			(navigator.platform.indexOf("iPod") != -1)
		);
	};
	var mainMenu = function() {
		$('#kratos-primary-menu').superfish({
			delay: 0,
			animation: {
				opacity: 'show'
			},
			speed: 'fast',
			cssArrows: true,
			disableHI: true
		});
	};
	var parallax = function() {
		$(window).stellar();
	};
	var sidebaraffix = function() {
		if ($("#main").height() > $("#sidebar").height()) {
			var footerHeight = 0;
			if ($('#page-footer').length > 0) {
				footerHeight = $('#page-footer').outerHeight(true);
			}
			$('#sidebar').affix({
				offset: {
					top: $('#sidebar').offset().top - 30,
					bottom: $('#footer').outerHeight(true) + footerHeight + 6
				}
			});
		}
	}
	var toSearch = function() {
			$('.search-box').on("click", function(e) {
				$("#searchform").animate({width:"200px"},200),
				$("#searchform input").css('display','block');
				$(document).one("click", function() {
					$("#searchform").animate({width:"0"},100),
					$("#searchform input").hide();
				});
				e.stopPropagation();
			});
			$('#searchform').on("click", function(e) {e.stopPropagation();})
	};
	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint(function(direction) {
			if (direction === 'down' && !$(this.element).hasClass('animated')) {
				i++;
				$(this.element).addClass('item-animate');
				setTimeout(function() {
					$('body .animate-box.item-animate').each(function(k) {
						var el = $(this);
						setTimeout(function() {
							el.addClass('fadeInUp animated');
							el.removeClass('item-animate');
						}, k * 200, 'easeInOutExpo');
					});
				}, 100);
			}
		}, {
			offset: '85%'
		});
	};
	var showThumb = function(){
		(function ($) {
			$.extend({
				tipsBox: function (options) {
					options = $.extend({
						obj: null,
						str: "+1",
						startSize: "10px",
						endSize: "25px",
						interval: 800,
						color: "red",
						callback: function () { }
					}, options);
					$("body").append("<span class='num'>" + options.str + "</span>");
					var box = $(".num");
					var left = options.obj.offset().left + options.obj.width() / 2;
					var top = options.obj.offset().top - options.obj.height();
					box.css({
						"position": "absolute",
						"left": left - 12 + "px",
						"top": top + 9 + "px",
						"z-index": 9999,
						"font-size": options.startSize,
						"line-height": options.endSize,
						"color": options.color
					});
					box.animate({
						"font-size": options.endSize,
						"opacity": "0",
						"top": top - parseInt(options.endSize) + "px"
					}, options.interval, function () {
						box.remove();
						options.callback();
					});
				}
			});
		})(jQuery);
	}
	var showlove = function() {
			$.fn.postLike = function() {
				if ($(this).hasClass('done')) {
					layer.msg('您已经支持过了', function() {});
					return false;
				} else {
					$(this).addClass('done');
					layer.msg('感谢您的支持');
					var id = $(this).data("id"),
						action = $(this).data('action'),
						rateHolder = $(this).children('.count');
					var ajax_data = {
						action: "love",
						um_id: id,
						um_action: action
					};
					$.post("/wp-admin/admin-ajax.php", ajax_data, function(data) {
						$(rateHolder).html(data);
					});
					return false;
				}
			};
			$(document).on("click", ".Love", function() {
				$(this).postLike();
			});
		}
	var gotop = function() {
		var offset = 300,
			offset_opacity = 1200,
			scroll_top_duration = 700,
			$back_to_top = $('.cd-top'),
			$cd_gb = $('.cd-gb'),
			$cd_weixin = $('.cd-weixin');
		$(window).scroll(function(){
			( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
			if( $(this).scrollTop() > offset_opacity ) { 
				$back_to_top.addClass('cd-fade-out');
				$cd_gb.addClass('cd-fade-out');
				$cd_weixin.addClass('cd-fade-out');
			}
		});
		$back_to_top.on('click', function(event){
			event.preventDefault();
			$('body,html').animate({
				scrollTop: 0 ,
			 	}, scroll_top_duration
			);
		});
	}
	var weixinpic = function() {
		$("#weixin-img").mouseout(function(){
	        $("#weixin-pic")[0].style.display = 'none';
	    })
		$("#weixin-img").mouseover(function(){
	        $("#weixin-pic")[0].style.display = 'block';
	    })
	}
	var showPhotos = function() {
		layer.photos({
		  photos: '.kratos-post-content'
		  ,anim: 0
		}); 
	}
	$(function() {
		topStart();
		mainMenu();
		shareMenu();
		parallax();
		showThumb();
		showlove();
		gotop();
		weixinpic();
		toSearch();
		contentWayPoint();
		showPhotos();
	});
}());
jQuery(document).ready(
	function(jQuery){
	jQuery('.collapseButton').click(function(){
		jQuery(this).parent().parent().find('.xContent').slideToggle('slow');
		if (jQuery(this).parent().parent().find('.xicon').hasClass('active')) {
			jQuery(this).parent().parent().find('.xicon').removeClass('active');
		} else {
			jQuery(this).parent().parent().find('.xicon').addClass('active');
		}
	});
	jQuery('.icoButton').click(function(){
		jQuery(this).parent().parent().parent().find('.xContent').slideToggle('slow');
		if (jQuery(this).parent().parent().parent().find('.xicon').hasClass('active')) {
			jQuery(this).parent().parent().parent().find('.xicon').removeClass('active');
		} else {
			jQuery(this).parent().parent().parent().find('.xicon').addClass('active');
		}
	});
	if (!isindex&&copen) {
	var OwO_demo = new OwO({
		logo: 'OωO表情',
		container: document.getElementsByClassName('OwO')[0],
		target: document.getElementsByClassName('OwO')[0],
		api: xb.thome+'/inc/OwO.json',
		position: 'down',
		width: '90%',
		maxHeight: '250px'
	});
	function grin(tag) {
		var myField;
		tag = ' ' + tag + ' ';
		if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
		myField = document.getElementById('comment');
		} else {
			return false;
		}
		if (document.selection) {
			myField.focus();
		sel = document.selection.createRange();
		sel.text = tag;
		myField.focus();
		} else if (myField.selectionStart || myField.selectionStart == '0') {
			var startPos = myField.selectionStart;
			var endPos = myField.selectionEnd;
			var cursorPos = endPos;
			myField.value = myField.value.substring(0, startPos)
				+ tag
				+ myField.value.substring(endPos, myField.value.length);
			cursorPos += tag.length;
			myField.focus();
			myField.selectionStart = cursorPos;
			myField.selectionEnd = cursorPos;
			var owoopen = document.getElementsByClassName('OwO OwO-open')[0];
			owoopen.className = "OwO";
		} else {
			myField.value += tag;
			myField.focus();
		}
	}
	}
});
var now = new Date();
function createtime(){
	var grt= new Date(xb.crtime);
	now.setTime(now.getTime()+250);
	days = (now - grt ) / 1000 / 60 / 60 / 24; dnum = Math.floor(days);
	hours = (now - grt ) / 1000 / 60 / 60 - (24 * dnum); hnum = Math.floor(hours);
	if(String(hnum).length ==1 ){hnum = "0" + hnum;}
	minutes = (now - grt ) / 1000 /60 - (24 * 60 * dnum) - (60 * hnum);
	mnum = Math.floor(minutes);
	if(String(mnum).length ==1 ){mnum = "0" + mnum;}
	seconds = (now - grt ) / 1000 - (24 * 60 * 60 * dnum) - (60 * 60 * hnum) - (60 * mnum);
	snum = Math.round(seconds);
	if(String(snum).length ==1 ){snum = "0" + snum;}
	document.getElementById("span_dt_dt").innerHTML = dnum + "天" + hnum + "小时" + mnum + "分" + snum + "秒";
}
setInterval("createtime()",250);
window.onload = function() {
	var now = new Date().getTime();
	var page_load_time = now - performance.timing.navigationStart;
	console.clear();
	console.log("%cFCZBL"," text-shadow: 0 1px 0 #ccc,0 2px 0 #c9c9c9,0 3px 0 #bbb,0 4px 0 #b9b9b9,0 5px 0 #aaa,0 6px 1px rgba(0,0,0,.1),0 0 5px rgba(0,0,0,.1),0 1px 3px rgba(0,0,0,.3),0 3px 5px rgba(0,0,0,.2),0 5px 10px rgba(0,0,0,.25),0 10px 10px rgba(0,0,0,.2),0 20px 20px rgba(0,0,0,.15);font-size:5em")
	console.log('%cwww.fczbl.vip', 'background-image:-webkit-gradient( linear, left top, right top, color-stop(0, #f22), color-stop(0.15, #f2f), color-stop(0.3, #22f), color-stop(0.45, #2ff), color-stop(0.6, #2f2),color-stop(0.75, #2f2), color-stop(0.9, #ff2), color-stop(1, #f22) );color:transparent;-webkit-background-clip: text;font-size:2em;');
	console.log('%c页面加载完毕消耗了'+Math.round(performance.now()*100)/100+'ms','background: #fff;color: #333;text-shadow: 0 0 2px #eee, 0 0 3px #eee, 0 0 3px #eee, 0 0 2px #eee, 0 0 3px #eee;');
};
