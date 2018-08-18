<?php
require('templates/header.php');
?>

    <!-- hỏi có xóa dòng dữ liệu -->
    <script>
        function show_confirm()
        {
            if(confirm("Bạn có muốn xóa dòng dữ liệu này?"))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    </script>

<div id="wrapper">
        <table>
            <tr style="background: royalblue; color: white;">
                <td style="width: 50px;">STT</td>
                <td style="width: 100px;">Name</td>
                <td>Message</td>
                <td style="width: 50px;">Link</td>
                <td style="width: 80px;">Duyệt</td>
                <td style="width: 80px;">Delete</td>
            </tr>
            <?php
            // mo ket noi
            require ("../library/config.php");

            // thuc hien truy van
            $stt=1;
            $result=mysqli_query($conn,"select new_id,cm_id,name,message,cm_check from comment order by cm_id DESC ");
            while($data=mysqli_fetch_assoc($result))
            {
                echo "<tr>";
                echo "<td>$stt</td>";
                echo "<td>$data[name]</td>";
                echo "<td>$data[message]</td>";
                echo "<td><a href='http://localhost/win/congngheweb/detail.php?id=$data[new_id]' target='_blank' style='color: blueviolet;'>Xem</a></td>";
                if ($data['cm_check'] == 'N') {
                    echo "<td><a href='edit_comment.php?id=$data[cm_id]' style='color: dodgerblue;'>Chưa duyệt</a></td>";
                } else {
                    echo "<td><a href='edit_comment.php?id=$data[cm_id]' style='color: dodgerblue;'>Đã duyệt</a></td>";
                }
                echo "<td><a href='del_comment.php?id=$data[cm_id]' onclick='return show_confirm();' style='color: mediumvioletred;'>Delete</a></td>";
                echo "</tr>";
                $stt++;
            }
            ?>
        </table>
    </div>

<?php
require('templates/footer.php');
?>