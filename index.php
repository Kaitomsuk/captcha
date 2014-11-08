<?php

require_once 'vendor/autoload.php';
use Captcha\Service\CaptchaService as CaptchaService;
use Captcha\Model\Randomizer as Randomizer;

$app = new Silex\Application();

$app->get('/api/captcha', function() {
	$captchaService = new CaptchaService();
	$captchaService->setRandomizer( new Randomizer() );
	return $captchaService->getCaptcha();
});

$app->run();