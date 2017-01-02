<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\datecontrol\DateControl;
use yii\helpers\Url;

/**
* @var yii\web\View $this
* @var elitedivision\amos\eventi\models\Eventi $model
*/

$this->title = strip_tags($model);
$this->params['breadcrumbs'][] = ['label' => 'Eventi', 'url' => ['/eventi']];
$this->params['breadcrumbs'][] = ['label' => 'Eventi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventi-view">

    <?= DetailView::widget([
    'model' => $model,    
    'attributes' => [
                'titolo',
            'descrizione:html',

                'tipoEvento' => [
                'attribute' => 'tipoEvento',
                'format' => 'html',
                'label' => 'Tipo',
                'value' => $model->getAttrTipoEventoMm(),
                ],
                            [
                'attribute'=>'data_inizio',
                'format'=>['date',(isset(Yii::$app->modules['datecontrol']['displaySettings']['date'])) ? Yii::$app->modules['datecontrol']['displaySettings']['date'] : 'd-m-Y'],                
            ],
            [
                'attribute'=>'data_fine',
                'format'=>['date',(isset(Yii::$app->modules['datecontrol']['displaySettings']['date'])) ? Yii::$app->modules['datecontrol']['displaySettings']['date'] : 'd-m-Y'],                
            ],
            'ora_inizio',
            'ora_fine',

                'statiEvento' => [
                'attribute' => 'statiEvento',
                'format' => 'html',
                'label' => 'Stato',
                'value' => $model->getAttrStatiEventoMm(),
                ],
                
                'user_profile' => [
                'attribute' => 'user_profile',
                'format' => 'html',
                'label' => 'Invitati',
                'value' => $model->getAttrUtenzeMm(),
                ],
                    ],    
    ]) ?>

</div>

<div id="form-actions" class="bk-btnFormContainer pull-right">
    <?= Html::a(Yii::t('app', 'Chiudi'), Url::previous(), ['class' => 'btn btn-secondary']); ?></div>
