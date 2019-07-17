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

class Insert extends SourceAbstract
{
    /**#@+
     *
     * Custom sorting place codes
     *
     * @type string
     */
    const NATIVE_SORTING_PLACE_FIRST    = 1;
    const NATIVE_SORTING_PLACE_END      = 2;
    /**#@- */

    /**
     * @inheritdoc
     */
    public function toArray()
    {
        return [
            self::NATIVE_SORTING_PLACE_FIRST => __('Native first'),
            self::NATIVE_SORTING_PLACE_END   => __('Native at the end'),
        ];
    }
}
