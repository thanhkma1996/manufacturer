<?php
namespace Test\Manufacturer\Model\Config\Source;

use Magento\Eav\Model\ResourceModel\Entity\Attribute\OptionFactory;
use Magento\Framework\DB\Ddl\Table;

/** * Custom Attribute Renderer * * @author Webkul Core Team <support@webkul.com> */
class Select extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{

    /**
     * Return option array
     *
     * @param bool $addEmpty
     * @return array
     */
    public function getAllOptions($addEmpty = true)
    {


        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $productCollection = $objectManager->create('\Test\Manufacturer\Model\ResourceModel\Manufacturer\CollectionFactory');
        $collection = $productCollection->create();

        $options = [];

        if ($addEmpty) {
            $options[] = ['label' => __('-- Please Select a manufacturer --'), 'value' => ''];
        }
        foreach ($collection as $manufacturer) {
            $options[] = ['label' => $manufacturer->getEntityID(), 'value' => $manufacturer->getEntityId()];
        }

        return $options;
    }
}