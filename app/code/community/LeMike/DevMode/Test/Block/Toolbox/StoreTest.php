<?php
/**
 * Contains class.
 *
 * PHP version 5
 *
 * Copyright (c) 2013, Mike Pretzlaw
 * All rights reserved.
 *
 * @category   mage_devmode
 * @package    ProductsTest.php
 * @author     Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright  2013 Mike Pretzlaw
 * @license    http://github.com/sourcerer-mike/mage_devmode/blob/master/License.md BSD 3-Clause ("BSD New")
 * @link       http://github.com/sourcerer-mike/mage_devmode
 * @since      $VERSION$
 */

class LeMike_DevMode_Test_Block_Toolbox_StoreTest extends
    LeMike_DevMode_Test_AbstractController
{
    /**
     * Test that all observer and events are shown.
     *
     * @loadFixture default
     *
     * @return null
     */
    public function testListAllEventsAndTheirObserverForTheCurrentPage()
    {
        /*
         * }}} preconditions {{{
         */

        // dispatch
        $route = 'cms/index/index';
        $this->dispatch($route);

        $this->assertRequestRoute($route);

        // fetch block
        $blockAlias = $this->getModuleAlias('/toolbox_cms');
        /** @var LeMike_DevMode_Block_Toolbox_Cms $block */
        $block = $this->getBlock($blockAlias);

        $this->assertInstanceOf($this->getModuleName('_Block_Toolbox_Cms'), $block);

        // assure that url is created
        $url = $block->getEditUrl();

        $this->assertInternalType('string', $url);
        $this->assertNotEmpty($url);

        /*
         * }}} main {{{
         */
        $this->assertLayoutRendered();
        $this->assertLayoutBlockCreated('lemike.devmode.toolbox.store');
        $this->assertLayoutBlockRendered('lemike.devmode.toolbox.store');
        $this->assertResponseBodyContains('<span class="blind">List all layout Handles</span>');
        $this->assertResponseBodyContains($url);

        /*
         * }}} postcondition {{{
         */

        return null;
    }


    /**
     * Tests.
     *
     * @loadFixture default
     *
     * @return null
     */
    public function testListAllLayoutHandlesForTheCurrentPage()
    {
        /*
         * }}} preconditions {{{
         */

        // dispatch
        $route = 'cms/index/index';
        $this->dispatch($route);

        $this->assertRequestRoute($route);

        // fetch block
        $blockAlias = $this->getModuleAlias('/toolbox_cms');
        /** @var LeMike_DevMode_Block_Toolbox_Cms $block */
        $block = $this->getBlock($blockAlias);

        $this->assertInstanceOf($this->getModuleName('_Block_Toolbox_Cms'), $block);

        // assure that url is created
        $url = $block->getEditUrl();

        $this->assertInternalType('string', $url);
        $this->assertNotEmpty($url);

        /*
         * }}} main {{{
         */
        $this->assertLayoutRendered();
        $this->assertLayoutBlockCreated('lemike.devmode.toolbox.store');
        $this->assertLayoutBlockRendered('lemike.devmode.toolbox.store');
        $this->assertResponseBodyContains('<span class="blind">Events and observer</span>');
        $this->assertResponseBodyContains($url);

        /*
         * }}} postcondition {{{
         */

        return null;
    }
}