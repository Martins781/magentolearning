<?php

namespace Learning\Extension\Model\ResourceModel\Custom;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection

{
    protected function _construct()
    {
        $this->_init('Learning\Extension\Model\Custom','Learning\Extension\Model\ResourceModel\Custom');
    }
}
