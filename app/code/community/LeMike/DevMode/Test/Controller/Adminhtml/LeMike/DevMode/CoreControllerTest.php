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
 * @package   LeMike\DevMode\Test\Controller\Adminhtml\LeMike\DevMode
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
 * @package   LeMike\DevMode\Test\Controller\Adminhtml\LeMike\DevMode
 * @author    Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright 2013 Mike Pretzlaw
 * @license   http://github.com/sourcerer-mike/mage_devmode/blob/master/License.md BSD 3-Clause ("BSD New")
 * @link      http://github.com/sourcerer-mike/mage_devmode LeMike_DevMode on GitHub
 * @since     0.4.0
 */
class LeMike_DevMode_Test_Controller_Adminhtml_LeMike_DevMode_CoreControllerTest extends
    LeMike_DevMode_Test_AbstractController
{
    /**
     * Run index action and test for layouts.
     *
     * @doNotIndexAll
     *
     * @registry _singleton/index/indexer
     * @loadFixture default_admin
     *
     * @return void
     */
    public function testAdditionalPossibilitiesToMaintainTheCore()
    {
        $this->mockAdminUserSession();

        // layout
        $route = 'adminhtml/' . $this->getModuleName('_core') . '/index';
        $this->dispatch($route);

        $this->assertRequestRoute($route);
        $this->assertLayoutHandleLoaded($this->routeToLayoutHandle($route));

        foreach ($this->getBlockToHtmlData() as $block => $lines)
        {
            $this->assertLayoutBlockRendered($block);

            if (!empty($lines))
            {
                foreach ($lines as $content)
                {
                    $this->assertResponseBodyContains($content);
                }
            }
        }
    }


    /**
     * Data provider for asserted blocks and their HTML.
     *
     * @return array [alias => [html, ...]]
     */
    public function getBlockToHtmlData()
    {
        return array(
            'core.js' => '',
            'core.tabs' => '',
            'core.content' => array(
                '<div id="devmode_core">',
            ),
            'core.config' => array(
                '<h2>Rewrites</h2>',
                '<h2>Cron Jobs</h2>',
                '<h2>Observer</h2>',
            ),
            'core.php' => array(
                '<h2>PHP</h2>',
            ),
            'core.resource' => array(
                '<h2>Resource</h2>',
            ),
        );
    }
}
