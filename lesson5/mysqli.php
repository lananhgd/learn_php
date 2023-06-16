<?php
$DB_HOST = "localhost";
$DB_NAME = "ql_kh";
$USER_NAME = "root";
$USER_PASSWORD = "";

$conn = new mysqli($DB_HOST, $USER_NAME, $USER_PASSWORD, $DB_NAME);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối database thất bại: " . $conn->connect_error);
}

// Tạo bảng
$sql = "CREATE TABLE IF NOT EXISTS `khachhang` (
    MAKH CHAR(4) PRIMARY KEY NOT NULL,
    HOTEN VARCHAR(40),
    DCHI VARCHAR(50),
    SODT VARCHAR(20),
    NGSINH DATE,
    NGDK DATE,
    DOANHSO DECIMAL(10,2),
    LOAIKH TINYINT,
    GHICHU VARCHAR(20)
)";
if ($conn->query($sql) === FALSE) {
    die("Tạo bảng 'khachhang' thất bại: " . $conn->error);
}

$sql = "CREATE TABLE IF NOT EXISTS `nhanvien` (
    MANV CHAR(4) PRIMARY KEY NOT NULL,
    HOTEN VARCHAR(40),
    SODT VARCHAR(20),
    NGVL DATE
)";
if ($conn->query($sql) === FALSE) {
    die("Tạo bảng 'nhanvien' thất bại: " . $conn->error);
}

$sql = "CREATE TABLE IF NOT EXISTS `sanpham` (
    MASP CHAR(4) PRIMARY KEY NOT NULL,
    TENSP VARCHAR(40),
    DVT VARCHAR(20),
    NUOCSX VARCHAR(20),
    GIA DECIMAL(10,2),
    GHICHU VARCHAR(100)
)";
if ($conn->query($sql) === FALSE) {
    die("Tạo bảng 'sanpham' thất bại: " . $conn->error);
}

$sql = "CREATE TABLE IF NOT EXISTS `hoadon` (
    SOHD INT(11) PRIMARY KEY NOT NULL,
    NGHD DATE,
    MAKH VARCHAR(4),
    MANV VARCHAR(4),
    TRIGIA DECIMAL(10,2),
    FOREIGN KEY (MAKH) REFERENCES khachhang(MAKH),
    FOREIGN KEY (MANV) REFERENCES nhanvien(MANV)
)";
if ($conn->query($sql) === FALSE) {
    die("Tạo bảng 'hoadon' thất bại: " . $conn->error);
}

$sql = "CREATE TABLE IF NOT EXISTS `cthd` (
    SOHD INT,
    MASP VARCHAR(4),
    SL INT,
    FOREIGN KEY (SOHD) REFERENCES hoadon(SOHD),
    FOREIGN KEY (MASP) REFERENCES sanpham(MASP)
)";
if ($conn->query($sql) === FALSE) {
    die("Tạo bảng 'cthd' thất bại: " . $conn->error);
}

// Thêm dữ liệu
$sql = "INSERT INTO `nhanvien`(`MANV`, `HOTEN`, `SODT`, `NGVL`) VALUES
    ('NV01', 'Nguyen Nhu Nhut', '0927345678', '2006-04-13'),
    ('NV02', 'Le Thi Phi Yen', '0987567390', '2006-04-21'),
    ('NV03', 'Nguyen Van B', '0997047382', '2006-04-27'),
    ('NV04', 'Ngo Thanh Tuan', '0913758498', '2006-04-24'),
    ('NV05', 'Nguyen Thi truc Thanh', '0918590387', '2006-07-20')";
if ($conn->query($sql) === FALSE) {
    die("Thêm dữ liệu vào bảng 'nhanvien' thất bại: " . $conn->error);
}

$sql = "INSERT INTO `khachhang`(`MAKH`, `HOTEN`, `DCHI`, `SODT`, `NGSINH`, `DOANHSO`, `NGDK`, `LOAIKH`, `GHICHU`) VALUES
    ('KH01', 'Nguyen Van A', '731 Tran Hung Dao, Q5, TpHCM', '08823451', '1960-10-22', '13,060,000', '2006-07-22', 1, ''),
    ('KH02', 'Tran Ngoc Han', '23/5 Nguyen Trai, Q5, TpHCM', '0908256478', '1974-04-03', '280,000', '2006-07-30', 2, ''),
    ('KH03', 'Tran Ngoc Linh', '45 Nguyen Canh Chan, Q1, TpHCM', '0938776266', '1980-06-12', '3,860,000', '2006-08-05', 1, ''),
    ('KH04', 'Tran Minh Long', '50/34 Le Dai Thanh, Q10, TpHCM', '0917325476', '1965-03-09', '250,000', '2006-10-20', 2, ''),
    ('KH05', 'Le Nhat Minh', '30 Truong Dinh, Q3, TpHCM', '08246108', '1950-03-10', '21,000', '2006-10-28', 1, '')";
if ($conn->query($sql) === FALSE) {
    die("Thêm dữ liệu vào bảng 'khachhang' thất bại: " . $conn->error);
}

$sql = "INSERT INTO `sanpham`(`MASP`, `TENSP`, `DVT`, `NUOCSX`, `GIA`, `GHICHU`) VALUES
    ('BC02', 'But chi', 'cay', 'Singapore', '5,000', ''),
    ('BC03', 'But chi', 'hop', 'Viet Nam', '3,000', ''),
    ('BC04', 'But chi', 'thung', 'Nhat Ban', '2,500', ''),
    ('BC05', 'But chi', 'vi', 'Han Quoc', '4,000', ''),
    ('BC06', 'But chi', 'goi', 'Trung Quoc', '2,800', '')";
if ($conn->query($sql) === FALSE) {
    die("Thêm dữ liệu vào bảng 'sanpham' thất bại: " . $conn->error);
}

$sql = "INSERT INTO `hoadon`(`SOHD`, `NGHD`, `MAKH`, `MANV`, `TRIGIA`) VALUES
    (1, '2006-07-25', 'KH01', 'NV01', '1,500,000'),
    (2, '2006-07-30', 'KH02', 'NV01', '300,000'),
    (3, '2006-08-05', 'KH03', 'NV03', '860,000'),
    (4, '2006-10-20', 'KH04', 'NV04', '50,000'),
    (5, '2006-10-28', 'KH05', 'NV05', '8,400')";
if ($conn->query($sql) === FALSE) {
    die("Thêm dữ liệu vào bảng 'hoadon' thất bại: " . $conn->error);
}

$sql = "INSERT INTO `cthd`(`SOHD`, `MASP`, `SL`) VALUES
    (1, 'BC02', 3),
    (1, 'BC03', 2),
    (2, 'BC03', 1),
    (3, 'BC06', 1),
    (5, 'BC03', 2)";
if ($conn->query($sql) === FALSE) {
    die("Thêm dữ liệu vào bảng 'cthd' thất bại: " . $conn->error);
}
// 2.Thêm thuộc tính GHICHU có kiểu dữ liệu varchar(20) cho quan hệ SANPHAM
$sql = "ALTER TABLE `sanpham` ADD COLUMN `GHICHU` varchar(20)";

// 3.Thêm thuộc tính LOAIKH có kiểu dữ liệu tinyint cho quan hệ KHACHHANG
$sql .= "ALTER TABLE `khachhang` ADD COLUMN `LOAIKH` tinyint";

// 4.Cập nhật tên “Nguyễn Văn B” cho dữ liệu Khách Hàng có mã là KH01
$sql .= "UPDATE `khachhang` SET `HOTEN` = 'Nguyễn Văn B' WHERE `MAKH` = 'KH01'";

// 5.Cập nhật tên “Nguyễn Văn Hoan” cho dữ liệu Khách Hàng có mã là KH09 và năm đăng ký là 2007
$sql .= "UPDATE `khachhang` SET `HOTEN` = 'Nguyễn Văn Hoan' WHERE `MAKH` = 'KH09' AND `NGDK` = '2007'";

// 6.Sửa kiểu dữ liệu của thuộc tính GHICHU trong quan hệ SANPHAM thành varchar(100)
$sql .= "ALTER TABLE `sanpham` MODIFY COLUMN `GHICHU` varchar(100)";

// 7.Xóa thuộc tính GHICHU trong quan hệ SANPHAM
$sql .= "ALTER TABLE `sanpham` DROP COLUMN `GHICHU`";

// 8.Xoá tất cả dữ liệu khách hàng có năm sinh 1971
$sql .= "DELETE FROM `khachhang` WHERE YEAR(`NGSINH`) = 1971";

// 9.Xoá tất cả dữ liệu khách hàng có năm sinh 1971 và năm đăng ký 2006
$sql .= "DELETE FROM `khachhang` WHERE YEAR(`NGSINH`) = 1971 AND YEAR(`NGDK`) = 2006";

//10. Xoá tất cả hóa đơn có mã KH = KH01
$sql .= "DELETE FROM `hoadon` WHERE `MAKH` = 'KH01'";

// Thực thi các câu truy vấn
if ($conn->multi_query($sql) === FALSE) {
    die("Lỗi thực thi các câu truy vấn: " . $conn->error);
}

// Đóng kết nối
$conn->close();
?>
