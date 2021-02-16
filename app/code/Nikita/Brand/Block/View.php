<?php

namespace Nikita\Brand\Block;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Template;
use Nikita\Brand\Api\BrandRepositoryInterface;

class View extends Template
{
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;
    /**
     * @var BrandRepositoryInterface
     */
    private $brandRepository;

    /**
     * View constructor.
     * @param Template\Context $context
     * @param RequestInterface $request
     * @param BrandRepositoryInterface $brandRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */

    public function __construct(
        Template\Context $context,
        RequestInterface $request,
        BrandRepositoryInterface $brandRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->_request = $request;
        $this->brandRepository = $brandRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context);
    }

    public function getBrandParam()
    {
        return $this->_request->getParam('brandid', null);
    }

    public function getBrand()
    {
        $brandId = $this->getBrandParam();
        if (is_null($brandId)) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
            return $this->brandRepository->getList($searchCriteria)->getItems();
        }

        return $this->brandRepository->getById($brandId);
    }
}
