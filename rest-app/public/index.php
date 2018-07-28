<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Micro;

error_reporting(E_ALL);

define('REST_PATH', realpath('..'));


try {

    $di = new FactoryDefault();

    /**
     * Include Services
     */
    include REST_PATH . '/config/services.php';

    /**
     * Call the autoloader service.  We don't need to keep the results.
     */
    $di->getLoader();

    /**
     * Starting the application
     * Assign service locator to the application
     */
    $app = new Micro($di);

    /**
     * Include Application
     */


    header('Access-Control-Allow-Origin: *');
    header('Content-Type: aplication/json ; charset = utf-8');


    include REST_PATH . '/app_jadwal.php';
    include REST_PATH . '/app_berita.php';
    include REST_PATH . '/app_pelelangan.php';


    /**
     * Not found handler
     */
    $app->notFound(function () use ($app) {
        $app->response->setStatusCode(404, "Not Found")->sendHeaders();
        echo $app['view']->render('404');
    });

    /**
     * Handle the request
     */
    $app->handle();

} catch (\Exception $e) {
      echo $e->getMessage() . '<br>';
      echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
