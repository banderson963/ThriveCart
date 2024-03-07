<?php

//ini_set('xdebug.var_display_max_depth', 99);

$_SERVER["DOCUMENT_ROOT"] = __DIR__;

require_once( __DIR__ . "/common/autoloader.php" );

use App\Basket\Basket;
use App\Stores\Acme\StoreAcme;

$basket = new Basket();
$products = $basket->getProductList();

$store = $basket->getStore(StoreAcme::class);


/*
// Test One:
$basket->addToBasket($store, 'B01');
$basket->addToBasket($store, 'G01');
*/

// Test Two:
/*
$basket->addToBasket($store, 'R01');
$basket->addToBasket($store, 'R01');
*/

// Test Three:
/*
$basket->addToBasket($store, 'R01');
$basket->addToBasket($store, 'G01');
*/

// Test Four:
$basket->addToBasket($store, 'B01');
$basket->addToBasket($store, 'B01');
$basket->addToBasket($store, 'R01');
$basket->addToBasket($store, 'R01');
$basket->addToBasket($store, 'R01');

$results = $basket->checkOut();
echo "Total: {$results}";
