<?php

use elitedivision\amos\core\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;

/**
* @var yii\web\View $this
* @var elitedivision\amos\eventi\models\search\EventiSearch $model
* @var yii\widgets\ActiveForm $form
*/

    $this->registerJs("
            $('#eventisearch-data_inizio').change(function(){
        if($('#eventisearch-data_inizio').val() == ''){
        $('#eventisearch-data_inizio-disp-kvdate .input-group-addon.kv-date-remove').remove();
        } else {
        if($('#eventisearch-data_inizio-disp-kvdate .input-group-addon.kv-date-remove').length == 0){
        $('#eventisearch-data_inizio-disp-kvdate').append('<span class=\"input-group-addon kv-date-remove\" title=\"Pulisci campo\"><i class=\"glyphicon glyphicon-remove\"></i></span>');
        initDPRemove('eventisearch-data_inizio-disp');
        }
        }
        });
            $('#eventisearch-data_fine').change(function(){
        if($('#eventisearch-data_fine').val() == ''){
        $('#eventisearch-data_fine-disp-kvdate .input-group-addon.kv-date-remove').remove();
        } else {
        if($('#eventisearch-data_fine-disp-kvdate .input-group-addon.kv-date-remove').length == 0){
        $('#eventisearch-data_fine-disp-kvdate').append('<span class=\"input-group-addon kv-date-remove\" title=\"Pulisci campo\"><i class=\"glyphicon glyphicon-remove\"></i></span>');
        initDPRemove('eventisearch-data_fine-disp');
        }
        }
        });
        ", yii\web\View::POS_READY);

?>
<div class="eventi-search element-to-toggle" data-toggle-element="form-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
    'class' => 'default-form'
    ]
    ]);
    ?>

    <!-- titolo -->
<div class="col-md-4"> <?= 
$form->field($model, 'titolo')->textInput(['placeholder' => 'ricerca per titolo' ]) ?>

 </div> 

<!-- descrizione -->
<div class="col-md-4"> <?= 
$form->field($model, 'descrizione')->textInput(['placeholder' => 'ricerca per descrizione' ]) ?>

 </div> 


                <div class="col-md-4">
                    <?= 
                    $form->field($model, 'attrTipoEventoMm')->textInput(['placeholder' => 'ricerca per tipo'])->label('Tipo');
                     ?> 
                </div>
                <!-- data_inizio --><?-- DATE -->
<div class="col-md-4">
			<?= $form->field($model, 'data_inizio')->widget(DateControl::classname(), [
                           				'options' => [ 'layout' => '{input} {picker} ' . (($model->data_inizio == '')? '' : '{remove}')]
                        			]); ?>
</div>
<!-- data_fine --><?-- DATE -->
<div class="col-md-4">
			<?= $form->field($model, 'data_fine')->widget(DateControl::classname(), [
                           				'options' => [ 'layout' => '{input} {picker} ' . (($model->data_fine == '')? '' : '{remove}')]
                        			]); ?>
</div>
<!-- ora_inizio -->
<div class="col-md-4"> <?= 
$form->field($model, 'ora_inizio')->textInput(['placeholder' => 'ricerca per ora inizio' ]) ?>

 </div> 

<!-- ora_fine -->
<div class="col-md-4"> <?= 
$form->field($model, 'ora_fine')->textInput(['placeholder' => 'ricerca per ora fine' ]) ?>

 </div> 


                <div class="col-md-4">
                    <?= 
                    $form->field($model, 'attrStatiEventoMm')->textInput(['placeholder' => 'ricerca per stato'])->label('Stato');
                     ?> 
                </div>
                
                <div class="col-md-4">
                    <?= 
                    $form->field($model, 'attrUtenzeMm')->textInput(['placeholder' => 'ricerca per invitati'])->label('Invitati');
                     ?> 
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
