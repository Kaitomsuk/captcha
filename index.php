<?php

require_once 'vendor/autoload.php';
//use Captcha\Controller\CaptchaController;

$app = new Silex\Application();
$app->get('/', function() {
	return 'Hello World!';
});

$app->get('/api/captcha', function() {
	return 'One - 1';
});

// $app["debug"] = true;
$app->run();