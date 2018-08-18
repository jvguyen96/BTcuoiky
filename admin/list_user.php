<?php
require("templates/header.php");
?>
    <div id="wrapper">
        <table>
            <tr style="background: royalblue; color: white;">
                <td>STT</td>
                <td>Username</td>
                <td>Email</td>
                <td>Level</td>
                <td>Delete</td>
            </tr>
            <?php
            // mo ket noi csdl
            require("../library/config.php");
            // thuc hien truy van
            $stt = 1; // hien thi = 1
            $result = mysqli_query($conn, "select * from user");
            while ($data = mysqli_fetch_assoc($result))  // $data=array(username=>"...",email=>"..."...
            {
                echo "<tr>";
                echo "<td>$stt</td>"; // hien thi = 2
                echo "<td>$data[username]</td>";
                echo "<td>$data[email]</td>";
                if ($data['level'] == 2) {
                    echo "<td>Thành viên</td>";
                } else {
                    echo "<td>Admin</td>";
                }
                echo "<td><a href='del_user.php?id=$data[id]' onclick='return show_confirm();' style='color: mediumvioletred;'>Delete</a></td>";
                echo "</tr>";
                $stt++; // hien thi = 3
            }
            // dong ket noi
            mysqli_close($conn);
            ?>

            <!-- hỏi có xóa dòng dữ liệu -->
            <script>
                function show_confirm() {
                    if (confirm("Bạn có muốn xóa dòng dữ liệu này?")) {
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