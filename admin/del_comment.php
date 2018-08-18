<?php
/**
 * Created by PhpStorm.
 * User: Tien Tong
 
 */
$id=$_GET["id"];
// mở kết nối
require ("../library/config.php");

// thực hiện truy vấn
mysqli_query($conn, "delete from comment WHERE cm_id=$id");

// đóng kết nối
mysqli_close($conn);

// chuyển trang
header("location:list_comment.php");
exit();

?>