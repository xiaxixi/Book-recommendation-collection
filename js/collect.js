/**
 * 
 * @authors Zheng Liu (995170241@qq.com)
 * @date    2018-06-18 12:21:46
 * @version $Id$
 */

$(function() {
    $("#collect-buttom").click(function() {
        var BookId = recommend_book[i].book_id;
        var UserName = recommend_book[0].name;
        var alt = recommend_book[i].Alt;
        // alert(BookId + " " + UserName);

        $.ajax({
            url: "../php/collect.php",
            type: "POST",
            dataType: "TEXT",
            data: {
                'name': UserName,
                'book_id':BookId,
                'Alt': alt
            },
            success: function(data) {
                document.getElementById("collect-buttom").innerHTML = "已收藏";
                document.getElementById("collect-buttom").style.background = "#aaa";
                alert("收藏成功！");
            }
        });

    })
})
