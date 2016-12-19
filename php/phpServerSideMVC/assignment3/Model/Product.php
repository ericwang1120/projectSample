<?php
/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */

require_once("Exceptions.php");
class Product{
    private $productID;
    private $productSKU;
    private $productName;
    private $productCategory;
    private $productCost;
    private $productStockQuality;

    /**
     * Product constructor.
     * @param $productID
     * @param $productSKU
     * @param $productName
     * @param $productCategory
     * @param $productCost
     * @param $productStockQuality
     */
    public function __construct($productID, $productSKU, $productName, $productCategory, $productCost, $productStockQuality)
    {
        $this->productID = $productID;
        $this->productSKU = $productSKU;
        $this->productName = $productName;
        $this->productCategory = $productCategory;
        $this->productCost = $productCost;
        $this->productStockQuality = $productStockQuality;
    }

    /**
     * @return mixed
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * @param mixed $productID
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }

    /**
     * @return mixed
     */
    public function getProductSKU()
    {
        return $this->productSKU;
    }

    /**
     * @param mixed $productSKU
     */
    public function setProductSKU($productSKU)
    {
        $this->productSKU = $productSKU;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param mixed $productName
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    /**
     * @return mixed
     */
    public function getProductCategory()
    {
        return $this->productCategory;
    }

    /**
     * @param mixed $productCategory
     */
    public function setProductCategory($productCategory)
    {
        $this->productCategory = $productCategory;
    }

    /**
     * @return mixed
     */
    public function getProductCost()
    {
        return $this->productCost;
    }

    /**
     * @param mixed $productCost
     */
    public function setProductCost($productCost)
    {
        $this->productCost = $productCost;
    }

    /**
     * @return mixed
     */
    public function getProductStockQuality()
    {
        return $this->productStockQuality;
    }

    /**
     * @param mixed $productStockQuality
     */
    public function setProductStockQuality($productStockQuality)
    {
        $this->productStockQuality = $productStockQuality;
    }
}