<?php
class Randomizer
{	
	function getRandomPattern()
	{
		return rand( 1, 2 );
	}

	function getRandomOperand()
	{
		return rand( 1, 9 );
	}

	function getRandomOperator()
	{
		return rand( 1, 3 );
	}
}

class RandomizerTestCase extends PHPUnit_Framework_TestCase 
{
	function setup()
	{
		$this->randomizer = new Randomizer();
	}

	function testRandomPattern()
	{		
		$this->assertContains( $this->randomizer->getRandomPattern()  , array(1, 2));
	}

	function testRandomOperand()
	{
		$this->assertContains( $this->randomizer->getRandomOperand()  , range(1, 9) );
	}
	
	function testRandomOperator()
	{
		$this->assertContains( $this->randomizer->getRandomOperator()  , range(1, 3) );
	}
}