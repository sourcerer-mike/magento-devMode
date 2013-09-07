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
 * @package    ObserverTest.php
 * @author     Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright  2013 Mike Pretzlaw
 * @license    http://github.com/sourcerer-mike/mage_devMail/blob/master/LICENSE.md BSD 3-Clause ("BSD New")
 * @link       http://github.com/sourcerer-mike/mage_devMail
 * @since      0.2.0
 */

/**
 * Class LeMike_DevMode_Model_ObserverTest.
 *
 * @category   Magento-devMode
 * @author     Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright  2013 Mike Pretzlaw
 * @license    http://github.com/sourcerer-mike/Magento-devMode/blob/master/LICENSE.md BSD 3-Clause ("BSD New")
 * @link       http://github.com/sourcerer-mike/Magento-devMode
 * @since      0.3.0
 */
class LeMike_DevMode_Test_Model_Core_ConfigTest extends EcomDev_PHPUnit_Test_Case_Controller
{
    /**
     * Get the model to test on.
     *
     * @return LeMike_DevMode_Model_Core_Config
     */
    public function getModel()
    {
        return Mage::getModel('lemike_devmode/core_config');
    }


    /**
     * Tests GetConfigAsArray.
     *
     * @return null
     */
    public function testGetConfigAsArray()
    {
        $leMike_DevMode_Model_Core_Email = Mage::getModel('core/email');

        $configAsArray = $this->getModel()->getConfigAsArray();

        $this->assertInternalType('array', $configAsArray);

        var_dump($configAsArray);
        exit;

        return null;
    }


    /**
     * Tests GetRewritePathToClassName.
     *
     * @return null
     */
    public function testGetRewritePathToClassName()
    {
        $rewritePathToClassName = $this->getModel()->getRewritePathToClassName();
        var_dump($rewritePathToClassName);
        exit;

        return null;
    }


    protected function setUp()
    {
        // let magento load / cache all config
        /** @RMP test nicht durchführbar, core/config ist immer ecom_dev -> debuggen für core/email */
        $leMike_DevMode_Model_Core_Email = Mage::getModel('core/email');

        parent::setUp();
    }
}