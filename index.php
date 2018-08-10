<?php
$configBaseDir = dirname(__FILE__).'/Configuration';
$envEnvirnmentName = getenv('envirnment_name');
if ( false !== $envEnvirnmentName ) {
    $configBaseDir .= '/'.$envEnvirnmentName;
}
$config = require "{$configBaseDir}/Main.php";

require X_FRAMEWORK_PATH.'/Core/X.php';
X\Core\X::start($config)->run();