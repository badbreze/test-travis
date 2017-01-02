<?php 
namespace elitedivision\amos\eventi\widgets\icons;

use elitedivision\amos\core\widget\WidgetIcon;
use Yii;
use yii\helpers\ArrayHelper;

class WidgetIconstati_evento extends WidgetIcon {
    
 public function init()
    {
        parent::init();

        $this->setLabel(\Yii::t('modules/eventi/widgets/icons', 'Stati Evento'));
        $this->setDescription(Yii::t('modules/eventi/widgets/icons', 'Consente all\'utente di modificare l\'entità Eventi'));

        $this->setIcon('linentita');
        
        if(!Yii::$app->user->isGuest){
            $this->setUrl(\Yii::$app->urlManager->createUrl(['/eventi/stati-evento/index']));
        }
        $this->setCode('STATI_EVENTO');
        $this->setModuleName('eventi');
        $this->setNamespace(__CLASS__);

        $this->setClassSpan(ArrayHelper::merge($this->getClassSpan(), [
            'bk-backgroundIcon',
            'color-lightBase'
        ]));
    }
    
}
