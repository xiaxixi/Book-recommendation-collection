<?php 

/**
 * 
 * @authors ChenMingxuan (849651526@qq.com)
 * @date    2018-06-06 09:21:21
 * @version $Id$
 */

header("Content-type: text/html; charset=utf-8"); 
$link = mysqli_connect('127.0.0.1', 'root', '', 'brc');
if (!$link){
    echo"<script>alert('数据库连接失败！')</script>";
}else {
    if (isset($_POST['submit'])){
        $query = "select * from user where name = '{$_POST['name']}' and pwd = '{$_POST['pwd']}'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 1){
            header("Location:../index.html");
        }
    }
}
mysqli_close($link);
?>