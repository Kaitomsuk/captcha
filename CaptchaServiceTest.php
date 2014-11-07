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
		$leftOperand = $this->randomizer->getRandomOperand();
		$rightOperand = $this->randomizer->getRandomOperand();
		return new Captcha( 1, $leftOperand,1,$rightOperand);
	}
}

class CaptchaServiceTest extends PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->captchaService = new CaptchaService();
	}

	public function testGetCaptchaLeftOperandShouldBe1()
	{		
		$stubRandomizer = $this->getMock('Randomizer');
		$stubRandomizer
			->expects($this->exactly(2))
			->method('getRandomOperand')
            ->willReturn(1);
		$this->captchaService->setRandomizer( $stubRandomizer );
		
		$leftOperand = $this->captchaService->getCaptcha()->getLeftOperand();
		
		$this->assertEquals("1" , $leftOperand);
	}

	public function testGetCaptchaRightOperandShouldBeTwo()
	{
		$stubRandomizer = $this->getMock('Randomizer');
		$stubRandomizer
			->expects($this->exactly(2))
			->method('getRandomOperand')
            ->willReturn(2);
		$this->captchaService->setRandomizer( $stubRandomizer );
		
		$rightOperand = $this->captchaService->getCaptcha()->getRightOperand();
		
		$this->assertEquals("Two" , $rightOperand);
	}
}