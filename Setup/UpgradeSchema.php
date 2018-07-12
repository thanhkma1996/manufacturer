<?php
namespace Test\Manufacturer\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface {
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context){
        // TODO: Implement upgrade() method.
        if(version_compare($context->getVersion(),'2.0.1') < 0){
            $installer = $setup;
            $installer->startSetup();
            $connection = $installer->getConnection();

            //Install new database table
            $table = $installer->getConnection()->newTable(
                $installer->getTable('manufacturer_part_time')
            )->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,[
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
            ],
                'entity'

            )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                ['nullable' => false],
                'Customer name'
            )->addColumn(
                'enable',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,[
                'nullable' => false

            ],
                'enable'
            )->addColumn(
                'address_stress',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                "Address Stress"
            )->addColumn(
                'address_city',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                "Address City"

            )->addColumn(
                'address_country',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                "Address Country"

            )->addColumn(
                'contact_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                100,
                ['nullable' => false],
                "Contact Name"

            )->addColumn(
                'contact_phone',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                20,
                ['nullable' => false],
                "Contact phone"

            );
            $installer->getConnection()->createTable($table);
            $installer->endSetup();
        }
    }
}