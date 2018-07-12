<?php
namespace Test\Manufacturer\Model\ResourceModel\Manufacturer;

/**
 * Subscription Collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
    /**
     *	Initialize	resource	collection
     *
     *	@return	void
     */
    public function _construct() {
        $this->_init('Test\Manufacturer\Model\Manufacturer', 'Test\Manufacturer\Model\ResourceModel\Manufacturer');
    }
}