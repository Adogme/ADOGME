<?php

/**
 * Register application modules
 */
$application->registerModules(array(
    'frontend' => array(
        'className' => 'ADOGME\Frontend\Module',
        'path' => __DIR__ . '/../apps/frontend/Module.php'
    ),
    'backend' => array(
        'className' => 'ADOGME\Backend\Module',
        'path' => __DIR__ . '/../apps/backend/Module.php'
    )
));
