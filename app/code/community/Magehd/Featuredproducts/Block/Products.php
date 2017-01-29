<?php
class Magehd_Featuredproducts_Block_Products extends Mage_Core_Block_Template {
  public function getFeaturedProducts() {


 $products = Mage::getModel('featured/products')
	     ->getFeaturedProducts()
         ->setPageSize(10)
         ->setCurPage(1);
	 
    return $products;
  }
}