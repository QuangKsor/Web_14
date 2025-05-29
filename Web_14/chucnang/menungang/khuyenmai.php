<link rel="stylesheet" href="../../css/khuyenmai.css">
<div class="pr-block">
    <h2>Sản phẩm khuyến mãi</h2>
    <div class="prd-list">
        <?php
            $sql = "SELECT * FROM sanpham WHERE khuyen_mai = 'có' ";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)){
        ?>   
            <div class="prd-item">
                <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><img width="100px" height="110px" src="quantri/anh/<?php echo $row['anh_sp'] ?>" /></a>
                <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><?php echo $row['ten_sp'] ?></a></h3>
                <p>Tình trạng: <?php echo $row['tinh_trang'] ?></p>
                <p class="price"><span>Giá: <?php echo $row['gia_sp'] ?> VNĐ</span></p>
            </div>  
        <?php   
            }
        ?>
        <div class="clear"></div>
    </div>
</div>