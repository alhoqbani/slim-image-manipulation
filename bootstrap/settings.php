<?php
return [
    'displayErrorDetails' => true,
    
    'app' => [
      'name' => getenv('APP_NAME'),
      'url' => getenv('APP_URL'),
      'env' => getenv('APP_ENV'),
    ],
    
    'twig' => [
        'viewsPath'      => ROOT . 'resources/views',
        'viewsCachePath' => ROOT . 'storage/cache/views',
        'enableCache'    => false,
    ],
    
    'database' => [
        'driver'   => getenv('DB_CONNECTION'),
        'host'     => getenv('DB_HOST'),
        'port'     => getenv('DB_PORT'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD'),
        'dbname' => getenv('DB_DATABASE'),
    ],
    's3'       => [
        'access_key_id'     => getenv('AWS_ACCESS_KEY_ID'),
        'secret_access_key' => getenv('AWS_SECRET_ACCESS_KEY'),
        'region' => getenv('AWS_REGION'),
        'bucket_name' => getenv('AWS_BUCKET_NAME')
    ],
    
    'image_filters' => [
        'greyscale'  => \App\Image\Filter\Greyscale::class,
        'rotate'     => \App\Image\Filter\Rotate::class,
        'resize'     => \App\Image\Filter\Resize::class,
        'brightness' => \App\Image\Filter\Brightness::class,
        'blur'       => \App\Image\Filter\Blur::class,
        'colorize'       => \App\Image\Filter\Colorize::class,
        'crop'       => \App\Image\Filter\Crop::class,
    ]
];