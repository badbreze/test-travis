<?php

use elitedivision\amos\core\helpers\Html;
use elitedivision\amos\core\views\DataProviderView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var elitedivision\amos\eventi\models\search\EventiSearch $model
 */

$this->title = 'Eventi';
$this->params['breadcrumbs'][] = ['label' => 'Eventi', 'url' => ['/eventi']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventi-index">
    <?php echo $this->render('_search', ['model' => $model]); ?>

    <p>
        <?php /* echo         Html::a('Nuovo Eventi'        , ['create'], ['class' => 'btn btn-amministration-primary'])*/ ?>
    </p>

    <?php echo DataProviderView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $model,
        'currentView' => $currentView,
        'gridView' => [
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'titolo',
                'descrizione:striptags',

                'tipoEvento' => [
                    'attribute' => 'tipoEvento',
                    'format' => 'html',
                    'label' => 'Tipo',
                    'value' => function ($model) {
                        return strip_tags($model->getAttrTipoEventoMm(','));
                    }
                ],
                'data_inizio:date',
                'data_fine:date',
                'ora_inizio',
                'ora_fine',

                'statiEvento' => [
                    'attribute' => 'statiEvento',
                    'format' => 'html',
                    'label' => 'Stato',
                    'value' => function ($model) {
                        return strip_tags($model->getAttrStatiEventoMm(','));
                    }
                ],

                'user_profile' => [
                    'attribute' => 'user_profile',
                    'format' => 'html',
                    'label' => 'Invitati',
                    'value' => function ($model) {
                        return strip_tags($model->getAttrUtenzeMm(','));
                    }
                ],
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
        ],*/
        'calendarView' => [
            'itemView' => '_calendar',
            'clientOptions' => [
                //'lang'=> 'de'
            ],
            'eventConfig' => [
                'title' => 'titoloEvento',
                'start' => 'data_inizio',
                'end' => 'data_fine',
                'color' => 'coloreEvento',
                'url' => 'urlEvento'
            ],
            'array' => false,//se ci sono più eventi legati al singolo record
            //'getEventi' => 'getEvents'//funzione da abilitare e implementare nel model per creare un array di eventi legati al record
        ]
    ]); ?>

</div>
