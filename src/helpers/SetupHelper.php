<?php
/**
 * Media Manager
 *
 * @package       PaperTiger:MediaManager
 * @author        Paper Tiger
 * @copyright     Copyright (c) 2020 Paper Tiger
 * @link          https://www.papertiger.com/
 */

namespace papertiger\mediamanager\helpers;

use Craft;
use Exception;
use craft\elements\User;

use papertiger\mediamanager\base\ConstantAbstract;

class SetupHelper
{
    // Public Static Methods
    // =========================================================================
    
    public static function registerRequiredComponents()
    {
        self::registerApiUser();
    }

    public static function unregisterRequiredComponents()
    {
        // Disabled to see if it's required, considering it will also remove all entries
        // Should it transfers the content to another admin?
        // self::unregisterApiUser();
    }


    // Private Methods
    // =========================================================================

    private static function checkApiUserExists()
    {
        if( $user = Craft::$app->getUsers()->getUserByUsernameOrEmail( ConstantAbstract::API_USER_USERNAME ) ) {
            return $user;
        }

        return false;
    }

    private static function registerApiUser()
    {
        if( self::checkApiUserExists() ) {
            return;
        }

        $user = new User();
        $user->username    = ConstantAbstract::API_USER_USERNAME;
        $user->firstName   = ConstantAbstract::API_USER_FIRSTNAME;
        $user->lastName    = ConstantAbstract::API_USER_LASTNAME;
        $user->email       = ConstantAbstract::API_USER_EMAIL;
        $user->newPassword = ConstantAbstract::API_USER_PASSWORD;
        $user->admin       = true;

        if( !Craft::$app->getElements()->saveElement( $user, false ) ) {
            throw new Exception( 'Failed to create user for API' );
        }

        Craft::$app->getUsers()->activateUser( $user );
    }

    private static function unregisterApiUser()
    {
        if( $user = self::checkApiUserExists() ) {
            Craft::$app->getElements()->deleteElement( $user );
        }
    }

}