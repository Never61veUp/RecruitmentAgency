<?php

define('APP_PATH', dirname(__DIR__.'/RecruitmentAgency'));
require_once APP_PATH.'/vendor/autoload.php';

use App\Core\App;

$app = new App;
$app->run();
