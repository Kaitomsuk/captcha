<?php

class Captcha {
	public function __construct($pattern, $leftOperand, $operator, $rightOperand) {
		$this->leftOperand = $leftOperand;
	}

	public function getLeftOperand() {
		return $this->leftOperand;
	}
}

class CaptchaTest extends PHPUnit_Framework_TestCase {
	function testLeftOperandBe1WhenInputIs1111() {
		$captcha = new Captcha(1,1,1,1);
		$this->assertEquals("1", $captcha->getLeftOperand());
	}

	function testLeftOperandBe9WhenInputIs1911() {
		$captcha = new Captcha(1,9,1,1);
		$this->assertEquals("9", $captcha->getLeftOperand());
	}
	
	function testRightOperandBe1WhenInputIs1111() {
		$captcha = new Captcha(1,1,1,1);
		$this->assertEquals("1", $captcha->getRightOperand());	
	}
}