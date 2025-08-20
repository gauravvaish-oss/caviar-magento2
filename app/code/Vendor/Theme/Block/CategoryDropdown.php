<?php
namespace Vendor\Theme\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;

class CategoryDropdown extends Template
{
    protected $categoryCollectionFactory;

    public function __construct(
        Template\Context $context,
        CollectionFactory $categoryCollectionFactory,
        array $data = []
    ) {
        $this->categoryCollectionFactory = $categoryCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getCategories()
    {
        $collection = $this->categoryCollectionFactory->create();
        $collection->addAttributeToSelect('name')
                ->addAttributeToFilter('is_active', 1)
                ->addAttributeToFilter('level', 2) // only first-level categories under root
                ->setOrder('position', 'ASC');

        return $collection;
    }
}
