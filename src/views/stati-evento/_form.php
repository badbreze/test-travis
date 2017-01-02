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
* @var elitedivision\amos\eventi\models\StatiEvento $model
* @var yii\widgets\ActiveForm $form
*/


?>

<div class="stati-evento-form col-xs-12 nop">

    <?php     $form = ActiveForm::begin([
    'options' => [
    'id' => 'stati-evento_' . ((isset($fid))? $fid : 0),
    'data-fid' => (isset($fid))? $fid : 0,
    'data-field' => ((isset($dataField))? $dataField : ''),
    'data-entity' => ((isset($dataEntity))? $dataEntity : ''),
    'class' => ((isset($class))? $class : '')
    ]
    ]);
     ?>
    <?php // $form->errorSummary($model, ['class' => 'alert-danger alert fade in']); ?>
            <?php  $this->beginBlock('generale'); ?><div class="row"><div class="col-lg-6 col-sm-6"><!-- nome string -->
			<?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?></div></div><div class="clearfix"></div><?php $this->endBlock(); ?><?php $itemsTab[] = [
        'label' => Yii::t('cruds', 'Generale'),
        'content' => $this->blocks['generale'],
        ];
        ?>

    <?=  Tabs::widget(
    [
    'encodeLabels' => false,
    'items' => $itemsTab
    ]
    );
     ?>
    <?=  CloseSaveButtonWidget::widget(['model' => $model]);  ?>
    <?php  ActiveForm::end();  ?>
</div>
