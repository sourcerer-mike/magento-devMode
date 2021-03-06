<?php
/**
 * Class LeMike_DevMode_Block_Template.
 *
 * PHP version 5
 *
 * @category  LeMike_DevMode
 * @package   LeMike\DevMode\Block
 * @author    Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright 2013 Mike Pretzlaw
 * @license   http://github.com/sourcerer-mike/mage_devmode/blob/master/License.md BSD 3-Clause ("BSD New")
 * @link      http://github.com/sourcerer-mike/mage_devmode LeMike_DevMode on GitHub
 * @since     0.1.0
 */

/**
 * Class LeMike_DevMode_Block_Template.
 *
 * @category  LeMike_DevMode
 * @package   LeMike\DevMode\Block
 * @author    Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright 2013 Mike Pretzlaw
 * @license   http://github.com/sourcerer-mike/mage_devmode/blob/master/License.md BSD 3-Clause ("BSD New")
 * @link      http://github.com/sourcerer-mike/mage_devmode LeMike_DevMode on GitHub
 * @since     0.1.0
 */
class LeMike_DevMode_Block_Template extends Mage_Adminhtml_Block_Template
{
    /**
     * Shortcut to get any helper.
     *
     * Will get any helper but by default the module one (LeMike_DevMode_Helper_Data).
     *
     * @param string $name
     *
     * @return Mage_Core_Block_Abstract
     */
    public function helper($name = LeMike_DevMode_Helper_Data::MODULE_ALIAS)
    {
        return parent::helper($name);
    }


    /**
     * Will return the module helper.
     *
     * @return LeMike_DevMode_Helper_Data
     */
    public function _helper()
    {
        return Mage::helper('lemike_devmode');
    }
}
