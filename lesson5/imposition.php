<?php
$DB_TYPE = "mysql";
$DB_HOST = "localhost";
$DB_NAME = "ql_kh";
$USER_NAME = "root";
$USER_PASSWORD = "";

$conn = new PDO("$DB_TYPE:host=$DB_HOST;dbname=$DB_NAME", $USER_NAME, $USER_PASSWORD);
// kết nối database

// tạo bảng
$stsm = $conn->prepare('CREATE TABLE IF NOT EXISTS `khachhang` (
    MAKH CHAR(4) PRIMARY KEY NOT NULL,
    HOTEN VARCHAR(40),
    DCHI VARCHAR(50),
    SODT VARCHAR(20),
    NGSINH DATE,
    NGDK DATE,
    DOANHSO DECIMAL(10,2),
    LOAIKH TINYINT,
    GHICHU VARCHAR(20)
)');
$result = $stsm->execute();
if (!$result) {
    die("Creating 'khachhang' table failed: " . $stsm->errorInfo()[2]);
}

$stsm = $conn->prepare('CREATE TABLE IF NOT EXISTS `nhanvien` (
    MANV char(4) PRIMARY KEY NOT NULL,
    HOTEN varchar(40),
    SODT varchar(20),
    NGVL date
)');
$result = $stsm->execute();
if (!$result) {
    die("Creating 'nhanvien' table failed: " . $stsm->errorInfo()[2]);
}

$stsm = $conn->prepare('CREATE TABLE IF NOT EXISTS `sanpham` (
    MASP char(4) PRIMARY KEY NOT NULL,
    TENSP varchar(40),
    DVT varchar(20),
    NUOCSX varchar(20),
    GIA decimal(10,2),
    GHICHU varchar(100)
)');
$result = $stsm->execute();
if (!$result) {
    die("Creating 'sanpham' table failed: " . $stsm->errorInfo()[2]);
}

$stsm = $conn->prepare('CREATE TABLE IF NOT EXISTS `hoadon` (
    SOHD int(11) PRIMARY KEY NOT NULL,
    NGHD date,
    MAKH varchar(4),
    MANV varchar(4),
    TRIGIA decimal(10,2),
    FOREIGN KEY (MAKH) REFERENCES khachhang(MAKH),
    FOREIGN KEY (MANV) REFERENCES nhanvien(MANV)
)');
$result = $stsm->execute();
if (!$result) {
    die("Creating 'hoadon' table failed: " . $stsm->errorInfo()[2]);
}

$stsm = $conn->prepare('CREATE TABLE IF NOT EXISTS `cthd` (
    SOHD int,
    MASP varchar(4),
    SL int,
    FOREIGN KEY (SOHD) REFERENCES hoadon(SOHD),
    FOREIGN KEY (MASP) REFERENCES sanpham(MASP)
)');
$result = $stsm->execute();
if (!$result) {
    die("Creating 'cthd' table failed: " . $stsm->errorInfo()[2]);
}

// Insert data
$stsm = $conn->prepare('INSERT INTO `nhanvien`(`MANV`, `HOTEN`, `SODT`, `NGVL`) VALUES (?, ?, ?, ?)');
$data = array('NV01', 'Nguyen Nhu Nhut', '0927345678', '2006-04-13');
$data2 = array('NV02', 'Le Thi Phi Yen', '0987567390', '2006-04-21');
$data3 = array('NV03', 'Nguyen Van B', '0997047382', '2006-04-27');
$data4 = array('NV04', 'Ngo Thanh Tuan', '0913758498', '2006-04-24');
$data5 = array('NV05', 'Nguyen Thi truc Thanh', '0918590387', '2006-07-20');
$result = $stsm->execute($data);
$result2 = $stsm->execute($data2);
$result3 = $stsm->execute($data3);
$result4 = $stsm->execute($data4);
$result5 = $stsm->execute($data5);

if (!$result || !$result2 || !$result3 || !$result4 || !$result5) {
    die("Adding records to 'nhanvien' table failed: " . $stsm->errorInfo()[2]);
}

$stsm = $conn->prepare('INSERT INTO `khachhang`(`MAKH`, `HOTEN`, `DCHI`, `SODT`, `NGSINH`, `DOANHSO`, `NGDK`, `LOAIKH`, `GHICHU`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
$data = array('KH01', 'Nguyen Van A', '731 Tran Hung Dao, Q5, TpHCM', '08823451', '1960-10-22', '13,060,000', '2006-07-22', 1, '');
$data2 = array('KH02', 'Tran Ngoc Han', '23/5 Nguyen Trai, Q5, TpHCM', '0908256478', '1974-04-03', '280,000', '2006-07-30', 2, '');
$data3 = array('KH03', 'Tran Ngoc Linh', '45 Nguyen Canh Chan, Q1, TpHCM', '0938776266', '1980-06-12', '3,860,000', '2006-08-05', 1, '');
$data4 = array('KH04', 'Tran Minh Long', '50/34 Le Dai Thanh, Q10, TpHCM', '0917325476', '1965-03-09', '250,000', '2006-10-20', 2, '');
$data5 = array('KH05', 'Le Nhat Minh', '30 Truong Dinh, Q3, TpHCM', '08246108', '1950-03-10', '21,000', '2006-10-28', 1, '');
$result = $stsm->execute($data);
$result2 = $stsm->execute($data2);
$result3 = $stsm->execute($data3);
$result4 = $stsm->execute($data4);
$result5 = $stsm->execute($data5);

if (!$result || !$result2 || !$result3 || !$result4 || !$result5) {
    die("Adding records to 'khachhang' table failed: " . $stsm->errorInfo()[2]);
}

$stsm = $conn->prepare('INSERT INTO `sanpham`(`MASP`, `TENSP`, `DVT`, `NUOCSX`, `GIA`, `GHICHU`) VALUES (?, ?, ?, ?, ?, ?)');
$data = array('BC02', 'But chi', 'cay', 'Singapore', '5,000', '');
$data2 = array('BC03', 'But chi', 'hop', 'Viet Nam', '3,000', '');
$data3 = array('BC04', 'But chi', 'thung', 'Nhat Ban', '2,500', '');
$data4 = array('BC05', 'But chi', 'vi', 'Han Quoc', '4,000', '');
$data5 = array('BC06', 'But chi', 'goi', 'Trung Quoc', '2,800', '');
$result = $stsm->execute($data);
$result2 = $stsm->execute($data2);
$result3 = $stsm->execute($data3);
$result4 = $stsm->execute($data4);
$result5 = $stsm->execute($data5);

if (!$result || !$result2 || !$result3 || !$result4 || !$result5) {
    die("Adding records to 'sanpham' table failed: " . $stsm->errorInfo()[2]);
}

$stsm = $conn->prepare('INSERT INTO `hoadon`(`SOHD`, `NGHD`, `MAKH`, `MANV`, `TRIGIA`) VALUES (?, ?, ?, ?, ?)');
$data = array(1, '2006-07-25', 'KH01', 'NV01', '1,500,000');
$data2 = array(2, '2006-07-30', 'KH02', 'NV01', '300,000');
$data3 = array(3, '2006-08-05', 'KH03', 'NV03', '860,000');
$data4 = array(4, '2006-10-20', 'KH04', 'NV04', '50,000');
$data5 = array(5, '2006-10-28', 'KH05', 'NV05', '8,400');
$result = $stsm->execute($data);
$result2 = $stsm->execute($data2);
$result3 = $stsm->execute($data3);
$result4 = $stsm->execute($data4);
$result5 = $stsm->execute($data5);

if (!$result || !$result2 || !$result3 || !$result4 || !$result5) {
    die("Adding records to 'hoadon' table failed: " . $stsm->errorInfo()[2]);
}

$stsm = $conn->prepare('INSERT INTO `cthd`(`SOHD`, `MASP`, `SL`) VALUES (?, ?, ?)');
$data = array(1, 'BC02', 3);
$data2 = array(1, 'BC03', 2);
$data3 = array(2, 'BC03', 1);
$data4 = array(3, 'BC06', 1);
$data5 = array(5, 'BC03', 2);
$result = $stsm->execute($data);
$result2 = $stsm->execute($data2);
$result3 = $stsm->execute($data3);
$result4 = $stsm->execute($data4);
$result5 = $stsm->execute($data5);
if (!$result || !$result2 || !$result3 || !$result4 || !$result5) {
    die("Adding records to 'cthd' table failed: " . $stsm->errorInfo()[2]);
}

//1.Tạo các quan hệ và khai báo các khóa chính, khóa ngoại của quan hệ.
$stsm = $conn->prepare('ALTER TABLE `khachhang` ADD PRIMARY KEY (`MAKH`)');
$result = $stsm->execute();
if (!$result) {
    die("Adding primary key to 'khachhang' table failed: " . $stsm->errorInfo()[2]);
}

$stsm = $conn->prepare('ALTER TABLE `khachhang` ADD FOREIGN KEY (`MAKH`) REFERENCES `hoadon`(`MAKH`)');
$result = $stsm->execute();
if (!$result) {
    die("Adding foreign key to 'khachhang' table failed: " . $stsm->errorInfo()[2]);
}
//2.Thêm vào thuộc tính GHICHU có kiểu dữ liệu varchar(20) cho quan hệ SANPHAM.
$stsm = $conn->prepare('ALTER TABLE `sanpham` ADD COLUMN `GHICHU` VARCHAR(20)');
$result = $stsm->execute();
if (!$result) {
    die("Adding column 'GHICHU' to 'sanpham' table failed: " . $stsm->errorInfo()[2]);
}
//3.Thêm vào thuộc tính LOAIKH có kiểu dữ liệu là tinyint cho quan hệ KHACHHANG.
$stsm = $conn->prepare('ALTER TABLE `khachhang` ADD COLUMN `LOAIKH` TINYINT');
$result = $stsm->execute();
if (!$result) {
    die("Adding column 'LOAIKH' to 'khachhang' table failed: " . $stsm->errorInfo()[2]);
}
//4.Cập nhật tên “Nguyễn Văn B” cho dữ liệu Khách Hàng có mã là KH01
$stsm = $conn->prepare('UPDATE `khachhang` SET `HOTEN` = "Nguyễn Văn B" WHERE `MAKH` = "KH01"');
$result = $stsm->execute();
if (!$result) {
    die("Updating data in 'khachhang' table failed: " . $stsm->errorInfo()[2]);
}
//5.Cập nhật tên “Nguyễn Văn Hoan” cho dữ liệu Khách Hàng có mã là KH09 và năm đăng ký là 2007
$stsm = $conn->prepare('UPDATE `khachhang` SET `HOTEN` = "Nguyễn Văn Hoan" WHERE `MAKH` = "KH09" AND `NGDK` = "2007-01-01"');
$result = $stsm->execute();
if (!$result) {
    die("Updating data in 'khachhang' table failed: " . $stsm->errorInfo()[2]);
}
//6.Sửa kiểu dữ liệu của thuộc tính GHICHU trong quan hệ SANPHAM thành varchar(100).
$stsm = $conn->prepare('ALTER TABLE `sanpham` MODIFY COLUMN `GHICHU` VARCHAR(100)');
$result = $stsm->execute();
if (!$result) {
    die("Altering column 'GHICHU' in 'sanpham' table failed: " . $stsm->errorInfo()[2]);
}
//7.Xóa thuộc tính GHICHU trong quan hệ SANPHAM.
$stsm = $conn->prepare('ALTER TABLE `sanpham` DROP COLUMN `GHICHU`');
$result = $stsm->execute();
if (!$result) {
    die("Dropping column 'GHICHU' from 'sanpham' table failed: " . $stsm->errorInfo()[2]);
}
//8.Xoá tất cả dữ liệu khách hàng có năm sinh 1971
$stsm = $conn->prepare('DELETE FROM `khachhang` WHERE YEAR(`NGSINH`) = 1971');
$result = $stsm->execute();
if (!$result) {
    die("Deleting data from 'khachhang' table failed: " . $stsm->errorInfo()[2]);
}
//9.Xoá tất cả dữ liệu khách hàng có năm sinh 1971 và năm đăng ký 2006
$stsm = $conn->prepare('DELETE FROM `khachhang` WHERE YEAR(`NGSINH`) = 1971 AND YEAR(`NGDK`) = 2006');
$result = $stsm->execute();
if (!$result) {
    die("Deleting data from 'khachhang' table failed: " . $stsm->errorInfo()[2]);
}
//10.Xoá tất hoá đơn có mã KH = KH01
$stsm = $conn->prepare('DELETE FROM `hoadon` WHERE `MAKH` = "KH01"');
$result = $stsm->execute();
if (!$result) {
    die("Deleting data from 'hoadon' table failed: " . $stsm->errorInfo()[2]);
}

echo "Database operations completed successfully.";
?>
