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
});

function change() {
    var divDisp = document.getElementById("search").style.display;
    if (divDisp == "block") {
        document.getElementById("search").style.display = "none";
    } else {
        document.getElementById("search").style.display = "block";
    }
}

$("#search-btn").click(function() {
    var txt = "请输入";
    window.wxc.xcConfirm(txt, window.wxc.xcConfirm.typeEnum.input, {
        onOk: function(v) {
            console.log(v);
        }
    });
});