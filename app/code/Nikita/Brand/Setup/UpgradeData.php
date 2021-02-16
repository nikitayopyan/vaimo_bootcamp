<?php

namespace Nikita\Brand\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

/**
 * Upgrade Data script
 */

class UpgradeData implements UpgradeDataInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if ($context->getVersion()
            && version_compare($context->getVersion(), '1.0.4') < 0
        ) {
            $table = $setup->getTable('nikita_brand');
            $setup->getConnection()
                ->update($table, ['img_path' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Adidas_Logo.svg/1920px-Adidas_Logo.svg.png'], 'id IN (1)');
            $setup->getConnection()
                ->update($table, ['img_path' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Logo_NIKE.svg/2880px-Logo_NIKE.svg.png'], 'id IN (2)');
            $setup->getConnection()
                ->update($table, ['img_path' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Reebok_2019_logo.svg/2560px-Reebok_2019_logo.svg.png'], 'id IN (3)');

            $table = $setup->getTable('nikita_brand');
            $setup->getConnection()
                ->update($table, ['description' => 'Adidas is a German multinational corporation, founded and headquartered in Herzogenaurach, Germany, that designs and manufactures shoes, clothing and accessories. It is the largest sportswear manufacturer in Europe, and the second largest in the world, after Nike.'], 'id IN (1)');
            $setup->getConnection()
                ->update($table, ['description' => 'Nike is an American multinational corporation that is engaged in the design, development, manufacturing, and worldwide marketing and sales of footwear, apparel, equipment, accessories, and services.'], 'id IN (2)');
            $setup->getConnection()
                ->update($table, ['description' => 'Reebok is an Anglo-American footwear and clothing company that has been a subsidiary[4] of German sporting goods giant Adidas since August 2005.'], 'id IN (3)');
        }
        $setup->endSetup();
    }
}