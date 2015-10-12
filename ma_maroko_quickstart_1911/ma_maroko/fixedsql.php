<?php

//// Setup Base
$folder 	= ''; //Folder Name
$file 		= $folder ? "$folder/app/Mage.php" : "app/Mage.php";
require_once($file); //Path to Magento
umask(0); Mage::app();
Mage::app()->getStore()->setId(Mage_Core_Model_App::ADMIN_STORE_ID);

/************** Add function **************/

	$installer = new Mage_Eav_Model_Entity_Setup;
	
	/*
		category attribute
		$installer = new Mage_Eav_Model_Entity_Setup;
	*/
	$installer->startSetup();
	
try {
	/*
		remove cateogory attribute
		$installer->removeAttribute('catalog_category', 'category_block_position');
	*/
	// $installer->removeAttribute('catalog_category', 'thumbnail');
	$installer->addAttribute('catalog_category', 'thumbnail', array(
		'group'                    => 'General Information',
		'label'                    => 'Thumbnail Image',
		'input'                    => 'image',
		'type'                     => 'varchar',
		'backend'                  => 'catalog/category_attribute_backend_image',
		'global'                   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
		'visible'                  => true,
		'required'                 => false,
		'user_defined'             => true,
		'order'                    => 22
	));
    
} catch (Exception $e) {
    Mage::logException($e);
}
	
echo 'Done Fixed Make Table!';
	