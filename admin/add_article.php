<?php
require ("templates/header.php");
$loi = array();
$loi["title"]= $loi["image"]= $loi["intro"]= $loi["content"]=NULL;
$title = $image = $content = $intro = NULL;

    if(isset($_POST["ok"]))
    {
        // lấy cate_id mà người dùng đã lựa chọn
        $cate_id=$_POST["txtcate"];

        // check đã nhập title chưa
        if(empty($_POST["txttitle"]))
        {
            $loi["title"]="* Xin vui lòng nhập tiêu đề bài viết mới<br>";
        }
        else
        {
            $title=$_POST["txttitle"];
        }

        // check người dùng đã chọn ảnh chưa
        if($_FILES["image"]["error"]>0)
        {
            $loi["image"]="* Xin vui lòng chọn hình ảnh<br>";
        }
        else
        {
            $image=$_FILES["image"]["name"];
        }

        // check đã nhập mô tả cho bài viết mới
        if(empty($_POST["txtintro"]))
        {
            $loi["intro"]="* Xin vui lòng nhập mô tả bài viết<br>";
        }
        else
        {
            $intro = $_POST["txtintro"];
        }

        // check đã nhập nội dung bài viết chưa
        if(empty($_POST["txtcontent"]))
        {
            $loi["content"]="* Xin vui lòng nhập nội dung bài viết<br>";
        }
        else
        {
            $content=$_POST["txtcontent"];
        }

        if($title && $image && $intro && $content)
        {
            // mở kết nối
            require ("../library/config.php");

            // thực hiện truy vấn
            mysqli_query($conn,"insert into news( title, image, introduce, content, cate_id )
							 value('$title','$image','$intro','$content','$cate_id')");

            // đóng kết nối
            mysqli_close($conn);

            // upload anh
            move_uploaded_file($_FILES["image"]["tmp_name"],'../library/images/'.$_FILES["image"]["name"]);
        }
    }
?>

<div id="wrapper2">
    <form action="add_article.php" method="POST" enctype="multipart/form-data">
        <fieldset style="width: 794px; margin: 20px auto 10px;">
            <legend style="margin-left: 10px;">Thêm bài viết</legend>
            <table>
                <tr>
                    <td style="width: 90px">Chuyên mục</td>
                    <td>
                        <select name="txtcate">
                            <?php
                            // mở kết nối
                            require ("../library/config.php");

                            // thực hiện câu truy vấn
                            $result=mysqli_query($conn, "select cate_id,cate_title from category");
                            while($data=mysqli_fetch_assoc($result))
                            {
                                echo"<option value = '$data[cate_id]'>$data[cate_title]</option >";
                            }

                            // đóng kết nối
                            mysqli_close($conn);
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tiêu đề</td>
                    <td><input type="text" size="50" name="txttitle"></td>
                </tr>
                <tr>
                    <td>Hình ảnh</td>
                    <td><input type="file" size="25" style="padding-left: 0px;" name="image"></td>
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td><textarea name="txtintro" id="" cols="55" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>Nội dung</td>
                    <td><textarea name="txtcontent" id="" cols="55" rows="10"></textarea></td>
                </tr>
                <script type="text/javascript">
                    CKEDITOR.replace( 'txtcontent' );
                </script>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Add" name="ok"></td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>
<div style="width: 290px; margin: 10px auto; text-align: center; color:red;">
    <?php
        echo $loi["title"];
        echo $loi["image"];
        echo $loi["intro"];
        echo $loi["content"];
    ?>
</div>

<?php
require ("templates/footer.php");
?>


