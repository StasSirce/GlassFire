<?php

// comment out the following two lines when deployed to production
//defined('YII_DEBUG') or define('YII_DEBUG', true);
//defined('YII_ENV') or define('YII_ENV', 'dev');

if (YII_DEBUG) {
    error_reporting(E_ERROR);
    ini_set('display_errors', '1');
}

date_default_timezone_set('UTC');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../components/functions.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
