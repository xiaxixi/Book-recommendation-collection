<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="referrer" content="never">
    <title>搜索</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" type="text/css" href="../css/search.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/head.css">

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
                    <a class="head-box-style" href="user-collect.php">收藏夹</a>
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
    <h1 class="search-title">Search</h1>
    <div class="search-box">
        <input type="text" placeholder="请输入关键词" id="search-text">
        <input type="button" value="搜索图书" id="search-btn">
    </div>
    <div id="search-main">
        <ul id="search-main-list">
     	</ul>
    </div>
    <div id="search-bottom">
        <ul id="search-bottom-tip">
        </ul>
    </div>
</body>
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/search.js"></script>

</html>
