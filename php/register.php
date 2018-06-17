<?php 
$link = mysqli_connect('127.0.0.1', 'root', '', 'login');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}else {
    if (isset($_POST['submit'])){
        if ($_POST['pwd'] == $_POST['repwd']){
    $query = "insert into user (user_name,pwd) values('{$_POST['name']}','{$_POST['pwd']}')";
    $result=mysqli_query($link, $query);
    header("Location:../html/login.html");
        }else {
            echo "<script>alert('两次输入密码不一致！')</script>";
        }
    }
}
?>