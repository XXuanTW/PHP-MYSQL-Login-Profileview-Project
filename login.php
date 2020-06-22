<?PHP
header("Content-Type: text/html; charset=utf-8");
include('connect.php');//連結資料庫
$name = $_POST['name'];//post獲得使用者名稱錶單值
$passowrd = $_POST['password'];//post獲得使用者密碼單值
if ($name && $passowrd){//如果使用者名稱和密碼都不為空
    $sql = "select * from account where account = '$name' and password='$passowrd'";//檢測資料庫是否有對應的account和password的sql
    $result = mysqli_query($con,$sql);//執行sql
    $rows=mysqli_num_rows($result);//返回一個數值
    if($rows){//0 false 1 true
        while($row=mysqli_fetch_array($result)){
            $type = $row['type'];
        }
        setcookie("user", "$name", time()+3600); //coookie 產生
        setcookie("type", "$type", time()+3600);
        echo "登入成功";//傳回值
    exit;
    }else{
        echo "使用者名稱或密碼錯誤";
    }
}else{//如果使用者名稱或密碼有空
    echo "表單填寫不完整";
}
mysqli_close($con);//關閉資料庫
?>