
<div class="prd-block">
    <div class="prd-only">
        <div class="img-and-info">
            <?php
            if (isset($_GET['id_sp'])){
            $id_sp = $_GET['id_sp'];
            $sql = "SELECT * FROM sanpham WHERE id_sp = $id_sp";
            $query = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($query);
            if($row){
            ?>
            <div class="prd-img">
                <img width="50%" src="quantri/anh/<?php echo $row['anh_sp'] ?>" />
            </div>
            <div class="prd-intro">
                <div class="info-prd">
                    <h3><?php echo $row['ten_sp'] ?></h3>
                    <p>Giá sản phẩm: <span><?php echo $row['gia_sp'] ?> VNĐ</span></p>
                    <table>
                        <tr>
                            <td><span>Tình trạng:</span></td>
                            <td>• <?php echo $row['tinh_trang'] ?></td>
                        </tr>
                        <tr>
                            <td><span>Khuyến Mại:</span></td>
                            <td>• <?php echo $row['khuyen_mai'] ?></td>
                        </tr>
                        <tr>
                            <td><span>Còn hàng:</span></td>
                            <td>• <?php echo $row['trang_thai'] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="buy-button" title="Mua ngay">
                    <p class="add-cart"><a href="chucnang/giohang/themhang.php?id_sp=<?php echo $row['id_sp']; ?>" class="buy-now"><span>ĐẶT MUA</span></a></p>
                </div>
            </div>
            <?php 
            } else{
                echo "<p>Sản phẩm không tồn tại.</p>";
            }
        }else{
            echo "<p>Không có sản phẩm nào được chọn.</p>";
        }
        ?>
        </div>  
    </div>
        <?php if (isset($row)){
            ?>
            <div class="container-detail">
            <div class="prd-details">
                <h2 class="adv">Mua <?php echo $row['ten_sp'] ?> tại Website 14</h2>
                <p><?php echo $row['chi_tiet_sp']; ?></p>
            </div>
        </div>
    
        <div class="container-comment">
            <div class="prd-comment">
                <h3>Bình luận về <?php echo $row['ten_sp'] ?></h3>
                <form method="post">
                    <ul>
                        <div class="information-comment-user">
                            <li title="Vui lòng điền họ tên" class="required infor"><input required type="text" name="ten" placeholder="Họ tên*"/></li>
                            <li title="Điền số điện thoại" class="required infor"><input required type="text" name="dien_thoai" placeholder="Số điện thoại"/></li>
                        </div>
                        <li class="required"><textarea required title="Bình luận ở đây" name="binh_luan" placeholder="Nội dung:"></textarea></li>
                        <li><input title="Bình luận ngay" class="comment-button" type="submit" name="submit" value="GỬI BÌNH LUẬN"/></li>
                    </ul>
                </form>
            </div>
            <?php
                if(isset($_POST['submit'])){
                    $ten = $_POST['ten'];
                    $dien_thoai = $_POST['dien_thoai'];
                    $binh_luan = $_POST['binh_luan'];
                    date_default_timezone_set('Asia/SaiGon');
                    $ngay_gio = date('Y-m-d H:i:s');
                    $sql = "INSERT INTO blsanpham (id_sp,ten,dien_thoai,binh_luan,ngay_gio) VALUES ($id_sp,'$ten','$dien_thoai','$binh_luan','$ngay_gio')";
                    $query = mysqli_query($conn,$sql);
                }
            ?>
            <div class="comment-list">
            <?php
                $sql = "SELECT * FROM blsanpham WHERE id_sp = $id_sp";
                $query = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($query)){
            ?>
                <ul>
                    <li class="com-title"><?php echo $row['ten'] ?><br />
                    <span>
                        <?php
                            $oriDate = $row['ngay_gio'];
                            $newDate = date('d/m/Y H:i',strtotime($oriDate));
                            echo $newDate;
                        ?>
                    </span></li>
                    <li class="com-details"><?php
                        echo $row['binh_luan'];
                    ?></li>
                </ul>
            <?php } ?>
        </div>
    </div>
    <div class="com-pagination"><span>1</span> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a></div>   
    <?php } ?>
</div>