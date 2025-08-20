<?php
namespace Vendor\Theme\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

class MegaCategories extends Template
{
    protected $categoryCollectionFactory;
    protected $storeManager;

    public function __construct(
        Template\Context $context,
        CollectionFactory $categoryCollectionFactory,
        StoreManagerInterface $storeManager,
        array $data = []
    ) {
        $this->categoryCollectionFactory = $categoryCollectionFactory;
        $this->storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    /**
     * Get top-level categories (level = 2, children of root)
     */
    public function getTopCategories()
    {
        $rootId = $this->storeManager->getStore()->getRootCategoryId();

        $collection = $this->categoryCollectionFactory->create();
        $collection->addAttributeToSelect(['name', 'url_key', 'is_active'])
                   ->addAttributeToFilter('is_active', 1)
                   ->addAttributeToFilter('parent_id', $rootId)
                   ->setOrder('position', 'ASC');

        return $collection;
    }

    /**
     * Get subcategories of a given category
     */
    public function getSubCategories($categoryId)
    {
        $collection = $this->categoryCollectionFactory->create();
        $collection->addAttributeToSelect(['name', 'url_key', 'is_active'])
                   ->addAttributeToFilter('is_active', 1)
                   ->addAttributeToFilter('parent_id', $categoryId)
                   ->setOrder('position', 'ASC');

        return $collection;
    }
}
