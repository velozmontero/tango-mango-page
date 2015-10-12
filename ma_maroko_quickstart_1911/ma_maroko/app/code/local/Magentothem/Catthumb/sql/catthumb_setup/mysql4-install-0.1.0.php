<?php
$this->startSetup();

$this->addAttribute('catalog_category', 'catthumb', array(
    'group'         => 'General Information',
    'input'         => 'select',
    'type'          => 'varchar',
    'label'         => 'Categories Thumbnail slider',
    'backend'       => '',
    'visible'       => 1,
    'required'      => 0,
    'user_defined'  => 1,
    'source'   => 'eav/entity_attribute_source_boolean',
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));
$this->endSetup();
