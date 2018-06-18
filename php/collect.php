<?php
/**
 * 
 * @authors Zheng Liu (995170241@qq.com)
 * @date    2018-06-18 12:20:39
 * @version $Id$
 */

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

    if($_SESSION['name'] == "未登录") {
        $name = "未登录";
        $flaglogin = 0;
    }
    else {
        $name = $_SESSION['name'];
        $name = "九点半";
        $flaglogin = 1;
    }

    $UserName = $_POST['name'];
    $BookId = $_POST['book_id'];
    $Alt = $_POST['Alt'];

    $sql = "insert into usercollect (name, book_id, Alt) 
            values('{$UserName}', '{$BookId}', '{$Alt}')";

    echo mysql_query($sql);

    if($db->query($sql, 0)) {
        echo "OK";
    }

    else {
        echo "NO";
    }

    // $result = mysql_query($conn, $query);

    mysql_close($conn);
?>