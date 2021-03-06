<?php
/**
 * Class LeMike_DevMode_Block_Catalog_Products.
 *
 * @category  LeMike_DevMode
 * @package   LeMike\DevMode\Block\Catalog
 * @author    Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright 2013 Mike Pretzlaw
 * @license   http://github.com/sourcerer-mike/mage_devmode/blob/master/License.md BSD 3-Clause ("BSD New")
 * @link      http://github.com/sourcerer-mike/mage_devmode LeMike_DevMode on GitHub
 * @since     0.1.0
 */

/**
 * Class LeMike_DevMode_Block_Catalog_Products.
 *
 * @category  LeMike_DevMode
 * @package   LeMike\DevMode\Block\Catalog
 * @author    Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright 2013 Mike Pretzlaw
 * @license   http://github.com/sourcerer-mike/mage_devmode/blob/master/License.md BSD 3-Clause ("BSD New")
 * @link      http://github.com/sourcerer-mike/mage_devmode LeMike_DevMode on GitHub
 * @since     0.1.0
 */
class LeMike_DevMode_Block_Catalog_Products extends Mage_Adminhtml_Block_Template
{
    /**
     * Path to default template file in theme.
     *
     * @var string
     */
    protected $_template = 'lemike/devmode/catalog/products.phtml';

    /**
     * Creating block.
     */
    public function __construct()
    {
        $this->_objectId   = 'entity_id';
        $this->_controller = 'catalog_category';

        parent::__construct();
    }
}
