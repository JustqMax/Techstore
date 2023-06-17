<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
//// Yii2 отключить error handler
//define('YII_ENABLE_ERROR_HANDLER', false);
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';
require_once __DIR__ . '/../functions.php';

(new yii\web\Application($config))->run();
