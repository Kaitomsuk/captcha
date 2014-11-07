<?php
require "CaptchaTest.php";
require "RandomizerTestCase.php";

class CaptchaService
{
	function setRandomizer( $randomizer )
	{
		$this->randomizer = $randomizer;
	}

	function getCaptcha()
	{
		return new Captcha( 1, $this->randomizer->getRandomOperand(),1,1 );
	}
}

class CaptchaServiceTest extends PHPUnit_Framework_TestCase
{
	public function testGetCaptchaLeftOperandShouldBe1()
	{
		$captchaService = new CaptchaService();
		$stubRandomizer = $this->getMock('Randomizer');

		$stubRandomizer
			->expects($this->once())
			->method('getRandomOperand')
            ->willReturn(1);

		$captchaService->setRandomizer( $stubRandomizer );
		$this->assertEquals("1" , $captchaService->getCaptcha()->getLeftOperand() );
	}
}