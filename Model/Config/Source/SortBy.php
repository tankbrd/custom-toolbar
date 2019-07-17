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

namespace VendorExample\Toolbar\Model\Config\Source;

use VendorExample\Toolbar\Model\Config\SourceAbstract;

class SortBy extends SourceAbstract
{
    /**#@+
     *
     * Custom sorting options codes
     *
     * @type string
     */
    const SORT_OPTION_CODE_PRICE_ASC        = 'price_asc';
    const SORT_OPTION_CODE_PRICE_DESC       = 'price_desc';
    const SORT_OPTION_CODE_ON_SALE          = 'custom_on_sale';
    const SORT_OPTION_CODE_CREATED_AT_ASC   = 'created_at_asc';
    const SORT_OPTION_CODE_CREATED_AT_DESC  = 'created_at_desc';
    /**#@- */

    /**
     * @inheritdoc
     */
    public function toArray()
    {
        return [
            self::SORT_OPTION_CODE_CREATED_AT_DESC      => __('Newest to Oldest'),
            self::SORT_OPTION_CODE_CREATED_AT_ASC       => __('Oldest to Newest'),
            self::SORT_OPTION_CODE_PRICE_DESC           => __('Highest to Lowest Price'),
            self::SORT_OPTION_CODE_PRICE_ASC            => __('Lowest to Highest Price'),
            self::SORT_OPTION_CODE_ON_SALE              => __('On Sale')
        ];
    }
}
