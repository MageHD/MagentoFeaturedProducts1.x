<?php
	
class Magehd_Featuredproducts_IndexController extends Mage_Core_Controller_Front_Action {
    public function testModelAction() {
	     $products = Mage::getModel('featured/products')
	     ->getFeaturedProducts();
	     
	     foreach($products as $product){
		     echo $product->getName() . "<br>";
	     }
        		
        			//echo get_class($blogpost);
        			//var_dump($products);
	  
	     }
}