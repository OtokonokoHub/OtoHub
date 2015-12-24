<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id'                  => 'app-frontend',
    'basePath'            => dirname(__DIR__),
    'bootstrap'           => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components'          => [
        'user' => [
            'identityClass'   => 'frontend\models\User',
            'enableAutoLogin' => true,
            'identityCookie'  => ['name' => '_identity', 'httpOnly' => true, 'domain' => '.otohub.moe'],
            'loginUrl'        => ['user/login'],
            'on afterLogin'   => function($event){
                \Yii::$app->session->set('nick', $event->identity->nick);
            },
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'class' => 'yii\web\Request',
            'enableCookieValidation' => false,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'suffix'          =>'.homo',
            'rules'           => [
                'category/<alias:[a-z-]+>' => 'category',
                '<controller:[\w-]+>/<action:[\w-]+>' => '<controller>/<action>',
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
    'params' => $params,
];
