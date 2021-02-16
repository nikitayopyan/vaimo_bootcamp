<?php

namespace Nikita\Brand\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Nikita\Brand\Api\Data\BrandInterface;

interface BrandRepositoryInterface
{
    /**
     * @param int $id
     * @return \Nikita\Brand\Api\Data\BrandInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \Nikita\Brand\Api\Data\BrandInterface $brand
     * @return \Nikita\Brand\Api\Data\BrandInterface
     */
    public function save(BrandInterface $brand);

    /**
     * @param \Nikita\Brand\Api\Data\BrandInterface $brand
     * @return void
     */
    public function delete(BrandInterface $brand);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Nikita\Brand\Api\Data\BrandSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

}
