<?php

class Captcha {
	var $numstr =  array(
		'Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'
	);

	const PLUS_OPERATOR = 1;
	const MULTIPLY_OPERATOR = 2;
	const MINUS_OPERATOR = 3;
	const NUM_AND_STR_PATTERN = 1;
	const STR_AND_NUM_PATTERN = 2;

	private function num2str($num) {
		return $this->numstr[$num];
	}

	public function __construct($pattern, $leftOperand, $operator, $rightOperand) {
		$this->leftOperand = $leftOperand;
		$this->rightOperand = $rightOperand;
		$this->operator = $operator;
		$this->pattern = $pattern;
	}

	public function getLeftOperand() {
		if ($this->pattern == self::STR_AND_NUM_PATTERN) {
			return $this->num2str($this->leftOperand);
		}
		return $this->leftOperand;
	}

	public function getRightOperand() {
		if ($this->pattern == self::NUM_AND_STR_PATTERN) {
			return $this->num2str($this->rightOperand);
		}
		return $this->rightOperand;
	}

	public function getOperator(){
		switch ($this->operator) {
			case self::PLUS_OPERATOR:
				return "+";
			
			case self::MULTIPLY_OPERATOR:
				return "*";

			case self::MINUS_OPERATOR:
				return "-";
		}
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
		$this->assertEquals("One", $captcha->getRightOperand());	
	}

	function testRightOperandBe7WhenInputIs1117() {
		$captcha = new Captcha(1,1,1,7);
		$this->assertEquals("Seven", $captcha->getRightOperand());	
	}

	function testOperatorBe1WhenInputIs1111() {
		$captcha = new Captcha(1,1,1,1);
		$this->assertEquals("+", $captcha->getOperator());	
	}

	function testOperatorBe2WhenInputIs1121() {
		$captcha = new Captcha(1,1,2,5);
		$this->assertEquals("*", $captcha->getOperator());	
	}

	function testOperatorBe3WhenInputIs1131() {
		$captcha = new Captcha(1,1,3,5);
		$this->assertEquals("-", $captcha->getOperator());	
	}

	function testPatternBe1WhenInputIs1111() {
		$captcha = new Captcha(1,1,1,1);
		$this->assertEquals("One", $captcha->getRightOperand());
	}

	function testPatternBe2WhenInputIs2111() {
		$captcha = new Captcha(2,1,1,1);
		$this->assertEquals("One", $captcha->getLeftOperand());
	}










}