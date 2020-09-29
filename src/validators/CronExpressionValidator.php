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
use Cron\CronExpression;

class CronExpressionValidator extends Validator
{
    // Public Methods
    // =========================================================================
    
    public function validateAttribute( $model, $attribute )
    {
        $expression = $model->$attribute;

        if( !empty( $expression ) && !CronExpression::isValidExpression( $expression ) ) {
            $this->addError( $model, $attribute, 'Invalid cron format, please read CRON documentation for valid format.' );
        }

        return;
    }
}
