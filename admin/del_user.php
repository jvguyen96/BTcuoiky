<?php
$id=$_GET["id"];

// mo ket noi vs csdl
require ("../library/config.php");

// thuc hien truy van
mysqli_query($conn, "delete from user where id=$id");

// dong ket noi
mysqli_close($conn);

// chuyen trang
header("location:list_user.php");
exit();

?>