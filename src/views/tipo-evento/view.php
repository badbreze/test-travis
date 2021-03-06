<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\datecontrol\DateControl;
use yii\helpers\Url;

/**
* @var yii\web\View $this
* @var elitedivision\amos\eventi\models\TipoEvento $model
*/

$this->title = strip_tags($model);
$this->params['breadcrumbs'][] = ['label' => 'Eventi', 'url' => ['/eventi']];
$this->params['breadcrumbs'][] = ['label' => 'Tipo Evento', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-evento-view">

    <?= DetailView::widget([
    'model' => $model,    
    'attributes' => [
                'denominazione',
            'colore',
    ],    
    ]) ?>

</div>

<div id="form-actions" class="bk-btnFormContainer pull-right">
    <?= Html::a(Yii::t('app', 'Chiudi'), Url::previous(), ['class' => 'btn btn-secondary']); ?></div>
