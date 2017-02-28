<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'assetManager' => [
            'bundles' => [
                'dosamigos\google\maps\MapAsset' => [
                    'options' => [
                        'key' => 'AIzaSyDa4NapRz0RebA1jZhCXVYXUdRmQYr0cP8',
                        'language' => 'ru',
                        'version' => '3.1.18',
                    ]
                ]
            ]
        ],
    ],
];
