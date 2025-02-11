<?php
return [
    'language' => 'es',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => '', // Ajusta el nombre de la base de datos
            'username' => '', // Usuario de tu base de datos en Laragon
            'password' => '', // Deja vacío si no tienes contraseña
            'charset' => 'utf8',
        ],
        'i18n' => [
            'translations' => [
           
                'yii/bootstrap5' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                ],
            ]
        ]
    ]
];

