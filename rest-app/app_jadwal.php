<?php


/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

/**
 * Add your routes here
 */



$app->get('/', function () use ($app) {
    echo $app['view']->render('index');
});

$app->get('/jadwal', function () use ($app) {
    return json_encode(\Kuansing\Jadwal\Models\Users::find());
});

