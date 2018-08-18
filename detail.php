<?php
session_start();
$id=$_GET["id"];
require ('templates/header.php');

$loi=array();
$loi["name"]=$loi["mess"]=NULL;
$name=$mess=NULL;

if (isset($_POST["ok"]))
{
	// check da nhap name chua
	if (empty($_POST["txtname"]))
	{
		$loi["name"]="* Xin vui lòng nhập tên";
	}
	else
	{
		$name=$_POST["txtname"];
	}

	// check da nhap mess chua
	if (empty($_POST["txtmess"]))
	{
		$loi["mess"]="* Xin vui lòng nhập comment";
	}
	else
	{
		$mess=$_POST["txtmess"];
	}
	if($name && $mess)
	{
		// mo ket noi
		require ("library/config.php");

		// thuc hien truy van
		mysqli_query($conn, "insert into comment(name,message,time,cm_check,new_id)
									value('$name','$mess',now(),'N','$id')");

		// dong ket noi
		mysqli_close($conn);

		echo"<script type='text/javascript'>";
		echo"alert('Bình luận của bạn đã được gửi thành công và đang chờ kiểm duyệt lên trang')";
		echo"</script>";
	}
}
?>
		<div id="left">
			<div id="detail-article">

			<?php
			// mở kết nối
			require ("library/config.php");

			// thực hiên truy vấn
			$result=mysqli_query($conn, "select title,introduce,content,cate_id from news where new_id=$id");
			$data=mysqli_fetch_assoc($result);

				echo"<h2>$data[title]</h2>";
				echo"<p style='font-weight: bold;color: #7d7d7d;'>$data[introduce]</p>";
				echo"<p>$data[content]</p>";

			// đóng kết nối
			mysqli_close($conn);
			?>

			</div>
			<div id="different-article">
                <?php
                // mở kết nối
                require ("library/config.php");

                // thực hiện truy vấn
                $result2=mysqli_query($conn, "select new_id,title from news where cate_id=$data[cate_id] and new_id < $id order by new_id desc limit 3");
                if(mysqli_num_rows($result2)!=0)
                {
                    echo "<p>Các bài viết khác</p>";
                    echo "<ul>";
                    while ($data2 = mysqli_fetch_assoc($result2)) {
                        echo "<li><a href='detail.php?id=$data2[new_id]'>$data2[title]</a></li>";
                    }
                }
                echo "</ul>";
                ?>
			</div>
			<div id="comment">
				<form action="detail.php?id=<?php echo $id; ?>" method="post">
					<fieldset>
						<legend>Bình luận</legend>
						<div class="form-group">
                			<label for="email">Tên bình luận:</label>
                			<input type="text" class="form-control" id="email" name="txtname" value="<?php echo $loi["name"]; ?>" style="width: 50%">	
            			</div>
							
						<div class="form-group">
                			<label for="email">Nội dung bình luận:</label>
							<textarea class="form-control" name="txtmess" id="" cols="60" rows="5" style="width: 50%"><?php echo $loi["mess"]; ?></textarea>
							</div>
							<button type="submit" name="ok" class="btn btn-primary">Gửi</button>
					</fieldset>
				</form>
			</div>
			<div id="show-comment" style="margin-top: 20px">

                <?php
                // mở kết nối
                require ("library/config.php");

                // thực hiện truy vấn
                $result3=mysqli_query($conn, "select name,message,time from comment WHERE cm_check='Y' and new_id=$id");
                while($data3=mysqli_fetch_assoc($result3))
                {
                    echo"<div class='comm' >";
                    echo"<img src = 'library/images/comment.jpg'  style = 'width: 50px' >";
                    echo"</div >";
                    echo"<div class='mess' >";
                        echo"<p style = 'color:blue' >$data3[name]  <span style = 'color: darkgray' >$data3[time]</span ></p >";
                        echo"<p style = 'margin-top: 2px' >$data3[message]</p >";
                    echo"</div >";
                    echo"<div style = 'clear: left' ></div >";
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