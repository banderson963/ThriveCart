<?php

namespace App\Stores\Acme;

use App\Stores\Acme\Enums\AcmeProducts;
use App\Stores\Store;

class StoreAcme extends Store
{
    private array $catalogue = [];

    public function __construct() {
        parent::__construct();

        $products = AcmeProducts::cases();

        foreach ($products as $key => $product) {
            $this->catalogue['codes'][$key] = $product;
            $this->catalogue['prices'][$key] = $product->getPrice();
            $this->catalogue['names'][$key] = $product->getName();
        }
    }

    public function getProductList(): array  {
        $list = [];

        foreach ($this->catalogue['codes'] as $key => $product) {
            $list[$product->name] = $this->catalogue['prices'][$key];
        }

        return $list;
    }

    public static function getOfferRate(array $items = []): float {
        $itemCount = array_count_values($items);

        if (array_key_exists(AcmeProducts::R01->name, $itemCount)) {
            $counter = $itemCount[AcmeProducts::R01->name];

            if ($counter < 2) {
                return 0.00;
            }

            return floor($counter / 2) * (AcmeProducts::R01->getPrice() / 2);
        }

        return 0.00;
    }

    public static function getShippingRate($total = 0.00): float {
        return match (true) {
                ($total > 0 && $total < 50) => 4.95,
                ($total >= 50 && $total < 90) => 2.95,
                default => 0.00
        };
    }
}