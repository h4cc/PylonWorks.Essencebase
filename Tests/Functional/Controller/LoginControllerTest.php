<?php

namespace PylonWorks\Essencebase\Tests\Functional\Controller;

/**
 * Created by JetBrains PhpStorm.
 * User: Michael Klapper
 * Date: 07.01.13
 * Time: 19:53
 * To change this template use File | Settings | File Templates.
 */
class LoginControllerTest extends \TYPO3\Flow\Tests\FunctionalTestCase {

	public function setUp() {
		parent::setUp();

		$this->registerRoute('loginForm', '', array(
			'@package' => 'PylonWorks.Essencebase',
			'@controller' => 'Login',
			'@action' => 'index',
			'@format' =>'html'
		));
		$this->registerRoute('Call authentication method', 'authenticate', array(
			'@package' => 'PylonWorks.Essencebase',
			'@controller' => 'Login',
			'@action' => 'authenticate',
			'@format' =>'html'
		));
	}

	/**
	 * @test
	 */
	public function outputContainsLoginForm() {
		$response = $this->browser->request('http://localhost/');
		$this->assertContains('Please sign in', $response->getContent());
		$this->assertEquals('200 OK', $response->getStatus());
	}
}
