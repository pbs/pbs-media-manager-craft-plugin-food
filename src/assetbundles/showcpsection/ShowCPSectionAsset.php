<?php
/**
 * Media Manager
 *
 * @package       PaperTiger:MediaManager
 * @author        Paper Tiger
 * @copyright     Copyright (c) 2020 Paper Tiger
 * @link          https://www.papertiger.com/
 */

namespace papertiger\mediamanager\assetbundles\showcpsection;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class ShowCPSectionAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    public function init()
    {
        $this->sourcePath = '@papertiger/mediamanager/assetbundles/showcpsection/dist';
        $this->depends    = [ CpAsset::class ];
        $this->js         = [ 'js/Show.js' ];
        $this->css        = [ 'css/Show.css' ];

        parent::init();
    }
}
