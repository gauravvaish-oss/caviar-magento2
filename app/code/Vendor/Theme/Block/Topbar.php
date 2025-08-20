<?php
namespace Vendor\Theme\Block;

use Magento\Framework\View\Element\Template;
use Magento\Customer\Model\Session;

class Topbar extends Template
{
    protected $customerSession;

    public function __construct(
        Template\Context $context,
        Session $customerSession,
        array $data = []
    ) {
        $this->customerSession = $customerSession;
        parent::__construct($context, $data);
    }

    public function isLoggedIn()
    {
        return $this->customerSession->isLoggedIn();
    }

    public function getCustomerName()
    {
        return $this->isLoggedIn()
            ? $this->customerSession->getCustomer()->getFirstname()
            : '';
    }
}
