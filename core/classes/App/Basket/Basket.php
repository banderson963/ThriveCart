<?php

namespace App\Basket;

use App\Basket\Base\BasketBase;
use App\Stores\Store;

class Basket extends BasketBase
{
    public array $stores = [];

    public array $productList = [];

    public array $cart = [];

    public function __construct( ) {
        $this->stores = Store::getAvailableStores();
    }

    public function getStore(string $store): string|false {
        if (($name = array_search($store, $this->stores)) !== false ) {
            return $this->stores[$name];
        }

        return false;
    }

    public function getProductList(): array {
         foreach ($this->stores as $store) {
             $this->productList[$store] = (new $store)->getProductList();
         }

         return $this->productList;
    }

    public function getProduct( string $store, string $code ): string {
        return $this->productList[$store][$code];
    }

    public function addToBasket(string $store, string $code ): void {
        $this->cart[$store]['items'][] = $code;
    }

    public function calcStoreTotal(string $storeName): float {
        $this->cart[$storeName]['total'] = 0;

        foreach ($this->cart[$storeName]['items'] as $code) {
            $price = (float) $this->getProduct($storeName, $code);
            $this->cart[$storeName]['total'] += $price;
        }

        return $this->cart[$storeName]['total'];
    }

    public function calcStoreOffers(string $storeName): float {
        $calcOffersFunc = "{$storeName}::getOfferRate";
        return $calcOffersFunc($this->cart[$storeName]['items']);
    }

    public function calcStoreShipping(string $storeName): float {
        $calcShippingFunc = "{$storeName}::getShippingRate";
        return $calcShippingFunc($this->cart[$storeName]['total']);
    }

    public function checkOut(): string {
        foreach ($this->cart as $storeName => $storeCart) {
            $this->cart[$storeName]['total'] = $this->calcStoreTotal($storeName);
            $this->cart[$storeName]['total'] -= $this->calcStoreOffers($storeName);
            $this->cart[$storeName]['total'] += $this->calcStoreShipping($storeName);

            $this->addTotal($this->cart[$storeName]['total']);
        }

        return sprintf( "$%0.02f", round($this->getTotal(), 2, PHP_ROUND_HALF_DOWN) );
    }
}