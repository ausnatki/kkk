<?php
  include 'conn.php';
  /* echo $_POST['id'];
  echo $_POST['password']; */
  $sql = "SELECT * FROM user WHERE Name='{$_POST['Name']}' AND Password='{$_POST['password']}'";
  $res=mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($res);
  $res=mysqli_query($con,$sql);
  echo $sql;
  if (mysqli_fetch_array($res)> 0) {
    // 登录成功，跳转到主页或其他需要登录的页面
    header("Location: first.php?id=" . $row['ID']);
  } else {
    // 登录失败，返回登录页面并显示错误消息
    header("Location: denglu.php?error=1");
  }
?>