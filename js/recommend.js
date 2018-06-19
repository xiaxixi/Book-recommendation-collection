/**
 * 
 * @authors Zheng Liu (995170241@qq.com)
 * @date    2018-06-14 20:19:09
 * @version $Id$
 */

var xmlHttp;

function load() { 
    xmlHttp = GetXmlHttpObject();

    if (xmlHttp == null) {
        alert ("Browser does not support HTTP Request");
        return;
    }

    var url = "../php/book.php";
    xmlHttp.onreadystatechange = stateChanged;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

// 标记是否电击收藏键
var collectbuttomstatues = false;
function isCollect() {
    collectbuttomstatues = true;
}

// 是否第一次按change按钮
var statue = false;

var jsonstr;
var recommend_book;
// book_id
var i = 0;

function stateChanged() { 
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == 200) {
        jsonstr = xmlHttp.responseText;

        if(collectbuttomstatues) {
            i = 0;
            collectbuttomstatues = false;
        }

        if(jsonstr[0] == "n") {
            //跳转没有更多推荐界面
            recommend_book = false;
            window.location.href='none.html';
        }

        else {
            
            recommend_book = JSON.parse(jsonstr);

            if(recommend_book.length == 1 && statue == true)
                alert("书库中就只剩这一本符合您喜欢类型的书籍了！");

            console.log(recommend_book.length);
            console.log(i);

            document.getElementById("head-user-image").src = recommend_book[0].image_addr;
            document.getElementById("head-user-name").innerHTML = recommend_book[0].name;
            document.getElementById("head-user-name").href = "user-center.html";

            if(!statue) {
                document.getElementById("LearnMore").href = recommend_book[i].Alt;
                document.getElementById("cover").src = recommend_book[i].cover_addr;
                document.getElementById("title").innerHTML = recommend_book[i].title;
                document.getElementById("author").innerHTML = recommend_book[i].author;
                document.getElementById("type").innerHTML = recommend_book[i].type;
                document.getElementById("grade").innerHTML = recommend_book[i].grade;
                document.getElementById("intro").innerHTML = recommend_book[i].intro;
            }
        }
    }
}

function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    }
    catch (e) {
        //Internet Explorer
        try {
        xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}

function change() {
    statue = true;
    load();

    if(recommend_book) {

        if(recommend_book.length > 1) {
            document.getElementById("collect-buttom").innerHTML = "+收藏";
            document.getElementById("collect-buttom").style.background = "#5a9ad7";

            i++;
            if(i < recommend_book.length) {
                document.getElementById("LearnMore").href = recommend_book[i].Alt;
                document.getElementById("cover").src = recommend_book[i].cover_addr;
                document.getElementById("title").innerHTML = recommend_book[i].title;
                document.getElementById("author").innerHTML = recommend_book[i].author;
                document.getElementById("type").innerHTML = recommend_book[i].type;
                document.getElementById("grade").innerHTML = recommend_book[i].grade;
                document.getElementById("intro").innerHTML = recommend_book[i].intro;
            }
            else {
                i = 0;
                document.getElementById("LearnMore").href = recommend_book[i].Alt;
                document.getElementById("cover").src = recommend_book[i].cover_addr;
                document.getElementById("title").innerHTML = recommend_book[i].title;
                document.getElementById("author").innerHTML = recommend_book[i].author;
                document.getElementById("type").innerHTML = recommend_book[i].type;
                document.getElementById("grade").innerHTML = recommend_book[i].grade;
                document.getElementById("intro").innerHTML = recommend_book[i].intro;
            }
        }
    }
}