<?php

namespace Homework\Signup\Model\ResourceModel\Signup;

use Homework\Signup\Model\Signup as SignupModel;
use Homework\Signup\Model\ResourceModel\Signup as SignupResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            SignupModel::class,
            SignupResourceModel::class
        );
    }
}
