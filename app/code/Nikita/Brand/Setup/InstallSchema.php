<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Nikita\Brand\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        /**
         * Create table 'greeting_message'
         */
        $table = $setup->getConnection()
            ->newTable($setup->getTable('nikita_brand'))
            ->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Brand ID'
            )
            ->addColumn(
                'brand',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => 'Abibas'],
                'Brand name'
            )
            ->addColumn(
                'description',
                Table::TYPE_TEXT,
                1488,
                ['nullable' => false],
                'Brand description'
            )
            ->addColumn(
                'contacts',
                Table::TYPE_TEXT,
                666,
                ['nullable' => false],
                'Brand contacts'
            )->setComment("Brand info");
        $setup->getConnection()->createTable($table);
    }
}
