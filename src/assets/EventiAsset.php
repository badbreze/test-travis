<?php
namespace elitedivision\amos\eventi\assets;

use yii\web\AssetBundle;

class EventiAsset extends AssetBundle
{
public $sourcePath = '@backend/modules/eventi/assets/web';

    public $js = [        
    ];
    public $css = [
        'css/style.css',
    ];

    public $depends = [               
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset'        
    ];

}