<style>
    .prd-block{
        padding:5px
    }
    .payment{
        color:red;
    }
    .payment td{
        color:black;
        font-weight: bold;
    }
    .payment table, tr, td{
        margin-top:10px;
        padding:5px;
        border: 1px solid black;
        border-collapse: collapse;
    }
    label{
        font-size: 18px;
        color: rgb(155, 15, 15);
        font-weight: bold;
    }
    .form-payment li{
        list-style: none;
    }
    .form-payment input{
        padding: 5px;
        border-radius: 5px;
    }
    .form-payment li input[type="submit"], input[type="reset"]{
        margin-top: 10px;
        background-color: rgb(182, 50, 61);
        color: white;
    }
    .form-payment li input[type="submit"]:hover, input[type="reset"]:hover{
        background-color: rgba(10, 241, 203, 0.63);
    }
</style>
<div class="prd-block">
	<h2>Xác nhận hóa đơn thanh toán</h2>
    <div class="payment">
    	<table border="0px" cellpadding="0px" cellspacing="0px" width="100%">
        	<tr id="invoice-bar">
            	<td width="45%">Tên Sản phẩm</td>
                <td width="20%">Giá</td>
                <td width="15%">Số lượng</td>
                <td width="20%">Thành tiền</td>
            </tr>
            <?php
                $arrId = array();
                //Lấy ra id sản phẩm từ mảng session
                foreach ($_SESSION['giohang'] as $id_sp => $sl) {
                    $arrId[] = $id_sp;
                }
                //Tách mảng arrId thành 1 chuỗi và ngăn cách bởi dấu ,
                $strID = implode(',', $arrId);
                $sql = "SELECT * FROM sanpham WHERE id_sp IN ($strID)";
                $query = mysqli_query($conn,$sql);
                $totalPriceAll = 0;
                while($row = mysqli_fetch_array($query)){
                $totalPrice = $_SESSION['giohang'][$row['id_sp']]*$row['gia_sp'];
            ?>
            <tr>
            	<td class="prd-name"><?php echo $row['ten_sp'] ?></td>
                <td class="prd-price"><?php echo $row['gia_sp'] ?>đ</td>
                <td class="prd-number"><?php echo $_SESSION['giohang'][$row['id_sp']] ?></td>
                <td class="prd-total"><?php echo $totalPrice ?>đ</td>
            </tr>
             <?php
                $totalPriceAll+=$totalPrice;
                }
            ?>
            <tr>
            	<td class="prd-name">Tổng giá trị hóa đơn là:</td>
                <td colspan="2"></td>
                <td class="prd-total"><span><?php echo $totalPriceAll ?>đ</span></td>
            </tr>
        </table>

    </div>
    
    <div class="form-payment">
    	<form method="post">
    	<ul>
        	<li class="info-cus"><label>Tên khách hàng</label><br /><input required type="text" name="ten" /></li>
            <li class="info-cus"><label>Địa chỉ Email</label><br /><input required type="text" name="mail" /></li>
            <li class="info-cus"><label>Số điện thoại</label><br /><input required type="text" name="dt" /></li>
            <li class="info-cus"><label>Địa chỉ nhận hàng</label><br /><input required type="text" name="dc" /></li>
            <li><input type="submit" name="submit" value="Xác nhận mua hàng" /> <input type="reset" name="reset" value="Làm lại" /></li>
        </ul>
        </form>
    </div>
    <?php
        if(isset($_POST['submit'])){
            $ten = $_POST['ten'];
            $mail = $_POST['mail'];
            $dt = $_POST['dt'];
            $dia_chi = $_POST['dc'];
            $to = "$mail";
            $subject = "THÔNG BÁO ĐẶT HÀNG THÀNH CÔNG!";
            $message = "Xin chào $ten! Bạn đã đặt hàng thành công với số điện thoại là: $dt và địa chỉ nhận hàng là: $dia_chi!";
            $from = "quang@gmail.com";
            $headers = "From: $from ";
            echo "$to, $subject, $message, $headers<br>";
            echo "Mail Sent.";
        }
    ?>
</div>
