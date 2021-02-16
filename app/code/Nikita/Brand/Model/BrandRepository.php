<?php

namespace Nikita\Brand\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use Nikita\Brand\Api\BrandRepositoryInterface;
use Nikita\Brand\Api\Data\BrandInterface;
use Nikita\Brand\Api\Data\BrandSearchResultInterfaceFactory;
use Nikita\Brand\Model\ResourceModel\BrandFactory as BrandResourceFactory;
use Nikita\Brand\Model\ResourceModel\Entity\Collection;
use Nikita\Brand\Model\ResourceModel\Entity\CollectionFactory as BrandCollectionFactory;

class BrandRepository implements BrandRepositoryInterface
{
    /**
     * @var $BrandFactory
     */
    private $brandFactory;

    /**
     * @var BrandCollectionFactory
     */
    private $brandCollectionFactory;

    /**
     * @var BrandSearchResultInterfaceFactory
     */
    private $searchResultFactory;

    /**
     * @var BrandResourceFactory
     */
    private $brandResourceFactory;

    /**
     * BrandRepository constructor.
     * @param BrandFactory $brandFactory
     * @param BrandCollectionFactory $brandCollectionFactory
     * @param BrandSearchResultInterfaceFactory $brandSearchResultInterfaceFactory
     * @param BrandResourceFactory $brandResourceFactory
     */

    public function __construct(
        BrandFactory $brandFactory,
        BrandCollectionFactory $brandCollectionFactory,
        BrandSearchResultInterfaceFactory $brandSearchResultInterfaceFactory,
        BrandResourceFactory $brandResourceFactory
    ) {
        $this->brandFactory = $brandFactory;
        $this->brandCollectionFactory = $brandCollectionFactory;
        $this->searchResultFactory = $brandSearchResultInterfaceFactory;
        $this->brandResourceFactory = $brandResourceFactory;
    }

    public function getById($id)
    {
        $brand = $this->brandFactory->create();
        $brand->getResource()->load($brand, $id);
        if (!$brand->getId()) {
            throw new NoSuchEntityException(__('Unable to find a brand with ID "%1"', $id));
        }
        return $brand;
    }

    public function save(BrandInterface $brand)
    {
        $brand = $this->brandFactory->create();
        $brand->getResource()->save($brand);
        return $brand;
    }

    public function delete(BrandInterface $brand)
    {
        $brand = $this->brandFactory->create();
        $brand->getResource()->delete($brand);
    }

    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->brandCollectionFactory->create();
        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);
        $collection->load();
        return $this->buildSearchResult($searchCriteria, $collection);
    }

    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ((array)$searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }

    private function addPagingToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }

    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}
