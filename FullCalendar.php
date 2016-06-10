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
use yii\bootstrap\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * FullCalendar widget is a Yii2 wrapper for the FullCalendar.
 *
 * @author Alexey Loban <lav451@gmail.com>
 * @since 1.0
 * @see http://fullcalendar.io
 */
class FullCalendar extends Widget
{
    /**
     * @var boolean If the plugin displays a Google Calendar.
     */
    public $googleCalendar = false;

    /**
     * Runs the widget.
     */
    public function run()
    {
        $this->registerScript();

        Html::addCssClass($this->options, 'fullcalendar');

        return Html::tag('div', '', $this->options);
    }

    /**
     * Registers a FullCalendar plugin
     */
    protected function registerScript()
    {
        $view = $this->getView();

        $asset = FullCalendarAsset::register($view);

        PrintAsset::register($view);

        if ($this->googleCalendar) {
            GoogleCalendarAsset::register($view);
        }

        $id = $this->options['id'];

        if ($this->clientOptions !== false) {
            $language = isset($this->clientOptions['lang']) ? $this->clientOptions['lang'] : Yii::$app->language;
            $basePath = "{$asset->basePath}/lang";

            if (!file_exists($basePath . "/{$language}.js")) {
                $language = locale_get_primary_language($language);
            }
            if (file_exists($basePath . "/{$language}.js")) {
                $view->registerJsFile("{$asset->baseUrl}/lang/{$language}.js", [
                    'depends' => ['lav45\widget\FullCalendarAsset']
                ]);
            }
            $options = empty($this->clientOptions) ? '' : Json::htmlEncode($this->clientOptions);
            $view->registerJs("jQuery('#{$id}').fullCalendar({$options});");
        }
    }
}
