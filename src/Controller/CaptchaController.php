<?php

namespace Captcha\Controller;
use Captcha\Service\CaptchaService;
use Captcha\Model\Randomizer;

class CaptchaController
{
	function getCaptcha()
	{
		$captchaService = new CaptchaService;
		$captchaService->setRandomizer( new Randomizer );
		$captcha = $captchaService->getCaptcha();
		
		return $captcha->getLeftOperand() . ' ' . $captcha->getOperator() . ' ' . $captcha->getRightOperand();
	}
}