<?php

/******************************************************************************
 *  
 *  PROJECT: Flynax Classifieds Software
 *  VERSION: 4.9.3
 *  LICENSE: FL0255RKH690 - https://www.flynax.com/flynax-software-eula.html
 *  PRODUCT: General Classifieds
 *  DOMAIN: gmoplus.com
 *  FILE: CONTROLLER.PHP
 *  
 *  The software is a commercial product delivered under single, non-exclusive,
 *  non-transferable license for one domain or IP address. Therefore distribution,
 *  sale or transfer of the file in whole or in part without permission of Flynax
 *  respective owners is considered to be illegal and breach of Flynax License End
 *  User Agreement.
 *  
 *  You are not allowed to remove this information from the file without permission
 *  of Flynax respective owners.
 *  
 *  Flynax Classifieds Software 2025 | All copyrights reserved.
 *  
 *  https://www.flynax.com
 ******************************************************************************/

namespace Flynax\Plugin\WordPressBridge;

use Flynax\Plugin\WordPressBridge\WordPressAPI\Token;

/**
 * Class Controller
 *
 * @since 2.0.0
 *
 * @package Flynax\Plugin\WordPressBridge
 */
class Controller
{
    /**
     * Checking does provided token from FlynaxBridge plugin is valid
     *
     * @param string $token
     *
     * @return bool
     */
    public function isTokenValid($token)
    {
        if (!$token) {
            return false;
        }

        $tokenManager = new Token();
        return $tokenManager->getFlToken() === $token;
    }
}
