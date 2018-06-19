<?php
/**
 * 
 * @authors Wang Yinkai (15057638632@163.com)
 * @date    2018-06-17 14:04:02
 * @version $Id$
 */

session_start(); 
$link = mysqli_connect('127.0.0.1', 'root', 'okfCRv0q', 'brc');
if (!$link){
    echo"<script>alert('数据库连接失败！')</script>";
}else{
    $query = "INSERT into usercollectdouban (name,title,cover_addr, Alt) 
                values('{$_SESSION['name']}','{$_POST['title']}','{$_POST['img']}','{$_POST['alt']}')";
    $result=mysqli_query($link, $query);      
}
?>
