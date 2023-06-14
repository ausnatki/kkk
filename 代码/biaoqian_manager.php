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
     .tb{
        text-align: center;
        margin-top: 30px;
    }

    .tb_top{
       line-height:50px;
       border-bottom:2px solid black;
    }

    td{
        line-height: 50px;
    }
    .nr_btn{
        position: fixed;
        bottom: 20px;
        left: 350px;
        width: 70%;
        text-align: center;
    }
</style>

<div class="nr">
    <div class="nr_top">
        <h1>标签管理界面</h1>
    </div>
    <div>
        <table width="100%" class="tb">
            <tr>
                <th>标签id</th>
                <th>标签名</th>
                <th>标签描述</th>
                <th>操作</th>
            </tr>
            <?php
                // 获取当前页数
                $page = isset($_GET['page']) ? $_GET['page'] : 1;

                // 计算LIMIT和OFFSET参数  
                $limit = 10;
                $offset = ($page - 1) * $limit;

                // 查询标签信息
                $sql = "SELECT * FROM biaoqian LIMIT $limit OFFSET $offset";
                $result = mysqli_query($con, $sql);

                if($result){
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['ID'] . '</td>';
                        echo '<td>' . $row['Name'] . '</td>';
                        echo '<td>' . $row['content'] . '</td>';
                        echo '<td><a href="biaoqian_update.php?id='.$_GET['id'].' & tag_id='.$row['ID'].'">编辑</a>|<a href="biaoqian_del.php?id='.$_GET['id'].' & tag_id='.$row['ID'].'">删除</a></td>';
                        echo '</tr>';
                    }
                }else {echo "出错啦！".$sql;}
            ?>
        </table>
    </div>
    <?php
        $limit = 10;
        $sql = "SELECT COUNT(*) AS total FROM biaoqian";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $total = $row['total'];
        $pagesum = ceil($total / $limit);
    ?>    
    <div class="nr_btn">
        <p>总共有<?php echo $pagesum;?>页，当前 第<?php echo $page;?> 页。</p><hr>
        <a href="?id=<?php echo $_GET['id']?>& page=1">首页</a>&nbsp;
        <a href="?id=<?php echo $_GET['id']?>& page=<?php echo (($page>1)?($page-1):1)?>">上一页</a> &nbsp;
        <a href="?id=<?php echo $_GET['id']?>& page=<?php echo (($page<$pagesum)?($page+1):$pagesum);?>">下一页</a> &nbsp;
        <a href="?id=<?php echo $_GET['id']?>&page=<?php echo $pagesum?>">尾页</a>
    </div>
</div>