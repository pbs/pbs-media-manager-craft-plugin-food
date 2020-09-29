<?php
/**
 * Media Manager
 *
 * @package       PaperTiger:MediaManager
 * @author        Paper Tiger
 * @copyright     Copyright (c) 2020 Paper Tiger
 * @link          https://www.papertiger.com/
 */

namespace papertiger\mediamanager\assetbundles\entriescpsection;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class EntriesCPSectionAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    public function init()
    {
        $this->sourcePath = '@papertiger/mediamanager/assetbundles/entriescpsection/dist';
        $this->depends    = [ CpAsset::class ];
        $this->js         = [ 'js/Entries.js' ];
        $this->css        = [ 'css/Entries.css' ];

        parent::init();
    }
}
