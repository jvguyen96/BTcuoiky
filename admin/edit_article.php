<?php
require ("templates/header.php");
$id=$_GET["id"];
if ($id != '') {
    $loi=array();
    $loi["title"]=$loi["intro"]=$loi["content"]=NULL;
    $title=$image=$intro=$content=NULL;

    if (isset($_POST["ok"]))
    {
   // lấy cate_id mà người dùng cần chỉnh sửa
        $cate_id=$_POST["txtcate"];

    // lấy tiêu đề mà người dùng cần chỉnh sửa
        if (empty($_POST["txttitle"]))
        {
            $loi["title"]="* Xin vui lòng nhập tiêu đề bài viết";
        }
        else
        {
            $title=$_POST["txttitle"];
        }

    // hình ảnh
        if ($_FILES["image"]["error"]>0)
        {
            $image="none";
        }
        else
        {
           $image=$_FILES["image"]["name"];
       }

    // lấy ndung mô tả mà người dùng đã chỉnh sửa
       if (empty($_POST["txtintro"]))
       {
        $loi["intro"]="* Xin vui lòng nhập mô tả bài viết";
    }
    else
    {
        $intro=$_POST["txtintro"];
    }

    // lấy nôi dung bài viết mới
    if (empty($_POST["txtcontent"]))
    {
        $loi["content"]="* Xin vui lòng nhập nội dung bài viết";
    }
    else
    {
        $content=$_POST["txtcontent"];
    }

    if ($title && $image && $intro && $content)
    {
        // mở kết nối
        require ("../library/config.php");

        // thực hiện truy vấn
        if ($image=="none")
        {
            mysqli_query($conn, "update news set cate_id='$cate_id',title='$title', introduce='$intro',content='$content' where new_id=$id");
        }
        else
        {
            mysqli_query($conn, "update news set cate_id='$cate_id',title='$title',image='$image',introduce='$intro',content='$content' where new_id=$id");
        }
        // upload tấm hình
        move_uploaded_file($_FILES["image"]["tmp_name"],'../library/images/'.$_FILES["image"]["name"]);

        // đóng kết nối
        mysqli_close($conn);

        // chuyển trang sau khi đã hoàn thành chỉnh sửa
        header("location:list_article.php");
        exit();
    }
}
// mở kết nối
require ("../library/config.php");

// thực hiện truy vấn lấy lấy thông tin trong csdl để người dùng chỉnh sửa
$result=mysqli_query($conn,"select cate_id,title,image,introduce,content from news WHERE new_id=$id");
$data=mysqli_fetch_assoc($result);
?>

<div id="wrapper2">
    <form action="edit_article.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        <fieldset style="margin-top: 10px">
            <legend>Giới thiệu:Chức năng chỉnh sửa bài viết</legend>
            <table>
                <tr>
                    <td style="width: 90px">Chuyên mục</td>
                    <td>
                        <select name="txtcate" id="">
                            <?php
                            // mở kết nối
                            require ("../library/config.php");

                            // thực hiện câu truy vấn
                            $result2=mysqli_query($conn, "select cate_id,cate_title from category");
                            while($data2=mysqli_fetch_assoc($result2))
                            {
                                if($data['cate_id']==$data2['cate_id'])
                                {
                                    echo "<option value = '$data[cate_id]' selected='selected'>$data2[cate_title]</option >";
                                }
                                else
                                {
                                    echo "<option value = '$data[cate_id]'>$data2[cate_title]</option >";
                                }
                            }

                            // đóng kết nối
                            mysqli_close($conn);
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tiêu đề</td>
                    <td><input type="text" size="50" name="txttitle" value="<?php echo $data['title']; ?>"></td>
                </tr>
                <tr>
                    <td>Hình ảnh cũ</td>
                    <td><img src="../library/images/<?php echo $data['image']; ?>" alt="" width="140px"></td>
                </tr>
                <tr>
                    <td>Hình ảnh mới</td>
                    <td><input type="file" size="25px" style="padding-left: 0px" name="image"></td>
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td><textarea name="txtintro" id="" cols="25" rows="10"><?php echo $data['introduce']; ?></textarea></td>
                </tr>
                <tr>
                    <td>Nội dung</td>
                    <td><textarea name="txtcontent" id="" cols="55" rows="10"><?php echo $data['content']; ?></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Update" name="ok"></td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>

<?php
require ("templates/footer.php");
?>
<?php 
} else {
    header("location:list_article.php");
        exit();
}
?>
