
<?php
include 'conn.php';
$user_id=$_GET['id'];
if($user_id==null) {
    echo '<script>';
    echo 'window.location.href = "denglu.php";';
    echo '</script>';
}
$user_id=$_GET['id'];
if (isset($_POST['submit'])) {
    $xinwen_id=$_GET['xinwen_id'];
    $biaoti = $_POST['biaoti'];
    $biaoqian_id = $_POST['biaoqian'];
    $content =  $_POST['content'];

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
            $query = "UPDATE xinwen SET Name='$biaoti', biaoqian_id=$biaoqian_id, content='$content', Image='./xinwen_img/$file_name' WHERE ID=$xinwen_id";
        } else {
            echo 'Error: 文件上传失败';
            exit;
        }
    } else {
        $query = "UPDATE xinwen SET Name='$biaoti', biaoqian_id=$biaoqian_id, content='$content' WHERE ID=$xinwen_id";
        echo $query;
    }

    $result = mysqli_query($con, $query);

    if ($result) {
       header("Location: xinwen_manager.php?id=$user_id");
    } else {
     echo "<script>alert('新闻修改失败');</script>";
    }
}
?>
