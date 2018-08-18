<?php
session_start();
require('templates/header.php');
?>
    <script type="text/javascript" src="jquery.js"></script>
    <script>
        $(document).ready(function () {
            $('.new:last').css('border-bottom', 'none');
        });
    </script>

    <div id="left">
        <?php
        require("library/config.php");
        $result3 = mysqli_query($conn, "select cate_id,cate_title from category");
        while ($data3 = mysqli_fetch_assoc($result3)) {
            echo "<div class='new'>";
            echo "<div class='category'><a href='category.php?id=$data3[cate_id]' ><h4>$data3[cate_title]</h4></a></div>";
            echo "<div class='article'>";
            $result = mysqli_query($conn, "select new_id,title,image,introduce from news where cate_id=$data3[cate_id] order by new_id DESC");
            $data = mysqli_fetch_assoc($result);
            echo "<h4><a href='detail.php?id=$data[new_id]'>$data[title]</a></h4>";
            echo "<a href='detail.php?id=$data[new_id]'><img src='library/images/$data[image]' width='140px' height='95px'></a>";
            echo "$data[introduce]";
            echo "</div>";
            echo "<div class='list-article'>";
            echo "<ul>";
            $result2 = mysqli_query($conn, "select new_id,title from news where cate_id=$data3[cate_id] order by new_id desc limit 1,3");
            while ($data2 = mysqli_fetch_assoc($result2)) {
                echo "<li><a href='detail.php?id=$data2[new_id]'>$data2[title]</a></li>";
            }
            echo "</ul>";
            echo "</div>";
            echo "<div style='clear:left'></div>";
            echo "</div>";
        }
        mysqli_close($conn);
        ?>
    </div>
<?php
require('templates/content-right.php');
require('templates/footer.php');
?>