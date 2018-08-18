<?php
session_start();
require('templates/header.php');
$loi = array();
$username = $password = NULL;
$loi["username"] = $loi["password"] = $loi["login"] = NULL;
if (isset($_POST["ok"])) {
    // check xem da nhap username chua
    if (empty($_POST["txtname"])) {
        $loi["username"] = "* Xin vui lòng nhập username<br>";
    } else {
        // xu ly dang nhap
        $username = $_POST["txtname"];
    }

    if (empty($_POST["txtpass"])) {
        $loi["password"] = "* Xin vui lòng nhập password<br>";
    } else {
        $password = md5($_POST["txtpass"]);
    }

//check xem da nhap password chua
    if ($username != '' && $password != '') {
        // mo ket noi vs csdl
        require('library/config.php');
        // xu ly truy van
        $result = mysqli_query($conn, "select * from user WHERE username = '$username' and password = '$password'");
        if (mysqli_num_rows($result) == 1) {
            $data = mysqli_fetch_assoc($result);
            $_SESSION['level'] = $data["level"];
            if ($_SESSION['level'] == 1) {
                $_SESSION["username"] = $username;
                header("location:admin/admin.php");
                exit();
            } else {
                $_SESSION["username"] = $username;
                header("location:index.php");
                exit();
            }
        } else {
            $loi["login"] = "* Xin vui lòng kiểm tra username hoặc password<br>";
        }
        // dong ket noi
        mysqli_close($conn);
    }
}
?>
    <form action="login.php" method="post">
        <fieldset class="field-set" style="width: 30%; margin: 50px auto;">
            <legend>Đăng nhập</legend>
            <div class="form-group">
                <label for="email">Tên đăng nhập:</label>
                <input type="text" class="form-control" id="email" name="txtname">
            </div>
            <div class="form-group">
                <label for="pwd">Mật khẩu:</label>
                <input type="password" class="form-control" id="pwd" name="txtpass">
            </div>
            <button class="btn btn-success" type="submit" name="ok"><i class="fa fa-sign-in" aria-hidden="true"></i>
                ĐĂNG NHẬP
            </button>
        </fieldset>
    </form>
    <div style="width: 200px; height: 100px; margin: 10px auto 0; text-align: center;color: red;">
        <?php
        echo $loi["username"];
        echo $loi["password"];
        echo $loi["login"];
        ?>
    </div>
<?php
require('templates/footer.php');
?>