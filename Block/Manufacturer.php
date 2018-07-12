<?php
namespace Test\Manufacturer\Block;

use  Magento\Framework\View\Element\Template;

class Manufacturer extends Template
{
    private $_manuCollection;


    public function __construct(
        Template\Context $context,
        \Test\Manufacturer\Model\ResourceModel\Manufacturer\CollectionFactory $manuCollection,
       array $data=[])
    {
        parent::__construct($context, $data);
        $this->_manuCollection = $manuCollection;

    }

    public function getpart()
    {
        $collection = $this->_manuCollection->create();
        return $collection;
    }




}