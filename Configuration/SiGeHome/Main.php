<?php
define('X_FRAMEWORK_PATH', 'E:/Projects/028.diabolo/Framework/Framework');
return array(
  'document_root' => 'E:/Projects/Goku',
  'module_path' => array(),
  'service_path' => array(),
  'library_path' => array(),
  'modules' => require dirname(__FILE__).'/modules.php',
  'services' => require dirname(__FILE__).'/services.php',
  'params' => require dirname(__FILE__).'/params.php',
);