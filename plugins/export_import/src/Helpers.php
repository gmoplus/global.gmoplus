<?php

/******************************************************************************
 *  
 *  PROJECT: Flynax Classifieds Software
 *  VERSION: 4.9.3
 *  LICENSE: FL63573ZF30R - https://www.flynax.com/flynax-software-eula.html
 *  PRODUCT: General Classifieds
 *  DOMAIN: global.gmowin.com
 *  FILE: RLEXPORTIMPORT.CLASS.PHP
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

namespace Flynax\Plugins\ExportImport;

/**
 * Class Helpers
 * @since 3.7.0
 */
class Helpers
{
    /**
     * Checking does multifield plugin has been installed and activated
     *
     * @return bool
     */
    public static function isMultiFieldInstalled()
    {
        $GLOBALS['reefless']->loadClass('MultiField', null, 'multiField');

        if (is_object($GLOBALS['rlSmarty']) && self::isNewMultifield()) {
            $GLOBALS['rlSmarty']->assign('multi_format_keys', $GLOBALS['rlMultiField']->formatKeys);
        }

        return isset($GLOBALS['plugins']['multiField']);
    }

    /**
     * Defines is the Multifield plugin has new data structure (v2.2.0)
     *
     * @since 3.7.1
     *
     * @return boolean
     */
    public static function isNewMultifield()
    {
        return version_compare($GLOBALS['plugins']['multiField'], '2.2.0', '>=');
    }

    /**
     * Get multiformat data
     *
     * @since 3.7.1
     *
     * @return array - Multiformat data
     */
    public static function getMultiFormats()
    {
        global $rlDb, $reefless;

        $multi_formats = [];

        $rlDb->setTable('multi_formats');
        $rlDb->outputRowsMap = 'Key';

        if (self::isNewMultifield()) {
            $multi_formats = $rlDb->fetch('*', ['Parent_ID' => '0']);
        } else {
            $multi_formats = $rlDb->fetch();
        }

        return $multi_formats;
    }

    /**
     * Get multifield related listing fields
     *
     * @since 3.9.0
     */
    public static function getMultifieldRelatedFields(): array
    {
        if (!$GLOBALS['plugins']['multiField']) {
            return [];
        }

        $sql = "
            SELECT `T1`.`Key`
            FROM `{db_prefix}listing_fields` AS `T1`
            JOIN `{db_prefix}multi_formats` AS `T2` ON `T1`.`Condition` = `T2`.`Key`
            WHERE `T1`.`Status` = 'active' AND `T2`.`Status` = 'active'
        ";
        $keys = $GLOBALS['rlDb']->getAll($sql, [false, 'Key']);

        return $keys ? array_unique($keys) : [];
    }
}
