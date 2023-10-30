<?php
/**
 * Media Manager
 *
 * @package       PaperTiger:MediaManager
 * @author        Paper Tiger
 * @copyright     Copyright (c) 2020 Paper Tiger
 * @link          https://www.papertiger.com/
 */

namespace papertiger\mediamanager\base;

abstract class ConstantAbstract
{
    // Constants
    // =========================================================================
		
		const DEPENDENCY_PLUGIN_CRAFT_RICHTEXT_PLUGINS = [
			'ckeditor' => ['handle' => 'ckeditor', 'package' => 'craftcms/ckeditor', 'fieldtype' => 'craft\ckeditor\Field', 'version' => '^3.0.0'],
			'redactor' => ['handle' => 'redactor', 'package' => 'craftcms/redactor', 'fieldtype' => 'craft\redactor\Field', 'version' => '^3.0.0']
		];
		
		const DEFAULT_RICHTEXT_TYPE = self::DEPENDENCY_PLUGIN_CRAFT_RICHTEXT_PLUGINS['ckeditor'];
    const DEPENDENCY_PLUGIN_CRAFT_REDACTOR_HANDLE  = 'redactor';
    const DEPENDENCY_PLUGIN_CRAFT_REDACTOR_PACKAGE = 'craftcms/redactor';
    const DEPENDENCY_PLUGIN_CRAFT_REDACTOR_VERSION = '>=2.3.0';
    
    const API_COLUMN_FIELDS  = [
        // Special Fields
        [ 'thumbnail', '', 'Thumbnail', 'thumbnail', 'craft\fields\Assets' ],
        [ 'display_passport_icon', '', 'Display Passport Icon?', 'displayPassportIcon', 'craft\fields\Lightswitch' ],
        [ 'last_synced', '', 'Last Synced', 'lastSynced', 'craft\fields\Date' ],
        [ 'site_tags', '', 'Site', 'siteTags', 'craft\fields\Tags' ],
        [ 'film_tags', '', 'Film', 'film', 'craft\fields\Tags' ],
        [ 'topic_tags', '', 'Topic', 'topic', 'craft\fields\Tags' ],
        [ 'expiration_status', '', 'Expiration Status', 'expirationStatus', 'craft\fields\PlainText' ],
        [ 'media_manager_id', '', 'Media Manager ID', 'mediaManagerId', 'craft\fields\PlainText' ],
        [ 'season', '', 'Season', 'season', 'craft\fields\PlainText' ],
        [ 'episode', '', 'Episode', 'episode', 'craft\fields\PlainText' ],

        // From PBS API Fields
        [ 'duration', '', 'Duration', 'duration', 'craft\fields\PlainText' ],
        [ 'description_long', '', 'Description', 'description', self::DEFAULT_RICHTEXT_TYPE['fieldtype'] ],
        [ 'object_type', '', 'Media Type', 'mediaType', 'craft\fields\PlainText' ],
        [ 'player_code', '', 'Player Code', 'playerCode', 'craft\fields\PlainText' ],
    ];
    const SHOW_API_COLUMN_FIELDS = [
        // Special Fields
        [ 'show_images', '', 'Images', 'showImages', 'craft\fields\Assets' ],
	      [ 'show_mezzanine', '', 'Mezzanine', 'showMezzanine', 'craft\fields\Assets' ],
				[ 'show_poster', '', 'Poster', 'showPoster', 'craft\fields\Assets' ],
	      [ 'show_white_logo', '', 'White Logo', 'showWhiteLogo', 'craft\fields\Assets' ],
	      [ 'show_black_logo', '', 'Black Logo', 'showBlackLogo', 'craft\fields\Assets' ],
	      [ 'show_color_logo', '', 'Color Logo', 'showColorLogo', 'craft\fields\Assets' ],
        [ 'show_last_synced', '', 'Last Synced', 'showLastSynced', 'craft\fields\Date' ],
        [ 'show_media_manager_id', '', 'Media Manager ID', 'showMediaManagerId', 'craft\fields\PlainText' ],

        // From PBS API Fields
        [ 'description_short', '', 'Description Short', 'showDescriptionShort', self::DEFAULT_RICHTEXT_TYPE['fieldtype']],
        [ 'description_long', '', 'Description Long', 'showDescriptionLong', self::DEFAULT_RICHTEXT_TYPE['fieldtype']],
    ];

    const REQUIRED_FIELDS  = [
        'thumbnail',
        'display_passport_icon',
        'last_synced',
        'site_tags',
        'expiration_status',
        'media_manager_id'
    ];

    const SHOW_REQUIRED_FIELDS  = [
        'show_images',
        'description_short',
        'description_long',
        'show_last_synced',
        'show_media_manager_id'
    ];

    const SPECIAL_FIELDS  = [
        'thumbnail',
        'display_passport_icon',
        'last_synced',
        'site_tags',
        'film_tags',
        'topic_tags',
        'season_id',
        'episode_id',
        'expiration_status',
        'media_manager_id'
    ];

    const SHOW_SPECIAL_FIELDS = [
        'show_images',
        'show_last_synced',
        'show_media_manager_id'
    ];

    const DEFAULT_FIELD_LAYOUT  = [
        'Content' => [ 'thumbnail', 'duration', 'description' ],
        'Tags' => [ 'siteTags', 'film', 'topic' ] ,
        'API' => [ 'mediaManagerId', 'mediaType', 'playerCode', 'displayPassportIcon', 'expirationStatus', 'lastSynced', 'season', 'episode' ]
    ];

    const DEFAULT_SHOW_FIELD_LAYOUT  = [
        'Content' => [ 'showImages', 'showDescriptionShort', 'showDescriptionLong' ],
        'API' => [ 'showMediaManagerId', 'showLastSynced' ]
    ];

    const REQUIRED_SETTINGS = [
        'mediaSection', 'mediaAssetVolume', 'mediaFieldGroup',
        'apiBaseUrl', 'apiColumnFields',
        'fieldLayout', 'syncSchedule'
    ];

    const API_COLUMN_FIELD_API_INDEX      = 0;
    const API_COLUMN_EXISTING_FIELD_INDEX = 1;
    const API_COLUMN_FIELD_NAME_INDEX     = 2;
    const API_COLUMN_FIELD_HANDLE_INDEX   = 3;
    const API_COLUMN_FIELD_TYPE_INDEX     = 4;
    const API_COLUMN_FIELD_RULE_INDEX     = 5;
		
		const DEFAULT_FIELD_GROUP = "Media Manager";
    const SYNC_SCHEDULE         = 'daily';
    const SYNC_CUSTOM_SCHEDULE  = '';
    const SYNC_PING_CHANGELOG   = 1;

    const MEDIAMANAGER_SHOW_TABLE_NAME         = 'mediamanager_show';
    const MEDIAMANAGER_SHOW_TABLE              = '{{%mediamanager_show}}';
    const MEDIAMANAGER_OLD_SETTINGS_TABLE_NAME = 'mediamanager_old_settings';
    const MEDIAMANAGER_OLD_SETTINGS_TABLE      = '{{%mediamanager_old_settings}}';
}
