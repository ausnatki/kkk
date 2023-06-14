
<?php
include 'conn.php';
$user_id=$_GET['id'];
if($user_id==null) {
    echo '<script>';
    echo 'window.location.href = "denglu.php";';
    echo '</script>';
}


if (isset($_POST['submit'])) {
    $user_id=$_GET['id'];
    $xinwen_id=$_GET['xinwen_id'];
    $biaoti = $_POST['biaoti'];
    $biaoqian_id = $_POST['biaoqian'];
    $content =  $_POST['descript'];

    date_default_timezone_set('Asia/Shanghai');
    $current_time = date('Y-m-d H:i:s');

    echo $xinwen_id;

    if (!empty($_FILES['file']['name'])) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $file_ext = strtolower(end(explode('.', $file_name)));

        // 允许上传的文件类型
        $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');

        // 检查文件类型是否允许上传
        if (in_array($file_ext, $allowed_ext) === false) {
            echo 'Error: 上传文件类型不允许';
            exit;
        }

        // 检查文件大小是否超过限制
        if ($file_size > 2097152) {
            echo 'Error: 上传文件大小不能超过2MB';
            exit;
        }

        // 将文件移动到指定目录
    $file_path = 'D:\phpstudy_pro\WWW\期末实验\xinwen_img' .'\\'. $file_name;

    if (move_uploaded_file($file_tmp, $file_path)) {
        // 上传成功，将文件路径保存到数据库
        $query = "INSERT INTO xinwen (UserID,Name,UpTime, biaoqian_id, content, Image) VALUES ($user_id,'$biaoti', '$current_time',$biaoqian_id, '$content', './xinwen_img/$file_name')";
    } else {
        echo 'Error: 文件上传失败';
        exit;
    }
} else {
    $query = "INSERT INTO xinwen (UserID,Name,UpTime, biaoqian_id, content) VALUES ($user_id,'$biaoti', '$current_time', $biaoqian_id, '$content')";
}

$result = mysqli_query($con, $query);
echo $query;


if ($result) {
    echo "<script>alert('新闻添加成功！');</script>";
    echo "<script>setTimeout(function(){window.location.href='xinwen_manager.php?id=$user_id';}, 1000);</script>";
} else {
  /*   echo "<script>alert('$query');</script>"; */
    echo "<script>alert('新闻添加失败');</script>";
    echo "<script>setTimeout(function(){window.location.href='xinwen_manager.php?id=$user_id';}, 1000);</script>";
}
} 
?>