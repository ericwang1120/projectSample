<?php
/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */

require_once("Product.php");

class ProductModel extends Model
{
    private $product;

    public function getProductList($productName = "")
    {
        $productList = array();
        $products = $this->selectAll();
        if ($productName == "") {
            foreach ($products as $product) {
                $productList[] = new Product($product['ID'], $product['PRODUCT_SKU'], $product['PRODUCT_NAME'], $product['PRODUCT_CATEGORY'], $product['PRODUCT_COST'], $product['PRODUCT_STOCK_QUANTITY']);
            }
        } else {
            foreach ($products as $product) {
                if (strpos($product['PRODUCT_NAME'], $productName) !== false) {
                    $productList[] = new Product($product['ID'], $product['PRODUCT_SKU'], $product['PRODUCT_NAME'], $product['PRODUCT_CATEGORY'], $product['PRODUCT_COST'], $product['PRODUCT_STOCK_QUANTITY']);
                }
            }
        }
        return $productList;
    }

}