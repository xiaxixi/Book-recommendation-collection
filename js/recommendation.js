/*
 * @authors Zheng Liu (you@example.org)
 * @date    2018-06-13 15:30:00
 * @version $Id$
 */
function CreateXHR(){
    if (window.XMLHttpRequest)
    {
        //对浏览器 IE7+, Firefox, Chrome, Opera, Safari
        return new XMLHttpRequest();
    }
    else
    {
        //对浏览器 IE6, IE5
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
}

// 上次推荐书的book_id
var i;
if(user[userId-1].user_current_book_id == NULL) {
    i = 0;
}
else {
    i = user[userId-1].user_current_book_id
}

// 现在所登录用户的id
var userId = 1;
// 给用户爱好书籍类型赋值
var user_favourite_type = user[userId-1].user_favourite_type;
user_favourite_type = "computer";

var xmlhttp_recommend; 
xmlhttp = CreateXHR();

xmlhttp_recommend.open("GET","../data/book.json",true);
xmlhttp_recommend.send();
xmlhttp.onreadystatechange = function(){
    if(xmlhttp_recommend.readyState == 4 && xmlhttp_recommend.status == 200){
        var bookstr = xmlhttp_recommend.responseText;
        console.log(jsonstr);
        var recommend_book = JSON.parse(bookstr);
        // 遍历书库
        for(; i < recommend_book.length; ++i) {
            // 根据爱好书籍类型推荐
            if(recommend_book[i].type == user_favourite_type) {
                document.getElementById("title").value = recommend_book[i].title;
                document.getElementById("author").value = recommend_book[i].author;
                document.getElementById("type").value = recommend_book[i].type;
                document.getElementById("grade").value = recommend_book[i].grade;
                document.getElementById("intro").value = recommend_book[i].intro;
            }

            // 循环
            if(i == recommend_book.length - 1) {
                i = 0;
                console.log("none");
            }
        }
        
    }
}

function change() {
    // 遍历书库
    for(i+=1; i < recommend_book.length; ++i) {
        // 根据爱好书籍类型推荐
        if(recommend_book[i].type == user_favourite_type) {
            document.getElementById("title").value = recommend_book[i].title;
            document.getElementById("author").value = recommend_book[i].author;
            document.getElementById("type").value = recommend_book[i].type;
            document.getElementById("grade").value = recommend_book[i].grade;
            document.getElementById("intro").value = recommend_book[i].intro;
        }

        // 循环
        if(i == recommend_book.length - 1) {
            i = 0;
        }
    }
}

function collect() {

}





