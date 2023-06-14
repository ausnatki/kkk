<?php
date_default_timezone_set('Asia/Chongqing');
//设置传入参数
$con=mysqli_connect("localhost","root","123456");
mysqli_select_db($con,'shiyan5');
// 修改数据库连接字符集为 utf8
//mysqli_set_charset($conn,"utf8");
if (mysqli_connect_errno($conn))
{
echo "连接 MySQL 失败: ". mysqli_connect_error();
exit;
}
mysqli_query($con,"set names utf8");
?>