<script type="text/javascript">
    function IsPC() {
        var userAgentInfo = navigator.userAgent;
        var Agents = ["Android", "iPhone",
            "SymbianOS", "Windows Phone",
            "iPad", "iPod"];
        for (var v = 0; v < Agents.length; v++) {
            if (userAgentInfo.indexOf(Agents[v]) > 0) {
                <!--添加跳转页面window.location.href=;-->
                window.location.href = "mobileShowOldnews.php";
                break;
            }
        }
    }
    IsPC();
</script>
<?php
/**
 * Created by PhpStorm.
 * User: Chaiyunfeng
 * Date: 2017/3/28
 * Time: 13:59
 */
$con = mysqli_connect("120.24.43.150", "myuser","321427");

if (!$con)
{
    echo "Could not connect server";
}
mysqli_select_db($con,"myNews");
?>

<div style="width: 100%">
    <div style="font-size: 30px; width: 80%; text-align: center; color: orange; margin-left: 10%">
        <?php 
        $month=$_POST["month"];
        $day=$_POST["day"];
        $year=$_POST["year"];
        echo $year."年".$month."月".$day."日"."新闻速览";
        ?>
    </div>
    <div style="width: 100%; text-align: center">
        <a href="OldNews.php" style=" text-decoration: none; color: orange; font-size: 25px">查看历史新闻</a>
    </div>
</div>
<div style="position: absolute; left: 0; width: 100%; height: 40px">
    <!-- <div style="width: 8px; height: 30px; background-color: orange; position: fixed; left: 0"></div> -->
    <div style="display:table; position: absolute; left: 10px; background-color: #ffffff; height: 100%;">
        <div style="display:table-cell;padding-left: 2px; padding-right: 2px; vertical-align: middle;font-size: 26px">
            高校
        </div>
    </div>
    <div style="height: 2px; width: 100%"></div>
    <div style="background-color: orange; height: 90%; width: 100%; "></div>
</div>
<div style="height: 40px"></div>

<!-- 展示高校新闻内容 -->
<?php

$result = mysqli_query($con,"SELECT * FROM news WHERE title like '%大学%' AND date = $day");
$row = mysqli_fetch_array($result);
do {
    $title = $row['title'];
    $url = $row['url']; ?>
    <div style="text-align: left; padding-top: 10px; font-size: 20px">
    <a href="<?php echo $url ?>" style="color: black; text-decoration:none;"><?php echo $title ?></a>
    </div><?php
}while($row = mysqli_fetch_array($result));
?>

<div style="position: absolute; left: 0; width: 100%; height: 40px; padding-top: 10px">
    <!-- <div style="width: 8px; height: 30px; background-color: orange; position: fixed; left: 0"></div> -->
    <div style="font-size: 20px; position: absolute; left: 10px; background-color: #ffffff; height: 40px;">
        <div style="padding-left: 2px; padding-right: 2px; font-size: 26px">
            大数据
        </div>
    </div>
    <div style="height: 2px; width: 100%"></div>
    <div style="background-color: orange; height: 90%; width: 100%"></div>
</div>
<div style="height: 55px"></div>
<!-- 展示大数据新闻内容 -->
<?php
$result2 = mysqli_query($con, "SELECT * FROM BigData WHERE date =$day");
$row2 = mysqli_fetch_array($result2);
do{
    $title = $row2['title'];
    $url = $row2['url'];
    $sum = $row2['sum']?>
    <div style=" width: auto; height: auto; text-align: left; padding-top: 10px">
        <a href="<?php echo $url ?>" style="color: black; text-decoration:none;font-size: 20px"><?php echo $title ?></a>
        <p style="width: 90%; font-size: 15px; color: gray; margin-left: 20px; margin-top: 0; "><?php echo "  ".$sum ?></p>
        <hr width="100%" color="#e6e6e6" size="1">    
    </div><?php
}while($row2 = mysqli_fetch_array($result2))
?>

<!--科技-->
<div style="position: absolute; left: 0; width: 100%; height: 40px; padding-top: 10px">
    <!-- <div style="width: 8px; height: 30px; background-color: orange; position: fixed; left: 0"></div> -->
    <div style="font-size: 20px; position: absolute; left: 10px; background-color: #ffffff; height: 40px; display: table">
        <div style="padding-left: 2px; padding-right: 2px; font-size: 26px;vertical-align: middle; display:table-cell;">
            科技
        </div>
    </div>
    <div style="height: 2px; width: 100%"></div>
    <div style="background-color: orange; height: 90%; width: 100%"></div>
</div>
<div style="height: 55px"></div>
<?php
$result3=mysqli_query($con,"Select * From TechNews WHERE date =$day ORDER BY insert_time DESC");
$row3=mysqli_fetch_array($result3);
do{
    $techurl=$row3['url'];
    $techtitle=$row3['title'];
    $techpic=$row3['image'];?>
    <div style=" width: auto; height: auto; text-align: left; padding-top: 10px; display: table">
        <a href="<?php echo $techurl ?>"><img src="<?php echo $techpic ?>" style="height: 120px; width:180px;" /></a>
        <a href="<?php echo $techurl ?>" style="padding-left:10px; text-decoration: none;font-size: 20px; color:black; vertical-align: middle; display:table-cell;"><?php echo $techtitle ?></a>
    </div>
    <hr width="100%" color="#e6e6e6" size="1">
    <?php
}while($row3=mysqli_fetch_array($result3));
?>
<!-- 关闭数据库连接 -->
<?php mysqli_close($con); ?>

