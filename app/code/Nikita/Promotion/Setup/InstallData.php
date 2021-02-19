<?php

namespace Nikita\Promotion\Setup;

use Magento\Cms\Api\Data\BlockInterfaceFactory;
use Magento\Cms\Api\BlockRepositoryInterfaceFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * @var \Magento\Cms\Api\Data\BlockInterfaceFactory
     */
    protected $blockFactory;

    /**
     * @var \Magento\Cms\Api\BlockRepositoryInterfaceFactory
     */
    protected $blockRepositoryFactory;

    /**
     * @param \Magento\Cms\Api\Data\BlockInterfaceFactory $blockFactory
     * @param \Magento\Cms\Api\BlockRepositoryInterfaceFactory $blockRepositoryFactory
     */
    public function __construct(
        BlockInterfaceFactory $blockFactory,
        BlockRepositoryInterfaceFactory $blockRepositoryFactory
    ) {
        $this->blockFactory = $blockFactory;
        $this->blockRepositoryFactory = $blockRepositoryFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
        $setup->startSetup();
        $cmsBlockTitle = 'INVITE FRIENDS, GET REWARDS!';
        $cmsBlockSubtitle = '$100 Store Credit for you, $100 Store Credit for your friend.';
        $cmsBlockDescription = ' Tell your friends to enter your coupon checkout and They will receive 30% off they first purchase';
        $checkoutCmsBlockData = [
            'title' => 'Checkout Promo Cms Block',
            'identifier' => 'checkout_promo_cms_block',
            'stores' => ['0'],
            'is_active' => 1,
            'content' => '<h4>' . $cmsBlockTitle . '</h4><p>' . $cmsBlockSubtitle . ' . ' . $cmsBlockDescription .'</p>'
        ];
        $promoCmsBlockData = [
            'title' => 'Promo Cms Block',
            'identifier' => 'promo_cms_block',
            'stores' => ['0'],
            'is_active' => 1,
            'content' => '<h4>' . $cmsBlockTitle . '</h4><p>' . $cmsBlockSubtitle . '</p>'
        ];
        $checkoutCmsBlockData = $this->blockFactory->create(['data' => $checkoutCmsBlockData]);
        $promoCmsBlockData = $this->blockFactory->create(['data' => $promoCmsBlockData]);
        $blockRepository = $this->blockRepositoryFactory->create();
        $blockRepository->save($checkoutCmsBlockData);
        $blockRepository->save($promoCmsBlockData);
        $setup->endSetup();
    }
}
