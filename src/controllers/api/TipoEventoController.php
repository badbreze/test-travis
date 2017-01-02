<?php

namespace elitedivision\amos\eventi\controllers\api;

/**
* This is the class for REST controller "TipoEventoController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class TipoEventoController extends \yii\rest\ActiveController
{
public $modelClass = 'elitedivision\amos\eventi\models\TipoEvento';
}
