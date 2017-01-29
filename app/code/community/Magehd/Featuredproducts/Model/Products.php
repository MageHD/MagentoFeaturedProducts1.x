<?php

class Magehd_Featuredproducts_Model_Products extends Mage_Core_Model_Abstract {
  
  protected function _construct()
    {
        $this->_init('featured/products');
    }
    public function getFeaturedProducts() {

        $products = Mage::getModel('catalog/product')
            ->getCollection()
            ->addAttributeToSelect('*')
            ->setOrder('entity_id', 'DESC')
            ->addAttributeToFilter('is_featured',1)
            ->addAttributeToFilter('status', Mage_Catalog_Model_Product_Status::STATUS_ENABLED)
            ->addFieldToFilter('visibility', Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH)
            ->setPageSize((int)Mage::getStoreConfig('featured_carousel_settings/carousel_settings/featured_viewportd'))
            ->setCurPage(1)
            ->addStoreFilter($this->getStoreId());

        return $products;
    }
}