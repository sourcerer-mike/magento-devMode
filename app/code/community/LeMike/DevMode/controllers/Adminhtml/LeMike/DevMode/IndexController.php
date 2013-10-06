<?php
/**
 * Contains class.
 *
 * PHP version 5
 *
 * Copyright (c) 2013, Mike Pretzlaw
 * All rights reserved.
 *
 * @category   mage_devMail
 * @package    DeveloperController.php
 * @author     Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright  2013 Mike Pretzlaw
 * @license    http://github.com/sourcerer-mike/mage_devMail/blob/master/LICENSE.md BSD 3-Clause ("BSD New")
 * @link       http://github.com/sourcerer-mike/mage_devMail
 * @since      0.1.0
 */

/**
 * Class DeveloperController.
 *
 * @category  LeMike_DevMode
 * @author    Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright 2013 Mike Pretzlaw
 * @license   http://github.com/sourcerer-mike/mage_devMail/blob/master/LICENSE.md BSD 3-Clause ("BSD New")
 * @link      http://github.com/sourcerer-mike/mage_devMail
 * @since     0.1.0
 */
class LeMike_DevMode_Adminhtml_LeMike_DevMode_IndexController extends
    Mage_Adminhtml_Controller_Action
{
    public function aboutAction()
    {
        $helper = Mage::helper('lemike_devmode');

        $this->loadLayout()
        ->_setActiveMenu('lemike_devmode/about');

        $this->_title($helper->__('Development'))
        ->_title($helper->__('About'));

        $this->renderLayout();
    }
}