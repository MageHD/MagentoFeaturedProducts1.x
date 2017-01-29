<?php
class Magehd_Featuredproducts_Helper_Data extends Mage_Core_Helper_Abstract {

    function featuredLoader() {
        //Check if block is white listed
        $this->_checkWhitelistBlocks();

        $dotsConfig = Mage::getStoreConfig('featured_carousel_settings/carousel_settings/featured_dots');
        $scrollConfig = Mage::getStoreConfig('featured_carousel_settings/carousel_settings/featured_infinite');
        $autoplayConfig = Mage::getStoreConfig('featured_carousel_settings/carousel_settings/featured_autoplay');
        $viewportdesktop = Mage::getStoreConfig('featured_carousel_settings/carousel_settings/featured_viewportd');


        $floader = "<script>";
        $floader .= 'var $j = jQuery.noConflict();';
        $floader .= '$j(document).ready(function(){';
        $floader .= '$j(\'.featured-carousel\').slick({';
        $floader .= 'lazyLoad: \'ondemand\',';
        $floader .= 'centerPadding: \'60px\',';

        if($dotsConfig == 1){
            $floader .= 'dots: true,';
        } else {
            $floader .= 'dots: false,';
        }

        if($scrollConfig == 1){
            $floader .= 'infinite: true,';
        } else {
            $floader .= 'infinite: false,';
        }

        $floader .= 'slidesToShow:' . $viewportdesktop . ',';
        $floader .= 'slidesToScroll: 3,';
        if($autoplayConfig == 1){
            $floader .= 'autoplay: true,';
        } else {
            $floader .= 'autoplay: false,';
        }
        $floader .= 'autoplaySpeed: 2000,';
        $floader .= 'responsive: [{breakpoint: 800, settings: {slidesToShow: 3, slidesToScroll: 3, infinite: true, dots: true,variableWidth: false}},';
        $floader .= '{breakpoint: 600, settings: {slidesToShow: 3, slidesToScroll: 2,variableWidth: false}},';
        $floader .= '{breakpoint: 480, settings: {slidesToShow: 1, slidesToScroll: 1,variableWidth: false, arrows:false}}]';
        $floader .= '});';
        $floader .= '});';
        $floader .= "</script>";

        return $floader;

    }
    protected function _checkWhitelistBlocks()
    {
        $blockList = array('featured/products');
        foreach ($blockList as $blockName) {
            try {
                /** @var Mage_Admin_Model_Block $block */
                $block = Mage::getModel('admin/block');
                if (is_object($block)) {
                    //Not sure for the case, but some clients have errors

                    $block->load($blockName, 'block_name');
                    if (!$block->getId()) {
                        $block->setData(array(
                            'block_name' => $blockName,
                            'is_allowed' => 1,
                        ));
                        $block->save();
                    }
                }
            } catch (Exception $e) {
                // Magento version before 1.9.2.2: operation not required
            }
        }
    }
}
	 