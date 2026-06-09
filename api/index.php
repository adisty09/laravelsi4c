<?php 
require __DIR__. '/../public/index.php';

$app->useStoragePath('/tmp/storage');
$app->instance('path.storage', '/tmp/storage');
