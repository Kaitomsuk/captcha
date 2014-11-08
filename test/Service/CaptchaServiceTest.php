<?php

use Captcha\Service\CaptchaService as CaptchaService;
// use Captcha\Model\Randomizer as Randomizer;

class CaptchaServiceTest extends PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->captchaService = new CaptchaService();
	}

	public function testGetCaptchaLeftOperandShouldBe1()
	{		
		$stubRandomizer = $this->getMock('Captcha\Model\Randomizer');
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
		$stubRandomizer = $this->getMock('Captcha\Model\Randomizer');
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
		$stubRandomizer = $this->getMock('Captcha\Model\Randomizer');
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
		$stubRandomizer = $this->getMock('Captcha\Model\Randomizer');
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