<?php
include 'conn.php';
$user_id=$_GET['id'];
if($user_id==null) {
    echo '<script>';
    echo 'window.location.href = "denglu.php";';
    echo '</script>';
}

// 检查是否有文件上传
if(isset($_FILES['file'])) {
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    $file_ext = strtolower(end(explode('.', $file_name)));
    
    echo $file_name;
    // 允许上传的文件类型
    $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
    
    // 检查文件类型是否允许上传
    if(in_array($file_ext, $allowed_ext) === false) {
        echo 'Error: 上传文件类型不允许';
    }
    
    // 检查文件大小是否超过限制
    if($file_size > 2097152) {
        echo 'Error: 上传文件大小不能超过2MB';
    }
    

    // 将文件移动到指定目录
    $file_path = 'D:\phpstudy_pro\WWW\期末实验\user_img' .'\\'. $file_name;
    echo $file_path;

    if(move_uploaded_file($file_tmp, $file_path)) {
        // 上传成功，将文件路径保存到数据库
        $user_id = $_GET['id']; // 假设已经登录并获取了用户ID
        $query = "UPDATE user SET Image='./user_img/$file_name' WHERE ID=$user_id";
        echo $query;
        $result=mysqli_query($con,$query);
        if($result) {
            echo "<script>alert('头像修改成功！');</script>";
            header("Location: User_Message_update.php?id=$user_id");
        } else {
            echo 'Error: 数据库更新失败';
        }
    } else {
        echo 'Error: 文件上传失败';
    }
} else {
    echo 'Error: 没有选择文件';    
    
}
?>


<?php
if(isset($_POST['submit_message']))
{
    // 获取表单提交的数据
    $id= $_POST['id'];
    $name = $_POST['name'];
    $iphone = $_POST['iphone'];
    $email = $_POST['email'];
    $jianjie = $_POST['jianjie'];

    // 更新数据
    $sql = "UPDATE user SET Name='$name', Iphone='$iphone', emil='$email', jianjie='$jianjie' WHERE ID=$id";
    echo $sql;
    $res=mysqli_query($con, $sql);
    if(!$res)
    {
        echo "<script>alert('出错：" . mysqli_error($conn) . "');</script>";
        header("Location: User_Message_update.php?id=$id");
    }


    // 关闭数据库连接
    mysqli_close($con);

    // 跳转回原页面
    header("Location: User_Message_update.php?id=$id");
}
?> 