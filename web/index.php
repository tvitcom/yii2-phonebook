<?php

header('X-Powered-By: COMBO beta');

defined('WEB_CONTEXT') or define('WEB_CONTEXT', 'phonebook');

if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    if (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) === 'ru') {
        defined('WEB_LANG') or define('WEB_LANG', 'ru-RU');
    } elseif (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) === 'ua') {
        defined('WEB_LANG') or define('WEB_LANG', 'ua-UA');
    }
} else {
    defined('WEB_LANG') or define('WEB_LANG', 'en-EN');
}

if (
    $_SERVER['REMOTE_ADDR'] === '127.0.0.1' 
    ) { //developer ip.
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
    defined('YII_ENV_DEV') or define('YII_ENV_DEV', true);
} else { // On public access.
    defined('YII_DEBUG') or define('YII_DEBUG', false);
    defined('YII_ENV') or define('YII_ENV', 'prod');
    defined('YII_ENV_DEV') or define('YII_ENV_DEV', false);

    ## Journal guests in database:
//    require(__DIR__ . '/../extensions/MysqlPdo.php');
//    require(__DIR__ . '/../extensions/journaling.php');
}

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
