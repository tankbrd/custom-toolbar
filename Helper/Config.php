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

namespace VendorExample\Toolbar\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Config extends AbstractHelper
{
    /**#@+
     *
     * Toolbar system configurations paths
     *
     * @type string
     */
    const XML_PATH_TOOLBAR_SORT_BY_ACTION   = 'vendorexample_toolbar/sort_by/action';
    const XML_PATH_TOOLBAR_SORT_BY_INSERT   = 'vendorexample_toolbar/sort_by/insert';
    const XML_PATH_TOOLBAR_SORT_BY_OPTIONS  = 'vendorexample_toolbar/sort_by/options';
    /**#@- */

    /**
     * Retrieve custom sorting action (behavior)
     *
     * @return int|null
     */
    public function getSortByAction()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_TOOLBAR_SORT_BY_ACTION);
    }

    /**
     * Retrieve custom sorting place
     * (relative to native sorting)
     *
     * @return int|null
     */
    public function getSortByInsertTo()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_TOOLBAR_SORT_BY_INSERT);
    }

    /**
     * Retrieve custom sorting options
     *
     * @return string|null
     */
    public function getSortByOptions()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_TOOLBAR_SORT_BY_OPTIONS);
    }
}
