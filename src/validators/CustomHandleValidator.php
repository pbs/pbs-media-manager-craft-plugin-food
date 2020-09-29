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

class CustomHandleValidator extends Validator
{
    // Public Variables
    // =========================================================================
    
    public static $handlePattern     = '[a-zA-Z][a-zA-Z0-9_]*';
    public static $baseReservedWords = [
        'attribute',
        'attributeLabels',
        'attributeNames',
        'attributes',
        'classHandle',
        'content',
        'dateCreated',
        'dateUpdated',
        'errors',
        'false',
        'fields',
        'handle',
        'id',
        'n',
        'name',
        'no',
        'rawContent',
        'rules',
        'searchKeywords',
        'section',
        'this',
        'true',
        'type',
        'uid',
        'value',
        'y',
        'yes',
    ];


    // Public Static Methods
    // =========================================================================
    
    public $reservedWords = [];


    // Public Methods
    // =========================================================================
    
    public function validateAttribute( $model, $attribute )
    {
        $handle = $model->$attribute;

        if( $handle ) {
            
            $reservedWords = array_merge( $this->reservedWords, static::$baseReservedWords );
            $reservedWords = array_map( 'strtolower', $reservedWords );
            $lcHandle      = strtolower( $handle );

            if( in_array( $lcHandle, $reservedWords, true ) ) {

                $message = Craft::t( 'app', '“{handle}” is a reserved word.', [ 'handle' => $handle ] );
                $this->addError( $model, $attribute, $message );

            } else {

                if( !preg_match( '/^' . static::$handlePattern . '$/', $handle ) ) {

                    $altMessage = Craft::t( 'app', '“{handle}” isn’t a valid handle.', [ 'handle' => $handle ] );
                    $message    = $this->message ?? $altMessage;

                    $this->addError( $model, $attribute, $message );

                }
            }
        }
    }

    public function validateSingle( $model, $attribute, $handle )
    {
        if( $handle ) {

            $reservedWords = array_merge( $this->reservedWords, static::$baseReservedWords );
            $reservedWords = array_map( 'strtolower', $reservedWords );
            $lcHandle      = strtolower( $handle );

            if( in_array( $lcHandle, $reservedWords, true ) ) {

                $message = Craft::t( 'app', '“{handle}” is a reserved word.', [ 'handle' => $handle ] );
                $this->addError( $model, $attribute, $message );

            } else {

                if( !preg_match( '/^' . static::$handlePattern . '$/', $handle ) ) {

                    $altMessage = Craft::t( 'app', '“{handle}” isn’t a valid handle.', [ 'handle' => $handle ] );
                    $message    = $this->message ?? $altMessage;

                    $this->addError( $model, $attribute, $message );

                }
            }
        }
    }
}
