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
 * Class FullCalendarAsset
 * @package lav45\widget
 */
class FullCalendarAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/fullcalendar/dist';
    /**
     * @var array
     */
    public $js = [
        'fullcalendar.js'
    ];
    /**
     * @var array
     */
    public $css = [
        'fullcalendar.css'
    ];
    /**
     * @var array
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'lav45\widget\MomentAsset',
    ];
}
