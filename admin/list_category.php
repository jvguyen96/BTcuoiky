<?php
require('templates/header.php');
?>


<div id="wrapper">
        <table>
            <tr>
                <td colspan="2"></td>
                <td colspan="2"><a href="add_category.php"  style="color: crimson;">Thêm chuyên mục</a></td>
            </tr>
            <tr style="background: royalblue; color: white;">
                <td style="width: 100px;">STT</td>
                <td>Chuyên mục</td>
                <td style="width: 100px;">Edit</td>
                <td style="width: 100px;">Delete</td>
            </tr>
            <?php
            // mo ket noi
            require ("../library/config.php");
            // truy van
            $stt=1;
            $result=mysqli_query($conn,"select cate_id,cate_title from category");
            while($data=mysqli_fetch_assoc($result))
            {
                echo"<tr >";
                    echo"<td >$stt</td >";
                    echo"<td >$data[cate_title]</td >";
                    echo"<td ><a href = 'edit_category.php?id=$data[cate_id]' style = 'color: dodgerblue;' > Edit</a ></td >";
                    echo"<td ><a href = 'del_category.php?id=$data[cate_id]' onclick='return show_confirm();' style = 'color: mediumvioletred;' > Delete</a ></td >";
                echo"</tr >";
                $stt++;
            }
            ?>

            <!-- hỏi có xóa dòng dữ liệu -->
            <script>
                function show_confirm()
                {
                    if(confirm("Bạn có muốn xóa dòng dữ liệu này?"))
                    {
                        return true;
                    } else {
                        return false;
                    }
                }
            </script>

        </table>
    </div>

<?php
require('templates/footer.php');
?>