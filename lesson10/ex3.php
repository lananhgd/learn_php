<?php
//Bai 3
//Bài tập Tạo lớp Mảng số nguyên:
//Tạo một lớp MangSoNguyen với thuộc tính là một mảng các số nguyên.
//Tạo các phương thức để tính tổng, trung bình, và phần tử lớn nhất của mảng.
class IntegerArray {
    private $array;

    public function __construct($array) {
        $this->array = $array;
    }

    public function calculateSum() {
        return array_sum($this->array);
    }

    public function calculateAverage() {
        $sum = $this->calculateSum();
        $count = count($this->array);
        return $sum / $count;
    }

    public function findMax() {
        return max($this->array);
    }
}
$array = [1,2,3,4];
$less3 = new IntegerArray($array);
echo "Total: ". $less3->calculateSum(). "<br />";
echo "Total: ". $less3->calculateAverage(). "<br />";
echo "Total: ". $less3->findMax();
echo "<br />";
?>