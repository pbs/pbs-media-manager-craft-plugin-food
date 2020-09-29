<?php
/**
 * Media Manager
 *
 * @package       PaperTiger:MediaManager
 * @author        Paper Tiger
 * @copyright     Copyright (c) 2020 Paper Tiger
 * @link          https://www.papertiger.com/
 */

namespace papertiger\mediamanager\behaviors;

use Craft;
use yii\base\Behavior;

use papertiger\mediamanager\base\ConstantAbstract;
use papertiger\mediamanager\helpers\SettingsHelper;

class MediaBehavior extends Behavior
{
    // Public Methods
    // =========================================================================

    public function transformTags( $tags = null ) {

        if( !$tags ) {
            return false;
        }

        $formattedTags = [];

        foreach( $tags as $tag ) {
            $formattedTags[] = $tag->title;
        }

        return json_encode( $formattedTags );
    }

    public function mediaManagerReady()
    {
        foreach( ConstantAbstract::REQUIRED_SETTINGS as $settingKey ) {
            if( SettingsHelper::get( $settingKey ) === null ) {
                return false;
            }
        }

        return true;
    }
}