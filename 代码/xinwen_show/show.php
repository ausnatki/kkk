<?php
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    *{
        margin: 0;
        padding: 0;
    }

    html,body{
        height: 1000px;
        /* background-color: rgba(189, 187, 187, 0.144); */
        font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    }

    .nav{
        width: 100%;
        height: 70px;
        background-color: rgba(0, 0, 0, 0.774);
    }

    .logo{
        float: left;
        margin-left: 40px;
        margin-right: 40px;
    }
    

    .nav_title{
        float: left;
    }

    .nav_title a{
        color: #fff;
        text-decoration: none;
        display: inline-block;
        height: 70px;
        font-size: 20px;
        line-height: 70px;
        padding: 0 20px;
    }

    .nav_title a:hover{
        background-color:rgba(180, 178, 178, 0.9);
        transition: all 0.5s;
    }
    .nav_query{
        float: left;
        margin-top: 20px;
        margin-left: 330px;
    }
    .nav_query>form input[type="text"]{
        padding: 4px 10px;
        margin-right: 10px;
        border-radius: 3px;
    }
    .nav_query>form input[type="submit"]{
        background-color:rgba(0, 0, 0, 0);
        font-size: 16px;
        border: none;
        color: #fff;
        padding: 3px 5px;
        border-radius: 13.4px;
    }
    .nav_query>form input[type="submit"]:hover{
       
        background-color: #fff;
        color: #000;
        transition: all 0.3s;
    }
    .nav>a{
        float: right;
        color: #fff;
        text-decoration: none;
        font-size: 20px;
        line-height: 70px;
        padding: 0 20px;
    }
    .nr{
        clear: both;
        width: 100%;
        height: 100%;
    }
    .nr_left{
        float: left;
        width: 10%;
        height: 100%;
       
    }

    .nr_center{
        float: left;
        width: 85%;
        height: 1000px;
        background-color: rgba(189, 187, 187, 0.144);
    }

    .nr_right{
        float: left;
        width: 15%;
        height: 100%;
        background-color: rgba(189, 187, 187, 0.144);
    }

    .news{
        margin:0 auto;
        margin-top: 30px;
        width: 94%;
        height: 150px;
        background-color: #fff;
        border-radius: 3px;
       
    }

    .news:hover{
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.822);
        transition: all 0.5s;
    }

    .news_text{
        float: left;
        width: 879px;
        margin-left: 20px;
        line-height: 35px;
    }

    .news_text p{
       /*  overflow: hidden;
        line-clamp: 3;
        text-overflow: ellipsis;
        white-space: nowrap; */
        display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
    }

    .news_img{
        float: left;
        width: 218px;
        height: 132px;
        margin: 10px;
        border-radius: 3px;
        background:url(../img/01.jpg);
        background-repeat: no-repeat;
        background-position: top center;
        background-size:cover;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    }

    .news>a{
        color:black;
    }

    .nr_right{
        position: relative;
    }
    .nr_right a{
        text-decoration: none;
        font-size: 15px;
        color:blue;
    }

    .nr_btn{
        /* position: fixed; */
        margin-top: 10px;
        margin-left: 158px;
        width: 100%;
        text-align: center;
    }
    .nr_btn>a{
        display:inline-block;

        padding:20px 50px;
    }

    .nr_btn p{
        width: 600px;
        margin: 0 auto;
    }
    
    th{
        display: inline;
        margin-left: -26px;
        line-height: 50px;
    }


</style>
<body>
    <div class="nav">
        <div class="logo">
            <img src="/期末实验/img/03.png" alt="">
        </div>

        <div class="nav_title">
            <a href="?tag=0">新闻</a>
            <a href="?tag=1">文化</a>
            <a href="?tag=2">体育</a>
            <a href="?tag=3">电竞</a>
            <a href="?tag=4">军事</a>
        </div>

        <div class="nav_query">
            <form action="" method="post" >
                <input type="text" name="text">
                <input type="submit" name="submit" value="搜索">
            </form>
        </div>

        <a href="../denglu.php">登录</a>
        
    </div>

    <div class="nr">
      
        <!-- <div class="nr_center">
            <div class="news">
                <a href="conn.php">
                <div class="news_img" style="background:url('');
                    background-repeat: no-repeat;
                    background-position: top center;
                    background-size:cover;"></div>
                <div class="news_text">
                    <h3>标题：</h3> 
                    <p>内容：cscsc</p>
                    <p>作者：发布时间：</p> 
                </div>
            </a>
            </div>
        </div>
 -->



<div class="nr_center">
<?php
    if(!isset($_POST['submit'])&&$_GET['name']==null)
{
    // 假设已经连接到数据库并选择了对应的表
    $limit = 5; // 每页显示的新闻数量
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1; // 当前页码，默认为第一页
    $offset = ($page - 1) * $limit; // 当前页码对应的数据偏移量
    $tag = isset($_GET['tag']) ? intval($_GET['tag']) : 0; // 标签id，默认为0表示不筛选

    if($tag!=-1){
    // 查询新闻数据
    if ($tag > 0) {
        $sql="SELECT xinwen.ID AS ID, xinwen.UserID AS UserID, user.Name AS UserName, xinwen.Name AS Name_xinwen, xinwen.content AS content, xinwen.UpTime AS UpTime, xinwen.Image AS Image_xinwen, number FROM xinwen 
        JOIN biaoqian ON xinwen.biaoqian_id = biaoqian.ID 
        JOIN user ON xinwen.UserID = user.ID 
        WHERE biaoqian_id = $tag 
        ORDER BY UpTime DESC 
        LIMIT $offset, $limit";
    } else {
        $sql = "SELECT xinwen.ID, xinwen.UserID, user.Name AS UserName, xinwen.Name AS Name_xinwen, xinwen.content, xinwen.UpTime, xinwen.Image AS Image_xinwen, xinwen.number 
        FROM xinwen 
        JOIN user ON xinwen.UserID = user.ID 
        ORDER BY UpTime DESC 
        LIMIT $offset, $limit";
    }
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }
    // 遍历新闻数据并输出HTML格式
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['ID'];
        $userId = $row['UserID'];
        $name = $row['Name_xinwen'];
        $content = $row['content'];
        $upTime = $row['UpTime'];
        $image = $row['Image_xinwen'];
        $number = $row['number'];
        $user_name= $row['UserName'];
        // 输出HTML格式
       
        echo '<div class="news">'; 
        echo '<a href="news.php?id='.$id.'&?$tag=-1">';
        echo '<div class="news_img" style="background:url(.'.$image.'); background-repeat: no-repeat; background-position: top center; background-size:cover;"></div>';
        echo '<div class="news_text">';
        echo '<h3>标题：' . $name . '</h3>';
        echo '<p>内容：' . $content . '</p>';
        echo '<p>作者：' . $user_name . '，发布时间：' . $upTime . '</p>';
        echo '</div>'; 
        echo '</a>';
        echo '</div>';
       
    }
    // 计算总页数并输出分页HTML
    if ($tag > 0) {
        $sql = "SELECT COUNT(*) AS total FROM xinwen WHERE ID IN (SELECT biaoqian_id FROM biaoqian WHERE ID = $tag)";
    } else {
        $sql = "SELECT COUNT(*) AS total FROM xinwen";
    }
    $result = mysqli_query($con, $sql);
  
    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }
    $row = mysqli_fetch_assoc($result);
    $total = $row['total'];
    $pagesum = ceil($total / $limit);

    echo '<div class="nr_btn">';
    echo '<p>总共有' . $pagesum . '页，当前 第' . $page . '页。</p>';
    echo '<a href="?tag=' . $tag . '&page=1">首页</a>&nbsp;';
    echo '<a href="?tag=' . $tag . '&page=' . (($page > 1) ? ($page - 1) : 1) . '">上一页</a> &nbsp;';
    echo '<a href="?tag=' . $tag . '&page=' . (($page < $pagesum) ? ($page + 1) : $pagesum) . '">下一页</a> &nbsp;';
    echo '<a href="?tag=' . $tag . '&page=' . $pagesum . '">尾页</a>';
    echo '</div>';
    }
}
?>
<?php
if(isset($_POST['submit'])||$_GET['name']!=null) {


    $limit = 5; // 每页显示的新闻数量
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1; // 当前页码，默认为第一页
    $offset = ($page - 1) * $limit; // 当前页码对应的数据偏移量
    $tag = isset($_GET['tag']) ? intval($_GET['tag']) : 0; // 标签id，默认为0表示不筛选
    $offset = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $offset = ($offset - 1) * 5;
    
    if($_GET['name']!=null) $text=$_GET['name'];
    if($_POST['text']!=null) $text = $_POST['text'];
    $sql = "SELECT ID, UserID, Name, content, UpTime, Image, number FROM xinwen WHERE Name LIKE '%$text%' OR content LIKE '%$text%' ORDER BY UpTime DESC LIMIT $offset, $limit";
    
   
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }
   
    $row2 = mysqli_fetch_assoc($result);
    // 遍历新闻数据并输出HTML格式
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['ID'];
        $userId = $row['UserID'];
        $name = $row['Name'];
        $content = $row['content'];
        $upTime = $row['UpTime'];
        $image = $row['Image'];
        $number = $row['number'];
        $sql2="select Name from user where ID=".$userId;
        /* $result2 = mysqli_query($con, $sql2);
        if (!$result2) {
            die('Error: ' . mysqli_error($con));
        }
        $row2 = mysqli_fetch_assoc($result); */


        // 输出HTML格式
       
        echo '<div class="news">'; 
        echo '<a href="news.php?id='.$id.'&?$tag=-1">';
        echo '<div class="news_img" style="background:url(.'.$image.'); background-repeat: no-repeat; background-position: top center; background-size:cover;"></div>';
        echo '<div class="news_text">';
        echo '<h3>标题：' . $name . '</h3>';
        echo '<p>内容：' . $content . '</p>';
        echo '<p>作者：' . $row2['Name'] . '，发布时间：' . $upTime . '</p>';
        echo '</div>'; 
        echo '</a>';
        echo '</div>';
       
    }
    if ($tag > 0) {
        $sql = "SELECT COUNT(*) AS total FROM xinwen WHERE ID IN (SELECT biaoqian_id FROM biaoqian WHERE ID = $tag)";
    } else {
        $sql = "SELECT count(*) AS total FROM xinwen WHERE Name LIKE '%$text%' OR content LIKE '%$text%' ORDER BY UpTime ";
    }
    $result = mysqli_query($con, $sql);
  
    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }
    $row = mysqli_fetch_assoc($result);
    $total = $row['total'];
    $pagesum = ceil($total / $limit);

    echo '<div class="nr_btn">';
    echo '<p>总共有' . $pagesum . '页，当前 第' . $page . '页。</p>';
    echo '<a href="?tag=' . $tag . '&page=1&name='.$text.'">首页</a>&nbsp;';
    echo '<a href="?tag=' . $tag . '&page=' . (($page > 1) ? ($page - 1) : 1) . '&name='.$text.'">上一页</a> &nbsp;';
    echo '<a href="?tag=' . $tag . '&page=' . (($page < $pagesum) ? ($page + 1) : $pagesum) . '&name='.$text.'">下一页</a> &nbsp;';
    echo '<a href="?tag=' . $tag . '&page=' . $pagesum . '&name='.$text.'">尾页</a>';
    echo '</div>';
}
?>
        </div>
        <div class="nr_right">
            <table>
                <tr>
                    <th>热门咨询:</th>
                </tr>
    <?php

        // 执行SQL查询
        $sql = "SELECT ID,Name FROM xinwen ORDER BY number DESC LIMIT 10";
        $result = mysqli_query($con, $sql);
        // 输出结果
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr><td><a href="news.php?id='.$row['ID'].'&?$tag=-1"> '. $row["Name"] .' </a></td></tr>';
        }
        // 关闭连接
        mysqli_close($con);
    ?>
</table>

        </div>
    </div>
</body>
</html>




