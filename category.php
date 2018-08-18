<?php
	session_start();
	require ('templates/header.php');
	$id=$_GET["id"];
?>

		<div id="left">
			<?php
			// mở kết nối
			require ("library/config.php");

			// thực hiện truy vấn trong bảng chuyên mục
			$result=mysqli_query($conn, "select cate_title from category WHERE cate_id=$id");
			$data=mysqli_fetch_assoc($result);
			echo"<h3 style='margin:10px 10px 0 10px; border-bottom:1px solid gray; color:#3074C1;'>$data[cate_title]</h3>";

			// thực hiện truy vấn trong bảng tin tức
            if (isset($_GET["begin"]))
            {
                $position = $_GET["begin"];
            }
            else
            {
                $position = 0;
            }
            $display = 2;
			$result2 = mysqli_query($conn, "select new_id,title,image,introduce from news WHERE cate_id=$id ORDER BY new_id DESC limit $position,$display ");
			while($data2 = mysqli_fetch_assoc($result2))
			{
				echo "<div class ='new'>";
				echo "<h3><a href ='detail.php?id=$data2[new_id]' style='text-decoration: none;'>$data2[title]</a></h3>";
				echo "<img src ='library/images/$data2[image]' width='140px' height='93px'>";
				echo "$data2[introduce]";
				echo "<div style ='clear:left'></div>";
				echo "</div>";
			}

			// đóng kết nối
			mysqli_close($conn);
			?>

			<div id="pagination">

				<?php
				$display = 2;
				// mở kết nối
				require ("library/config.php");

				// thực hiện câu truy vấn
				$result3 = mysqli_query($conn, "select * from news WHERE cate_id=$id");
				$sum_news = mysqli_num_rows($result3);

				$sum_page = ceil($sum_news/$display);
				if($sum_page > 1)
				{
					echo "<ul>";
                    $current = ($position/$display) + 1;
                    if($current != 1)
                    {
                        $prev = $position-$display;
                        echo"<li><a href='category.php?id=$id&begin=$prev'>Prev</a></li>";
                    }
					for ($page = 1; $page <= $sum_page; $page++)
					{
                        $begin = ($page - 1) * $display;
                        if($page == $current)
                        {
                            echo "<li><a href='category.php?id=$id&begin=$begin' style='color: red'>$page</a></li>";
                        }
                        else
                        {
                            echo "<li><a href='category.php?id=$id&begin=$begin'>$page</a></li>";
                        }
					}
					if ($current != $sum_page)
                    {
                        $next = $position + $display;
                        echo"<li><a href='category.php?id=$id&begin=$next'>Next</a></li>";
                    }
					echo "</ul>";
				}

				// đóng kết nối
				mysqli_close($conn);
				?>

			</div>
		</div>

<?php
	require ('templates/content-right.php');
	require ('templates/footer.php');
?>