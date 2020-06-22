<?PHP
header("Content-Type: text/html; charset=utf-8");
include('connect.php');//連結資料庫
$name = $_POST['name'];//post獲得使用者名稱錶單值
$password = $_POST['password'];//post獲得使用者密碼單值
$password2 = $_POST['password2'];//post獲得使用者第二次確認密碼
$type = $_POST['admin-select'];
$sql = " select * from account where account = '$name' ";
$result = mysqli_query($con, $sql);//執行sql
$rows = mysqli_num_rows($result);//返回一個數值
    if($rows == 0){//0 false 1 true
        if($password == $password2 && $name){
            $sql = "INSERT INTO account (account, password, type)  VALUES ('$name', '$password', '$type')";//新增資料庫
            mysqli_query($con,$sql);//執行sql
            echo "註冊成功";
        }else{
            echo "資料填寫有誤";
        }
    }else{
        echo "帳號重複註冊";
    }



mysqli_close($con);//關閉資料庫
?>