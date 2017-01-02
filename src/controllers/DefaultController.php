<?php 

namespace elitedivision\amos\eventi\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use elitedivision\amos\dashboard\controllers\base\DashboardController;
use elitedivision\amos\eventi\widgets\icons\WidgetIconeventi;

class DefaultController extends DashboardController
{
   /**
     * @var string $layout Layout per la dashboard interna.
     */
    public $layout = "@vendor/elitedivision/amos-core/views/layouts/dashboard_interna";

    /**
     * Lists all eventi models.
     * @return mixed
     */
    public function actionIndex()
    {
        Url::remember();
        $params = [
            'currentDashboard' => $this->getCurrentDashboard()
        ];

        return $this->render('index', $params);
    }
}

