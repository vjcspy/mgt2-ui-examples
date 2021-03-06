<?php
declare(strict_types=1);
/**
 * @by SwiftOtter, Inc., 2019/01/26
 * @website https://swiftotter.com
 **/

namespace Chapter3\SetupScripts\Setup;

use Chapter3\SetupScripts\Tables;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        // I wrap table creation like this to ensure we don't throw errors in code deployment.
        if (!$setup->getConnection()->isTableExists(Tables::PRODUCT_DISCOUNTS)) {
            $table = $setup->getConnection()->newTable(Tables::PRODUCT_DISCOUNTS);
            $table->addColumn(
                    'id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                    'Discount Id'
                )->addColumn(
                    'product_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['unsigned' => true, 'nullable' => false],
                    'Product Id'
                )->addColumn(
                    'name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_VARBINARY,
                    255,
                    [],
                    'Discount name'
                )->addColumn(
                    'amount',
                    \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                    '12,4',
                    ['nullable' => false],
                    'Discount Amount'
                );

            $setup->getConnection()->createTable($table);
        }
    }
}