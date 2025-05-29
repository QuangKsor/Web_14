<?php
    session_start();
    include_once('ketnoi.php');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị</title>
    <link rel="stylesheet" href="css/quantri.css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
    	<div id="navbar">
        	<ul>
            	<li id="admin-home"><a href="quantri.php">Trang chủ quản trị</a></li>
                <li><a href="quantri.php?page_layout=ql_nguoidung">Người dùng</a></li>
                <li><a href="quantri.php?page_layout=ql_dm">Danh mục sản phẩm</a></li>
                <li><a href="quantri.php?page_layout=danhsachsp">Sản phẩm</a></li>
                <li><a href="../index.php">Xem website</a></li>
            </ul>
            <div id="user-info">
            	<p>Xin chào <span><?php echo $_SESSION['username'];?></span></p>
                <p><a href="dangxuat.php">Đăng xuất</a></p>
            </div>
        </div>
    </div>
        <?php
            if(isset($_GET['page_layout'])){
                switch ($_GET['page_layout']){
                case 'ql_dm': include_once ('ql_dm.php');break;
                case 'ql_nguoidung': include_once ('ql_nguoidung.php');break;
                case 'sua_dm': include_once ('sua_dm.php');break;
                case 'themdm': include_once ('themdm.php');break;
                case 'danhsachsp': include_once ('danhsachsp.php');break;
                case 'themsp': include_once ('themsp.php'); break;
                case 'them_user': include_once ('them_user.php'); break;
                case 'sua_user': include_once ('sua_user.php'); break;
                case 'xoa_user': include_once ('xoa_user.php'); break;
                case 'sua_sp': include_once ('sua_sp.php'); break;
                }
            }else{
                include_once('gioithieu.php');
            }
            ?>
        <div id="footer">
            <div id="footer-item">
                <h4>Cửa hàng Website dép Nguyệt Dạ Lâu uy tín Việt Nam</h4>
                <p><span>Địa chỉ:</span> 170 - An Dương Vương, Thành Phố Quy Nhơn | <span>Hotline: 0946042975</span> </p>
            </div>
        </div>
    </div>
    
</body>
</html>