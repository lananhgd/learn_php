<?php
//Bai 4
class Clock {
    private $hour;
    private $minute;
    private $second;

    public function __construct($hour, $minute, $second) {
        $this->hour = $hour;
        $this->minute = $minute;
        $this->second = $second;
    }

    public function displayTime() {
        $formattedTime = sprintf("%02d:%02d:%02d", $this->hour, $this->minute, $this->second);
        return $formattedTime;
    }

    public function increaseSecond() {
        $this->second++;
        if ($this->second >= 60) {
            $this->second = 0;
            $this->minute++;
            if ($this->minute >= 60) {
                $this->minute = 0;
                $this->hour++;
                if ($this->hour >= 24) {
                    $this->hour = 0;
                }
            }
        }
    }
}

$hour = 10;
$minute = 5;
$second = 15;
$less4 = new Clock($hour, $minute, $second);
echo "Time is: ". $less4->displayTime();
$less4->increaseSecond();
echo "<br />";
echo "Time after increase 1 second is: ". $less4->displayTime();
echo "<br />";
?>