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
 * @package    Config.php
 * @author     Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright  2013 Mike Pretzlaw
 * @license    http://github.com/sourcerer-mike/mage_devMail/blob/master/LICENSE.md BSD 3-Clause ("BSD New")
 * @link       http://github.com/sourcerer-mike/mage_devMail
 * @since      0.3.0
 */

/**
 * Class Config.
 *
 * @category   mage_devMail
 * @author     Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright  2013 Mike Pretzlaw
 * @license    http://github.com/sourcerer-mike/mage_devMail/blob/master/LICENSE.md BSD 3-Clause ("BSD New")
 * @link       http://github.com/sourcerer-mike/mage_devMail
 * @since      0.3.0
 */
class LeMike_DevMode_Helper_Toolbox extends LeMike_DevMode_Helper_Abstract
{
    public function getIdeUrl($file, $line = 1)
    {
        $template = Mage::helper('lemike_devmode/config')->getRemoteCallUrlTemplate();
        return sprintf($template, urlencode($file), urlencode($line));
    }


    /**
     * Get the line number of the first line in a file matching a given regex
     * Not the nicest solution, but probably the fastest
     *
     * @param $file
     * @param $regex
     * @return bool|int
     */
    public function getLineNumber($file, $regex)
    {
        $i = 0;
        $lineFound = false;
        $handle = @fopen($file, 'r');
        if ($handle)
        {
            while (($buffer = fgets($handle, 4096)) !== false)
            {
                $i++;
                if (preg_match($regex, $buffer))
                {
                    $lineFound = true;
                    break;
                }
            }
            fclose($handle);
        }
        return $lineFound ? $i : false;
    }

}
