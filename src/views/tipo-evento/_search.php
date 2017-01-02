<?php

use elitedivision\amos\core\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;

/**
* @var yii\web\View $this
* @var elitedivision\amos\eventi\models\search\TipoEventoSearch $model
* @var yii\widgets\ActiveForm $form
*/


?>
<div class="tipo-evento-search element-to-toggle" data-toggle-element="form-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
    'class' => 'default-form'
    ]
    ]);
    ?>

    <!-- denominazione -->
<div class="col-md-4"> <?= 
$form->field($model, 'denominazione')->textInput(['placeholder' => 'ricerca per denominazione' ]) ?>

 </div> 

<!-- colore -->
<div class="col-md-4"> <?= 
$form->field($model, 'colore')->textInput(['placeholder' => 'ricerca per colore' ]) ?>

 </div> 

    <div class="col-xs-12">
        <div class="pull-right">
            <?= Html::resetButton('Reset', ['class' => 'btn btn-secondary']) ?>
            <?= Html::submitButton('Search', ['class' => 'btn btn-navigation-primary']) ?>
        </div>
    </div>

    <div class="clearfix"></div>
    <!--a><p class="text-center">Ricerca avanzata<br>
            < ?=AmosIcons::show('caret-down-circle');?>
        </p></a-->
    <?php ActiveForm::end(); ?>
</div>
