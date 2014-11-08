<?php

use Silex\WebTestCase;

class CaptchaControllerTest extends WebTestCase
{
	function createApplication()
	{
		require __DIR__ . '/../../index.php';
		return $app;
	}

	function testInitialRequest()
	{
		$client = $this->createClient();
    	$crawler = $client->request('GET', '/');

    	$this->assertTrue($client->getResponse()->isOk());
	}

	function testGetApiCaptchaShouldBeOk()
	{
		$client = $this->createClient();
    	$crawler = $client->request('GET', '/api/captcha');

    	$this->assertTrue($client->getResponse()->isOk());
	}
}