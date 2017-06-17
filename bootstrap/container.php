<?php

use App\Storage\S3Storage;

$container = $app->getContainer();

$container['view'] = function ($c) {
    $config = $c['settings']['twig'];
    $view = new \Slim\Views\Twig(
        $config['viewsPath'],
        [
            'cache' => $config['enableCache'] ? $config['viewsCachePath'] : false,
        ]);
    
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $c['request']->getUri()));
    
    return $view;
};

$container['db'] = function ($c) {
    $config = $c['settings']['database'];
    $dsn = $config['driver'] . ':dbname=' . $config['dbname'] . ';host=' . $config['host'];
    
    $pdo = new \PDO($dsn, $config['username'], $config['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    
    return $pdo;
};

$container['storage'] = function ($c) {
    $config = $c['settings']['s3'];
    $client = new \Aws\S3\S3Client([
        'version'     => 'latest',
        'region'      => $config['region'],
        'credentials' => [
            'key'    => $config['access_key_id'],
            'secret' => $config['secret_access_key'],
        ],
    ]);
    
    return new S3Storage($client, $config);
};