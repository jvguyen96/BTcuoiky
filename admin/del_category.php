<?php
$id=$_GET["id"];

// mo ket noi vs csdl
require ("../library/config.php");

// thuc hien truy van
mysqli_query($conn, "delete from category where cate_id=$id");

// dong ket noi
mysqli_close($conn);

// chuyen trang
header("location:list_category.php");
exit();

?>