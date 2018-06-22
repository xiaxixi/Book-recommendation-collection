<?php
/**
 * 
 * @authors ChenMingxuan (849651526@qq.com)
 * @date    2018-06-06 09:21:21
 * @version $Id$
 */

    /* 连接后端user数据表，判断输入信息并注册新用户 */

    header("Content-type: text/html; charset=utf-8"); 
    session_start();
    $servername = "127.0.0.1";
    $username   = "root";
    $password   = "okfCRv0q";
    $database   = "brc";

    if (isset($_POST['submit'])){
        $name = $_POST["name"];  
        $pwd = $_POST["pwd"];  
        $pwd_confirm = $_POST["repwd"];
        $select = $_POST["select"];

        $conn = mysqli_connect($servername, $username, $password,$database);   // 连接数据库

        if (!$conn) {
            die('Could not connect: ' . mysqli_connect_error());
        }

        mysqli_query($conn,"SET NAMES UTF8");  // 设定字符集
        $sql = "select name from `user` where name = '{$_POST['name']}'";
        $result = mysqli_query($sql);
        $num = mysqli_num_rows($result); // 统计执行结果影响的条数
        $image_addr = 'http://106.14.151.175/user-image/default.jpg';
        
        // 验证填写信息是否合乎规范
        if($name == "" || $pwd == "" || $pwd_confirm == "" || $select == "") {  
            echo "<script>alert('信息不能为空，请重新填写');history.go(-1);</script>";  
        }
        else if ((3 > strlen($name)) || (16 < strlen($name))) {  
            echo "<script>alert('用户名3-16位,请重新填写');history.go(-1);</script>";
        }
        else if (0 < $num){
            echo "<script>alert('此用户名已经注册,请重新填写');history.go(-1);</script>"; 
        }
        else if ((6 > strlen($pwd)) || (18 < strlen($pwd))) {  
            echo "<script>alert('密码6-18位,请重新填写');history.go(-1);</script>";
        }
        else if ($pwd != $pwd_confirm) {
            echo "<script>alert('两次输入的密码不一致,请重新填写');history.go(-1);</script>";
        }
        else {  // 注册成功，返回登录页面
            $query = "insert into user (name,pwd,image_addr,favourite_type) values('{$_POST['name']}','{$_POST['pwd']}','$image_addr','{$_POST['select']}')";
            $result=mysqli_query($conn, $query);
            header("Location:../index.html");
        } 
        // 释放结果
        mysqli_free_result($result);
    }

    mysqli_close($conn);
?>
