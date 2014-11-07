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
		$randomizer = $this->randomizer;
		return new Captcha( 1, $randomizer->getRandomOperand(),1,$randomizer->getRandomOperand());
	}
}

class CaptchaServiceTest extends PHPUnit_Framework_TestCase
{
	public function testGetCaptchaLeftOperandShouldBe1()
	{
		$captchaService = new CaptchaService();
		$stubRandomizer = $this->getMock('Randomizer');

		$stubRandomizer
			->expects($this->exactly(2))
			->method('getRandomOperand')
            ->willReturn(1);

		$captchaService->setRandomizer( $stubRandomizer );
		$this->assertEquals("1" , $captchaService->getCaptcha()->getLeftOperand() );
	}


	public function testGetCaptchaRightOperandShouldBeTwo()
	{
		$captchaService = new CaptchaService();
		$stubRandomizer = $this->getMock('Randomizer');

		$stubRandomizer
			->expects($this->exactly(2))
			->method('getRandomOperand')
            ->willReturn(2);

		$captchaService->setRandomizer( $stubRandomizer );
		$this->assertEquals("Two" , $captchaService->getCaptcha()->getRightOperand() );
	}




}