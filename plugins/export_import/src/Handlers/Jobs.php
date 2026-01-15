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

use Flynax\Classes\ProfileThumbnailUpload;
use Flynax\Utils\Profile;
use Flynax\Plugins\ExportImport\Adapters\ProfileThumbnailUploadAdapter;

/**
 * Class Jobs
 *
 * @since   3.6.0
 * @package Flynax\Plugins\ExportImport\Handlers
 */
class Jobs
{
    /**
     * @var string - Account uploading directory
     */
    protected $mediaDirName = 'account-media';

    /**
     * Import Job resume image
     *
     * @param  int    $newListingID - To which listing will be attached uploaded images
     * @param  int    $accountID    - To which account will be attached uploaded images
     * @param  string $photo        - Original photo url
     * @return bool                 - Does import process successful
     */
    public function import($newListingID = 0, $accountID = 0, $photo = '')
    {
        if (!$newListingID || !$photo || !$accountID) {
            return false;
        }

        $photos = explode(',', $photo);
        $firstPhoto = $photos[key($photos)];
        $thumbnailUploader = new ProfileThumbnailUploadAdapter();

        $thumbnailUploader->setCurrentUploadingType(ProfileThumbnailUploadAdapter::TYPE_BEFORE_461);

        if (method_exists(ProfileThumbnailUpload::class, 'buildName')) {
            $thumbnailUploader->setCurrentUploadingType(ProfileThumbnailUploadAdapter::TYPE_BEFORE_470);

            if (method_exists(Profile::class, 'updateData')) {
                $thumbnailUploader->setCurrentUploadingType(ProfileThumbnailUploadAdapter::TYPE_FROM_470);
            }
        }

        return $thumbnailUploader->uploadImageToAccount($firstPhoto, $accountID, $newListingID);
    }

    /**
     * Prepare export info of the Job listing
     *
     * @param  array $listingInfo - Exporting listing info
     * @return string             - Full URL to the Main Image photo
     */
    public function export($listingInfo)
    {
        $accountInfo = $GLOBALS['rlAccount']->getProfile((int) $listingInfo['Account_ID']);
        $url = '';

        if ($accountInfo['Photo_original']) {
            $url = sprintf('%s%s', RL_FILES_URL, $accountInfo['Photo_original']);
        }

        return $url;
    }

    /**
     * Does provided listing is belongs to Job listing type
     *
     * @param  array $listingInfo - Listing info
     * @return bool
     */
    public static function isBelongsToJob($listingInfo = array())
    {
        if (!is_array($listingInfo) || empty($listingInfo)) {
            return false;
        }

        $mainPhoto = pathinfo($listingInfo['Main_photo']);
        $accountInfo = $GLOBALS['rlAccount']->getProfile((int) $listingInfo['Account_ID']);
        $accountPhoto = pathinfo($accountInfo['Photo']);

        return ($mainPhoto['basename'] == $accountPhoto['basename']) ? true : false;
    }

    /**
     * Does provided category is belong to the Listing Type
     *
     * @param int $categoryID
     * @return bool
     */
    public static function isBelongsToJobListingType($categoryID = 0)
    {
        if (!$categoryID) {
            return false;
        }

        global $rlCategories;

        $categoriesTree = $rlCategories->getParentIDs($categoryID);
        $categoriesTree[] = $categoryID;
        $isBelongsToJobListingType = false;

        foreach ($categoriesTree as $category_id) {
            if ($GLOBALS['rlDb']->getOne('Type', "`ID` = {$category_id}", 'categories') == 'jobs') {
                $isBelongsToJobListingType = true;
                break;
            }
        }

        return $isBelongsToJobListingType;
    }
}
