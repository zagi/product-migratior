<?php
/**
 * this is main migration file
 *
 * it is used to migrate products from private eccomerce solution to woocomerce
 * it migrates all products data: images, names, titles, categories, etc.
 *
 * author: michal<at>zagalski.pl
 */

/**
 * load bootstrap file, if it exists, otherwise end the execution
 */
if(!file_exists('bootstrap.php')) {
    die('bootstrap file is missing');   
}
require_once 'bootstrap.php';

use Lib\Wordpress;

/**
 * load wordpress to have its all functionality :)
 */
$wordpress = new Wordpress();

/**
 * think of migration, load objects
 */

/**
 * load Products objects
 */
$query_product = $entityManager->createQuery('SELECT p FROM Models\Product p');
$products = $query_product->getResult();

/**
 * close the execution on no products
 */
if(empty($products)) {
    die('No products');   
}


/**
 * loop through them, and add each of it to woocommerce
 */
foreach($products as $product) {
    $wordpress->addProduct($product);   
}