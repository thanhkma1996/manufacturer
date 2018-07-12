<?php

namespace Test\Manufacturer\Controller\Index;

class Add extends \Magento\Framework\App\Action\Action {

    protected $manufacturer;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Test\Manufacturer\Model\ResourceModel\Manufacturer $manufacturer
    ){
        parent::__construct($context);
        $this->manufacturer = $manufacturer;
    }

    public function execute()
    {
        $x = $this->getRequest()->getParams();
        if ($x) {
            $name = $this->getRequest()->getParam('name');
            $enable = $this->getRequest()->getParam('enable');
            if($enable != 1)
            {
                $enable=0;
            }
            $address = $this->getRequest()->getParam('address');
            $cname = $this->getRequest()->getParam('cname');
            $cphone = $this->getRequest()->getParam('phone');
            $coutry = $this->getRequest()->getParam('address_country');
            $city = $this->getRequest()->getParam('city');

//            $part = $this->_objectManager->create(\Test\Manufacturer\Model\Manufacturer::class);

            $this->manufacturer->setName($name)
            ->setEnable($enable)
            ->setAddressStress($address)
            ->setAddressCity($city)
            ->setAddressCountry($coutry)
            ->setContactPhone($cphone)
            ->setContactName($cname)
            ->save();

            $this->messageManager->addSuccess(__('Add Done'));

            return $this->_redirect('manufacturer/index/index');

        }
        return $this->_redirect('manufacturer/index/index');
    }
}