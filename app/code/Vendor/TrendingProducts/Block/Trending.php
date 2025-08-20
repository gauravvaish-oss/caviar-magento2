<?php
namespace Vendor\TrendingProducts\Block;

use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\View\Element\Template;

class Trending extends Template
{
    protected $productCollectionFactory;

    public function __construct(
        Template\Context $context,
        CollectionFactory $productCollectionFactory,
        array $data = []
    ) {
        $this->productCollectionFactory = $productCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getTrendingProducts($limit = 8)
    {
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('*')
                   ->addAttributeToFilter('status', 1)
                   ->setPageSize($limit)
                   ->setCurPage(1);

        return $collection;
    }
}
