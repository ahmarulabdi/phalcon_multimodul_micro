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

$app->get('/berita', function () use ($app) {
    return json_encode(\Kuansing\Berita\Models\Users::find());
});



