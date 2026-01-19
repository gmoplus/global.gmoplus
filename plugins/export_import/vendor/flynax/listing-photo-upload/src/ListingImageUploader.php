<?php

namespace Flynax\Component;

use Flynax\Utils\ListingMedia;
use Flynax\Utils\Valid;
use Flynax\Abstracts\AbstractFileUpload;
use Mimey\MimeTypes;

/**
 * Class Flynax\Component\ListingImageUploader
 *
 * @since 1.1.1 - Fix problem with wrong output image format
 * @since 1.1.0 - Added the ability to load images from Clouds
 */
class ListingImageUploader extends AbstractFileUpload
{
    /**
     * Load images to listing
     *
     * @param  integer $listingID
     * @param  array   $picturesSource - Source of images (urls/paths)
     * @return array                   - Data of loaded photos
     */
    public function load($listingID = 0, $picturesSource = []): array
    {
        global $config;

        $listingID      = (int) $listingID;
        $picturesSource = (array) $picturesSource;
        $pictures       = [];

        if (!$listingID || !is_array($picturesSource)) {
            return $pictures;
        }

        $GLOBALS['reefless']->loadClass('Resize');
        $GLOBALS['reefless']->loadClass('Crop');

        $uploadOptions = ListingMedia::getOptions();
        $dir           = RL_FILES . date('m-Y') . RL_DS . 'ad' . $listingID . RL_DS;
        $dirName       = date('m-Y') . RL_DS . 'ad' . $listingID . '/';
        $iteration     = 1;

        $GLOBALS['reefless']->rlMkdir($dir);

        foreach ($picturesSource as $pictureSource) {
            $pictureSource = trim($pictureSource);
            $ext           = pathinfo(strtok($pictureSource, '?'), PATHINFO_EXTENSION);
            $tempImage     = '';

            // Try copy the image locally from Clouds
            if (!$ext) {
                $tempImage = 'listing_uploader_image_' . md5(time());

                if ($GLOBALS['reefless']->copyRemoteFile($pictureSource, RL_UPLOAD . $tempImage)) {
                    $mimeType = function_exists('mime_content_type')
                        ? mime_content_type(RL_UPLOAD . $tempImage)
                        : '';
                    $ext           = $mimeType ? (new MimeTypes)->getExtension($mimeType) : '';
                    $pictureSource = RL_UPLOAD . $tempImage . '.' . $ext;
                    rename(RL_UPLOAD . $tempImage, $pictureSource);
                }
            }

            if (!$ext || !preg_match($uploadOptions['picture_file_types'], '/' . $ext)) {
                if (!empty($tempImage) && isset($mimeType)) {
                    unlink($pictureSource);
                }

                continue;
            }

            $originalName = ListingMedia::buildName($listingID, null, $iteration, $ext, $dirName);
            $originalName = str_replace('{postfix}', 'orig', $originalName) . '.' . $ext;
            $originalPath = $dir . $originalName;

            if (Valid::isURL($pictureSource)) {
                $GLOBALS['reefless']->copyRemoteFile($pictureSource, $originalPath);
            } else {
                copy($pictureSource, $originalPath);
            }

            if (!empty($tempImage) && isset($mimeType)) {
                unlink($pictureSource);
            }

            if (!is_readable($originalPath)) {
                continue;
            }

            if (function_exists('exif_read_data')) {
                $exif = exif_read_data($originalPath);
                $orientation = $exif['Orientation'];

                if ($orientation) {
                    $this->orientImage($originalPath, $orientation);
                }
            }

            $pictureData = [
                'Listing_ID'  => $listingID,
                'Position'    => $iteration,
                'Original'    => $dirName . $originalName,
                'Description' => '',
                'Type'        => 'picture',
                'Status'      => 'active',
            ];

            foreach ($uploadOptions['image_versions'] as $version => $options) {
                $photoName = ListingMedia::buildName($listingID, null, $iteration, $ext, $dirName);
                $photoName = str_replace('_{postfix}', $options['prefix'], $photoName);
                $photoName = $dirName . $photoName . '.' . ($config['output_image_format'] ?: $ext);
                $photoPath = RL_FILES . $photoName;

                if ($options['force_crop']) {
                    $GLOBALS['rlCrop']->loadImage($originalPath);
                    $GLOBALS['rlCrop']->cropBySize($options['max_width'], $options['max_height'], ccCENTER);
                    $GLOBALS['rlCrop']->saveImage($photoPath, $config['img_quality']);
                    $GLOBALS['rlCrop']->flushImages();
                }

                $GLOBALS['rlResize']->resize(
                    $options['force_crop'] ? $photoPath : $originalPath,
                    $photoPath,
                    'C',
                    [$options['max_width'], $options['max_height']],
                    $options['force_crop'],
                    $options['watermark']
                );

                if ($options['db_field']) {
                    $pictureData[$options['db_field']] = $photoName;
                }
            }

            $pictures[] = $pictureData;
            $iteration++;
        }

        if ($pictures) {
            $GLOBALS['rlDb']->insert($pictures, 'listing_photos');
            ListingMedia::updateMediaData($listingID);
        }

        return $pictures;
    }
}
