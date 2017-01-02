<?php 
/** @var \elitedivision\amos\dashboard\models\AmosUserDashboards $currentDashboard * */
/** @var \yii\web\View $this * */

use elitedivision\amos\core\icons\AmosIcons;
use elitedivision\amos\core\views\assets\AmosCoreAsset;
use elitedivision\amos\dashboard\AmosDashboard;
use elitedivision\amos\dashboard\assets\ModuleDashboardAsset;
use elitedivision\amos\core\helpers\Html;
use yii\web\JsExpression;

AmosCoreAsset::register($this);

ModuleDashboardAsset::register($this);

AmosIcons::map($this);

$this->title = $this->context->module->name;
$this->params['breadcrumbs'][] = ['label' => 'Eventi', 'url' => ['/eventi']];

?>

<input type="hidden" id="saveDashboardUrl"
       value="<?= Yii::$app->urlManager->createUrl(['dashboard/manager/save-dashboard-order']); ?>"/>
<input type="hidden" id="currentDashboardId"
       value="<?= $currentDashboard['id'] ?>"/>

<div id="dashboard-edit-toolbar" class="pull-right hidden">
    <?=    Html::a(Yii::t('app', 'Salva'), 'javascript:void(0);', [
    'id' => 'dashboard-save-button',
    'class' => 'btn btn-success bk-saveOrder',
    ]);
    ?>

    <?=    Html::a(Yii::t('app', 'Annulla'), \yii\helpers\Url::current(), [
    'class' => 'btn btn-danger bk-saveDelete',
    ]);
    ?>

</div>

<?php/*
* @$widgetsIcon elenco dei plugin ad icona
* @$widgetsGrafich elenco dei plugin ad grafici
* @$dashboardsNumber numero delle dashboard da mostrare
*/

?>

<nav data-dashboard-index="<?= $currentDashboard->slide ?>">

    <div class="actions-dashboard-container">
        <ul id="widgets-icon" class="bk-sortableIcon bk-menuPlugin row"
            role="menu">
                <?php            //indice di questa dashboard
            $thisDashboardIndex = 'dashboard_' . $currentDashboard->slide;

            //recupera i widgets di questa dashboard
            $thisDashboardWidgets = $currentDashboard->amosWidgetsSelectedIcon;

            if ($thisDashboardWidgets && count($thisDashboardWidgets) > 0) {

            foreach ($thisDashboardWidgets as $widget) {
            $widgetObj = Yii::createObject($widget['classname']);
            echo $widgetObj::widget();
            }
            } else {
            AmosDashboard::t('app', 'Non ci sono widgets selezionati per questa dashboard');
            }
            ?>
        </ul>
    </div>

</nav>
<section id="bk-pluginGrafici">
    <div class="row graphics-dashboard-container">
        <ul id="widgets-graphic" class="bk-sortableGraphics row">
            <?php            //recupera i widgets di questa dashboard
            $thisDashboardWidgets = $currentDashboard->amosWidgetsSelectedGraphic;

            if ($thisDashboardWidgets && count($thisDashboardWidgets) > 0) {
            foreach ($thisDashboardWidgets as $widget) {
            $widgetObj = Yii::createObject($widget['classname']);
            ?>
            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-code="<?=$widgetObj::classname()?>" data-module-name="<?=$widgetObj->moduleName?>"><?= $widgetObj::widget(); ?></li>
                <?php
            }
            }
            ?>
        </ul>
    </div>
</section>







