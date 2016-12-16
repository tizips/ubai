// $(document).ready(function () {
//     var cookieClass = getCookie('class');//读取需要缓存的对象。
//     $("body").attr("id", cookieClass);//
//     $(".skin i").each(function () {
//         $(this).click(function () {
//             var className = $(this).attr("class");//保存当前选择的类名
//             $("body").attr("id", className, 30);//把选中的类名给body
//             function SetCookie(name, value, day)//两个参数，一个是cookie的名子，一个是值
//             {
//                 var exp = new Date();    //new Date("December 31, 9998");
//                 exp.setTime(exp.getTime() + day * 24 * 60 * 60 * 1000);
//                 document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
//             }
//             SetCookie("class", className, 30);
//         })
//     });
// });
// function getCookie(name)//取cookies函数
// {
//     var nameEQ = name + "=";
//     var ca = document.cookie.split(';');
//     for (var i = 0; i < ca.length; i++) {
//         var c = ca[i];
//         while (c.charAt(0) == ' ') c = c.substring(1, c.length);
//         if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
//     }
//     return null;
// }

//搜索
$(".search_click").click(function () {
    $('.search_form');
    $('body').prop('class', 'search_bg');
    $(".search_key").focus();
    $(".search_close").click(function () {
        $('.search_form');
        $('body').prop('class', '');
    });
});

//返回顶部
$(".back2top").hide();
$(window).scroll(function() {
    ($(this).scrollTop() > 200) ? $(".back2top").fadeIn(100): $(".back2top").fadeOut(200);
});
$(".back2top").click(function() {
    $("body,html").animate({
        scrollTop: 0
    }, 400);
    return false
});

//导航菜单
menu_click('#topMenu',true);

function menu_click(menu,flag) {
    $(menu).click(function() {
        $(menu).prop('class', (flag = !flag) ? 'menu_click' : 'menu_close');
    });
}

(function ($) {
    var ime = {
        init: function () {
            $(document).pjax('a:not(a[target="_blank"])', '#pjax', {
                timeout: 36000,
                maxCacheLength: 500
            });
            $(document).on('pjax:start', function() {
                NProgress.set(0.4);
            });
            $(document).on('pjax:end', function() {
                NProgress.done();
                $("body,html").animate({
                    scrollTop: 0
                }, 400);
            });
        }
    };
    window.ime = ime;
})(jQuery);
$(document).ready(function()
{
    ime.init();
});
//重载
// function reload_func() {
//     //滑块
//     $('#slide').unslider({
//         autoplay: true,
//         arrows: false
//     });
//     $('.top_home').unslider({
//         animation: 'vertical',
//         autoplay: true,
//         infinite: true,
//         nav: false
//     });
//     //排除规则
//     jQuery(document).ready(function () {
//         jQuery("a[rel='external'],a[rel='external nofollow'],#commentform a,.post_article a").click(
//             function () { window.open(this.href); return false })
//         $(".navigation a,.comment-body a,.page-numbers").addClass("no-ajax");
//     });
//
//     //列表布局
//     for (var i = 0; i < $('.thumbnail').length; i++)
//         $('.thumbnail').slice(i + 1, i % 2 == 0 ? i + 2 : i + 1).prop('class', 'thumbnail right');
//
//     if ($('div.navigation').length > 1)
//         $('div.navigation').slice(0, 1).remove()//删除一个评论分页导航
//     index_overloaded(); //外部重载
// }
// reload_func();

//PJAX
// var pjax_main = '.pjax', // 容器
//     pjax_a = 'a[target!=_blank][rel!=nofollow][class!=no-ajax][date-ajax!=false]', // 排除规则
//     pjax_form = '.search form', // 搜索表单form
//     pjax_key = '.search_key'; // 搜索表单input
// $(function () {
//     a();
// });
// function body_am(id) {
//     id = isNaN(id) ? $('#' + id).offset().top : id;
//     $("body,html").animate({
//         scrollTop: id
//     }, 0);
//     return false;
// }
// function to_am(url) {
//     var anchor = location.hash.indexOf('#');
//     anchor = window.location.hash.substring(anchor + 1);
//     body_am(anchor);
// }
// var home_url = document.location.href.match(/\/\/([^\/]+)\//i)[0];
// function getFormJson(frm) {
//     var o = {};
//     var a = $(frm).serializeArray();
//     $.each(a,
//         function () {
//             if (o[this.name] !== undefined) {
//                 if (!o[this.name].push) {
//                     o[this.name] = [o[this.name]];
//                 }
//                 o[this.name].push(this.value || '');
//             } else {
//                 o[this.name] = this.value || '';
//             }
//         });
//     return o;
// }
// function l() {
//     history.replaceState(
//         {
//             url: window.document.location.href,
//             title: window.document.title,
//             html: $(document).find(pjax_main).html(),
//         }, window.document.title, document.location.href);
// }
// function a() {
//     window.addEventListener('popstate', function (e) {
//         if (e.state) {
//             document.title = e.state.title;
//             $(pjax_main).html(e.state.html);
//             window.load = reload_func();
//         }
//     });
// }
// //AJAX核心
// function ajax(reqUrl, msg, method, data) {
//     if (msg == 'pagelink' || msg == 'search') { // 页面、搜索
//         $("body,html").animate({ scrollTop: 0 }, 500);
//         $("html").addClass("load");
//     }
//
//     $.ajax({
//         url: reqUrl,
//         type: method,
//         data: data,
//         beforeSend: function () {
//             l();
//         },
//         success: function (data) {
//             if (msg == 'pagelink' || msg == 'search') {
//                 $(pjax_main).html($(data).find(pjax_main).html());
//                 $("html").removeClass("load");
//             }
//             document.title = $(data).filter("title").text();
//             if (msg != 'comment') {
//                 var state = {
//                     url: reqUrl,
//                     title: $(data).filter("title").text(),
//                     html: $(data).find(pjax_main).html(),
//                 };
//                 window.history.pushState(state, $(data).filter("title").text(), reqUrl);
//             }
//         },
//         complete: function () {
//             if (msg == 'pagelink') {
//                 to_am(reqUrl);
//             }
//             window.load = reload_func();
//         },
//         timeout: 10000,
//         error: function (request) {
//             if (msg == msg == 'pagelink' || msg == 'search') {
//                 location.href = reqUrl;
//             } else {
//                 location.href = reqUrl;
//             }
//         },
//     });
// }
// //页面ajax
// $('body').on("click", pjax_a,
//     function () {
//         ajax($(this).attr("href"), 'pagelink');
//         return false;
//     });
// //搜索ajax
// $('body').on('submit', pjax_form,
//     function () {
//         ajax(this.action + '?s=' + $(this).find(pjax_key).val(), 'search');
//         return false;
//     });