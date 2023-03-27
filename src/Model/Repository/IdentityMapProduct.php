<?php

namespace Model\Repository;

use Exception;
use Model\Entity\Product;

class IdentityMapProduct
{
    private $identityMap = [];
    public function add(Product $obj)
    {
        $key = $this->getGlobalKey(get_class($obj), $obj->getId());
        $this->identityMap[$key] = $obj;
    }
    public function get(string $classname, int $id)
    {
        $key = $this->getGlobalKey($classname, $id);
        if (isset($this->identityMap[$key])) {
            return $this->identityMap[$key];
        }
        throw new Exception();
    }
    private function getGlobalKey(string $classname, int $id): string
    {
        return sprintf('%s.%d', $classname, $id);
    }
}