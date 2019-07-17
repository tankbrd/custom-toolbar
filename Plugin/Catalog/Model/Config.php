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

namespace VendorExample\Toolbar\Plugin\Catalog\Model;

use VendorExample\Toolbar\Model\Sorting;
use Magento\Catalog\Model\Config as OriginalClass;
use VendorExample\Toolbar\Model\Config\Source\Action;
use VendorExample\Toolbar\Model\Config\Source\Insert;

class Config
{
    /**
     * @var \VendorExample\Toolbar\Model\Sorting
     */
    private $toolbarSorting;

    /**
     * Config plugin constructor
     *
     * @param Sorting $toolbarSorting
     */
    public function __construct(Sorting $toolbarSorting)
    {
        $this->toolbarSorting = $toolbarSorting;
    }

    /**
     * Native options extending|overriding
     *
     * @see   \Magento\Catalog\Model\Config::getAttributeUsedForSortByArray()
     * @param \Magento\Catalog\Model\Config $subject
     * @param  array $options
     * @return array
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterGetAttributeUsedForSortByArray(OriginalClass $subject, $options)
    {
        if ($action = (int) $this->toolbarSorting->getConfig()->getSortByAction()) {
            $availableOptions = $this->toolbarSorting->getAvailableSortByOptions();

            if ($action == Action::CUSTOM_SORTING_ACTION_EXTEND_CODE) {
                $insertTo = (int) $this->toolbarSorting->getConfig()->getSortByInsertTo();

                if ($insertTo == Insert::NATIVE_SORTING_PLACE_FIRST) {
                    $options = $options + $availableOptions;
                } elseif ($insertTo == Insert::NATIVE_SORTING_PLACE_END) {
                    $options = $availableOptions + $options;
                }
            } elseif ($action == Action::CUSTOM_SORTING_ACTION_OVERRIDE_CODE) {
                $options = $availableOptions;
            }
        }

        return $options;
    }
}
