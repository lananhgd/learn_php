<?php
//Bai 6
class Car {
    private $brand;
    private $color;
    private $year;

    public function __construct($brand, $color, $year) {
        $this->brand = $brand;
        $this->color = $color;
        $this->year = $year;
    }

    public function displayInfo() {
        echo "Brand: " . $this->brand . "<br>";
        echo "Color: " . $this->color . "<br>";
        echo "Year: " . $this->year . "<br>";
    }
}
$brand = ("Toyota");
$color = ("Red");
$year = 2010;
$less6 = new Car($brand, $color, $year);
echo "Car information is: <br>";
echo $less6->displayInfo();
?>