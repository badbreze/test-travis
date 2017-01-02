<?php

use elitedivision\amos\core\helpers\Html;

/**
* @var yii\web\View $this
* @var elitedivision\amos\eventi\models\StatiEvento $model
*/

$this->title = 'Crea';
$this->params['breadcrumbs'][] = ['label' => 'Eventi', 'url' => ['/eventi']];
$this->params['breadcrumbs'][] = ['label' => 'Stati Evento', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stati-evento-create">
    <?= $this->render('_form', [
    'model' => $model,
    'fid' => NULL,
    'dataField' => NULL,
    'dataEntity' => NULL,
    ]) ?>

</div>
