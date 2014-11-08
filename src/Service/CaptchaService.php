<?php

namespace Captcha\Service;
use Captcha\Model\Captcha as Captcha;

class CaptchaService
{
	function setRandomizer( $randomizer )
	{
		$this->randomizer = $randomizer;
	}

	function getCaptcha()
	{
		$leftOperand = $this->randomizer->getRandomOperand();
		$rightOperand = $this->randomizer->getRandomOperand();
		$operator = $this->randomizer->getRandomOperator();
		$pattern = $this->randomizer->getRandomPattern();
		$captcha = new Captcha( $pattern, $leftOperand, $operator, $rightOperand);
		return $captcha->getCaptchaString();
	}
}