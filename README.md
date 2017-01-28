# MagentoFeaturedProducts1.x
A Simple Magento Featured Products extension. It includes automatic carousel mode and is mobile repsonsive. This extension was tested with Magento version 1.9.3.1

#Installation 1st Option
1. Drag and drop to your Magento 1.x root directory

 2. Option 1 (PHP placement)
 <?php echo $this->getLayout()->createBlock('featured/products')->setTemplate('magehd/featured/featuredproducts.phtml')->tohtml();
           ?>
           
 2. Option 2 (CMS or Static Block Placement)
 {{block type="featured/products" block_id="magehd featured" template="custom/block.phtml"}}
 
