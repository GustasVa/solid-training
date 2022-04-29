<?php

namespace App\Services\InterfaceSegregation\Solution;

interface TaxCalculatorInterface
{
    public function getTax(float $price, int $percentage): float;
}
