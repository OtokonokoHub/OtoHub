<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'session' => [
            'class' => 'yii\web\CacheSession'
        ],
    ],
];
