<?php

require_once 'vendor/autoload.php';
use Captcha\Service\CaptchaService;
use Captcha\Model\Randomizer;

$app = new Silex\Application();
$app->get('/', function() {
	return 'Hello World!';
});

$app->get('/api/captcha', function() {
	$captchaService = new CaptchaService;
	$captchaService->setRandomizer( new Randomizer );

	return $captchaService->getCaptcha()->getLeftOperand() . ' ' . $captchaService->getCaptcha()->getOperator() . ' ' . $captchaService->getCaptcha()->getRightOperand();
});

$app->run();