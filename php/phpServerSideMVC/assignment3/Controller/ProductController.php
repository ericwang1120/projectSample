<?php

/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */
class ProductController extends Controller
{
    public function browse()
    {
        $this->view->show("browseView", 0);
    }

    public function search()
    {
        $this->loadModel("ProductModel");
        $productModel = new ProductModel();
        $productList = $productModel->getProductList();
        $this->view->show("searchView", $productList);
    }

    public function searchByName()
    {
        $this->loadModel("ProductModel");
        $productModel = new ProductModel();
        $productName = "";
        if (isset($_GET['productName'])) {
            $productName = $_GET['productName'];
        }
        $productList = $productModel->getProductList($productName);
        $json = array();
        foreach ($productList as $product) {
            $data = array();
            $data['productSKU'] = $product->getProductSKU();
            $data['productName'] = $product->getProductName();
            $data['productCategory'] = $product->getProductCategory();
            $data['productCost'] = $product->getProductCost();
            $data['productStockQuality'] = $product->getProductStockQuality();
            array_push($json, $data);
        }
        echo json_encode($json);
    }
}