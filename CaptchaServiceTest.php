<?php
require "CaptchaTest.php";

class CaptchaService
{
	function setRandomizer( $randomizer )
	{
		
	}

	function getCaptcha()
	{
		return new Captcha( 1,1,1,1 );
	}
}

class CaptchaServiceTest extends PHPUnit_Framework_TestCase
{
	public function testGetCaptcha()
	{
		$captchaService = new CaptchaService();
		$stubRandomizer = $this->getMock('Randomizer');

		$stubRandomizer->method('getRandomOperand')
             ->willReturn(1);

		$captchaService->setRandomizer( $stubRandomizer );
		$this->assertEquals("1" , $captchaService->getCaptcha()->getLeftOperand() );
	}
}