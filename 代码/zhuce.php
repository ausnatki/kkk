<?php
include 'conn.php';

// 处理表单提交
if (isset($_POST['submit_zhuce'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  // 检查密码是否一致
  if ($password !== $confirm_password) {
    echo "<script>alert('两次输入密码不一致！');</script>";
    echo "<script>setTimeout(function(){window.location.href='denglu.php';}, 1000);</script>";
  } else {
    // 检查用户名是否已存在
    $sql = "SELECT * FROM user WHERE Name='$username'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('用户名已存在！');</script>";
    } else {
      // 插入新用户到数据库
      $password = $_POST['password'];
      $sql = "INSERT INTO user (Name, Password) VALUES ('$username', '$password')";
      mysqli_query($con, $sql);
      echo "<script>alert('注册成功！');</script>";
      echo "<script>setTimeout(function(){window.location.href='denglu.php';}, 1000);</script>";
    }
  }
}

// 关闭连接
mysqli_close($con);
?>