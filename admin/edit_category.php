<?php
require ("templates/header.php");
$id=$_GET["id"];
if ($id != '') {
$loi["catename"]=NULL;
$catename=NULL;

if(isset($_POST["ok"]))
{
    if(empty($_POST["txtname"]))
    {
        $loi["catename"]="* Xin vui lòng chọn chuyên mục cần chỉnh sửa";
    }
    else
    {
        $catename=$_POST["txtname"];
    }
    if($catename)
        // mo ket noi
    require ("../library/config.php");

    // thuc hien truy van
    mysqli_query($conn, "update category set cate_title='$catename' where cate_id=$id");

    // dong ket noi
    mysqli_close($conn);

    //
    header("location:list_category.php");
    exit();

}
// mo ket noi
require ("../library/config.php");

// thuc hien truy van lay cate_title bo vao form de nguoi dung chinh sua
$result=mysqli_query($conn,"select cate_title from category where cate_id=$id");
$data=mysqli_fetch_assoc($result);

?>

<form action="edit_category.php?id=<?php echo $id; ?>" method="post">
    <fieldset style="width: 300px; height: 100px; margin: 50px auto;">
        <legend style="margin-left: 10px;">Chỉnh sửa chuyên mục</legend>
        <table style="margin: 15px auto;">
            <tr>
                <td>Name</td>
                <td><input type="text" size="25" style="padding: 2px;" value="<?php echo $data['cate_title']; ?>" name="txtname"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" size="25" value="update" style="margin-top: 5px; padding: 2px;" name="ok"></td>
            </tr>
        </table>
    </fieldset>
</form>

<?php

// dong ket noi
mysqli_close($conn);

require ("templates/footer.php");
?>
<?php 
} else {
    header("location:list_category.php");
        exit();
}
?>
