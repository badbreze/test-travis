<?php

use elitedivision\amos\core\helpers\Html;
use elitedivision\amos\core\forms\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use elitedivision\amos\core\forms\Tabs;
use elitedivision\amos\core\forms\CloseSaveButtonWidget;
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use elitedivision\amos\core\icons\AmosIcons;
use yii\bootstrap\Modal;
use yii\redactor\widgets\Redactor;
use yii\helpers\Inflector;

/**
 * @var yii\web\View $this
 * @var elitedivision\amos\eventi\models\Eventi $model
 * @var yii\widgets\ActiveForm $form
 */

$this->registerJs("
            $('#eventi-data_inizio" . ((isset($fid)) ? $fid : 0) . "').change(function(){
        if($('#eventi-data_inizio" . ((isset($fid)) ? $fid : 0) . "').val() == ''){
        $('#eventi-data_inizio" . ((isset($fid)) ? $fid : 0) . "-disp-kvdate .input-group-addon.kv-date-remove').remove();
        } else {
        if($('#eventi-data_inizio" . ((isset($fid)) ? $fid : 0) . "-disp-kvdate .input-group-addon.kv-date-remove').length == 0){
        $('#eventi-data_inizio" . ((isset($fid)) ? $fid : 0) . "-disp-kvdate').append('<span class=\"input-group-addon kv-date-remove\" title=\"Pulisci campo\"><i class=\"glyphicon glyphicon-remove\"></i></span>');
        initDPRemove('eventi-data_inizio" . ((isset($fid)) ? $fid : 0) . "-disp');
        }
        }
        });
            $('#eventi-data_fine" . ((isset($fid)) ? $fid : 0) . "').change(function(){
        if($('#eventi-data_fine" . ((isset($fid)) ? $fid : 0) . "').val() == ''){
        $('#eventi-data_fine" . ((isset($fid)) ? $fid : 0) . "-disp-kvdate .input-group-addon.kv-date-remove').remove();
        } else {
        if($('#eventi-data_fine" . ((isset($fid)) ? $fid : 0) . "-disp-kvdate .input-group-addon.kv-date-remove').length == 0){
        $('#eventi-data_fine" . ((isset($fid)) ? $fid : 0) . "-disp-kvdate').append('<span class=\"input-group-addon kv-date-remove\" title=\"Pulisci campo\"><i class=\"glyphicon glyphicon-remove\"></i></span>');
        initDPRemove('eventi-data_fine" . ((isset($fid)) ? $fid : 0) . "-disp');
        }
        }
        });
        ", yii\web\View::POS_READY);

?>

<div class="eventi-form col-xs-12 nop">

    <?php $form = ActiveForm::begin([
        'options' => [
            'id' => 'eventi_' . ((isset($fid)) ? $fid : 0),
            'data-fid' => (isset($fid)) ? $fid : 0,
            'data-field' => ((isset($dataField)) ? $dataField : ''),
            'data-entity' => ((isset($dataEntity)) ? $dataEntity : ''),
            'class' => ((isset($class)) ? $class : '')
        ]
    ]);
    ?>
    <?php // $form->errorSummary($model, ['class' => 'alert-danger alert fade in']); ?>
    <?php $this->beginBlock('generale'); ?>
    <div class="row">
        <div class="col-lg-6 col-sm-6"><!-- titolo string -->
            <?= $form->field($model, 'titolo')->textInput(['maxlength' => true]) ?></div>
        <div class="col-lg-12 col-sm-12"><!-- descrizione text -->
            <?= $form->field($model, 'descrizione')->widget(yii\redactor\widgets\Redactor::className(), [
                'options' => [
                    'id' => 'descrizione' . $fid,
                ],
                'clientOptions' => [
                    'lang' => 'it',
                    'plugins' => ['clips', 'fontcolor', 'imagemanager'],
                    'buttons' => ['format', 'bold', 'italic', 'deleted', 'lists', 'image', 'file', 'link', 'horizontalrule'],
                ],
            ]);
            ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6"><?php
            if (\Yii::$app->getUser()->can('TIPOEVENTO_CREATE')) {
                $append = ' canInsert';
            } else {
                $append = NULL;
            }
            ?><?=
            $form->field($model, 'attrTipoEventoMm')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\elitedivision\amos\eventi\models\TipoEvento::find()->asArray()->all(),
                    'id', 'denominazione'),
                'language' => 'it',
                'options' => ['multiple' => false,
                    'id' => 'TipoEvento' . $fid,
                    'placeholder' => 'Seleziona ...',
                    'class' => 'dynamicCreation' . $append,
                    'data-model' => 'tipo_evento',
                    'data-field' => 'denominazione',
                    'data-module' => 'eventi',
                    'data-entity' => 'tipo-evento',
                    'data-toggle' => 'tooltip'
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'pluginEvents' => [
                    "select2:open" => "dynamicInsertOpening"
                ]
            ])->label('Tipo')
            ?> </div>
        <div class="col-lg-6 col-sm-6"><!-- data_inizio date -->
            <?= $form->field($model, 'data_inizio')->widget(DateControl::classname(), [
                'options' => [
                    'id' => lcfirst(Inflector::id2camel(\yii\helpers\StringHelper::basename($model->className()), '_')) . '-data_inizio' . ((isset($fid)) ? $fid : 0),
                    'layout' => '{input} {picker} ' . (($model->data_inizio == '') ? '' : '{remove}')]
            ]); ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6"><!-- data_fine date -->
            <?= $form->field($model, 'data_fine')->widget(DateControl::classname(), [
                'options' => [
                    'id' => lcfirst(Inflector::id2camel(\yii\helpers\StringHelper::basename($model->className()), '_')) . '-data_fine' . ((isset($fid)) ? $fid : 0),
                    'layout' => '{input} {picker} ' . (($model->data_fine == '') ? '' : '{remove}')]
            ]); ?></div>
        <div class="col-lg-6 col-sm-6"><!-- ora_inizio decimal -->
            <?= $form->field($model, 'ora_inizio')->textInput(['maxlength' => true]) ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6"><!-- ora_fine decimal -->
            <?= $form->field($model, 'ora_fine')->textInput(['maxlength' => true]) ?></div>
        <div class="col-lg-6 col-sm-6"><?php
            if (\Yii::$app->getUser()->can('STATIEVENTO_CREATE')) {
                $append = ' canInsert';
            } else {
                $append = NULL;
            }
            ?><?=
            $form->field($model, 'attrStatiEventoMm')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\elitedivision\amos\eventi\models\StatiEvento::find()->asArray()->all(),
                    'id', 'nome'),
                'language' => 'it',
                'options' => ['multiple' => false,
                    'id' => 'StatiEvento' . $fid,
                    'placeholder' => 'Seleziona ...',
                    'class' => 'dynamicCreation' . $append,
                    'data-model' => 'stati_evento',
                    'data-field' => 'nome',
                    'data-module' => 'eventi',
                    'data-entity' => 'stati-evento',
                    'data-toggle' => 'tooltip'
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'pluginEvents' => [
                    "select2:open" => "dynamicInsertOpening"
                ]
            ])->label('Stato')
            ?> </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6"><?php
            if (\Yii::$app->getUser()->can('UTENZE_CREATE')) {
                $append = ' canInsert';
            } else {
                $append = NULL;
            }
            ?><?=
            $form->field($model, 'attrUtenzeMm')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\elitedivision\amos\admin\models\UserProfile::find()->asArray()->all(),
                    'id', 'nome'),
                'language' => 'it',
                'options' => ['multiple' => true,
                    'id' => 'UserProfile' . $fid,
                    'placeholder' => 'Seleziona ...',
                    'class' => 'dynamicCreation' . $append,
                    'data-model' => 'user_profile',
                    'data-field' => 'nome',
                    'data-module' => 'eventi',
                    'data-entity' => 'user_profile',
                    'data-toggle' => 'tooltip'
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'pluginEvents' => [
                    "select2:open" => "dynamicInsertOpening"
                ]
            ])->label('Invitati')
            ?> </div>
    </div>
    <div class="clearfix"></div><?php $this->endBlock(); ?><?php $itemsTab[] = [
        'label' => Yii::t('cruds', 'Generale'),
        'content' => $this->blocks['generale'],
    ];
    ?>

    <?= Tabs::widget(
        [
            'encodeLabels' => false,
            'items' => $itemsTab
        ]
    );
    ?>
    <?= CloseSaveButtonWidget::widget(['model' => $model]); ?>
    <?php ActiveForm::end(); ?>
</div>
