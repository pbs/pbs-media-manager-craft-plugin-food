<?php
/**
 * Media Manager
 *
 * @package       PaperTiger:MediaManager
 * @author        Paper Tiger
 * @copyright     Copyright (c) 2020 Paper Tiger
 * @link          https://www.papertiger.com/
 */

namespace papertiger\mediamanager\records;

use Craft;
use craft\db\ActiveRecord;

use papertiger\mediamanager\MediaManager;
use papertiger\mediamanager\base\ConstantAbstract;

class OldSettings extends ActiveRecord
{
    // Private Properties
    // =========================================================================
    
    private static $mediaManagerOldSettingsTable = ConstantAbstract::MEDIAMANAGER_OLD_SETTINGS_TABLE;


    // Public Static Methods
    // =========================================================================

    public static function tableName(): string
    {
        return self::$mediaManagerOldSettingsTable;
    }


    // Public Methods
    // =========================================================================

    public function rules()
    {
        return [
            [ 'settingName', 'required' ],
            [ 'settingValue', 'required' ]
        ];
    }
}
