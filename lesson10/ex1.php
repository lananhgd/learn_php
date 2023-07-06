<?php
class Rectangle {
    private $length;
    private $width;

    public function setLength($length) {
        $this->length = $length;
    }

    public function setWidth($width) {
        $this->width = $width;
    }

    public function calculateArea() {
        return $this->length * $this->width;
    }

    public function calculatePerimeter() {
        return 2 * ($this->length + $this->width);
    }
}

$myRectangle = new Rectangle();
$myRectangle->setLength(8); 
$myRectangle->setWidth(10); 

$area = $myRectangle->calculateArea();
$perimeter = $myRectangle->calculatePerimeter();

echo "Area: " . $area . "<br>";
echo "Perimeter: " . $perimeter;
?>