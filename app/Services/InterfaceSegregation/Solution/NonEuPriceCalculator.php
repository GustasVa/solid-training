<?php

namespace App\Services\InterfaceSegregation\Solution;

class NonEuPriceCalculator implements PriceCalculatorInterface
{
    public function calculate(float $price, int $quantity): float
    {
        return $price * $quantity;
    }
}
