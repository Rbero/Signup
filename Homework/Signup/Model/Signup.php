<?php

namespace Homework\Signup\Model;

use Homework\Signup\Model\ResourceModel\Signup as SignupResourceModel;
use Magento\Framework\Model\AbstractModel;

class Signup extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(SignupResourceModel::class);
    }
}
