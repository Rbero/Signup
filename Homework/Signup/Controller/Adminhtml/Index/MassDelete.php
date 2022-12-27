<?php

namespace Homework\Signup\Controller\Adminhtml\Index;

use Homework\Signup\Model\ResourceModel\Signup\CollectionFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Ui\Component\MassAction\Filter;

class MassDelete extends Action
{
    protected $_coreRegistry = null;
    protected $resultPageFactory;
    protected $SignupFactory;
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Registry $registry,
        Filter $filter,
        CollectionFactory $Signup
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->SignupFactory = $Signup;
        $this->filter = $filter;
        parent::__construct($context);
    }
    public function execute()
    {
        $collection = $this->filter->getCollection($this->SignupFactory->create());

        $count = 0;
        foreach ($collection as $child) {
            $child->delete();
            $count++;
        }

        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $count));
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index');
    }
}
