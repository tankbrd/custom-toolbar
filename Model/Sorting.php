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

namespace VendorExample\Toolbar\Model;

use VendorExample\Toolbar\Helper\Config;
use VendorExample\Toolbar\Model\Sorting\Handler\SortOrder;
use VendorExample\Toolbar\Model\Config\Source\SortBy as SortBySource;

class Sorting
{
    /**
     * @var \VendorExample\Toolbar\Helper\Config
     */
    private $config;

    /**
     * @var \VendorExample\Toolbar\Model\Config\Source\SortBy
     */
    private $sortBySource;

    /**
     * Custom sorting options
     *
     * @see \VendorExample\Toolbar\Model\Config\Source\SortBy::toArray()
     * @var array
     */
    private $sortByOptionsArr;

    /**
     * @var \VendorExample\Toolbar\Model\Sorting\Handler\SortOrder
     */
    private $defaultCollectionHandler;

    /**
     * @var \VendorExample\Toolbar\Model\Sorting\HandlerInterface[]
     */
    private $customCollectionHandlers;

    /**
     * Sorting constructor
     *
     * @param \VendorExample\Toolbar\Helper\Config  $config
     * @param \VendorExample\Toolbar\Model\Config\Source\SortBy  $sortBySource
     * @param \VendorExample\Toolbar\Model\Sorting\Handler\SortOrder $defaultCollectionHandler
     * @param \VendorExample\Toolbar\Model\Sorting\HandlerInterface[] $customCollectionHandlers
     */
    public function __construct(
        Config $config,
        SortBySource $sortBySource,
        SortOrder $defaultCollectionHandler,
        array $customCollectionHandlers = []
    ) {
        $this->config = $config;
        $this->sortBySource = $sortBySource;
        $this->defaultCollectionHandler = $defaultCollectionHandler;
        $this->customCollectionHandlers = $customCollectionHandlers;
    }

    /**
     * Retrieve configurations helper
     *
     * @return \VendorExample\Toolbar\Helper\Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Retrieve SortBy options (all values)
     *
     * @return array|mixed
     */
    public function getSortByOptionsArr()
    {
        if ($this->sortByOptionsArr == null) {
            $this->sortByOptionsArr = $this->sortBySource->toArray();
        }

        return $this->sortByOptionsArr;
    }

    /**
     * Set new value to sorting option array
     *
     * @param string $option
     * @param string $label
     * @return \VendorExample\Toolbar\Model\Sorting
     */
    public function extendSortByOption($option, $label)
    {
        $this->sortByOptionsArr[$option] = __($label);

        return $this;
    }

    /**
     * Retrieve available sorting options
     *
     * @return array
     */
    public function getAvailableSortByOptions()
    {
        $availableOptions = [];
        $configValueArr = $this->getAvailableSortArray();

        if (!empty($configValueArr)) {
            $sortByOptionsArr = $this->getSortByOptionsArr();

            foreach ($configValueArr as $value) {
                $availableOptions[$value] = $sortByOptionsArr[$value];
            }
        }

        return $availableOptions;
    }

    /**
     * Retrieve available sort option list
     *
     * @return array
     */
    public function getAvailableSortArray()
    {
        $configVal = $this->getConfig()->getSortByOptions();

        return $configVal ? explode(',', $configVal) : [];
    }

    /**
     * Run handler for sort option
     *
     * @param  string $sortOption
     * @param  \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection $collection
     * @return \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
     */
    public function processProductCollection($sortOption, $collection)
    {
        $handler = $this->defaultCollectionHandler;

        if (isset($this->customCollectionHandlers[$sortOption])) {
            $handler = $this->customCollectionHandlers[$sortOption];
        }

        return $handler->process($sortOption, $collection);
    }
}
