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
 * @package   LeMike\DevMode\Test\Controller\Adminhtml\LeMike\DevMode\Customer
 * @author    Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright 2013 Mike Pretzlaw
 * @license   http://github.com/sourcerer-mike/mage_devmode/blob/master/License.md BSD 3-Clause ("BSD New")
 * @link      http://github.com/sourcerer-mike/mage_devmode LeMike_DevMode on GitHub
 * @since     0.4.0
 */

/**
 * Test for LeMike_DevMode_Controller_Adminhtml_Developer_CoreController.
 *
 * @category  LeMike_DevMode
 * @package   LeMike\DevMode\Test\Controller\Adminhtml\LeMike\DevMode\Customer
 * @author    Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright 2013 Mike Pretzlaw
 * @license   http://github.com/sourcerer-mike/mage_devmode/blob/master/License.md BSD 3-Clause ("BSD New")
 * @link      http://github.com/sourcerer-mike/mage_devmode LeMike_DevMode on GitHub
 * @since     0.4.0
 */
class LeMike_DevMode_Test_Controller_Adminhtml_LeMike_DevMode_Customer_CustomerControllerTest extends
    LeMike_DevMode_Test_AbstractController
{
    /**
     * Run delete action and test for json dispatch.
     *
     * @doNotIndexAll
     * @loadFixture table_customer
     *
     * @return void
     */
    public function testDeleteAllCustomerFromBackend()
    {
        // precondition
        $initialCount = Mage::getModel('customer/customer')->getCollection()->count();
        $this->assertGreaterThan(0, $initialCount);

        // main
        $this->mockAdminUserSession();
        $route = 'adminhtml/' . $this->getModuleName('_customer_customer') . '/deleteAll';
        $this->dispatch($route);

        $this->assertLayoutHandleNotLoaded($this->routeToLayoutHandle($route));

        $data = json_decode($this->getResponse()->getOutputBody(), true);

        $this->assertResponseBodyJson();
        $this->assertEquals($initialCount, $data['processed']);

        // postcondition
        $collection = Mage::getModel('customer/customer')->getCollection();
        $this->assertEquals(0, $collection->count());
    }
}
