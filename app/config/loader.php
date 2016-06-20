<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->pluginsDir,
        $config->application->libraryDir,
        $config->application->modelsDir,
        $config->application->formsDir
    )
)->register();

// Use composer autoloader to load vendor classes
require_once __DIR__ . '/../../vendor/autoload.php';

//Cloudinary config
Cloudinary::config(array( 
  "cloud_name" => "ddc4n6gua",
  "api_key" => "851435719311464",
  "api_secret" => "Khn9DB-JWzhI9MEEZWDnnDE9upw"
));