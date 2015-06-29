<?php
/**
 * @link https://github.com/LAV45/yii2-fullcalendar
 * @copyright Copyright (c) 2015 LAV45!
 * @license http://opensource.org/licenses/BSD-3-Clause
 * @package yii2-fullcalendar
 * @version 1.0.0
 */

namespace lav45\widget;

use yii\web\AssetBundle;

class MomentAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/moment';
    /**
     * @var array
     */
    public $js = [
        'moment.js'
    ];

    /**
     * @inheritdoc
     * @param \yii\web\View $view
     */
    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        $view->registerJs('moment.createFromInputFallback = function(config) {
            config._d = new Date(config._i);
        };');
    }
}
