<?php
require_once __DIR__ . '/../vendor/autoload.php';
$thrift = require __DIR__ . '/../config/thrift.php';
$config = require __DIR__ . '/../config/app.php';
use Jiuyan\Server;
use Jiuyan\App;

$app = new App;
$app->setConfig($config);
$app->initErrorReporting();
$app->setLogger();
$app->initDefaultTimezone();
$server = new Server($app, $thrift);
$app->setServer($server);
$app->run();

