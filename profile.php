<?PHP
header("Content-Type: text/html; charset=utf-8");
// if(!isset($_POST["submit"])){
//     exit("錯誤執行");
// }//檢測是否有submit操作 
include('connect.php');//連結資料庫
$name = $_POST['user'];//post獲得使用者名稱錶單值
$type = $_POST['type'];//post獲得使用者密碼單值

if ($name && $type){//如果使用者名稱和密碼都不為空 
    if($type == 1){
        $sql = "select * from student where stno = '$name' ";//檢測資料庫是否有對應的stno的sql
        $result = mysqli_query($con,$sql);//執行sql
        $rows=mysqli_num_rows($result);//返回一個數值
        if($rows){//如果有找到資料
            while($row=mysqli_fetch_array($result)){
                $data_name = $row['name'];
                $data_sex = $row['sex'];
                $data_tel = $row['tel'];
                $data_email = $row['email'];
                $data_stno = $row['stno'];
                $data_leader = $row['leader'];
                $data_topicno = $row['topicno'];
            }
            echo json_encode(array(
                'name' => $data_name,
                'tel' => $data_tel,
                'sex' => $data_sex,
                'email' => $data_email,
                'no' => $data_stno,
                'leader' => $data_leader,
                'topicno' => $data_topicno
            ));
            exit;
        
        }else{//沒找到資料 就新增
            $sql = "INSERT INTO student (name, tel, sex,email,stno,topicno,leader)  VALUES (' ', ' ', ' ', ' ', '$name',' ' ,' ')";//新增資料
            mysqli_query($con,$sql);//執行sql
            $sql = "select * from student where stno = '$name' ";//檢測資料庫是否有對應的username和password的sql
            $result = mysqli_query($con,$sql);//執行sql
            $rows=mysqli_num_rows($result);//返回一個數值
            while($row=mysqli_fetch_array($result)){
                $data_name = $row['name'];
                $data_sex = $row['sex'];
                $data_tel = $row['tel'];
                $data_email = $row['email'];
                $data_stno = $row['stno'];
                $data_leader = $row['leader'];
                $data_topicno = $row['topicno'];
            }
            echo json_encode(array(
                'name' => $data_name,
                'tel' => $data_tel,
                'sex' => $data_sex,
                'email' => $data_email,
                'no' => $data_stno,
                'leader' => $data_leader,
                'topicno' => $data_topicno
            ));
            exit;
        }
    }else if($type == 2){
        $sql = "select * from teacher where no = '$name' ";//檢測資料庫是否有對應的no的sql
        $result = mysqli_query($con,$sql);//執行sql
        $rows=mysqli_num_rows($result);//返回一個數值
        if($rows){//檢查是否有找到資料 有就回傳 沒有就新增
            while($row=mysqli_fetch_array($result)){
                $data_name = $row['name'];
                $data_tel = $row['tel'];
                $data_email = $row['email'];
                $data_no = $row['no'];
            }
            echo json_encode(array(
                'name' => $data_name,
                'tel' => $data_tel,
                'email' => $data_email,
                'no' => $data_no
            ));;
        exit;
        
        }else{
            $sql = "INSERT INTO teacher (name, tel,email,no)  VALUES (' ', ' ', ' ', ' ','$name')";//新增
            mysqli_query($con,$sql);//執行sql
            $sql = "select * from teacher where no = '$name' ";//確認是否新增成功 然後回傳
            $result = mysqli_query($con,$sql);//執行sql
            $rows=mysqli_num_rows($result);
            while($row=mysqli_fetch_array($result)){
                $data_name = $row['name'];
                $data_tel = $row['tel'];
                $data_email = $row['email'];
                $data_no = $row['no'];
            }
            echo json_encode(array(
                'name' => $data_name,
                'tel' => $data_tel,
                'email' => $data_email,
                'no' => $data_no
            ));;
            exit;
        }
    }else if($type == 3){ //admin不需要

    }
    
}
mysqli_close($con);//關閉資料庫
?>