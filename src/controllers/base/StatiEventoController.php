<?php

namespace elitedivision\amos\eventi\controllers\base;

use Yii;
use elitedivision\amos\eventi\models\StatiEvento;
    use elitedivision\amos\eventi\models\search\StatiEventoSearch;
use elitedivision\amos\core\controllers\CrudController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use elitedivision\amos\core\icons\AmosIcons;
use elitedivision\amos\core\helpers\Html;
use elitedivision\amos\core\helpers\T;
use yii\helpers\Url;

/**
* StatiEventoController implements the CRUD actions for StatiEvento model.
*/
class StatiEventoController extends CrudController
{
public function init() {
        $this->setModelObj(new StatiEvento());
        $this->setModelSearch(new StatiEventoSearch());

        $this->setAvailableViews([
            'grid' => [
                'name' => 'grid',
                'label' => T::tApp('{iconaTabella}'.Html::tag('p','Tabella'), [
                    'iconaTabella' => AmosIcons::show('view-list-alt')
                ]),                
                'url' => '?currentView=grid'
            ],
            /*'list' => [
                'name' => 'list',
                'label' => T::tApp('{iconaLista}'.Html::tag('p','Lista'), [
                    'iconaLista' => AmosIcons::show('view-list')
                ]),           
                'url' => '?currentView=list'
            ],
            'icon' => [
                'name' => 'icon',
                'label' => T::tApp('{iconaElenco}'.Html::tag('p','Icone'), [
                    'iconaElenco' => AmosIcons::show('grid')
                ]),           
                'url' => '?currentView=icon'
            ],
            'map' => [
                'name' => 'map',
                'label' => T::tApp('{iconaMappa}'.Html::tag('p','Mappa'), [
                    'iconaMappa' => AmosIcons::show('map')
                ]),       
                'url' => '?currentView=map'
            ],
            'calendar' => [
                'name' => 'calendar',
                'intestazione' => '', //codice HTML per l'intestazione che verrà caricato prima del calendario,
                                      //per esempio si può inserire una funzione $model->getHtmlIntestazione() creata ad hoc
                'label' => T::tApp('{iconaCalendario}'.Html::tag('p','Calendario'), [
                    'iconaMappa' => AmosIcons::show('calendar')
                ]),       
                'url' => '?currentView=calendar'
            ],*/
        ]);

        parent::init();
    }

/**
* Lists all StatiEvento models.
* @return mixed
*/        
public function actionIndex($layout = NULL)
{    
        Url::remember();
        $this->setDataProvider($this->getModelSearch()->search(Yii::$app->request->getQueryParams()));
        return parent::actionIndex();
}

/**
* Displays a single StatiEvento model.
* @param integer $id
* @return mixed
*/
public function actionView($id)
{
$model = $this->findModel($id);

if ($model->load(Yii::$app->request->post()) && $model->save()) {
return $this->redirect(['view', 'id' => $model->id]);
} else {
return $this->render('view', ['model' => $model]);
}
}

/**
* Creates a new StatiEvento model.
* If creation is successful, the browser will be redirected to the 'view' page.
* @return mixed
*/
public function actionCreate()
{
$this->layout = "@vendor/elitedivision/amos-core/views/layouts/form";
$model = new StatiEvento;

if ($model->load(Yii::$app->request->post()) && $model->validate()) {
if($model->save()){
Yii::$app->getSession()->addFlash('success', Yii::t('app', 'Elemento creato correttamente.'));
return $this->redirect(['index']);
} else {
Yii::$app->getSession()->addFlash('danger', Yii::t('app', 'Elemento non creato, verificare i dati inseriti.'));
return $this->render('create', [
'model' => $model,
'fid' => NULL,
    'dataField' => NULL,
    'dataEntity' => NULL,
]);
}
} else {
return $this->render('create', [
'model' => $model,
'fid' => NULL,
    'dataField' => NULL,
    'dataEntity' => NULL,
]);
}
}

/**
* Creates a new StatiEvento model by ajax request.
* If creation is successful, the browser will be redirected to the 'view' page.
* @return mixed
*/
public function actionCreateAjax($fid, $dataField)
{
$this->layout = "@vendor/elitedivision/amos-core/views/layouts/form";
$model = new StatiEvento;

if (\Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $model->validate()) {
if($model->save()){
//Yii::$app->getSession()->addFlash('success', Yii::t('app', 'Elemento creato correttamente.'));
return json_encode($model->toArray());
} else {
//Yii::$app->getSession()->addFlash('danger', Yii::t('app', 'Elemento non creato, verificare i dati inseriti.'));
return $this->renderAjax('_formAjax', [
'model' => $model,
'fid' => $fid,
'dataField' => $dataField
]);
}
} else {
return $this->renderAjax('_formAjax', [
'model' => $model,
'fid' => $fid,
'dataField' => $dataField
]);
}
}

/**
* Updates an existing StatiEvento model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id
* @return mixed
*/
public function actionUpdate($id)
{
$this->layout = "@vendor/elitedivision/amos-core/views/layouts/form";
$model = $this->findModel($id);

if ($model->load(Yii::$app->request->post()) && $model->validate()) {
if($model->save()){
Yii::$app->getSession()->addFlash('success', Yii::t('app', 'Elemento aggiornato correttamente.'));
return $this->redirect(['index']);
} else {
Yii::$app->getSession()->addFlash('danger', Yii::t('app', 'Elemento non aggiornato, verificare i dati inseriti.'));
return $this->render('update', [
'model' => $model,
'fid' => NULL,
    'dataField' => NULL,
    'dataEntity' => NULL,
]);
}
} else {
return $this->render('update', [
'model' => $model,
'fid' => NULL,
    'dataField' => NULL,
    'dataEntity' => NULL,
]);
}
}

/**
* Deletes an existing StatiEvento model.
* If deletion is successful, the browser will be redirected to the 'index' page.
* @param integer $id
* @return mixed
*/
public function actionDelete($id)
{
$model = $this->findModel($id);
if($model){
//si può sostituire il  delete() con forceDelete() in caso di SOFT DELETE attiva 
//In caso di soft delete attiva e usando la funzione delete() non sarà bloccata
//la cancellazione del record in presenza di foreign key quindi 
//il record sarà cancelleto comunque anche in presenza di tabelle collegate a questo record
//e non saranno cancellate le dipendenze e non avremo nemmeno evidenza della loro presenza
//In caso di soft delete attiva è consigliato modificare la funzione oppure utilizzare il forceDelete() che non andrà 
//mai a buon fine in caso di dipendenze presenti sul record da cancellare
$model->delete();
Yii::$app->getSession()->addFlash('success', Yii::t('app', 'Elemento cancellato correttamente.'));
} else {
Yii::$app->getSession()->addFlash('danger', Yii::t('app', 'Elemento non trovato.'));
}
return $this->redirect(['index']);
}

/**
* Finds the StatiEvento model based on its primary key value.
* If the model is not found, a 404 HTTP exception will be thrown.
* @param integer $id
* @return StatiEvento the loaded model
* @throws NotFoundHttpException if the model cannot be found
*/
protected function findModel($id)
{
if (($model = StatiEvento::findOne($id)) !== null) {
return $model;
} else {
throw new NotFoundHttpException('The requested page does not exist.');
}
}
}
