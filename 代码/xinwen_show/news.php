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
 
    .news>a{
        display: inline-block;
        width: 40px;
        padding: 5px 15px 5px 8px;
        font-weight:600 ;
        font-size: 20px;
        color: #fff;
        text-decoration: none;
        background-color: rgba(0, 0, 0, 0.774);
    }

    .news>a:hover{
        background-color: rgba(0, 0, 0, 0.9);
        transition: all 0.3s;
    }

    .news_top{
        text-align: center;
    }
    .news_top>p{
        display: inline-block;
        margin-bottom: 30px;
    }

    .news_nr{
        width: 90%;
        margin: 0 auto;
        text-indent: 2em;
    }

    .nav_title a:hover{
        background-color:rgba(180, 178, 178, 0.9);
        transition: all 0.5s;
    }

    .nr_right{
        position: relative;
    }
    .nr_right a{
        text-decoration: none;
        font-size: 15px;
        color:blue;
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
            <a href="show.php?tag=0">新闻</a>
            <a href="show.php?tag=1">文化</a>
            <a href="show.php?tag=2">体育</a>
            <a href="show.php?tag=3">电竞</a>
            <a href="show.php?tag=4">军事</a>
        </div>

        <div class="nav_query">
            <form action="show.php?tag=0&page=1&name=<?php echo $_POST['text']?>" method="post" >
                <input type="text" name="text">
                <input type="submit" name="submit" value="搜索">
            </form>
        </div>
        <a href="../denglu.php">登录</a>
</div>

<div class="nr_center">
    <div class="news">
<?php
include 'conn.php';
// 获取新闻ID
$id = $_GET['id'];
$sql = "UPDATE xinwen SET number = number + 1 WHERE ID = $id";
$result = mysqli_query($con, $sql);


// 查询新闻信息
$sql = "select xinwen.Name AS Name,user.Name AS user_name,xinwen.UpTime AS UpTime,xinwen.content AS content from xinwen join user on user.ID=xinwen.UserID WHERE xinwen.ID=".$id;
$result = mysqli_query($con, $sql);

// 检查查询结果是否为空
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
        echo '<a href="show.php">返回</a>';
        echo '<div class="news_top">';
        echo '<h1>' . $row["Name"] . '</h1>';
        echo '<hr>';
        echo '<p>发布者：' . $row["user_name"] . '</p>&nbsp;&nbsp;&nbsp;';
        echo '<p>发布时间：' . $row["UpTime"] . '</p>';
        echo '</div>';
        echo '<div class="news_nr">';
        echo '<p>' . $row["content"] . '</p>';
        echo '</div>';
    }
} else {
    echo "0 结果";
}
// 关闭连接
mysqli_close($con);
?>
    </div>
</div>




<div class="nr_right">
            <table>
                <tr>
                    <th>热门咨询:</th>
                </tr>
    <?php
        include 'conn.php';
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
