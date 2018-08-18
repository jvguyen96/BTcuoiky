<?php
if (!isset($_SESSION)) {
    session_start();
    if ($_SESSION["level"] == 1) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Title</title>
            <link rel="stylesheet" href="style.css">
            <script type="text/javascript" src="../library/ckeditor/ckeditor.js"></script>
        </head>
    <body>
    <div id="top">
        <h3 style="color: white;">Xin chào
         <?php echo $_SESSION["username"]; ?>, <a href="../logout.php" style="color: white;">(Đăng xuất)</a>
        </h3>
    </div>
    <div id="menu">
        <ul>
            <li><a href="list_user.php">Quản lí thành viên</a></li>
            <li><a href="list_category.php">Quản lí chuyên mục</a></li>
            <li><a href="list_article.php">Quản lí bài viết</a></li>
            <li><a href="list_comment.php">Quản lí bình luận</a></li>
        </ul>
    </div>
    <div style="clear: left"></div>
        <?php
    } else {
        header("location:../index.php");
        exit();
    }
}
?>