<?php
/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

defined('BERITA_PATH') || define('BERITA_PATH', APP_PATH . '/modul_berita');
defined('JADWAL_PATH') || define('JADWAL_PATH', APP_PATH . '/modul_jadwal');
defined('PELELANGAN_PATH') || define('PELELANGAN_PATH', APP_PATH . '/modul_pelelangan');


return new \Phalcon\Config([
    'database' => [
        'adapter' => 'Mysql',
        'host' => 'localhost',
        'username' => 'rndmjck',
        'password' => 'rootreload',
        'dbnameJadwal' => 'kuansing_uniks_jadwal',
        'dbnameBerita' => 'kuansing_uniks_berita',
        'dbnamePelelangan' => 'kuansing_pelelangan',
        'charset' => 'utf8',
    ],
    'application' => [
        // umum
        'appDir' => APP_PATH . '/',
        'libraryDir' => APP_PATH . '/library/',


        //module jadwal
        'jadwalModule' => JADWAL_PATH,
        'jadwalModelsDir' => JADWAL_PATH . '/models/',

        //module Penjadwalan
        'beritaModule' => BERITA_PATH,
        'beritaModelsDir' => BERITA_PATH . '/models/',

        //module Penjadwalan
        'pelelanganModule' => PELELANGAN_PATH,
        'pelelanganModelsDir' => PELELANGAN_PATH . '/models/',

        // This allows the baseUri to be understand project paths that are not in the root directory
        // of the webpspace.  This will break if the public/index.php entry point is moved or
        // possibly if the web server rewrite rules are changed. This can also be set to a static path.
        'baseUri' => preg_replace('/public([\/\\\\])index.php$/', '', $_SERVER["PHP_SELF"]),

    ],
]);
