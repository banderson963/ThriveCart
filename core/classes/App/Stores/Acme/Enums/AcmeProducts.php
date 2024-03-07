<?php

namespace App\Stores\Acme\Enums;

enum AcmeProducts: int
{
    case R01 = 1;
    case G01 = 2;
    case B01 = 3;

    public function getPrice(): string
    {
        return match ( $this ) {
            self::R01   => "32.95",
            self::G01   => "24.95",
            self::B01   => "7.95",
            default     => "0.00"
        };
    }

    public function getName(): string
    {
        return match ( $this ) {
            self::R01   => "Red Widget",
            self::G01   => "Green Widget",
            self::B01   => "Blue Widget",
            default     => ""
        };
    }
}
