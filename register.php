<?php
session_start();
require('templates/header.php');
$loi = array();
$username = $password = $email = $ngay = $thang = $nam = NULL;
$loi["username"] = $loi["password"] = $loi["email"] = $loi["birthday"] = $loi["gender"] = $loi["register"] = NULL;
if (isset($_POST["ok"])) {

    //check xem da nhap username chua?
    if (empty($_POST["txtname"])) {
        $loi["username"] = " Xin vui lòng nhập username<br>";
    } 
    /*
    else if(htmlspecialchars($_POST["txtname"])){
        $loi["username"] = " Bạn không được dùng các ký tự đặc biệt ở tên tài khoản<br>";
    }*/


    else {
        $username = $_POST["txtname"];
    }

    //check xem da nhap password chua?
    if (empty($_POST["txtpass"])) {
        $loi["password"] = " Xin vui lòng nhập password<br>";
    } else {
        $password = md5($_POST["txtpass"]);
    }

    //check xem da nhap email chua?
    if (empty($_POST["txtmail"]))
        $loi["email"] = " Xin vui lòng nhập email<br>";
    else {
        $email = $_POST["txtmail"];
    }

    //check xem da nhap birthday chua?
    if ($_POST["ngay"] == "ngay" || $_POST["thang"] == "thang" || $_POST["nam"] == "nam") {
        $loi["birthday"] = " Xin vui lòng chọn ngày sinh <br>";
    } else {
        $ngay = $_POST["ngay"];
        $thang = $_POST["thang"];
        $nam = $_POST["nam"];
    }

    //check xem da nhap gender chua?
    if (empty($_POST["gender"])) {
        $loi["gender"] = " Xin vui lòng chọn giới tính <br>";
    } else {
        $gender = $_POST["gender"];
    }

    if ($username && $password && $email && $ngay && $thang && $nam && $gender) {
        // mo ket noi voi csdl:

        require('library/config.php');
        // thuc hien cau truy van:
        $result = mysqli_query($conn, "select * from user where username='$username'");
        if (mysqli_num_rows($result) == 0) {
            mysqli_query($conn, "insert into user( username, password, email, birthday, gender, level )
							 value('$username','$password','$email','$nam-$thang-$ngay','$gender','2')	");
            $loi["register"] = " Đăng ký thành công, <a href='login.php'.>Login</a> để vào website<br>";
        } else {
            $loi["register"] = " Username này đã tồn tại";
        }
        // dong ket noi:
        mysqli_close($conn);
    }
}
?>
    <form action="register.php" method="post">
        <fieldset style="width: 30%; margin: 50px auto;">
            <legend>Đăng ký</legend>

            <div class="form-group">
                <label for="email">Tên tài khoản:</label>
                <input type="text" class="form-control" id="email" name="txtname">
            </div>
            <div class="form-group">
                <label for="pwd">Mật khẩu:</label>
                <input type="password" class="form-control" id="pwd" name="txtpass">
            </div>


            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="txtmail">
            </div>

            <div class="form-group">
                <label for="birth" style="width: 100%">Ngày sinh:</label>
                <select name="ngay" class="form-control" id="birth">
                    <option value="ngay">Ngày</option>
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
                <select name="thang" class="form-control" id="birth">
                    <option value="thang">Tháng</option>
                    <?php
                    $thang = array(1 => "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12");
                    foreach ($thang as $key => $tam) {
                        echo "<option value='$key'>$tam</option>";
                    }
                    ?>
                </select>
                <select name="nam" class="form-control" id="birth">
                    <option value="nam">Năm</option>
                    <?php
                    for ($k = 1950; $k <= 2017; $k++) {
                        echo "<option value='$k'>$k</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="sex">Giới tính:</label>
                <label class="radio-inline"><input type="radio" name="gender" value="1">Nam</label>
                <label class="radio-inline"><input type="radio" name="gender" value="2">Nữ</label>
            </div>
            <button class="btn btn-primary" type="submit" name="ok"><i class="fa fa-upload" aria-hidden="true"></i> ĐĂNG KÝ
            </button>
        </fieldset>
    </form>
    <div style="width: 300px; height: 100px; margin: 30px auto 0;text-align: center; color: red;">
        <?php
        echo $loi["username"];
        echo $loi["password"];
        echo $loi["email"];
        echo $loi["birthday"];
        echo $loi["gender"];
        echo $loi["register"];
        ?>
    </div>

<?php
require_once('templates/footer.php');
?>