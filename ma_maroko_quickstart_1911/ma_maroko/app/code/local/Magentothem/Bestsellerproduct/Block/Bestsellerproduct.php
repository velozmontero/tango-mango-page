<?php
class Magentothem_Bestsellerproduct_Block_Bestsellerproduct extends Mage_Catalog_Block_Product_Abstract
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    protected function useFlatCatalogProduct()
    {
        return Mage::getStoreConfig('catalog/frontend/flat_catalog_product');
    }    
    public function getBestsellerproduct()     
    { 
        if (!$this->hasData('bestsellerproduct')) {
            $this->setData('bestsellerproduct', Mage::registry('bestsellerproduct'));
        }
        return $this->getData('bestsellerproduct');
    }
	public function getProducts()
    {
        $collection = Mage::getResourceModel('bestsellerproduct/product_bestseller');
        
        $collection = $this->_addProductAttributesAndPrices($collection)
                    ->addOrderedQty()
                    ->addMinimalPrice()
                    ->setOrder('ordered_qty', 'desc');

        // getNumProduct
        $collection->setPageSize($this->getConfig('qty'));

        if($this->useFlatCatalogProduct())
        {
            // fix error mat image vs name while Enable useFlatCatalogProduct
            foreach ($collection as $product) 
            {
                $productId = $product->_data['entity_id'];
                $_product = Mage::getModel('catalog/product')->load($productId); //Product ID
                $product->_data['name']        = $_product->getName();
                $product->_data['thumbnail']   = $_product->getThumbnail();
                $product->_data['small_image'] = $_product->getSmallImage();
            }            
        }  

        $this->setProductCollection($collection);
    }
	public function getConfig($att) 
	{
		$config = Mage::getStoreConfig('bestsellerproduct');
		if (isset($config['bestsellerproduct_config']) ) {
			$value = $config['bestsellerproduct_config'][$att];
			return $value;
		} else {
			throw new Exception($att.' value not set');
		}
	}
}