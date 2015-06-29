<?php
/**
 * @link https://github.com/LAV45/yii2-fullcalendar
 * @copyright Copyright (c) 2015 LAV45!
 * @license http://opensource.org/licenses/BSD-3-Clause
 * @package yii2-fullcalendar
 * @version 1.0.0
 */

namespace lav45\widget;

use Yii;
use yii\web\AssetBundle;

/**
 * Asset bundle for FullCalendar
 *
 * @author Alexey Loban <lav451@gmail.com>
 * @since 1.0
 */
class FullCalendarAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/fullcalendar/dist';
    /**
     * @inheritdoc
     */
    public $js = [
        'fullcalendar.js'
    ];
    /**
     * @inheritdoc
     */
    public $css = [
        'fullcalendar.css'
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\jui\JuiAsset',
        'lav45\widget\MomentAsset',
    ];
}
