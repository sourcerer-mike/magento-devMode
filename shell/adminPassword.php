<?php
/**
 * Changing Admin password class LeMike_DevMode_Shell_AdminPassword.
 *
 * @category   Magento-devMode
 * @author     Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright  2013 Mike Pretzlaw
 * @license    http://github.com/sourcerer-mike/Magento-devMode/blob/master/LICENSE.md BSD 3-Clause ("BSD New")
 * @link       http://github.com/sourcerer-mike/Magento-devMode
 * @since      0.3.0
 */

const LOADING_MAGENTO = "Loading Magento ...";
require_once 'abstract.php';

/**
 * Class LeMike_DevMode_Shell_AdminPassword.
 *
 * Change password for admin.
 *
 * @category   Magento-devMode
 * @author     Mike Pretzlaw <pretzlaw@gmail.com>
 * @copyright  2013 Mike Pretzlaw
 * @license    http://github.com/sourcerer-mike/Magento-devMode/blob/master/LICENSE.md BSD 3-Clause ("BSD New")
 * @link       http://github.com/sourcerer-mike/Magento-devMode
 * @since      0.3.0
 */
class LeMike_DevMode_Shell_AdminPassword extends Mage_Shell_Abstract
{

    /**
     * Password prompt.
     *
     * @param string $prompt
     * @return null|string
     */
    function prompt_silent($prompt = "Enter Password: ")
    {
        if (preg_match('/^win/i', PHP_OS))
        {
            $vbscript = sys_get_temp_dir() . 'prompt_password.vbs';
            file_put_contents(
                $vbscript,
                'wscript.echo(InputBox("'
                . addslashes($prompt)
                . '", "", "password here"))'
            );
            $command  = "cscript //nologo " . escapeshellarg($vbscript);
            $password = rtrim(shell_exec($command));
            unlink($vbscript);

            return $password;
        }
        else
        {
            $command = "/usr/bin/env bash -c 'echo OK'";
            if (rtrim(shell_exec($command)) !== 'OK')
            {
                trigger_error("Can't invoke bash");

                return null;
            }
            $command  = "/usr/bin/env bash -c 'read -s -p \""
                        . addslashes($prompt)
                        . "\" mypassword && echo \$mypassword'";
            $password = rtrim(shell_exec($command));
            echo "\n";

            return $password;
        }
    }


    /**
     * Change password for admin.
     *
     */
    public function run()
    {
        echo "\r" . str_repeat(' ', strlen(LOADING_MAGENTO)) . "\r";

        fwrite(STDOUT, 'Enter username: ');
        $inputContent = fgets(STDIN);

        $username = trim($inputContent);
        $password = $this->prompt_silent();

        $loadByUsername = Mage::getModel('admin/user')->loadByUsername($username);

        if (!$loadByUsername->getId())
        {
            echo "Could not find $username" . PHP_EOL;
            exit(1);
        }

        $loadByUsername->setPassword($password)->save();
    }
}

echo LOADING_MAGENTO;

$cmd = new LeMike_DevMode_Shell_AdminPassword();
$cmd->run();
