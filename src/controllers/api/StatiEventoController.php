<?php

namespace elitedivision\amos\eventi\controllers\api;

/**
* This is the class for REST controller "StatiEventoController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class StatiEventoController extends \yii\rest\ActiveController
{
public $modelClass = 'elitedivision\amos\eventi\models\StatiEvento';
}
