<?php
define('X_FRAMEWORK_PATH', '/home/michael/Porjects/000.michael/001.diabolo/002.diabolo/Framework');
return array(
  'document_root' => '/home/michael/Porjects/000.michael/Goku',
  'module_path' => array(),
  'service_path' => array(),
  'library_path' => array(),
  'modules' => require dirname(__FILE__).'/modules.php',
  'services' => require dirname(__FILE__).'/services.php',
  'params' => require dirname(__FILE__).'/params.php',
);