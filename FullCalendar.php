<?php
/**
 * @link https://github.com/LAV45/yii2-fullcalendar
 * @copyright Copyright (c) 2015 LAV45!
 * @license http://opensource.org/licenses/BSD-3-Clause
 * @package yii2-fullcalendar
 */

namespace lav45\widget;

use Yii;
use Locale;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * FullCalendar widget is a Yii2 wrapper for the FullCalendar.
 *
 * @author Alexey Loban <lav451@gmail.com>
 * @see http://fullcalendar.io
 */
class FullCalendar extends Widget
{
    /**
     * @var boolean If the plugin displays a Google Calendar.
     */
    public $googleCalendar = false;
    /**
     * @see https://fullcalendar.io/docs
     * @var array the options for the underlying JS plugin.
     */
    public $clientOptions;
    /**
     * @var array the HTML attributes for the widget container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options;

    /**
     * Initializes the widget.
     * This method will register the bootstrap asset bundle. If you override this method,
     * make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }

    /**
     * Runs the widget.
     */
    public function run()
    {
        $this->registerAsset();
        $this->registerScript();

        Html::addCssClass($this->options, 'fullcalendar');

        return Html::tag('div', '', $this->options);
    }

    /**
     * Registers a FullCalendar plugin
     */
    protected function registerScript()
    {
        $options = empty($this->clientOptions) ? '' : Json::htmlEncode($this->clientOptions);
        $this->getView()->registerJs("jQuery('#{$this->options['id']}').fullCalendar({$options});");
    }

    protected function registerAsset()
    {
        $view = $this->getView();

        $asset = FullCalendarAsset::register($view);
        $this->registerLocale($asset);

        PrintAsset::register($view);

        if ($this->googleCalendar) {
            GoogleCalendarAsset::register($view);
        }
    }

    protected function registerLocale($asset)
    {
        $language = $this->getLanguage();
        $basePath = "{$asset->basePath}/locale";

        if (!file_exists("{$basePath}/{$language}.js")) {
            $language = $this->getPrimaryLanguage($language);
        }
        if (file_exists("{$basePath}/{$language}.js")) {
            $this->clientOptions['locale'] = $language;
            $this->getView()->registerJsFile("{$asset->baseUrl}/locale/{$language}.js", [
                'depends' => ['lav45\widget\FullCalendarAsset']
            ]);
        } elseif(isset($this->clientOptions['locale'])) {
            unset($this->clientOptions['locale']);
        }
    }

    protected function getLanguage()
    {
        /**
         * locale changed in 3.0 from lang
         * @see https://fullcalendar.io/docs/text/locale/
         */
        if (isset($this->clientOptions['lang'])) {
            $language = $this->clientOptions['lang'];
            unset($this->clientOptions['lang']);
        } elseif(isset($this->clientOptions['locale'])) {
            $language = $this->clientOptions['locale'];
        } else {
            $language = Yii::$app->language;
        }

        $language = strtolower($language);

        return $language;
    }

    /**
     * @param string $locale `en-EN`, `ru-RU`
     * @return string en or ru
     */
    protected function getPrimaryLanguage($locale)
    {
        return extension_loaded('intl') ?
            Locale::getPrimaryLanguage($locale) : substr($locale, 0, 2);
    }
}
