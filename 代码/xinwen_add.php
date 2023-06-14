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
        margin-top: 10px;
        padding-left: 50px;
        font-size: 20px;
        line-height: 50px;
    }

    .nr_form input[type="text"]{
        border-radius: 3px;
        border:1px solid black;
        padding: 5px;
    }

    .nr_form select{
        border-radius: 3px;
        border:1px solid black;
        padding: 2px;
    }

    /* .nr_form input[type="file"]{
        padding: 50px;
    } */

    .nr_form input[type="submit"]{
        border: 1px solid rgb(170, 169, 169);
        border-radius: 3px;
        padding: 10px 20px;
        margin: 50px 0px;
        background: #fff;
        color: black;
    }

    .nr_form input[type="submit"]:hover{
        background-color: rgba(0, 0, 0, 0.3);
        transition: 0.5s;
    }


    <?php
    // 获取新闻信息
    $user_id = $_GET['id'];
    $xinwen_id = $_GET['xinwen_id'];
    $sql = "SELECT * FROM xinwen WHERE ID = $xinwen_id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    // 获取标签列表
    $sql = "SELECT * FROM biaoqian";
    $result = mysqli_query($con, $sql);
    ?>

</style>
<div class="nr">
        <div class="nr_top">
            <h1>新闻添加界面</h1>
        </div>
        <div class="nr_form">
            <form action="xinwen_add_do.php?id=<?php echo $user_id?>" method="post"  enctype="multipart/form-data" >
            新闻标题：<input type="text" name="biaoti">
            <br>
            新闻标签：<select name="biaoqian" id="">
                <option value="0">请选择标签</option>
                <?php while ($row2 = mysqli_fetch_assoc($result)) { ?>
                    <option value="<?php echo $row2['ID']; ?>" <?php if ($row2['ID'] == $row['biaoqian_id']) echo "selected"; ?>><?php echo $row2['Name']; ?></option>
                <?php } ?>
            </select><br>
            新闻图片：<input type="file" name="file">
            <br>
            <p>新闻内容：</p><textarea name="descript" id="" cols="150" rows="20" ></textarea>
            <br>
            <input type="submit" name="submit" value="发表">
        </form>
    </div>
</div>





