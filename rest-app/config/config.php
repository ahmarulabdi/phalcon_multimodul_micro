<?php


//path untuk all app
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

defined('BERITA_PATH') || define('BERITA_PATH', APP_PATH . '/modul_berita');
defined('JADWAL_PATH') || define('JADWAL_PATH', APP_PATH . '/modul_jadwal');
defined('PELELANGAN_PATH') || define('PELELANGAN_PATH', APP_PATH . '/modul_pelelangan');

//path untuk API

defined('REST_PATH') || define('REST_PATH', realpath('.'));



return new \Phalcon\Config([
    'database' => [
        'adapter'    => 'Mysql',
        'host'       => 'localhost',
        'username'   => 'rndmjck',
        'password'   => 'rootreload',
        'dbname'     => '',
        'charset'    => 'utf8',
    ],

    'application' => [
        'jadwalModelsDir' => JADWAL_PATH . '/models/',
        'beritaModelsDir' => BERITA_PATH . '/models/',
        'pelelanganModelsDir' => PELELANGAN_PATH . '/models/',
        'libraryDir'      => APP_PATH. '/library/',
        'viewsDir'       => REST_PATH . '/views/',
        'baseUri'        => '/',
    ]
]);
