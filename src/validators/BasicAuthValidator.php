<?php
/**
 * Media Manager
 *
 * @package       PaperTiger:MediaManager
 * @author        Paper Tiger
 * @copyright     Copyright (c) 2020 Paper Tiger
 * @link          https://www.papertiger.com/
 */

namespace papertiger\mediamanager\validators;

use Craft;
use yii\validators\Validator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class BasicAuthValidator extends Validator
{
    // Public Methods
    // =========================================================================
    
    public function validateAttribute( $model, $attribute )
    {
        $apiBaseUrl      = $model->apiBaseUrl; 
        $apiAuthUsername = $model->apiAuthUsername;
        $apiAuthPassword = $model->apiAuthPassword;

        try {

            $client   = new Client();
            $response = $client->request( 'HEAD', $apiBaseUrl, [
                'auth' => [ $apiAuthUsername, $apiAuthPassword ]
            ]);

        } catch( ClientException $e ) {
            $this->addError( $model, $attribute, 'Failed to authenticate PBS API. Make sure base url, username and password are correct.' );
        }

        return;
    }
}
