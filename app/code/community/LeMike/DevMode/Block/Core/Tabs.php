<?php
/**
 * Contains class LeMike_DevMode_Block_Core_Tabs.
 *
 * @category   Magento-devMode
 * @author     Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright  2013 Mike Pretzlaw
 * @license    http://github.com/sourcerer-mike/Magento-devMode/blob/master/License.md BSD 3-Clause ("BSD New")
 * @link       http://github.com/sourcerer-mike/Magento-devMode
 * @since      0.1.0
 */

/**
 * LeMike_DevMode Catalog page left menu
 *
 * @category   LeMike_DevMode
 * @package    LeMike_DevMode_Block_Sales
 * @author     Mike Pretzlaw <pretzlaw@gmail.com>
 */
class LeMike_DevMode_Block_Core_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    /**
     * Create new Tab.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('page_tabs');
        $this->setDestElementId('devmode_core');
        $this->setTitle(Mage::helper('lemike_devmode')->__('Core Tools'));
    }


    /**
     * Changes before HTML is made.
     *
     * @return Mage_Core_Block_Abstract
     */
    protected function _beforeToHtml()
    {
        /** @var Mage_Adminhtml_Block_Template $emailBlock */
        $emailBlock = $this->getLayout()->createBlock('adminhtml/template', 'core.email');
        $emailBlock->setTemplate('lemike/devmode/core/email.phtml');

        $this->addTab(
            'main_section',
            array(
                 'label'   => Mage::helper('lemike_devmode')->__('E-Mail'),
                 'title'   => Mage::helper('lemike_devmode')->__('E-Mail'),
                 'content' => $emailBlock->toHtml(),
                 'active'  => true
            )
        );

        return parent::_beforeToHtml();
    }
}
