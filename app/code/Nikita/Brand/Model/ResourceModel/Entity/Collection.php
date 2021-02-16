<?php

namespace Nikita\Brand\Model\ResourceModel\Entity;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Nikita\Brand\Model\Brand', 'Nikita\Brand\Model\ResourceModel\Brand');
    }
}
