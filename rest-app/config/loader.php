<?php

/**
 * Registering an autoloader
 */
$loader = new \Phalcon\Loader();

$loader->registerNamespaces(
    [
        'Kuansing\Library' => $config->application->libraryDir,
        'Kuansing\Views' => $config->application->viewsDir,


        'Kuansing\Berita\Models' => $config->application->beritaModelsDir,
        'Kuansing\Jadwal\Models' => $config->application->jadwalModelsDir,
        'Kuansing\Pelelangan\Models' => $config->application->pelelanganModelsDir,


    ]
)->register();
