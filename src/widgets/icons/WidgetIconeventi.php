<?php 
namespace elitedivision\amos\eventi\widgets\icons;

use elitedivision\amos\core\widget\WidgetIcon;
use Yii;
use yii\helpers\ArrayHelper;

class WidgetIconeventi extends WidgetIcon {
    
 public function init()
    {
        parent::init();

        $this->setLabel(\Yii::t('modules/eventi/widgets/icons', 'Eventi'));
        $this->setDescription(Yii::t('modules/eventi/widgets/icons', 'Consente all\'utente di modificare l\'entità Eventi'));

        $this->setIcon('calendar');
        
        if(!Yii::$app->user->isGuest){
            $this->setUrl(\Yii::$app->urlManager->createUrl(['/eventi/eventi/index']));
        }
        $this->setCode('EVENTI');
        $this->setModuleName('eventi');
        $this->setNamespace(__CLASS__);

        $this->setClassSpan(ArrayHelper::merge($this->getClassSpan(), [
            'bk-backgroundIcon',
            'color-lightBase'
        ]));
    }
    
}
