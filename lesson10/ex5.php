<?php
//Bai 5
class Student {
    private $studentId;
    private $fullName;

    public function __construct($studentId, $fullName) {
        $this->studentId = $studentId;
        $this->fullName = $fullName;
    }

    public function getStudentId() {
        return $this->studentId;
    }

    public function getFullName() {
        return $this->fullName;
    }
}

$studentId = 1;
$fullName = ("Nguyen Van A");
$less5 = new Student($studentId, $fullName);
echo "ID: ". $less5->getStudentId(). "/ Full name: ". $less5->getFullName(). "<br />";
?>