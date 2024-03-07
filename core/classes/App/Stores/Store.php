<?php

namespace App\Stores;

use App\Stores\Acme\StoreAcme;

class Store
{
    const AVAILABLE_STORES = [ StoreAcme::class ];
    public function __construct( ) {}

    public static function getAvailableStores(): array {
        return array_filter( self::AVAILABLE_STORES, fn( $store ) => class_exists($store ) );
    }
}