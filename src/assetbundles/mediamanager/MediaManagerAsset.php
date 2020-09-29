<?php
/**
 * Media Manager
 *
 * @package       PaperTiger:MediaManager
 * @author        Paper Tiger
 * @copyright     Copyright (c) 2020 Paper Tiger
 * @link          https://www.papertiger.com/
 */

namespace papertiger\mediamanager\assetbundles\mediamanager;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class MediaManagerAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    public function init()
    {
        $this->sourcePath = '@papertiger/mediamanager/assetbundles/mediamanager/dist';
        $this->depends    = [ CpAsset::class ];
        $this->js         = [ 'js/MediaManager.js' ];
        $this->css        = [ 'css/MediaManager.css' ];

        parent::init();
    }
}
