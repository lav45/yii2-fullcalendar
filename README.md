yii2-fullcalendar
===========
Widget for Yii Framework 2.0 to use [FullCalendar](http://arshaw.com/fullcalendar)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist lav45/yii2-fullcalendar "~1.0"
```

or add

```
"lav45/yii2-fullcalendar": "~1.0"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by :

```php
use lav45\widget\FullCalendar;

<?= FullCalendar::widget([
    'googleCalendar' => true,  // If the plugin displays a Google Calendar. Default false
    'clientOptions' => [
        // put your options and callbacks here
        // see http://arshaw.com/fullcalendar/docs/
        'lang' => 'pt-br', // optional, if empty get app language
    ],
]); ?>
```