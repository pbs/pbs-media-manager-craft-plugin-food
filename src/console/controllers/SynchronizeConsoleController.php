<?php
/**
 * Media Manager
 *
 * @package       PaperTiger:MediaManager
 * @author        Paper Tiger
 * @copyright     Copyright (c) 2020 Paper Tiger
 * @link          https://www.papertiger.com/
 */

namespace papertiger\mediamanager\console\controllers;

use Craft;
use yii\console\Controller;
use yii\helpers\Console;
use yii\console\ExitCode;

use papertiger\mediamanager\MediaManager;

class SynchronizeConsoleController extends Controller
{
    // Protected
    // =========================================================================

    protected $allowAnonymous = [ 'run' ];


    // Public Methods
    // =========================================================================

    public function actionRun()
    {
        $shows          = MediaManager::getInstance()->show->getShow();
        $validatedShows = [];

        foreach( $shows as $show ) {
            
            if( $show->apiKey && $show->name ) {
                
                $show[ 'siteId' ] = json_decode( $show[ 'siteId' ] );
                array_push( $validatedShows, $show );
            }
        }

        if( count( $validatedShows ) ) {
            MediaManager::getInstance()->api->synchronizeAll( $validatedShows, false );
        }

        return ExitCode::OK;
    }
}
