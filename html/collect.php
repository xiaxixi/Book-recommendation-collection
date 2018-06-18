<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>收藏界面</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/head.css">
  <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
</head>

<body>
  <!-- head -->
  <div class="head-row">
    <div class="container">
      <div class="head row">
        <div class="head-box col-md-2 col-xs-2 col-lg-2">
          <a class="head-box-style" href="../index.html">推荐</a>
        </div>
        <div class="head-box col-md-2 col-xs-2 col-lg-2">
          <!-- <button class="head-box-style head-box-searchbtn" id="search-btn">搜索</button> -->
          <a class="head-box-style" href="search.html">搜索</a>
        </div>
        <div class="head-box col-md-2 col-xs-2 col-lg-2">
          <a class="head-box-style" href="">收藏夹</a>
        </div>
        <div class="head-box col-md-3 col-xs-3 col-lg-3"></div>
        <!-- 头像 -->
        <div class="head-box col-md-1 col-xs-1 col-lg-1">
          <a href="user-center.php">
            <?php
              session_start();
              if($_SESSION['name']) {
                echo  $_SESSION['name'];
              }else{
                header("Location: login.php");
              }
            ?>
          </a>
        </div>
        <div class="head-box col-md-2 col-xs-2 col-lg-2">
          <a class="head-box-style" href="../../login.php">登陆</a>
        </div>
      </div>
    </div>
  </div>
  <!-- collett page -->
  <div class="page container">
    <div class="collect">
      <div class="collect-right col-lg-8 col-md-8 col-xs-8">    
        <?php 
            session_start(); 
            $link = mysqli_connect('127.0.0.1', 'root', '123456', 'login');
            if (!$link){
                echo"<script>alert('数据库连接失败！')</script>";
            }else{
              $query = "SELECT title,cover_addr,Alt FROM usercollect WHERE name = '{$_SESSION['name']}'";
              $result = mysqli_query($link, $query);
              $num=mysqli_num_rows($result);
              for($i = 0; $i < $num; $i++) {
                $row=mysqli_fetch_assoc($result);  
                $img = $row["cover_addr"];
                $title = $row["title"];
                $alt = $row["Alt"];
                $str = '<div class="collect-right-box col-lg-3 col-md-3 col-xs-3">
                          <div class="collect-right-box-cover">
                            <img src='.$img.' alt="book-cover">
                            <a href='.$alt.'>learn more</a>
                          </div>
                          <p class="collect-right-box-title">'.$title.'</p>
                        </div>';
                echo $str;
              }
            }
        ?>
      </div>
    </div>
  </div>
  <div class="collect-footer">
    <div></div>
  </div>
</body>
<script type="text/javascript" src="../js/nav.js"></script>

</html>
