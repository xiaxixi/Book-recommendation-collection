<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2018-06-13 12:06:20
 * @version $Id$
 */

// $q=$_GET["q"];

$book_link = mysqli_connect('127.0.0.1', 'root', '123456', 'brc');
if (!$book_link){
    echo"<script>alert('数据库连接失败！')</script>";
}
else {
    alert("s");
    $book_query = "select * from book where type = 'computer'";
    $book_result = mysqli_query($book_link, $book_query);
    $book_rows = mysqli_fetch_array($book_result);
        // if (isset($_POST['submit'])){
        //     $query = "select * from book where title = '{$_POST['boos["0"].title']}' and author = '{$_POST['books["0"].author']}'";
        //     $result = mysqli_query($link, $query);
        //     if (mysqli_num_rows($result) == 1){
        //         header("Location:final/collect.html");
        //     }
        // }
    // alert($book_rows["0"].title);
    // echo $book_rows["0"].title;
    echo "<th>Firstname</th>";

}
mysql_close($book_link);
?>