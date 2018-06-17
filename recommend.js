/**
 * 
 * @authors Zheng Liu (995170241@qq.com)
 * @date    2018-06-14 20:19:09
 * @version $Id$
 */

var loginFlag = 1;
var xmlHttp;

function load() { 
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert ("Browser does not support HTTP Request");
        return;
    }
    var url = "php/book.php";
    // url=url+"?q="+str;
    // url=url+"&sid="+Math.random();
    xmlHttp.onreadystatechange = stateChanged;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

var jsonstr;
var recommend_book;
// book_id
var i = 0;
function stateChanged() { 
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == 200) {
        jsonstr = xmlHttp.responseText;
        console.log(jsonstr);
        recommend_book = JSON.parse(jsonstr);

        if(loginFlag == 0) {
            document.getElementById("head-user-image").src = recommend_book[0].image_addr;
            document.getElementById("head-user-name").innerHTML = "未登录";
        }

        else {
            document.getElementById("head-user-image").src = recommend_book[0].image_addr;
            document.getElementById("head-user-name").innerHTML = recommend_book[0].name;
            document.getElementById("login").innerHTML = "";
        }

        document.getElementById("cover").src = recommend_book[i].cover_addr;
        document.getElementById("title").innerHTML = recommend_book[i].title;
        document.getElementById("author").innerHTML = recommend_book[i].author;
        document.getElementById("type").innerHTML = recommend_book[i].type;
        document.getElementById("grade").innerHTML = recommend_book[i].grade;
        document.getElementById("intro").innerHTML = recommend_book[i].intro;
        loginFlag = 1;
        // console.log('1');
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

function collect() {

}

function change() {
    if(jsonstr == "none") {
        //跳转没有更多推荐界面
        // header("Location:Book-recommendation-collection-master/Book-recommendation-collection-master/html/none.html");
        window.location.href='html/none.html';
    }

    else {
        i+=2;
        if(i < recommend_book.length) {
            document.getElementById("title").innerHTML = recommend_book[i].title;
            document.getElementById("author").innerHTML = recommend_book[i].author;
            document.getElementById("type").innerHTML = recommend_book[i].type;
            document.getElementById("grade").innerHTML = recommend_book[i].grade;
            document.getElementById("intro").innerHTML = recommend_book[i].intro;
        }
        else {
            // header("Location:Book-recommendation-collection-master/Book-recommendation-collection-master/html/none.html");
            // window.location.href='html/none.html';
            i = 0;
            document.getElementById("title").innerHTML = recommend_book[i].title;
            document.getElementById("author").innerHTML = recommend_book[i].author;
            document.getElementById("type").innerHTML = recommend_book[i].type;
            document.getElementById("grade").innerHTML = recommend_book[i].grade;
            document.getElementById("intro").innerHTML = recommend_book[i].intro;
        }
    }
    console.log(2);
}