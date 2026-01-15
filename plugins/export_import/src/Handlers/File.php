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

namespace Flynax\Plugins\ExportImport\Handlers;

/**
 * Class File
 *
 * @since 3.6.0
 * @package Flynax\Plugins\ExportImport\Handlers
 */
class File
{
    /**
     * @var array - Available to copy files
     */
    public static $availableFormats = array('zip', 'pdf', 'doc', 'docx');
    
    /**
     * Prepare file to the export
     *
     * @param  string  $fileFieldKey
     * @param  int     $listingId
     * @return string  $result       - Prepared file url to export
     */
    public static function export($fileFieldKey = '', $listingId = 0)
    {
        $result = '';
    
        if (!$fileFieldKey || !$listingId) {
            return $result;
        }
    
        $listing_info = $GLOBALS['rlListings']->getListing((int)$listingId);
        if (isset($listing_info[$fileFieldKey])) {
            $result = self::prepareFileUrl($listing_info[$fileFieldKey]);
        }
    
        return $result;
    }
    
    /**
     * Adapt file value to the URL
     *
     * @param $filePath
     * @return string
     */
    public static function prepareFileUrl($filePath = '')
    {
        if (!$filePath) {
            return false;
        }
        
        return RL_FILES_URL . $filePath;
    }
    
    /**
     * Upload file from URL to the ./files directory
     *
     * @param  string $fileUrl - Url of the downloading file
     * @return string          - Name of just downloading file | Empty string if something went wrong
     */
    public static function importToListing($fileUrl = '')
    {
        if (!$fileUrl) {
            return '';
        }
    
        $isImportedFine = false;
        $self = new self();
        $originalFileName = basename($fileUrl);
        $urlHeaders = get_headers($fileUrl, 1);
    
        if (isset($urlHeaders) && $urlHeaders[0]) {
            $serverStatus = explode(" ", $urlHeaders[0]);
            if ($serverStatus[1] == '200' && $self->ifCorrectFileType($urlHeaders)) {
                $isImportedFine = copy($fileUrl, RL_FILES . $originalFileName);
            }
        }
    
        return $isImportedFine ? $originalFileName : '';
    }
    
    /**
     * Checking if provided url is correct file
     *
     * @param  array $headers - Request headers
     * @return bool
     */
    public function ifCorrectFileType($headers)
    {
        $fileType = str_replace('application/', '', $headers['Content-Type']);
        return in_array($fileType, self::$availableFormats);
    }
}
