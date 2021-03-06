<?php
/**
 * Contains class.
 *
 * PHP version 5
 *
 * Copyright (c) 2013, Mike Pretzlaw
 * All rights reserved.
 *
 * @category  LeMike_DevMode
 * @package   LeMike\DevMode\controllers\Adminhtml\LeMike\DevMode\Customer
 * @author    Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright 2013 Mike Pretzlaw
 * @license   http://github.com/sourcerer-mike/mage_devmode/blob/master/License.md BSD 3-Clause ("BSD New")
 * @link      http://github.com/sourcerer-mike/mage_devmode LeMike_DevMode on GitHub
 * @since     0.4.0
 */

/**
 * Class DeveloperController.
 *
 * @category  LeMike_DevMode
 * @package   LeMike\DevMode\controllers\Adminhtml\LeMike\DevMode\Customer
 * @author    Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright 2013 Mike Pretzlaw
 * @license   http://github.com/sourcerer-mike/mage_devmode/blob/master/License.md BSD 3-Clause ("BSD New")
 * @link      http://github.com/sourcerer-mike/mage_devmode LeMike_DevMode on GitHub
 * @since     0.4.0
 */
class LeMike_DevMode_Adminhtml_LeMike_DevMode_Customer_CustomerController extends
    LeMike_DevMode_Controller_Adminhtml_Controller_Action
{
    /**
     * Delete every customer.
     *
     * @return void
     */
    public function deleteAllAction()
    {
        /** @var LeMike_DevMode_Helper_Data $helper */
        $helper = Mage::helper($this->getModuleAlias());
        $helper->responseJson($helper->truncateModelByName('customer/customer'));
    }
}
