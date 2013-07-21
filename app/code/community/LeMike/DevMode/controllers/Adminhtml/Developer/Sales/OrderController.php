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
 * @license    http://github.com/sourcerer-mike/mage_devMail/blob/master/License.md BSD 3-Clause ("BSD New")
 * @link       http://github.com/sourcerer-mike/mage_devMail
 * @since      $VERSION$
 */

/**
 * Class DeveloperController.
 *
 * @category   mage_devMail
 * @author     Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright  2013 Mike Pretzlaw
 * @license    http://github.com/sourcerer-mike/mage_devMail/blob/master/License.md BSD 3-Clause ("BSD New")
 * @link       http://github.com/sourcerer-mike/mage_devMail
 * @since      $VERSION$
 */
class LeMike_DevMode_Adminhtml_Developer_Sales_OrderController extends Mage_Adminhtml_Controller_Action
{
    public function deleteAllAction()
    {
        $deleteAll = array(
            'amount'    => 0,
            'processed' => 0,
            'errors'    => array(),
        );

        $orderSet            = $this->_getOrderSet();
        $deleteAll['amount'] = $orderSet->count();

        foreach ($orderSet as $order)
        {
            /** @var Mage_Sales_Model_Order $order */
            $order = $order->load($order->getId());
            $order->delete();
            $deleteAll['processed']++;
        }

        $this->_responseJson($deleteAll);
    }


    /**
     * Get all orders.
     *
     * @return Mage_Sales_Model_Resource_Order_Collection
     */
    protected function _getOrderSet()
    {
        // Set store defaults for Magento
        Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

        return Mage::getModel('sales/order')->getCollection();
    }


    /**
     * .
     *
     * @param $deleteAll
     * @return void
     */
    protected function _responseJson($data)
    {
        $this->getResponse()->setHeader('Content-type', 'application/json');
        $this->getResponse()->setBody(Zend_Json_Encoder::encode($data));
    }
}