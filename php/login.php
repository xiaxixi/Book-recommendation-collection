<?php 
$link = mysqli_connect('127.0.0.1', 'root', '', 'login');
if (!$link){
    echo"<script>alert('数据库连接失败！')</script>";
}else {
    if (isset($_POST['submit'])){
        $query = "select * from user where user_name = '{$_POST['name']}' and pwd = '{$_POST['pwd']}'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 1){
            header("Location:../html/user-center.html");
        }
    }
}
?>