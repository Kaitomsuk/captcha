<?php

namespace Captcha\Controller;
use Captcha\Service\CaptchaService;
use Captcha\Model\Randomizer;

class CaptchaController
{
	function __construct($captchaService)
	{
		$this->service = $captchaService;
	}

	function getCaptcha()
	{
		$this->service->setRandomizer( new Randomizer );
		$captcha = $this->service->getCaptcha();
		
		return $captcha->getLeftOperand() . ' ' . $captcha->getOperator() . ' ' . $captcha->getRightOperand();
	}
}