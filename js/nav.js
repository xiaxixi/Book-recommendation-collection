/**
 * 
 * @authors Wang Yinkai (15057638632@163.com)
 * @date    2018-05-20 19:51:14
 * @version $Id$
 */

$(function() {
    var liWidth = $('.main-right #main-right-nav li').width();
    $('.main-right #main-right-nav li').hover(function() {
        var index = $(this).index();
        $(this).addClass('on').siblings().removeClass('on');
        $(this).find('.second').fadeIn(300);
    }, function() {
        $(this).find('.second').fadeOut(300);
    });
    var currentDate = "21";
    $("span[id='read-count']").each(function() {
        $(this).text(currentDate);
    });
    $("span[id='unread-count']").each(function() {
        $(this).text(currentDate);
    });
    var len = $(".collect-left-ul li").length;
    var index;
    $(".collect-left-ul li").mousedown(function() {
        var index = $(".collect-left-ul li").index(this);
        show(index);
    }).eq(0).mousedown();
    $("#search-btn").click(function() {
        var text = $("#search-text").val();
        console.log(text);
    });
});

function show(index) {
    $(".collect-right-ul li").eq(index).show().siblings('li').hide();
    $(".collect-left-ul li").css("background", "#fff").eq(index).css("background", "#5a9ad7");
    $(".collect-left-ul li div a").css("color", "#5a9ad7").eq(index).css("color", "#fff");
    $(".collect-left-ul li div span").css("color", "#5a9ad7").eq(index).css("color", "#fff");
}