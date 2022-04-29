<?php

namespace App\Http\Controllers\InterfaceSegregation\Solution;

use App\DTOs\PriceCalculatorDTO;
use App\Http\Controllers\Controller;
use App\Services\InterfaceSegregation\Solution\EuPriceCalculator;
use App\Services\InterfaceSegregation\Solution\NonEuPriceCalculator;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function __construct(
        private EuPriceCalculator $euCalculator,
        private NonEuPriceCalculator $nonEuCalculator
    ) {}

    /**
     * This example could be also used for OpenClose principe.
     *
     * @param Request $request
     * @return float
     */
    public function calculate(Request $request): float
    {
        $dto = new PriceCalculatorDTO($request->all());

        $price = match ($dto->getIsEu()) {
            true => $this->euCalculator->calculate($dto->getPrice(), $dto->getQuantity()),
            false => $this->nonEuCalculator->calculate($dto->getPrice(), $dto->getQuantity())
        };

        $tax = match ($dto->getIsEu()) {
            true => $this->euCalculator->getTax($price, $dto->getTax()),
            false => 0
        };

        return $price + $tax;
    }
}
