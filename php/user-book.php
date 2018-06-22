<?php
/**
 * 
 * @authors Wang Yinkai (15057638632@163.com)
 * @date    2018-06-18 20:31:29
 * @version $Id$
 */
session_start(); 
$link = mysqli_connect('127.0.0.1', 'root', 'okfCRv0q', 'brc');
mysqli_query($link, "SET NAMES 'UTF8'");
if (!$link){
    echo"<script>alert('数据库连接失败！')</script>";
}else{
    $name = $_SESSION['name'];
    $query = "select title, cover_addr, `book`.Alt from `usercollect`, `book` where name = '{$name}' and `usercollect`.book_id = `book`.book_id";
    $sql = "select title , cover_addr, Alt from `usercollectdouban` where name='{$name}'";
    $result = mysqli_query($link, $query);
    $res = mysqli_query($link, $sql);
    $i = 0;
    if($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $i++;
            $img = $row['cover_addr'];
            $title = $row["title"];
            $alt = $row["Alt"];
            $str = '<div class="collect-box">
                        <div class="collect-box-cover">
                            <img src="'.$img.'" alt="book-cover">
                            <a target="_blank" href="'.$alt.'"></a>
                        </div>
                        <p class="collect-box-title">《'.$title.'》</p>
                    </div>';
            // echo '<div class="collect row">';
            echo $str;
            // echo '</div>';
        }
    }
    if($res && mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
          $img = $row['cover_addr'];
          $title = $row["title"];
          $alt = $row["Alt"];
          $str = '<div class="collect-box">
                      <div class="collect-box-cover">
                          <img src="'.$img.'" alt="book-cover">
                          <a target="_blank" href="'.$alt.'"></a>
                      </div>
                      <p class="collect-box-title">《'.$title.'》</p>
                 </div>';
          echo $str;
        }
    }
    
}
?>
