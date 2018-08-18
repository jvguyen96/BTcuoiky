<?php
require('templates/header.php');
?>



<div id="wrapper">
        <table>
            <tr>
                <td colspan="3"></td>
                <td colspan="2"><a href="add_article.php" style="color: crimson;">Thêm bài viết</a></td>
            </tr>
            <tr style="background: royalblue; color: white;">
                <td style="width: 100px;">STT</td>
                <td>Chuyên mục</td>
                <td>Tựa đề bài viết</td>
                <td style="width: 80px;">Edit</td>
                <td style="width: 80px;">Delete</td>
            </tr>
            <?php
            // mở kết nối
            require ("../library/config.php");

            // thực hiện câu truy vấn
            $stt=1;
            $result=mysqli_query($conn, "select b.new_id,a.cate_title,b.title from category as a, news as b WHERE a.cate_id=b.cate_id");
            while($data=mysqli_fetch_assoc($result))
            {
                echo "<tr>";
                echo "<td>$stt</td>";
                echo "<td>$data[cate_title]</td>";
                echo "<td>$data[title]</td>";
                echo "<td><a href='edit_article.php?id=$data[new_id]' style='color: dodgerblue;'>Edit</a></td>";
                echo "<td><a href='del_article.php?id=$data[new_id]' onclick='return show_confirm();' style='color: mediumvioletred;'>Delete</a></td>";
                echo "</tr>";
                $stt++;
            }

            // đóng kết nối
            mysqli_close($conn);
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