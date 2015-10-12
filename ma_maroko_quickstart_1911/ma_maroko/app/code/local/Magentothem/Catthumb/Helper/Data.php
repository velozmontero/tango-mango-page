<?php
class Magentothem_Catthumb_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function getSliderCfg($cfg) 
    {
        $config = Mage::getStoreConfig('catthumb/catthumb_config');
        if(isset($config[$cfg])) return $config[$cfg];
    }

}