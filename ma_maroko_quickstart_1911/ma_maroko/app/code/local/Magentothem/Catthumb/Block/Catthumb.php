<?php
class Magentothem_Catthumb_Block_Catthumb extends Mage_Core_Block_Template
{

    public function getSliderCfg($cfg)
    {
        return Mage::helper('catthumb')->getSliderCfg($cfg);
    }

	public function getCategories()
	{
		$_categories = Mage::getModel('catalog/category')->getCollection()
		->addAttributeToSelect('name')
		->addAttributeToSelect('url_key')
		->addAttributeToSelect('thumbnail')
		->addAttributeToSelect('description')
		//->setLoadProductCount(true)
		->addAttributeToFilter('is_active',array('eq'=>true))
		->addAttributeToFilter('catthumb',array('eq'=>true))
		->addAttributeToSort('name')
		->load();
		return $_categories;
	}


	public function getCatResizedSlider($cat ,$width, $height = null, $quality = 100) {
		if (! $cat->getThumbnail())
			return false;

		$imageUrl = Mage::getBaseDir ( 'media' ) . DS . "catalog" . DS . "category" . DS . $cat->getThumbnail();
		if (! is_file ( $imageUrl ))
			return false;

        $imageResized = Mage::getBaseDir ( 'media' ) . DS . "catalog" . DS . "category" . DS . "cache" . DS . "cat_resized" . DS . $cat->getThumbnail();// Because clean Image cache function works in this folder only
        if (! file_exists ( $imageResized ) && file_exists ( $imageUrl ) || file_exists($imageUrl) && filemtime($imageUrl) > filemtime($imageResized)) :
        	$imageObj = new Varien_Image ( $imageUrl );
        $imageObj->constrainOnly ( true );
        $imageObj->keepAspectRatio ( true );
        $imageObj->keepFrame ( true ); // ep
        $imageObj->quality ( $quality );
        $imageObj->keepTransparency(true);  // png
        $imageObj->backgroundColor(array(255,255,255));
        $imageObj->resize ( $width, $height );
        $imageObj->save ( $imageResized );
        endif;
        
        if(file_exists($imageResized)){
        	return Mage::getBaseUrl ( 'media' ) ."/catalog/category/cache/cat_resized/" . $cat->getThumbnail();
        }else{
        	return $this->getImageUrl();
        }

    }


}