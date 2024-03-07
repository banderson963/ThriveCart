<?php

namespace App\Basket\Base;
abstract class BasketBase
{
    public float $total = 0.00;

    public function getTotal(): float {
        return $this->total;
    }

    protected function addTotal(float $total): void {
        $this->total += $total;
    }
}