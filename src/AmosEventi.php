<?php

namespace elitedivision\amos\eventi;

use elitedivision\amos\core\module\AmosModule;

/**
 * eventi module definition class
 */
class AmosEventi extends AmosModule
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'elitedivision\amos\eventi\controllers';
    public $newFileMode = 0666;
    public $name = 'eventi';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        \Yii::configure($this, require(__DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php'));

    }

    protected function getDefaultModels()
    {
        return [];
    }

    /**
     *
     * @return string
     */
    public static function getModuleName()
    {
        return 'eventi';
    }

    public function getWidgetGraphics()
    {
        return NULL;
    }

    public function getWidgetIcons()
    {
        return [
            \elitedivision\amos\eventi\widgets\icons\WidgetIconeventi::className(),
            \elitedivision\amos\eventi\widgets\icons\WidgetIconeventi::className(),
            \elitedivision\amos\eventi\widgets\icons\WidgetIcontipo_evento::className(),
            \elitedivision\amos\eventi\widgets\icons\WidgetIconstati_evento::className()
        ];
    }
}
