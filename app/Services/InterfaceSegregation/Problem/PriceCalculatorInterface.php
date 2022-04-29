<?php

namespace App\Services\InterfaceSegregation\Problem;

interface PriceCalculatorInterface
{
    public function calculate(float $price, int $quantity): float;

    public function getTax(float $price, int $percentage): float;
}
