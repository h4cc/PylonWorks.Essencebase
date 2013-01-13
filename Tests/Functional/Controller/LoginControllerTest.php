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

	/**
	 * @var boolean
	 */
	protected $testableSecurityEnabled = TRUE;

	/**
	 * @var boolean
	 */
	static protected $testablePersistenceEnabled = TRUE;

	/**
	 * @var string
	 */
	protected $userName = 'functional_test_account';

	/**
	 * @var string
	 */
	protected $password = 'a_very_secure_long_password';

	public function setUp() {
		parent::setUp();
		$accountRepository = $this->objectManager->get('\TYPO3\Flow\Security\AccountRepository');
		$accountFactory = $this->objectManager->get('\TYPO3\Flow\Security\AccountFactory');

		$account = $accountFactory->createAccountWithPassword($this->userName, $this->password, array('Administrator'), 'TestingProvider');
		$accountRepository->add($account);
		$this->persistenceManager->persistAll();

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
		$this->registerRoute('Call dashboard', 'dashboard', array(
			'@package' => 'PylonWorks.Essencebase',
			'@controller' => 'Dashboard',
			'@action' => 'index',
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

	/**
	 * @test
	 */
	public function canSubmitLoginFormAndGetAccessToDashboard() {
		$this->browser->request('http://localhost/');
		$loginForm = $this->browser->getForm();
		$loginForm->setValues(array(
			'__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][username]' => $this->userName,
			'__authentication[TYPO3][Flow][Security][Authentication][Token][UsernamePassword][password]' => $this->password,
		));
		$response = $this->browser->submit($loginForm);
		$this->assertNotEquals('#1222268609: ', $response->getHeader('X-Flow-ExceptionCode'));
		$this->assertContains("Successfully logged in", $response->getContent());
	}
}
