<?php
/**
 * 
 * @authors Zheng Liu (995170241@qq.com)
 * @date    2018-06-18 12:28:18
 * @version $Id$
 */

    $name = "未登录";
    session_start(); 
    $_SESSION['name'] = "未登录";

    $name = $_SESSION['name'];
    $name = "九点半";
    $flaglogin = 1;


    $servername ="localhost";
    $username   ="root";
    $password   ="";
    $database   ="brc";

    $conn = mysql_connect($servername, $username, $password);

    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }

    mysql_select_db($database, $conn);

    $sql = "select user_id, name, image_addr, favorite_type, book_id, title, cover_addr from `user` natural join `usercollect` natural join `book` where user_name = '$name'";
    mysql_query("SET NAMES UTF8");
    $result = mysql_query($sql);
    $userBooks=array(); 
    $i=0;

    if(mysql_num_rows($result) > 0) {
        while($row = mysql_fetch_assoc($result)) {
            $userBooks[$i]= $row;
            $i++; 
        }
        echo json_encode($userBooks); 
    }
    else {
        echo none;
    }

    mysql_close($conn);
?>