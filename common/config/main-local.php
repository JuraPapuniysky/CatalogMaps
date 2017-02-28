<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=catalog_maps',
            'username' => 'root',
            'password' => '012345',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'google-maps-response' => [
            'class' => '',
            'url' => 'https://maps.googleapis.com/maps/api/place/textsearch/json?query=',
            'key' => '&key=AIzaSyDa4NapRz0RebA1jZhCXVYXUdRmQYr0cP8',
        ]
    ],
];
