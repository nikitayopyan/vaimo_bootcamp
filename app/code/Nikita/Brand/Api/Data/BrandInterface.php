<?php

namespace Nikita\Brand\Api\Data;

interface BrandInterface
{
    /**
     * @return int
     */
    public function getBrandId();

    /**
     * @param int $id
     * @return void
     */
    public function setBrandId($id);

    /**
     * @return string
     */
    public function getBrandName();

    /**
     * @param string $name
     * @return void
     */
    public function setBrandName($name);

    /**
     * @return string[]
     */
    public function getBrandImagePaths();

    /**
     * @param string[] $path
     * @return void
     */
    public function setBrandImagePaths(array $path);

    /**
     * @return string
     */
    public function getBrandDescr();

    /**
     * @param string $descr
     * @return void
     */
    public function setBrandDescr($descr);
}