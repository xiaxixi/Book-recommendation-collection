<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="referrer" content="never">
  <title>收藏界面</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/collect.css">
  <link rel="stylesheet" type="text/css" href="../css/head.css">
  <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
</head>

<body>
  <!-- head -->
  <div class="head-bg"></div>
  <div class="head-row">
    <div class="container">
      <div class="head row">
        <div class="head-box col-md-2 col-xs-2 col-lg-2">
          <a class="head-box-style" href="recommend.html">推荐</a>
        </div>
        <div class="head-box col-md-2 col-xs-2 col-lg-2">
          <!-- <button class="head-box-style head-box-searchbtn" id="search-btn">搜索</button> -->
          <a class="head-box-style" href="search.php">搜索</a>
        </div>
        <div class="head-box col-md-2 col-xs-2 col-lg-2">
          <a class="head-box-style" href="">收藏夹</a>
        </div>
        <div class="head-box col-md-2 col-xs-2 col-lg-2"></div>
        <!-- 头像 -->
        <?php include "../php/head.php" ?>
        <div class="head-box col-md-2 col-xs-2 col-lg-2">
          <a class="head-box-style" href="../index.html">登陆</a>
        </div>
      </div>
    </div>
  </div>
  <!-- collett page -->
  <div class="collect container">
    <?php include "../php/user-book.php";?>
  </div>
</body>
<script type="text/javascript" src="../js/nav.js"></script>

</html>
