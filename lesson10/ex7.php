<?php
class Fraction {
    private $numerator;
    private $denominator;

    public function setNumerator($numerator) {
        $this->numerator = $numerator;
    }

    public function setDenominator($denominator) {
        if ($denominator != 0) {
            $this->denominator = $denominator;
        } else {
            echo "Denominator must be different from 0.";
        }
    }

    public function addFraction(Fraction $fraction) {
        $sumNumerator = $this->numerator * $fraction->denominator + $this->denominator * $fraction->numerator;
        $sumDenominator = $this->denominator * $fraction->denominator;
        return $this->simplifyFraction($sumNumerator, $sumDenominator);
    }

    public function subtractFraction(Fraction $fraction) {
        $diffNumerator = $this->numerator * $fraction->denominator - $this->denominator * $fraction->numerator;
        $diffDenominator = $this->denominator * $fraction->denominator;
        return $this->simplifyFraction($diffNumerator, $diffDenominator);
    }

    public function multiplyFraction(Fraction $fraction) {
        $productNumerator = $this->numerator * $fraction->numerator;
        $productDenominator = $this->denominator * $fraction->denominator;
        return $this->simplifyFraction($productNumerator, $productDenominator);
    }

    public function divideFraction(Fraction $fraction) {
        $quotientNumerator = $this->numerator * $fraction->denominator;
        $quotientDenominator = $this->denominator * $fraction->numerator;
        return $this->simplifyFraction($quotientNumerator, $quotientDenominator);
    }

    private function simplifyFraction($numerator, $denominator) {
        $gcd = $this->calculateGCD($numerator, $denominator);
        $simplifiedNumerator = $numerator / $gcd;
        $simplifiedDenominator = $denominator / $gcd;
        return [$simplifiedNumerator, $simplifiedDenominator];
    }

    private function calculateGCD($a, $b) {
        while ($b != 0) {
            $remainder = $a % $b;
            $a = $b;
            $b = $remainder;
        }
        return abs($a);
    }
}


$myFraction1 = new Fraction();
$myFraction1->setNumerator(8);
$myFraction1->setDenominator(4);

$myFraction2 = new Fraction();
$myFraction2->setNumerator(6);
$myFraction2->setDenominator(9);


$sumFraction = $myFraction1->addFraction($myFraction2);
echo "Sum: " . $sumFraction[0] . "/" . $sumFraction[1] . "<br>";


$diffFraction = $myFraction1->subtractFraction($myFraction2);
echo "Difference: " . $diffFraction[0] . "/" . $diffFraction[1] . "<br>";

$productFraction = $myFraction1->multiplyFraction($myFraction2);
echo "Product: " . $productFraction[0] . "/" . $productFraction[1] . "<br>";

$quotient
?>