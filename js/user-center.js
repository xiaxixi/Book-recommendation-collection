/**
 * 
 * @authors Your Name (you@example.org)
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
    var url = "../php/user-center.php";
    // url=url+"?q="+str;
    // url=url+"&sid="+Math.random();
    xmlHttp.onreadystatechange = stateChanged;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

var jsonstr;
var user_book;
// book_id
var i = 0;
function stateChanged() { 
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == 200) {
        jsonstr = xmlHttp.responseText;
        console.log(jsonstr);
        user_book = JSON.parse(jsonstr);

        document.getElementById("head-user-image").src = user_book[0].image_addr;
        document.getElementById("head-user-name").innerHTML = user_book[0].name;

        document.getElementById("user-name").innerHTML = user_book[0].name;
        document.getElementById("user-favourite-type").innerHTML += user_book[0].favorite_type;
        document.getElementById("user-image").src = user_book[0].image_addr;

        // console.log(user_book.length);

        if(user_book.length == 0) {
            document.getElementById("user-book1").innerHTML = "<div style='font-size: 20px;color: #aaa;text-align: center;padding-top:25%'>这个人很懒，什么都没收藏！</div>";
            document.getElementById("user-book2").innerHTML = "<div style='font-size: 20px;color: #aaa;text-align: center;padding-top:25%'>这个人很懒，什么都没收藏！</div>";
            document.getElementById("user-book3").innerHTML = "<div style='font-size: 20px;color: #aaa;text-align: center;padding-top:25%'>这个人很懒，什么都没收藏！</div>";
        }

        else if(user_book.length == 1) {
            document.getElementById("user-book1-cover").src = user_book[user_book.length-1].cover_addr;
            document.getElementById("user-book1-title").innerHTML = user_book[user_book.length-1].title;
            document.getElementById("user-book2").innerHTML = "<div style='font-size: 20px;color: #aaa;text-align: center;padding-top:25%'>还没有收藏第二本哦~</div>";
            document.getElementById("user-book3").innerHTML = "<div style='font-size: 20px;color: #aaa;text-align: center;padding-top:25%'>还没有收藏第三本哦~</div>";
        }

        else if(user_book.length == 2) {
            document.getElementById("user-book1-cover").src = user_book[user_book.length-1].cover_addr;
            document.getElementById("user-book1-title").innerHTML = user_book[user_book.length-1].title;
            document.getElementById("user-book2-cover").src = user_book[user_book.length-2].cover_addr;
            document.getElementById("user-book2-title").innerHTML = user_book[user_book.length-2].title;
            document.getElementById("user-book3").innerHTML = "<div style='font-size: 20px;color: #aaa;text-align: center;padding-top:25%'>还没有收藏第三本哦~</div>"; 
        }

        else if(user_book.length >= 3) {
            document.getElementById("user-book1-cover").src = user_book[user_book.length-1].cover_addr;
            document.getElementById("user-book1-title").innerHTML = user_book[user_book.length-1].title;
            document.getElementById("user-book2-cover").src = user_book[user_book.length-2].cover_addr;
            document.getElementById("user-book2-title").innerHTML = user_book[user_book.length-2].title;
            document.getElementById("user-book2-cover").src = user_book[user_book.length-3].cover_addr;
            document.getElementById("user-book2-title").innerHTML = user_book[user_book.length-3].title;
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
