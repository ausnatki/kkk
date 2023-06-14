<?php
include 'conn.php';
$user_id=$_GET['id'];
if($user_id==null) {
    echo '<script>';
    echo 'window.location.href = "denglu.php";';
    echo '</script>';
}
?>


<?php
// 获取要删除的信息的ID
$user_id = $_GET['id'];
$xinwen_id = $_GET['xinwen_id'];

// 构建SQL语句
$sql = "DELETE FROM xinwen WHERE ID = $xinwen_id";

// 执行SQL语句
if (mysqli_query($con, $sql)) {
    // 弹出删除成功提示框
    
    echo "<script>alert('信息删除成功');</script>";
    echo "<script>setTimeout(function(){window.location.href='xinwen_manager.php?id=$user_id';}, 1000);</script>";
    
} else {
    // 弹出删除失败提示框
    echo "<script>alert('删除失败: " . mysqli_error($con) . "');</script>";
}

// 关闭数据库连接
mysqli_close($con);

?>