<?php

require ("templates/header.php");

$id=$_GET["id"];
if ($id != '') {
if (isset($_POST["ok"]))
{
    // lấy lựa chọn duyệt comment của người dùng
    $check = $_POST["txtcheck"];

    // mở kết nối vs csdl
    require ("../library/config.php");

    // thực hiện truy vấn
    mysqli_query($conn,"update comment set cm_check='$check' WHERE cm_id=$id");

    // đóng kết nối
    mysqli_close($conn);

    // chuyển trang
    header("location:list_comment.php");
    exit();
}
?>

<div id="wrapper2">
    <form action="edit_comment.php?id=<?php echo $id; ?>" method="post">
        <fieldset style="width:280px; margin: 20px auto 10px;">
            <legend style="margin-left: 5px">Xét duyệt bình luận</legend>
            <table>
                <tr>
                    <td>Duyệt comment</td>
                    <td>
                        <select name="txtcheck" id="">
                            <option value="N">Chưa duyệt</option>
                            <option value="Y">Đã duyệt</option>
                        </select>
                    </td>
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
    header("location:list_comment.php");
        exit();
}
?>