<?php
/**
 * 
 * @authors Zheng Liu (995170241@qq.com)
 * @date    2018-06-18 01:28:18
 * @version $Id$
 */

    header("Content-type:application/json;charset=utf-8");
    
    
    $name = "未登录";
    session_start(); 
    $_SESSION['name'] = "未登录";

    $servername ="localhost";
    $username   ="root";
    $password   ="";
    $database   ="brc";

    $conn = mysql_connect($servername, $username, $password);

    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }

    mysql_select_db($database, $conn);
    mysql_query("SET NAMES UTF8");

    
    if($_SESSION['name']) {
        $name = "未登录";
        $flaglogin = 0;
    }
    else {
        $name = $_SESSION['name'];
        $name = "九点半";
        $flaglogin = 1;
    }

    if($flaglogin == 1) {
        $sql = "select distinct `book`.*, name, image_addr from `book`, `user`
        where
        `book`.book_id not in
            (select `usercollect`.book_id from `usercollect` where `usercollect`.name = '$name')
        and type = 
            (select favourite_type from `user` where name = '$name')";
    }

    else {
        $sql = "select distinct `book`.*, name, image_addr from `book`,`user`";
    }
    
    
    $result = mysql_query($sql);
    $books=array(); 
    $i=0;

    if($result && mysql_num_rows($result)>0) {
        while($row = mysql_fetch_assoc($result)) {
            $books[$i]= $row;
            $i++;
        }
        echo json_encode($books); 
    }

    else {
        echo "none";
    }

    mysql_close($conn);
?>