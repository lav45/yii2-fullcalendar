<?php
/**
 * @link https://github.com/LAV45/yii2-fullcalendar
 * @copyright Copyright (c) 2015 LAV45!
 * @license http://opensource.org/licenses/BSD-3-Clause
 * @package yii2-fullcalendar
 */

namespace lav45\widget;

use yii\web\AssetBundle;

/**
 * Class GoogleCalendarAsset
 * @package lav45\widget
 */
class GoogleCalendarAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/fullcalendar/dist';
    /**
     * @var array
     */
    public $js = [
        'gcal.js'
    ];
    /**
     * @var array
     */
    public $depends = [
        'lav45\widget\FullCalendarAsset',
    ];
}
