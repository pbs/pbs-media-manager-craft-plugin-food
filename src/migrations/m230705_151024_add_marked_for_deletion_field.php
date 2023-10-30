<?php

namespace papertiger\mediamanager\migrations;

use Craft;
use craft\db\Migration;
use craft\errors\EntryTypeNotFoundException;
use craft\helpers\ArrayHelper;
use papertiger\mediamanager\helpers\SettingsHelper;

/**
 * m230705_151019_add_marked_for_deletion_field migration.
 */
class m230705_151024_add_marked_for_deletion_field extends Migration
{
	/**
	 * @inheritdoc
	 * @throws \Throwable
	 */
    public function safeUp()
    {
	    $schemaVersion = Craft::$app->projectConfig->get(
		    'plugins.mediamanager.schemaVersion',
		    true
	    );
	
	    if (version_compare($schemaVersion, '1.0.1', '<')) {
		    $fieldService = Craft::$app->getFields();
		    $field = $fieldService->getFieldByHandle('markedForDeletion');
		
		    if(!$field) {
			    // we know this field will exist
			    $groupToUse = $fieldService->getFieldByHandle('lastSynced')->groupId;
			
			    $field = Craft::$app->getFields()->createField([
				    'type' => 'craft\fields\Lightswitch',
				    'name' => 'Marked for Deletion',
				    'handle' => 'markedForDeletion',
				    'groupId' => $groupToUse,
				    'searchable' => true,
			    ]);
			
			    Craft::$app->getFields()->saveField($field);
		    }
		
		    $mediaSection = Craft::$app->getSections()->getSectionByHandle(SettingsHelper::get( 'mediaSection' ));
		
		    if($mediaSection) {
			    $entryType = $mediaSection->getEntryTypes()[0];
			    $fieldLayout = $entryType->getFieldLayout();
					
			    $tabs = $fieldLayout->getTabs();
			
			    foreach($tabs as $tab) {
				    if ($tab->name === 'API'){
					    $existingFields = $tab->fields();
					    $tab->setElements(ArrayHelper::merge([$field], $existingFields));
				    }
			    }
			
			    $entryType->setFieldLayout($fieldLayout);
			    try {
				    Craft::$app->getSections()->saveEntryType($entryType);
			    } catch (EntryTypeNotFoundException $e) {
			    } catch (\Throwable $e) {
						Craft::error($e->getMessage(), __METHOD__);
			    }
		    }
	    }
			
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m230705_151021_add_marked_for_deletion_field cannot be reverted.\n";
        return false;
    }
}
