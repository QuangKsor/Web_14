SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `blsanpham`;
CREATE TABLE IF NOT EXISTS `blsanpham` (
  `id_bl` int(10) NOT NULL AUTO_INCREMENT,
  `id_sp` int(10) NOT NULL,
  `ten` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `dien_thoai` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `binh_luan` text COLLATE utf8_vietnamese_ci NOT NULL,
  `ngay_gio` datetime NOT NULL,
  PRIMARY KEY (`id_bl`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

INSERT INTO `blsanpham` (`id_bl`, `id_sp`, `ten`, `dien_thoai`, `binh_luan`, `ngay_gio`) VALUES
(1, 13, 'Tuân', '096347364', 'Dép xịn, đúng mẫu', '2025-05-28 12:00:56 '),
(2, 17, 'Châu', '023572352', 'Dép vừa chân, đúng size', '2025-06-11 9:15:30'),
(3, 21, 'Nhân', '073623836', 'Dép đẹp, vừa ý', '2025-06-18 13:15:30');

DROP TABLE IF  EXISTS `dmsanpham`;
CREATE TABLE IF NOT EXISTS `dmsanpham` (
    `id_dm` int(10) NOT NULL AUTO_INCREMENT,
    `ten_dm` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
    `anh_dm` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
    PRIMARY KEY (`id_dm`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

INSERT INTO `dmsanpham` (`id_dm`, `ten_dm`, `anh_dm`) VALUES
(1, 'Depnam', 'logo_depnam.png'),
(2, 'Depnu','logo_depnu.png');

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `id_sp` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_dm` int(11) UNSIGNED NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `anh_sp` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `gia_sp` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `tinh_trang` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `khuyen_mai` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `dac_biet` int(1) NOT NULL,
  `chi_tiet_sp` longtext COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id_sp`)
) ENGINE=MyISAM AUTO_INCREMENT=120 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

INSERT INTO `sanpham` (`id_sp`, `id_dm`, `ten_sp`, `anh_sp`, `gia_sp`, `tinh_trang`, `khuyen_mai`, `trang_thai`, `dac_biet`, `chi_tiet_sp`) VALUES
(11, 1, 'Dép nam quai chéo','depnam_quai_cheo.jpg', '55000', 'mới', 'không', 'còn hàng', 0, 'Nổi bật với phong cách trẻ trung hiện đại.'),
(12, 1, 'Dép nam xỏ ngón', 'depnam_xo_ngon.jpg', '60000', 'mới', 'không', 'còn hàng', 0, 'Từ mẫu mã đến chất liệu, tất cả đều đơn giản, thuần nhất.'),
(13, 1, 'Dép nam quai ngang', 'depnam_quai_ngang.jpg', '83000', 'mới', 'có', 'còn hàng', 1, 'Tuy có nét sang trọng là thế nhưng những đôi dép quai ngang trông khá giản dị và dễ đi, không hề phô trương'),
(14, 1, 'Dép Sandal da nam ', 'dep_sandal.jpg', '110000', 'mới', 'không', 'còn hàng', 1, 'Dép nam này có thiết kế quai ngang gọn nhẹ, tiện lợi phù hợp với rất nhiều kiểu trang phục khác nhau,'),
(15, 1, 'Dép nam đẹp sandal xỏ ngón đế cao', 'sandal_nam_cao.jpg', '119.000', 'mới', 'không', 'còn hàng', 0, 'Sản phẩm có thiết kế khá tinh tế và bắt mắt khi tận dụng dây da để bao quanh ngón chân cái của người dùng'),
(16, 1, 'Dép nam đẹp da bò quai hậu', 'sanda_quai_hau.jpg', '120000', 'mới', 'không', 'còn hàng', 1, ' Thiết kế tương đối đơn giản với nguyên liệu chính là từ những lớp da bò mềm mại.'),
(17, 2, 'Dép cao gót nữ', 'dep-cao-got-nu.jpg', '111000', 'mới', 'không', 'còn hàng', 1, 'Tây là dép tôn dáng giúp chị em nhẹ nhàng và nữ tính hơn'),
(18, 2, 'Dép quai hậu đế bằng', 'dep_nu_de_bang.jpg','120050', 'mới', 'có', 'còn hàng', 0, 'Thiết kế mang lại sự thoải mái dễ chịu cho đôi chân, hạn chế đau và tổn thương cho đôi chân.' ),
(19, 2, 'Dép nữ đính ngọc trai', 'dinh_ngoc_trai.jpg', '125000', 'mới', 'không', 'còn hàng', 0, 'Chất liệu được làm từ da mềm cao cấp, thiết kế chắc chắn điểm cộng là có khả năng chống trơn trượt cực kỳ tốt.'),
(20, 2, 'Dép nữ cao cấp Adidas', 'nu_adidas.jpg','132000', 'mới', 'không', 'còn hàng', 1, ' Thiết kế đơn giản tuy nhiên lại mang đến nhiều cơn sốt cho các tín đồ thời trang. '),
(21, 2, 'Dép nữ Sandal bảng ngang quai hậu', 'sandal_nu_quai.jpg', '143000', 'mới', 'không', 'còn hàng', 0, 'Kiểu dáng thời trang, cá tính, năng động, trẻ trung');

DROP TABLE IF EXISTS `thanhvien`;
CREATE TABLE IF NOT EXISTS `thanhvien` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

INSERT INTO `thanhvien` (`id`, `name`, `email`, `pass`, `role`) VALUES
(101, 'Quang', 'quang@gmail.com', '1245', 0),
(102, 'Tuan', 'tuan123@gmail.com', '123', 0),
(103, 'Chau', 'chau123@gmail.com', '123', 0),
(104, 'Nhân', 'nhan123@gmail.com', '123', 0),
(105, 'Admin', 'admim@gmail.com', 'admin', 1);

COMMIT;