<?php

namespace App\Services\InterfaceSegregation\Solution;

interface PriceCalculatorInterface
{
    public function calculate(float $price, int $quantity): float;
}
