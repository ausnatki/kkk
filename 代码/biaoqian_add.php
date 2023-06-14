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

<style>
     .nr_form
    {
        padding: 50px 0px 0px 50px;
        font-size: 20px;
    }

    .nr_form input[type="text"]{
        border-radius: 2px;
        border:1px solid black;
        padding: 5px;
    }

    .nr_form select{
        border-radius: 2px;
        border:1px solid black;
        padding: 5px;
    }

    /* .nr_form input[type="file"]{
        padding: 50px;
    } */

    .nr_form input[type="submit"]{
        border: 1px solid rgb(170, 169, 169);
        border-radius: 3px;
        padding: 10px 20px;
        margin: 40px 0px;
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
        <h1>标签添加界面</h1>
    </div>
    <div>
        <form action="" method="post" class="nr_form"> 
            标签名：<input type="text" name="name">
            <br>
            <br>
            <p>标签描述:</p>
            <textarea name="descript" id="" cols="150" rows="10">请描述你的标签</textarea>
            <br>
            <input type="submit" name="submit" value="添加">
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $descript = $_POST['descript'];

        // 插入标签信息
        $sql = "INSERT INTO biaoqian (Name, content) VALUES ('$name', '$descript')";
        $result = mysqli_query($con, $sql);

        if($result){
            echo "<script>alert('标签添加成功！');window.location.href='biaoqian_manager.php?id=".$_GET['id']."';</script>";
        }else{
            echo "<script>alert('标签添加失败！');window.location.href='biaoqian_manager.php?id=".$_GET['id']."';</script>";
        }
    }
?>