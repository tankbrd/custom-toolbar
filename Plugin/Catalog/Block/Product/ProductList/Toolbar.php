<?php
/**
 * Vendor Example, Inc.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Vendor Example, Inc. Software Agreement
 * that is bundled with this package in the file LICENSE_BAS.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.vendorexample.com/software/license/
 *
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@vendorexample.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this software to
 * newer versions in the future. If you wish to customize this software for
 * your needs please refer to http://www.vendorexample.com/software for more
 * information.
 *
 * @category    VendorExample
 * @package     VendorExample_Toolbar
 * @copyright   Copyright (c) 2018-2019 Vendor Example,Inc. (http://www.vendorexample.com)
 * @license     http://www.vendorexample.com/software/license
 */

namespace VendorExample\Toolbar\Plugin\Catalog\Block\Product\ProductList;

use Magento\Catalog\Block\Product\ProductList\Toolbar as OriginalClass;
use VendorExample\Toolbar\Model\Sorting;

class Toolbar
{
    /**
     * @var \VendorExample\Toolbar\Model\Sorting
     */
    private $toolbarSorting;

    /**
     * Toolbar plugin constructor
     *
     * @param Sorting $toolbarSorting
     */
    public function __construct(Sorting $toolbarSorting)
    {
        $this->toolbarSorting = $toolbarSorting;
    }

    /**
     * Sorting collection by custom options
     *
     * @see   \Magento\Catalog\Block\Product\ProductList\Toolbar::setCollection()
     * @param \Magento\Catalog\Block\Product\ProductList\Toolbar $subject
     * @param callable $proceed
     * @param $collection
     * @return mixed
     */
    public function aroundSetCollection(
        OriginalClass $subject,
        callable $proceed,
        $collection
    ) {
        $currentOrder = $subject->getCurrentOrder();

        if ($currentOrder) {
            $options = $this->toolbarSorting->getSortByOptionsArr();

            if (isset($options[$currentOrder])) {
                $collection = $this->toolbarSorting->processProductCollection(
                    $currentOrder,
                    $collection
                );
            }
        }

        return $proceed($collection);
    }
}
