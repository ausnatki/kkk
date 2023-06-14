<?php
include 'conn.php';
include 'header.php';
$id = $_GET['id'];

$sql = "SELECT * FROM user WHERE ID=$id";
$res = mysqli_query($con, $sql);
if (!$res) {
  echo mysqli_error($con);
} else {
  $row = mysqli_fetch_array($res);
}
?>             

<style>
    .nr_left{
        float: left;
        width: 50%;
    }

    .nr_left >div{
        width: 200px;
        height: 200px;
        margin: 200px auto;
       /*  background:url(./img/01.webp);
        background-repeat: no-repeat;
        background-position: top center; */
        background-size:cover;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        position: relative;
    }  

    .nr_right{
        padding-top: 30px;
        float: left;
        width: 50%;
        height: 440px;
        font-size: 20px;
        line-height: 50px;
    }


    .nr_form
    {
        padding-left: 50px;
        font-size: 20px;
        line-height: 50px;
    }


    .nr_form input[type="text"]{
        border-radius: 3px;
        border:1px solid black;
        padding: 3px;
    }

    .nr_form input[type="submit"]{
        border: 1px solid rgb(170, 169, 169);
        border-radius: 3px;
        padding: 10px 129px;
        margin: 30px 0px;
        background: #fff;
        color: black;
    }

    .nr_form input[type="submit"]:hover{
        background-color: rgba(0, 0, 0, 0.3);
        transition: 0.5s;
    }

    .img_form{
        margin-top: -150px;
        margin-left: 240px;
        line-height: 50px;
    }

    .img_form input[type="submit"]{
        padding:10px 20px;
        border:1px solid black;
        background-color:#fff;
        border-radius: 3px;
    }

    .img_form input[type="submit"]:hover{
      background-color: rgba(0, 0, 0, 0.3);
      transition: 0.5s;
    }


</style>

<div class="nr">
  <div class="nr_top">
    <h1>用户信息界面</h1>
  </div>

  <div>
    <div class="nr_left">
      <!-- 这个盒子用来装图片，需要规定图片的大小 -->
      <div style="background:url('<?php echo $row['Image'] ?>');
                    background-repeat: no-repeat;
                    background-position: top center;
                    background-size:cover;">
       
      </div>
         <form action="User_Message_update_do.php?id=<?php echo $_GET['id']?>" method="post" enctype="multipart/form-data" class="img_form">
            <input type="file" name="file" value="上传图片">
            <br>
            <input type="submit" name="submit" value="修改头像">
        </form>
      
    </div>

    <div class="nr_right">
      <form action="User_Message_update_do.php" method="post" class="nr_form">
        <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
        <p>ID：<?php echo $row['ID']?></p>
        姓名：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" value="<?php echo $row['Name']?>">
        <br>
        手机号：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="iphone" value="<?php echo $row['Iphone']?>">
        <br>
        邮箱：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" value="<?php echo $row['emil']?>">
        <br>
        个人简介：
        <br>
        <textarea name="jianjie" id="jianjie" cols="37" rows="10"><?php echo $row['jianjie'] ?></textarea>
        <br>
        <input type="submit" value="保存" name="submit_message">
      </form>
    </div>
  </div>
</div>


