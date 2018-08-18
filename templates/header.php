<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if (isset($id)) {
        // mở kết nối
        require("library/config.php");

        // thực hiện truy vấn
        $result = mysqli_query($conn, "select title from news WHERE new_id=$id");
        $data = mysqli_fetch_assoc($result);
        echo "<title>$data[title]</title>";

        // đóng kết nối
        mysqli_close($conn);
    } else {
        echo "<title>Web</title>";
    }
    ?>
    <link rel="stylesheet" href="templates/css/bootstrap.css">
    <link rel="stylesheet" href="templates/css/font-roboto.css">
    <link rel="stylesheet" href="templates/css/style.css">
</head>
<body>
<div id="top" class="container">
<p style='color:#FFFFFF; margin: 0; text-align: center;'>
    <?php
    if (isset($_SESSION["username"])) {
    ?>
        Xin chào <?php echo $_SESSION["username"]; ?>,<a href='<?php echo "http://localhost/web/logout.php"; ?>'>Đăng xuất</a>
    <?php
    } else {
        echo '<a href="login.php">ĐĂNG NHẬP</a>';
        echo " | ";
        echo '<a href="register.php">ĐĂNG KÝ</a>';
    }

    ?>
    </p>
</div>
<div class="wrapper2 container">
    <div id="wrapper">
        <div id="menu">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="about.php">Giới thiệu</a></li>
                <?php
                // mở kết nối
                require("library/config.php");

                // thực hiện câu truy vấn lấy cate_title trong csdl
                $result = mysqli_query($conn, "select cate_id,cate_title from category");
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "<li><a href='category.php?id=$data[cate_id]'>$data[cate_title]</a></li>";
                }

                // đóng kết nối
                mysqli_close($conn);
                ?>
                <li><a href="contact.php">Liên hệ</a></li>
            </ul>
        </div>
