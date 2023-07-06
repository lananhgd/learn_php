<?php
//2.Bài tập Tạo lớp Điểm 2D:
//Tạo một lớp Diem2D với các thuộc tính x và y.
//Tạo phương thức để tính khoảng cách từ điểm hiện tại tới một điểm khác.//
// khai báo lớp point2D
class Point2D {
    // Khai báo thuộc tính private $x và $y
    private $x;
    private $y;
    // Khai báo phương thức khởi tạo __construct, nhận giá trị xVal và yVal làm tham số
    public function __construct($xVal, $yVal) {
        $this->x = $xVal;
        $this->y = $yVal;
    }

    public function calculateDistance($otherPoint) {
        $dx = $this->x - $otherPoint->x;
        $dy = $this->y - $otherPoint->y;
        $distance = sqrt($dx * $dx + $dy * $dy);
        return $distance;
    }
}

// Create points
$point1 = new Point2D(1, 2);
$point2 = new Point2D(4, 6);

// Calculate distance between two points
$distance = $point1->calculateDistance($point2);
echo "Distance between two points: " . $distance;
?>