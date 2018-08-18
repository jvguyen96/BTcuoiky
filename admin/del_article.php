<?php

$id=$_GET["id"];
// mở kết nối
require ("../library/config.php");

// thực hiện truy vấn
mysqli_query($conn, "delete from news WHERE new_id=$id");

// đóng kết nối
mysqli_close($conn);

// chuyển trang
header("location:list_article.php");
exit();

?>