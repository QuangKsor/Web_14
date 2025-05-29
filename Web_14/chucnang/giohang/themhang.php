<?php
session_start();
$id_sp = $_GET['id_sp'];
//Nếu đã tồn tại sản phẩm trong giỏ hàng thì tăng số lượng 1 đơn vị
if(isset($_SESSION['giohang'][$id_sp])){
    $_SESSION['giohang'][$id_sp]+=1;
}else{
    $_SESSION['giohang'][$id_sp]=1;
}
header('location:../../index.php?page_layout=giohang');
?>