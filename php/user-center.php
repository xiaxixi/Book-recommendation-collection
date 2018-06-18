<?php
/**
 * 
 * @authors Zheng Liu (995170241@qq.com)
 * @date    2018-06-18 12:28:18
 * @version $Id$
 */

    // $name = "未登录";
    // session_start(); 
    // $_SESSION['name'] = "未登录";

    // $name = $_SESSION['name'];
    $name = "admin";
    $flaglogin = 1;


    $servername ="localhost";
    $username   ="root";
    $password   ="";
    $database   ="brc";

    $conn = mysqli_connect($servername, $username, $password);
    mysqli_query($conn, "SET NAMES UTF8");

    if (!$conn) {
        die('Could not connect: ' . mysqli_error());
    }

    mysqli_select_db($conn, $database);

    $sql = "select image_addr, name, favourite_type, book_id, title, cover_addr from `user` natural join `usercollect` natural join `book` where name = '$name'";
   
    $result = mysqli_query($conn, $sql);
    $userBooks=array(); 
    $i=0;

    if($result && mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $userBooks[$i]= $row;
            $i++; 
        }
        echo json_encode($userBooks); 
    }
    else {
        $sql = "select name, image_addr, favourite_type from `user` where name = '$name'";
        $userResult = mysqli_query($conn, $sql);

        $user=array();
        $row = mysqli_fetch_assoc($userResult);
        $user[0] = $row;

        echo json_encode($user); 
    }

    mysqli_close($conn);
?>