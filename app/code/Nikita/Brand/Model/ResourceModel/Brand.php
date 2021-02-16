<?php

namespace Nikita\Brand\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Brand extends AbstractDb
{
    /**
     * @return void;
     */
    protected function _construct()
    {
        $this->_init('nikita_brand', 'id');
    }
}
