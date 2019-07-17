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

namespace VendorExample\Toolbar\Model\Sorting\Handler;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Api\SortOrder as ApiSortOrder;
use VendorExample\Toolbar\Model\Sorting\HandlerInterface;
use VendorExample\Toolbar\Model\Config\Source\SortBy as SortBySource;

class SortOrder implements HandlerInterface
{
    /**
     * Mapping option <=> SortOrder (ASC|DESC)
     *
     * @var array
     */
    private $sortOrderOptMapping = [
        SortBySource::SORT_OPTION_CODE_CREATED_AT_ASC       => ApiSortOrder::SORT_ASC,
        SortBySource::SORT_OPTION_CODE_PRICE_ASC            => ApiSortOrder::SORT_ASC,
        SortBySource::SORT_OPTION_CODE_PRICE_DESC           => ApiSortOrder::SORT_DESC,
        SortBySource::SORT_OPTION_CODE_CREATED_AT_DESC      => ApiSortOrder::SORT_DESC,
    ];

    /**
     * Custom sorting option <=> product attribute
     * (for collection filtering)
     *
     * @var array
     */
    private $attrOptMapping = [
        SortBySource::SORT_OPTION_CODE_PRICE_ASC            => ProductInterface::PRICE,
        SortBySource::SORT_OPTION_CODE_PRICE_DESC           => ProductInterface::PRICE,
        SortBySource::SORT_OPTION_CODE_CREATED_AT_ASC       => ProductInterface::CREATED_AT,
        SortBySource::SORT_OPTION_CODE_CREATED_AT_DESC      => ProductInterface::CREATED_AT,
    ];

    /**
     * @inheritdoc
     */
    public function process($sortOptionCode, $productCollection)
    {
        return $productCollection->setOrder(
            $this->attrOptMapping[$sortOptionCode],
            $this->sortOrderOptMapping[$sortOptionCode]
        );
    }
}
