<?php
$server="localhost";//主機
$username="root";//你的資料庫使用者名稱
$password="1234";//你的資料庫密碼
$con = mysqli_connect($server,$username,$password);//連結資料庫
mysqli_query($con,"SET NAMES 'utf8'");
if(!$con){
    die("can't connect".mysqli_error());//如果連結失敗輸出錯誤
}
mysqli_select_db($con,'gtms');//選擇資料庫
?>