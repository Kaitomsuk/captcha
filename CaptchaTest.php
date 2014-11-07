<?php

class Captcha {
	public function __construct($pattern, $leftOperand, $operator, $rightOperand) {
		$this->leftOperand = $leftOperand;
		$this->rightOperand = $rightOperand;
		$this->operator = $operator;
	}

	public function getLeftOperand() {
		return $this->leftOperand;
	}

	public function getRightOperand() {
		return $this->rightOperand;
	}

	public function getOperator(){
		return $this->operator;
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

	function testRightOperandBe7WhenInputIs1117() {
		$captcha = new Captcha(1,1,1,7);
		$this->assertEquals("7", $captcha->getRightOperand());	
	}

	function testOperatorBe1WhenInputIs1111() {
		$captcha = new Captcha(1,1,1,5);
		$this->assertEquals("1", $captcha->getOperator());	
	}

	function testOperatorBe2WhenInputIs1121() {
		$captcha = new Captcha(1,1,2,5);
		$this->assertEquals("2", $captcha->getOperator());	
	}

	function testOperatorBe3WhenInputIs1131() {
		$captcha = new Captcha(1,1,3,5);
		$this->assertEquals("3", $captcha->getOperator());	
	}

	function testPatternBe1WhenInputIs1111() {
		$this->assertTrue(0);
	}










}