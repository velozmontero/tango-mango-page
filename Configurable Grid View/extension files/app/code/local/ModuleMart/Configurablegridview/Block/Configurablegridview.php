<?php
/**
 * ModuleMart_Configurablegridview extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Module-Mart License
 * that is bundled with this package in the file license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.modulemart.com/license.txt
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to modules@modulemart.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * versions in the future. If you wish to customize this extension for your
 * needs please refer to http://www.modulemart.com for more information.
 *
 * @category   ModuleMart
 * @package    ModuleMart_Configurablegridview
 * @author-email  modules@modulemart.com
 * @copyright  Copyright 2014 © modulemart.com. All Rights Reserved
 */
class ModuleMart_Configurablegridview_Block_Configurablegridview extends Mage_Catalog_Block_Product_View_Type_Configurable
{
	public function _prepareLayout()
    { 
		return parent::_prepareLayout();
    }
	
	/**
	*
	* Enable extension
	*/
	
	public function getStockEnabled(){
		return Mage::getStoreConfigFlag('configurablegridview/settings/enable_stock_avail');
	}
	
	/**
	*
	* Enable stock availability column in table
	*/
	
	public function getIsEnabled(){
		return Mage::getStoreConfigFlag('configurablegridview/settings/is_enabled');
	}
}