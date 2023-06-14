<?php
    include 'conn.php';
    include 'header.php';
    $user_id=$_GET['id'];
    if($user_id==null) {
        echo '<script>';
        echo 'window.location.href = "denglu.php";';
        echo '</script>';
    }   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>


<style>
    .nr_right{
        padding-top: 100px;
        width: 400px;
        margin: 0 auto;
        text-align: center;
        font-size: 28px;
        line-height: 90px;
    }


    .nr_form input[type="text"]{
        
        padding: 8px  20px 0px 20px;
        border-radius: 3px;
    }

    .nr_form input[type="password"]{
        padding: 8px  20px 0px 20px;
        border-radius: 3px;
    }

    .nr_form input[type="submit"]{
        border: 1px solid rgb(170, 169, 169);
        border-radius: 3px;
        padding: 10px 80px;
        margin: 30px 0px;
        background: #fff;
        color: black;
    }

    .nr_form input[type="submit"]:hover{
        background-color: rgba(0, 0, 0, 0.3);
        transition: 0.5s;
    }
    

</style>


<div class="nr">
    <div class="nr_top">
        <h1>用户密码界面</h1>
    </div>
    <div>
        <div class="nr_right">
            <form action="User_Message_pw_update.php" method="post" class="nr_form">
                旧密码：<input type="text" name="old_pw">
                <br>
                新密码：<input type="password" name="new_pw_one">
                <br>
                确认密码:<input type="password" name="new_pw_two">
                <br>
                <input type="submit" name="submit" value="修改">
            </form>
        </div>
    </div>
</div>


<?php

if(isset($_POST['submit'])){

    //获取表单数据
    $old_pw = $_POST['old_pw'];
    $new_pw_one = $_POST['new_pw_one'];
    $new_pw_two = $_POST['new_pw_two'];

    //检查旧密码是否正确
    $sql = "SELECT Password FROM user WHERE Password='$old_pw'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        //旧密码正确，更新密码
        if ($new_pw_one == $new_pw_two) {
            $sql = "UPDATE user SET Password='$new_pw_one' WHERE Password='$old_pw'";
            if (mysqli_query($con, $sql)) {
                echo "<script>alert('密码已成功更新');</script>";
            } else {
                echo "<script>alert('更新密码时出错：" . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('新密码不匹配，请重新输入');</script>";
        }
    } else {
        echo "<script>alert('旧密码不正确，请重新输入');</script>";
    }

    mysqli_close($con);
    }
?>

