<?php

namespace App\DTOs;

class PriceCalculatorDTO
{
    private int $price;
    private bool $isEu;
    private int $tax;
    private int $quantity;

    public function __construct(array $data)
    {
        $this->price = $data['price'] ?? 0;
        $this->isEu = $data['isEu'] ?? false;
        $this->tax = $data['tax'] ?? 0;
        $this->quantity = $data['quantity'] ?? 1;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return bool
     */
    public function getIsEu(): bool
    {
        return $this->isEu;
    }

    /**
     * @return int
     */
    public function getTax(): int
    {
        return $this->tax;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
