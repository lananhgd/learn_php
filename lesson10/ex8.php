<?php
//Bai 8
class Person {
    private $name;
    private $age;
    private $address;

    public function __construct($name, $age, $address) {
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
    }

    public function displayInfo() {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
        echo "Address: " . $this->address . "<br>";
    }
}
$name = ("Nguyen Van A");
$age = 22;
$address = ("123 Ha Noi");
$less8 = new Person($name, $age, $address);
echo "Information is: <br>";
echo $less8->displayInfo();
?>