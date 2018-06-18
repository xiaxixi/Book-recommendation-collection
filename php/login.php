<?php 

/**
 * 
 * @authors ChenMingxuan (849651526@qq.com)
 * @date    2018-06-06 09:21:21
 * @version $Id$
 */
	
	header("Content-type: text/html; charset=utf-8"); 

    $servername ="127.0.0.1";
    $username   ="root";
    $password   ="";
    $database   ="brc";

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
             	header("Location:../index.html");
         	}
         	else
         		echo "<script>alert('信息填写有误，请重新填写');history.go(-1);</script>";  
        } 
        // 释放结果
        mysqli_free_result($result);
    }

    mysqli_close($conn);
?>