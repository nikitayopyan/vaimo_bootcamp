<?php

namespace Nikita\Brand\Block;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SortOrderBuilder;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Nikita\Brand\Api\BrandRepositoryInterface;

class BrandsList extends Template
{
    /**
     * Product repository
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * SearchCriteria builder
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * SortOrder builder
     * @var SortOrderBuilder
     */
    private $sortOrderBuilder;

    /**
     * BrandsList constructor.
     * @param ProductRepositoryInterface $productRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param SortOrderBuilder $sortOrderBuilder
     * @param BrandRepositoryInterface $brandRepository
     * @param Context $context
     * @param array $data
     */

    public function __construct(
        ProductRepositoryInterface $productRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SortOrderBuilder $sortOrderBuilder,
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
    }
}
