/**
 * 
 * @authors Wang Yinkai (15057638632@163.com)
 * @date    2018-06-07 18:26:37
 * @version $Id$
 */

var val;

var count = -1;
var tmp = 0;

$(function() {
  var oBtn = get_Id("search-btn"),
    oText = get_Id("search-text"),
    oList = get_Id("search-main-list");
  var page = 0;
  var iCount = 4;
  oBtn.onclick = function() {
    val = oText.value;
    if (val == "")
      alert("输入不能为空");
    else
      core(page, val);
  }
});

function get_Id(id) {
  return document.getElementById(id);
}

function core(page, val) {
  var oText = get_Id("search-text");
  var oScript = document.createElement("script");
  oScript.src = "https://api.douban.com/v2/book/search?q=" + val + "&callback=fn&start=" + page + "&count=4";
  document.body.appendChild(oScript); //往BADY里面添加script标签
  document.body.removeChild(oScript); //在BADY里面移除script标签
}

function fn(data) {
  var oBtn = get_Id("search-btn"),
    oText = get_Id("search-text"),
    oList = get_Id("search-main-list"),
    oTotal = get_Id("search-total");
  var oTip = get_Id("search-bottom-tip");
  console.log(data);
  var content = "";
  var Author = new Array(4);
  var Summary = new Array(4);
  var Img = new Array(4);
  var Title = new Array(4);
  var Rating = new Array(4);
  for (var i = 0; i < data.count; i++) {
    Author[i] = data.books[i].author;
    Summary[i] = data.books[i].summary;
    Title[i] = data.books[i].title;
    Img[i] = data.books[i].images.large;
    Rating[i] = data.books[i].rating.average;
    tmp = i;
    if (Author[i] == "" && Summary[i] == "") {
      Author[i] = "无";
      Summary[i] = "不建议收藏此书！";
    } else if (Author[i] == "") {
      Author[i] = "无";
    }
    content += "<li>\
                  <div class='search-infor col-md-3 col-xs-3'>\
                    <img src='" + Img[i] + "'/>\
                  </div>\
                  <div class='search-infor col-md-5 col-xs-5'>\
                    <p>书名：" + Title[i] + "</p>\
                    <p>作者：" + Author[i] + "</p>\
                    <p>豆瓣评分：" + Rating[i] + "</p>\
                    <p>出版社：" + data.books[i].publisher + "</p>\
                  </div>\
                  <div class='collect-button col-md-4 col-xs-4' id='btn'>\
                    <a href=" + data.books[i].alt + ">Learon more</a>\
                    <input type='submit' name='collect' id='collect-btn' value='+收藏'>\
                  </div>\
                  <div class='search-brief col-md-11 col-xs-11'>\
                    <p>简介：</p>\
                  </div>\
                  <div class='search-intro col-md-11 col-xs-11'>\
                    " + Summary[i] + "\
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
  var collect_button = oList.getElementsByTagName("input");
  for (var i = 0; i < collect_button.length; i++) {
    (function(e) { //自执行函数实时把i传入e
      collect_button[i].onclick = function() { //  通过传入的e获取到哪个按钮发生了点击事件
        console.log(Title[e]);
        console.log(Author[e]);
        console.log(Rating[e]);
        console.log(Img[e]);
        console.log(Summary[e]);
        this.value = "已收藏";
        count = e;
      }
    })(i)
  }
  var aLi = oTip.getElementsByTagName("li");

  //给点样式              data.star就是每页开始的数据，如：第一页默认0，第二页为4，。。。
  aLi[data.start / 4].className = "active";

  for (var i = 0; i < aLi.length; i++) {
    aLi[i].index = i;
    aLi[i].onclick = function() {
      console.log(i);
      for (var i = 0; i < aLi.length; i++) {
        aLi[i].className = "";
      };
      this.className = "active";
      core(data.count * this.index, val);
    }
  }
}

