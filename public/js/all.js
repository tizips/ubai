function getCookie(t){for(var e=t+"=",n=document.cookie.split(";"),o=0;o<n.length;o++){for(var a=n[o];" "==a.charAt(0);)a=a.substring(1,a.length);if(0==a.indexOf(e))return a.substring(e.length,a.length)}return null}function menu_click(t,e){$(t).click(function(){$(t).prop("class",(e=!e)?"menu_click":"menu_close")})}function body_am(t){return t=isNaN(t)?$("#"+t).offset().top:t,$("body,html").animate({scrollTop:t},0),!1}function to_am(t){var e=location.hash.indexOf("#");e=window.location.hash.substring(e+1),body_am(e)}function getFormJson(t){var e={},n=$(t).serializeArray();return $.each(n,function(){void 0!==e[this.name]?(e[this.name].push||(e[this.name]=[e[this.name]]),e[this.name].push(this.value||"")):e[this.name]=this.value||""}),e}function l(){history.replaceState({url:window.document.location.href,title:window.document.title,html:$(document).find(pjax_main).html()},window.document.title,document.location.href)}function a(){window.addEventListener("popstate",function(t){t.state&&(document.title=t.state.title,$(pjax_main).html(t.state.html))})}function ajax(t,e,n,o){"pagelink"!=e&&"search"!=e||($("body,html").animate({scrollTop:0},500),NProgress.set(.4),$("html").addClass("load")),$.ajax({url:t,type:n,data:o,beforeSend:function(){l()},success:function(n){if("pagelink"!=e&&"search"!=e||($(pjax_main).html($(n).find(pjax_main).html()),NProgress.done(),$("html").removeClass("load")),document.title=$(n).filter("title").text(),"comment"!=e){var o={url:t,title:$(n).filter("title").text(),html:$(n).find(pjax_main).html()};window.history.pushState(o,$(n).filter("title").text(),t)}},complete:function(){"pagelink"==e&&to_am(t)},timeout:1e4,error:function(n){e==e=="pagelink"||"search"==e?location.href=t:location.href=t}})}function comment(){$(".navigation .alignTop a").click(function(){$("ol .commentlist").css("display","block")})}$(document).ready(function(){var t=getCookie("class");$("body").attr("id",t),$(".skin i").each(function(){$(this).click(function(){function t(t,e,n){var o=new Date;o.setTime(o.getTime()+24*n*60*60*1e3),document.cookie=t+"="+escape(e)+";expires="+o.toGMTString()}var e=$(this).attr("class");$("body").attr("id",e,30),t("class",e,30)})})}),$(".search_click").click(function(){$(".search_form"),$("body").prop("class","search_bg"),$(".search_key").focus(),$(".search_close").click(function(){$(".search_form"),$("body").prop("class","")})}),$(".back2top").hide(),$(window).scroll(function(){$(this).scrollTop()>200?$(".back2top").fadeIn(100):$(".back2top").fadeOut(200)}),$(".back2top").click(function(){return $("body,html").animate({scrollTop:0},400),!1}),menu_click("#topMenu",!0);var pjax_main="#pjax",pjax_a="a[target!=_blank][rel!=nofollow][class!=no-ajax][date-ajax!=false]",pjax_form=".search form",pjax_key=".search_key";$(function(){a()});var home_url=document.location.href.match(/\/\/([^\/]+)\//i)[0];$("body").on("click",pjax_a,function(){return ajax($(this).attr("href"),"pagelink"),!1});