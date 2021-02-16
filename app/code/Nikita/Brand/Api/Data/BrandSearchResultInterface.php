<?php

namespace Nikita\Brand\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface BrandSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Nikita\Brand\Api\Data\BrandInterface[]
     */
    public function getItems();

    /**
     * @param \Nikita\Brand\Api\Data\BrandInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
