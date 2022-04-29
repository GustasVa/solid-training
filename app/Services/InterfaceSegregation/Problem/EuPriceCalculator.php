<?php

namespace App\Services\InterfaceSegregation\Problem;

class EuPriceCalculator implements PriceCalculatorInterface
{
    public function calculate(float $price, int $quantity): float
    {
        return $price * $quantity;
    }

    public function getTax(float $price, int $percentage): float
    {
        return $price * ($percentage / 100);
    }
}
