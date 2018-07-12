<?php
namespace Test\Manufacturer\Controller\Index;

use Magento\Framework\App\Action\Context;

class show extends \Magento\Framework\App\Action\Action
{
    protected $resultJsonFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
    )
    {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
    }

    public function execute()
    {

            $id = $this->getRequest()->getParam('id');

            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();


            $product = $objectManager->create(\Test\Manufacturer\Model\Manufacturer::class)->load($id);
//            $x = $product->getName();
//            $manu = $product->getData('manufacturer_id');

                echo 'Name:'.$product->getName();
                echo   'Address Street:'.$product->getAddressStress();
                echo  'Address City :'.$product->getAddressCity();
                echo  'Address Coutry:'.$product->getAddressCountry();


        }


}