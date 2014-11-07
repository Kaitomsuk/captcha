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
		$operator = $this->randomizer->getRandomOperator();
		$pattern = $this->randomizer->getRandomPattern();
		return new Captcha( $pattern, $leftOperand, $operator, $rightOperand);
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
			->expects($this->once())
			->method('getRandomPattern')
            ->willReturn(1);
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
			->expects($this->once())
			->method('getRandomPattern')
            ->willReturn(1);
		$stubRandomizer
			->expects($this->exactly(2))
			->method('getRandomOperand')
            ->willReturn(2);
		$this->captchaService->setRandomizer( $stubRandomizer );
		
		$rightOperand = $this->captchaService->getCaptcha()->getRightOperand();
		
		$this->assertEquals("Two" , $rightOperand);
	}

	public function testGetCaptchaOperaterShouldBePlus()
	{
		$stubRandomizer = $this->getMock('Randomizer');
		$stubRandomizer
			->expects($this->once())
			->method('getRandomOperator')
            ->willReturn(1);
		$this->captchaService->setRandomizer( $stubRandomizer );
		
		$operator = $this->captchaService->getCaptcha()->getOperator();
		
		$this->assertEquals("+" , $operator);
	}

	public function testGetCaptchaPattern1LeftOperandShouldBe1()
	{
		$stubRandomizer = $this->getMock('Randomizer');
		$stubRandomizer
			->expects($this->once())
			->method('getRandomPattern')
            ->willReturn(1);
        $stubRandomizer
			->method('getRandomOperand')
            ->willReturn(1);
		$this->captchaService->setRandomizer( $stubRandomizer );
		
		$leftOperand = $this->captchaService->getCaptcha()->getLeftOperand();
		
		$this->assertEquals("1" , $leftOperand);
	}
}