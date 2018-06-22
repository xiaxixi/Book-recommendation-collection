<?php
/**
 * 
 * @authors Wang Yinkai (15057638632@163.com)
 * @date    2018-06-19 09:21:11
 * @version $Id$
 */

session_start(); 
$link = mysqli_connect('127.0.0.1', 'root', 'okfCRv0q', 'brc');
mysqli_query($link, "SET NAMES 'UTF8'");
if (!$link){
    echo"<script>alert('数据库连接失败！')</script>";
}else{$name = $_SESSION['name'];
	$query = "select image_addr from `user` where name = '$name'";
    $result = mysqli_query($link, $query);
    if($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $img = $row['image_addr'];
            $str = '<div class="head-box col-md-2 col-xs-2 col-lg-2">
          			    <img src='.$img.' href="user-center.html" id="head-user-image">
          			    <a class="head-user-name" href="user-center.html" id="head-user-name">'.$name.'</a>
        		    </div>';
            echo $str;
        }
    }
}
?>
