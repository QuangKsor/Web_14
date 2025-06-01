<?php
	session_start();
	$id_sp = $_GET['id_sp'];
    if (isset($_SESSION['giohang'])) {
        if($id_sp==0){
            unset($_SESSION['giohang']);
        }else{
            unset($_SESSION['giohang'][$id_sp]);
        }
        //Nếu không còn sản phẩm trong giỏ hàng -> Xóa giỏ hàng
        if(empty($_SESSION['giohang'])){
            unset($_SESSION['giohang']);
        }
}
	header('location:../../index.php?page_layout=giohang');
?>
