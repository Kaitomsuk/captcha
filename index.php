<?php

require_once 'vendor/autoload.php';
use Captcha\Controller\CaptchaController;
use Captcha\Service\CaptchaService;

$app = new Silex\Application();
$app->get('/', function() {
	return 'Hello World!';
});

$app->get('/api/captcha', function() {
	$captchaController = new CaptchaController(new CaptchaService);
	return $captchaController->getCaptcha();
});

$app->run();