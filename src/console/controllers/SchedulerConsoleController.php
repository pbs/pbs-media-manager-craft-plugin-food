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
use GO\Scheduler;

use papertiger\mediamanager\helpers\SettingsHelper;

class SchedulerConsoleController extends Controller
{
    // Constants
    // =========================================================================
    const CRAFT_CONSOLE        = '/craft';
    const SYNCHRONIZE_JOB_PATH = 'mediamanager/synchronize-console/run';


    // Protected
    // =========================================================================
    protected $allowAnonymous = [ 'run' ];


    // Public Methods
    // =========================================================================
    public function actionRun()
    {
        $cronTimeFormat  = self::generateCronFormat();
        $scheduler       = new Scheduler();
        $synchronizePath = Craft::getAlias( '@root' ) . self::CRAFT_CONSOLE . ' ' . self::SYNCHRONIZE_JOB_PATH;

        if( $cronTimeFormat ) {

            $scheduler->clearJobs();
            $scheduler->php( $synchronizePath )->at( $cronTimeFormat );
            $scheduler->run();
        }

        return ExitCode::OK;
    }


    // Private Static Methods
    // =========================================================================

    private static function generateCronFormat()
    {
        $syncSchedule       = SettingsHelper::get( 'syncSchedule' );
        $syncCustomSchedule = SettingsHelper::get( 'syncCustomSchedule' );

        if( !$syncSchedule && !$syncCustomSchedule ) {
            return false;
        }

        if( $syncCustomSchedule ) {
            return $syncCustomSchedule;
        }

        switch( $syncSchedule ) {
            case 'daily':
                return '@daily';
            break;
            case 'weekly':
                return '@weekly';
            break;
            case 'monthly':
                return '@monthly';
            break;
            case 'custom':
                return ( !$syncCustomSchedule ) ? '@daily' : $syncCustomSchedule;
            break;
        }

        return '@daily';
    }
}
