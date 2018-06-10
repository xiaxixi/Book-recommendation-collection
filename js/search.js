/**
 * 
 * @authors Wang Yinkai (15057638632@163.com)
 * @date    2018-06-07 18:26:37
 * @version $Id$
 */

var val;

function $(id) {
    return document.getElementById(id);
}

function core(page, val) {
    var oText = $("search-text");
    var oScript = document.createElement("script");
    oScript.src = "https://api.douban.com/v2/book/search?q=" + val + "&callback=fn&start=" + page + "&count=4";
    document.body.appendChild(oScript); //往BADY里面添加script标签
    document.body.removeChild(oScript); //在BADY里面移除script标签
}

function fn(data) {
    var oBtn = $("search-btn"),
        oText = $("search-text"),
        oList = $("search-main-list"),
        oTotal = $("search-total");
    var oTip = $("search-bottom-tip");
    console.log(data);
    var content = "";
    for (var i = 0; i < data.count; i++) {
        var Author = data.books[i].author;
        var Summary = data.books[i].summary;
        if (Author == "" && Summary == "") {
            Author = "无";
            Summary = "不建议收藏此书！";
        }else if(Author == ""){
            Author = "无";
        }
        content += "<li>\
                        <div class='search-infor col-md-3 col-xs-3'>\
                            <img src='"+data.books[i].images.large +"'/>\
                        </div>\
                        <div class='search-infor col-md-5 col-xs-5'>\
                            <p>书名：" +data.books[i].title +"</p>\
                            <p>作者：" +Author + "</p>\
                            <p>豆瓣评分："+ data.books[i].rating.average +"</p>\
                            <p>出版社：" + data.books[i].publisher +"</p>\
                        </div>\
                        <div class='collect-button col-md-4 col-xs-4' id='collect-btn'>\
                            <button>+收藏</button>\
                        </div>\
                        <div class='search-brief col-md-11 col-xs-11'>\
                            <p>简介：</p>\
                        </div>\
                        <div class='search-intro col-md-11 col-xs-11'>\
                            "+ Summary +"\
                        </div>\
                    </li>";
    };
    oList.innerHTML = content;
    oTotal.innerHTML = "总共<strong>" + data.total + "</strong>本书";

    //图书分页（总数/每页数）如果大于5则等于5，否则向上去取整
    var num = ((data.total - data.start + 1) / data.count) > 5 ? 5 : Math.ceil((data.total - data.start + 1) / data.count);
    //创建分页标签li
    var html = "";
    for (var i = 0; i < num; i++) {
        html += "<li>" + (i + 1) + "</li>";
    };

    oTip.innerHTML = html;
    var aLi = oTip.getElementsByTagName("li");

    //给点样式              data.star就是每页开始的数据，如：第一页默认0，第二页为4，。。。
    aLi[data.start / 4].className = "active";

    for (var i = 0; i < aLi.length; i++) {
        aLi[i].index = i;
        aLi[i].onclick = function() {
            for (var i = 0; i < aLi.length; i++) {
                aLi[i].className = "";
            };
            this.className = "active";
            core(data.count * this.index, val);
        }
    }
}

window.onload = function() {
    var oBtn = $("search-btn"),
        oText = $("search-text"),
        oList = $("search-main-list");
    var page = 0;
    var iCount = 4;
    oBtn.onclick = function() {
        val = oText.value;
        if (val == "")
            alert("输入不能为空");
        else
            core(page, val);
    }
};
