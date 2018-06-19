<?php
/**
 * 
 * @authors Zheng Liu (995170241@qq.com)
 * @date    2018-06-18 23:25:45
 * @version $Id$
 */

    header("Content-type:application/json;charset=utf-8");

    session_start(); 
    $name = $_SESSION["name"];

    $servername ="127.0.0.1";
    $username   ="root";
    $password   ="okfCRv0q";
    $database   ="brc";

    $conn = mysqli_connect($servername, $username, $password);
    mysqli_query($conn, "SET NAMES UTF8");

    if (!$conn) {
        die('Could not connect: ' . mysqli_error());
    }

    mysqli_select_db($conn, $database);

    $sql = "select image_addr, name from `user` where name = '$name'";

    $result = mysqli_query($conn, $sql);
    $user=array(); 
    $i=0;

    if($result && mysqli_num_rows($result)>0) {
        while($row = mysqli_fetch_assoc($result)) {
            $user[$i]= $row;
            $i++;
        }
        echo json_encode($user); 
    }

    mysqli_close($conn);
?> 