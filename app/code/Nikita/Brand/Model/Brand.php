<?php

namespace Nikita\Brand\Model;

use Magento\Framework\Model\AbstractModel;
use Nikita\Brand\Api\Data\BrandInterface;

class Brand extends AbstractModel implements BrandInterface
{
    const ID = 'id';
    const BRAND = 'brand';
    const IMAGE_PATH = 'img_path';
    const DESCRIPTION = 'description';

    /**
     * @return void;
     */
    protected function _construct()
    {
        $this->_init(\Nikita\Brand\Model\ResourceModel\Brand::class);
    }

    public function getBrandId()
    {
        return $this->_getData(self::ID);
    }

    public function setBrandId($id)
    {
        return $this->setData(self::ID);
    }

    public function getBrandName()
    {
        return $this->_getData(self::BRAND);
    }

    public function setBrandName($name)
    {
        return $this->setData(self::BRAND);
    }

    public function getBrandImagePaths()
    {
        return $this->_getData(self::IMAGE_PATH);
    }

    public function setBrandImagePaths(array $path)
    {
        $this->setData(self::IMAGE_PATH, $path);
    }

    public function getBrandDescr()
    {
        return $this->_getData(self::DESCRIPTION);
    }

    public function setBrandDescr($descr)
    {
        $this->setData(self::DESCRIPTION);
    }


}
