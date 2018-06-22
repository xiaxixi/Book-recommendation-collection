<?php 

/**
 * 
 * @authors ChenMingxuan (849651526@qq.com)
 * @date    2018-06-06 09:21:21
 * @version $Id$
 */

    /* 连接后端user数据表，根据输入验证信息并登录 */

    header("Content-type: text/html; charset=utf-8"); 

    session_start();    //  登录系统开启一个session内容 
    $name = $_SESSION["name"];
    
    $servername = "127.0.0.1";
    $username   = "root";
    $password   = "okfCRv0q";
    $database   = "brc";

    if (isset($_POST['submit'])){
        $user = $_POST["name"];  
        $pwd = $_POST["pwd"];

        // 验证填写信息是否合乎规范
        if($user == "" || $pwd == "") {
            echo "<script>alert('信息不能为空，请重新填写');history.go(-1);</script>";  
        }
        else {  
            $conn = mysqli_connect($servername, $username, $password,$database);   // 连接数据库

            if (!$conn) {
                die('Could not connect: ' . mysqli_connect_error());
            }

            mysqli_query($conn,"SET NAMES UTF8");  // 设定字符集

            $query = "select * from user where name = '{$_POST['name']}' and pwd = '{$_POST['pwd']}'";
            $result = mysqli_query($conn, $query);
            if (1 == mysqli_num_rows($result)){
                $_SESSION['name'] = $_POST['name'];
                header("Location:../html/recommend.html");
            }

            $query = "select * from user where name = '{$_POST['name']}' and pwd != '{$_POST['pwd']}'";
            $result = mysqli_query($conn, $query);
            if (1 == mysqli_num_rows($result))
                echo "<script>alert('密码填写有误,请重新填写');history.go(-1);</script>";  

            $query = "select * from user where name = '{$_POST['name']}'";
            $result = mysqli_query($conn, $query);
            if (0 == mysqli_num_rows($result))
                echo "<script>alert('用户名填写有误,请重新填写');history.go(-1);</script>";
        } 
        // 释放结果
        mysqli_free_result($result);
    }

    mysqli_close($conn);
?>
