<?php
namespace Test\Manufacturer\Model\ResourceModel;

class Manufacturer extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    public function _construct() {
        $this->_init('manufacturer_part_time', 'entity_id');
    }
}