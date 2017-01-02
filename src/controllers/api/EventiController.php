<?php

namespace elitedivision\amos\eventi\controllers\api;

/**
* This is the class for REST controller "EventiController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class EventiController extends \yii\rest\ActiveController
{
public $modelClass = 'elitedivision\amos\eventi\models\Eventi';
}
