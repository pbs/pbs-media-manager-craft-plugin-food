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

class Show extends ActiveRecord
{
    // Private Properties
    // =========================================================================
    
    private static $mediaManagerShowTable = ConstantAbstract::MEDIAMANAGER_SHOW_TABLE;


    // Public Static Methods
    // =========================================================================

    public static function tableName(): string
    {
        return self::$mediaManagerShowTable;
    }


    // Public Methods
    // =========================================================================

    public function rules()
    {
        return [
            [ 'name', 'required' ]
        ];
    }
}
