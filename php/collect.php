<?php
/**
 * 
 * @authors Zheng Liu (995170241@qq.com)
 * @date    2018-06-18 12:20:39
 * @version $Id$
 */

    header("Content-type:application/json;charset=utf-8");

    session_start();
    $name = $_SESSION["name"];

    $servername ="localhost";
    $username   ="root";
    $password   ="";
    $database   ="brc";

    $conn = mysqli_connect($servername, $username, $password);

    if (!$conn) {
        die('Could not connect: ' . mysqli_error());
    }

    mysqli_select_db($conn, $database);
    mysqli_query($conn, "SET NAMES UTF8");
    
    $UserName = $_POST['name'];
    $BookId = $_POST['book_id'];
    $Alt = $_POST['Alt'];

    $sql = "insert into usercollect (name, book_id, Alt) 
            values('{$UserName}', '{$BookId}', '{$Alt}')";

    echo mysqli_query($conn, $sql);

    // $result = mysql_query($conn, $query);

    mysqli_close($conn);
?>