<?php
 require ("templates/header.php");
$loi=array();
$loi["catename"]=NULL;
$catename=NULL;
if(isset($_POST["ok"]))
{
    // check nguoi dung da them chuyen muc
    if(empty($_POST["txtname"]))
    {
        $loi["catename"]="* Xin vui lòng nhập thêm chuyên mục mới";
    }
    else
    {
        $catename=$_POST["txtname"];
    }
    // nguoi dung da them chuyen muc
    if($catename)
    {
        // mo ket noi
        require ("../library/config.php");
        // truy van
        mysqli_query($conn, "insert into category(cate_title) value('$catename')");
        $loi["catename"]="* Thêm chuyên mục thành công";
        // dong ket noi
        mysqli_close($conn);
    }
}
?>

<form action="add_category.php" method="post">
    <fieldset style="width: 300px; height: 100px; margin: 50px auto;">
        <legend style="margin-left: 10px;">Thêm chuyên mục</legend>
        <table style="margin: 15px auto;">
            <tr>
                <td>Name</td>
                <td><input type="text" size="25" style="padding: 2px;" name="txtname"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" size="25" value="Thêm" style="margin-top: 5px; padding: 2px;" name="ok"></td>
            </tr>
        </table>
    </fieldset>
</form>
<div style="width: 190px; height: 80px;margin: auto; text-align: center; color: red;">
    <?php
        echo $loi["catename"];
    ?>
</div>
<?php
    require ("templates/footer.php");
?>
