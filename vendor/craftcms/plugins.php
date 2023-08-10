<?php

$vendorDir = dirname(__DIR__);
$rootDir = dirname(dirname(__DIR__));

return array (
  'deuxhuithuit/craft-admin-panel-controllers' => 
  array (
    'class' => 'deuxhuithuit\\adminpanel\\Plugin',
    'basePath' => $rootDir . '/src',
    'handle' => 'admin-panel-controllers',
    'aliases' => 
    array (
      '@deuxhuithuit/adminpanel' => $rootDir . '/src',
    ),
    'name' => 'Admin Panel Controllers',
    'version' => '1.0.0',
    'description' => 'Adds controller to show the admin panel in headless mode',
    'developer' => 'Deux Huit Huit',
    'developerUrl' => 'https://deuxhuithuit.com',
    'developerEmail' => 'open-source@deuxhuithuit.com',
    'documentationUrl' => 'https://github.com/DeuxHuitHuit/admin-panel-controllers/blob/dev/README.md',
    'hasCpSettings' => false,
  ),
);
