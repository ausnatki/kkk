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
        <h1>标签修改界面</h1>
    </div>
    <div>
        <?php
            $tag_id = $_GET['tag_id'];

            // 查询标签信息
            $sql = "SELECT * FROM biaoqian WHERE ID=$tag_id";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>
        <form action="" method="post" class="nr_form"> 
            标签名：<input type="text" name="name" value="<?php echo $row['Name']; ?>">
            <br>
            <br>
            <p>标签描述:</p>
            <textarea name="descript" id="" cols="150" rows="10"><?php echo $row['content']; ?></textarea>
            <br>
            <input type="submit" name="submit" value="修改">
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $descript = $_POST['descript'];

        // 更新标签信息
        $sql = "UPDATE biaoqian SET Name='$name', content='$descript' WHERE ID=$tag_id";
        $result = mysqli_query($con, $sql);

        if($result){
            echo "<script>alert('标签修改成功！');window.location.href='biaoqian_manager.php?id=".$_GET['id']."';</script>";
        }else{
            echo "<script>alert('标签修改失败！');window.location.href='biaoqian_manager.php?id=".$_GET['id']."';</script>";
        }
    }
?>