<?php

use Captcha\Controller\CaptchaController;

class CaptchaControllerTest extends PHPUnit_Framework_TestCase
{
	function testGetCaptcha()
	{
		$captchaController = new CaptchaController;
		$captcha = $captchaController->getCaptcha();

		// $stubCaptchaService = $this->getMock('Captcha\Service\CaptchaService');
		// $stubCaptchaService
		// 	->expects($this->once())
		// 	->method('getCaptcha')
  //           ->willReturn(1);

		// $this->assertEquals('1 + One', $captcha);
	}
}