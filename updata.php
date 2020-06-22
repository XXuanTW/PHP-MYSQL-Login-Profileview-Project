<?PHP
header("Content-Type: text/html; charset=utf-8");
include('connect.php');//連結資料庫
$type = $_POST['type'];//post獲得使用者名稱錶單值
// $no = $_POST['no'];
// $name = $_POST['name'];
// $tel = $_POST['tel'];
// $email = $_POST['email'];
// $stno = $_POST['stno'];
// $name = $_POST['name'];
// $sex = $_POST['sex'];
// $leader = $_POST['leader'];

if($type == 1){
    $stno = $_POST['stno'];
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $leader = $_POST['leader'];
    $sql = " UPDATE student SET name='$name',sex ='$sex',tel = '$tel',email = '$email', leader = '$leader' WHERE stno ='$stno'";
    
    mysqli_query($con, $sql);

}else if($type == 2){
    $no = $_POST['no'];
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $sql = " UPDATE teacher SET name='$name',tel = '$tel',email = '$email' WHERE no = '$no' ";
    echo $type;
    mysqli_query($con, $sql);

}

mysqli_close($con);//關閉資料庫
?>