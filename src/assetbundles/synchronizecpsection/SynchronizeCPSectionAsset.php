<?php
/**
 * Media Manager
 *
 * @package       PaperTiger:MediaManager
 * @author        Paper Tiger
 * @copyright     Copyright (c) 2020 Paper Tiger
 * @link          https://www.papertiger.com/
 */

namespace papertiger\mediamanager\assetbundles\synchronizecpsection;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class SynchronizeCPSectionAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    public function init()
    {
        $this->sourcePath = '@papertiger/mediamanager/assetbundles/synchronizecpsection/dist';
        $this->depends    = [ CpAsset::class ];
        $this->js         = [ 'js/Synchronize.js' ];
        $this->css        = [ 'css/Synchronize.css' ];

        parent::init();
    }
}
