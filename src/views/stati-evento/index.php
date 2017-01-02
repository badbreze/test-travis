<?php

use elitedivision\amos\core\helpers\Html;
use elitedivision\amos\core\views\DataProviderView;
use yii\widgets\Pjax;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
 * @var elitedivision\amos\eventi\models\search\StatiEventoSearch $model
*/

$this->title = 'Stati Evento';
$this->params['breadcrumbs'][] = ['label' => 'Eventi', 'url' => ['/eventi']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stati-evento-index">
                <?php  echo $this->render('_search', ['model' => $model]); ?>
    
    <p>
        <?php /* echo         Html::a('Nuovo Stati Evento'        , ['create'], ['class' => 'btn btn-amministration-primary'])*/  ?>
    </p>

            <?php echo DataProviderView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $model,
   'currentView' => $currentView,
   'gridView' => [
   'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

                    'nome',
        [
        'class' => 'elitedivision\amos\core\views\grid\ActionColumn',
        ],
        ],
        ],
        /*'listView' => [
        'itemView' => '_item'
        'masonry' => FALSE,

        // Se masonry settato a TRUE decommentare e settare i parametri seguenti 
        // nel CSS settare i seguenti parametri necessari al funzionamento tipo
        // .grid-sizer, .grid-item {width: 50&;}
        // Per i dettagli recarsi sul sito http://masonry.desandro.com                                     

        //'masonrySelector' => '.grid',
        //'masonryOptions' => [
        //    'itemSelector' => '.grid-item',
        //    'columnWidth' => '.grid-sizer',
        //    'percentPosition' => 'true',
        //    'gutter' => '20'
        //]
        ],
        'iconView' => [
        'itemView' => '_icon'
        ],
        'mapView' => [
        'itemView' => '_map',          
        'markerConfig' => [
        'lat' => 'domicilio_lat',
        'lng' => 'domicilio_lon',
        'icon' => 'iconaMarker',
        ]
        ],
        'calendarView' => [
        'itemView' => '_calendar',
        'clientOptions' => [
        //'lang'=> 'de'
        ],
        'eventConfig' => [
        //'title' => 'titoloEvento',
        //'start' => 'data_inizio',
        //'end' => 'data_fine',
        //'color' => 'coloreEvento',
        //'url' => 'urlEvento'
        ],
        'array' => false,//se ci sono più eventi legati al singolo record
        //'getEventi' => 'getEvents'//funzione da abilitare e implementare nel model per creare un array di eventi legati al record
        ]*/
        ]); ?>
    
</div>
