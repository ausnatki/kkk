<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{margin: 0;padding: 0;}
        html,body{
            height: 100%;
            font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
        }
        .menu{

            float: left;
            position: relative;
            width: 15%;
            height: 100%;
            background-color: #343a40;
            box-shadow:0px 5px 10px black;
        }

        #logo{
            
            height: 70px;
            background-color: #619e6d;
        }

        .User{
            padding: 0 10%;
            width: 80%;
            height: 60px;
            border-bottom: 1px solid #858282;
        }

       .User_img{
            float: left;
            width: 40px;
            margin-top: 10px;
            margin-right: 20px;
            height: 40px;
            border-radius: 20px;
           /*  background: url(./001.png); */
            background-repeat: no-repeat;
            background-position: top center;
            background-size:cover;
           box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
       }

       .xian{
            height: 1px;
            border: 1xp solid #858282;
       }


        .User a{
            float: left;
            color: #ebeaea;
            line-height: 60px;
            text-decoration: none; 
        }

        .one{
            height: 50px;
            margin: 5px 0;
            line-height: 50px;
            border-bottom: 1px solid  #858282;
        }

        .one:hover{
            background:#007bff;
            border-radius: 10px;
        }

        .erji{
            font-size: 15px;
            height: 40px;
            margin: 5px 0;
            line-height: 40px;
            text-indent: 117px;
            
        }

        .erji:hover{
            background: #007bff;
            border-radius: 10px;
        }
        ul a{
            color: #ebeaea;
            text-decoration: none;
            padding-left: 20px;
        }

        ul p{
            display: inline-block;
            color: #ebeaea;
            text-decoration: none;
            padding-left: 20px;
        }

        .btn{
            padding-left: 20px;
            height: 50px;
            position: absolute;
            bottom: 20px;
            font-size: 20px;
        }
        .btn img{
            float: left;
        }

        .btn a{
            /* float: left; */
            text-decoration: none;
            color: #fff;
            display: inline-block;
            top: 10px;
            text-indent: 2em;
        }
        /* 菜单部分完成 */

        .bnt :hover{
            background: rgba(0, 0, 0, 0.5);
            transition: all 0.5s;
        }

        .nr{
            float:left;
            width: 85%;
            height: 100%;
            background: rgb(240, 238, 238);
        }

        .nr_top{
            position: relative;
            width: 100%;
            height: 70px;
            border-bottom: 2px solid #fff;
        }

        .nr_top h1{
            position: absolute;
            line-height: 70px;
            right: 50px;
            font-style: italic;
            color: #686565;
        }

       


    </style>

    <?php $id=$_GET['id']?>

</head>

<?php
include 'conn.php';
$sql = "select * from user where ID={$_GET['id']}";
$res=mysqli_query($con,$sql);
if(!$res)    
    {
        echo mysqli_error($con);
    } 
else  $row=mysqli_fetch_array($res);
?>




<body>
    <div class="menu">
        <div id="logo">
            <img src="./img/03.png" alt="编辑个人信息">
        </div>

        <div class="User">
            <a href="">
            <div class="User_img" style="background:url('<?php echo $row['Image'] ?>');
                    background-repeat: no-repeat;
                    background-position: top center;
                    background-size:cover;">
            </div>
                <?php echo $row['Name']?>
            </a>
        </div>
            
        <div class="content">

            <ul>
                <li class="one"><a href="">咨询管理</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p href="">></p></li>
                <li class="erji">
                    <a href="xinwen_add.php?id=<?php echo $id?>">添加咨询</a>
                   
                </li>
                <li class="erji">
                    <a href="xinwen_manager.php?id=<?php echo $id?>">管理咨询</a>
                </li>
            </ul>

            <ul >
                <li class="one"><a href="#">分类管理</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p href="">></p></li>
                <li class="erji"><a href="biaoqian_add.php?id=<?php echo $id?>">添加分类</a></li>
                <li class="erji"><a href="biaoqian_manager.php?id=<?php echo $id?>">管理分类</a></li>
            </ul>
            </div>

            <ul>
                <li class="one"><a href="">个人信息</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p href="">></p></li>
                <li class="erji">
                    <a href="User_Message.php?id=<?php echo $id?>">用户信息</a>
                   
                </li>
                <li class="erji">
                    <a href="User_Message_update.php?id=<?php echo $id?>">信息更改</a>
                </li>
                <li class="erji">
                    <a href="User_Message_pw_update.php?id=<?php echo $id?>">密码更改</a>
                </li>
            </ul>



            <div class="btn">
                <img src="./img/退出 (2).png" alt="">
                <a href="xinwen_show/show.php">退出</a>
            </div>
    </div>

   <!--  菜单 end -->

    <!-- <div class="nr">
        <div class="nr_top">
            <h1>个人信息界面</h1>
        </div>

        <div class="nr_content">
           <p class="nr_content_p1">Welcome</p>
           <p class="nr_content_p2">欢迎你的到来！</p>
        </div>
    </div> -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
   // 隐藏所有'erji'标题区
    $('.erji').slideUp();

    // 添加单击事件
    $('.one').click(function() {
    // 获取当前标题区下的所有'erji'标题区
    const erjiList = $(this).parent().find('.erji');
    // 遍历每一个'erji'标题区
    erjiList.each(function() {
    // 判断当前'erji'标题区是否已经隐藏
    if ($(this).is(':visible')) {
      // 如果已经展开，则使用slideUp()函数将其向上滑动并隐藏
      $(this).slideUp();
    } else {
      // 如果已经隐藏，则使用slideDown()函数将其向下滑动并展开
      $(this).slideDown();
      // 向下滚动到当前'erji'标题区
      $('html, body').animate({
        scrollTop: $(this).offset().top
      }, 500);
    }
  });
});
    </script>
</body>
</html>