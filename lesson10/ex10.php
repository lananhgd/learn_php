<?php
//Bai 10
class HotelReservation {
    private $name;
    private $checkInDate;
    private $numberOfNights;

    public function __construct($name, $checkInDate, $numberOfNights) {
        $this->name = $name;
        $this->checkInDate = $checkInDate;
        $this->numberOfNights = $numberOfNights;
    }

    public function calculateTotalAmount($roomPrice) {
        return $roomPrice * $this->numberOfNights;
    }
}
$name = ("Room 101");
$checkInDate = ("2023/07/03");
$numberOfNights = 5;
$less10 = new HotelReservation($name, $checkInDate, $numberOfNights);
echo "Total = ". $less10->calculateTotalAmount(15,000);
?>
