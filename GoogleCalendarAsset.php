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

class GoogleCalendarAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/fullcalendar/dist';
    /**
     * @inheritdoc
     */
    public $js = [
        'gcal.js'
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'lav45\widget\FullCalendarAsset',
    ];
}