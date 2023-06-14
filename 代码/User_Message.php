 <!-- 从登录界面传过来一个id值然后根据这个id值进行数据库的查询操作 -->
<?php
    include 'conn.php';
    include 'header.php';
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
        background:url(./img/01.webp);
        background-repeat: no-repeat;
        background-position: top center;
        background-size:cover;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    }

    

    .nr_right{
        padding-top: 160px;
        float: left;
        width: 50%;
        height: 440px;
        font-size: 20px;
        line-height: 50px;
    }
</style>


<?php
$user_id=$_GET['id'];
if($user_id==null) {
    echo '<script>';
    echo 'window.location.href = "denglu.php";';
    echo '</script>';
}
$sql = "select * from user where ID={$user_id}";
$res=mysqli_query($con,$sql);
if(!$res)    
    {
        echo mysqli_error($con);
    } 
else  $row=mysqli_fetch_array($res);
?>


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
        </div>

        
        <div class="nr_right">
            <p>ID：<?php echo $row['ID']?></p>
            <p>手机号：<?php echo $row['Iphone']?></p>
            <p>姓名：<?php echo $row['Name']?></p>
            <p>邮箱：<?php echo $row['emil']?></p>
            <p>简介：<?php echo $row['jianjie']?></p>  
        </div>
    </div>
</div>