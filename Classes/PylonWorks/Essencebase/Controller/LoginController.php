<?php
namespace PylonWorks\Essencebase\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "PylonWorks.Essencebase".*
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

/**
 * Login controller for the PylonWorks.Essencebase package
 *
 * @Flow\Scope("singleton")
 */
class LoginController extends \TYPO3\Flow\Security\Authentication\Controller\AbstractAuthenticationController {

	/**
	 * @var \TYPO3\Flow\Security\Authentication\AuthenticationManagerInterface
	 * @Flow\Inject
	 */
	protected $authenticationManager;

	/**
	 * @var \TYPO3\Flow\Security\AccountRepository
	 * @Flow\Inject
	 */
	protected $accountRepository;

	/**
	 * @var \TYPO3\Flow\Security\AccountFactory
	 * @Flow\Inject
	 */
	protected $accountFactory;

	/**
	 * @var \TYPO3\Flow\Log\SecurityLoggerInterface
	 * @Flow\Inject
	 */
	protected $securityLogger;

	/**
	 * Index action
	 *
	 * @return void
	 */
	public function indexAction() {

	}

	/**
	 * @throws \TYPO3\Flow\Security\Exception\AuthenticationRequiredException
	 * @return void
	 */
	public function authenticateAction() {

		$this->securityLogger->log("called authenticate");

		try {
			$this->securityLogger->log("called authenticate - 2");
			$this->authenticationManager->authenticate();
			$this->securityLogger->log("called authenticate - 3");
			$this->flashMessageContainer->addMessage(new \TYPO3\Flow\Error\Error('Successfully logged in.'));
			$this->redirect('index', 'Login');
		} catch (\TYPO3\Flow\Security\Exception\AuthenticationRequiredException $exception) {
			$this->securityLogger->log("called authenticate - 4");
			$this->flashMessageContainer->addMessage(new \TYPO3\Flow\Error\Error('Wrong username or password.'));
			$this->flashMessageContainer->addMessage(new \TYPO3\Flow\Error\Error($exception->getMessage()));
			throw $exception;
		}
	}

	/**
	 * Is called if authentication was successful. If there has been an
	 * intercepted request due to security restrictions, you might want to use
	 * something like the following code to restart the originally intercepted
	 * request:
	 *
	 * if ($originalRequest !== NULL) {
	 *     $this->redirectToRequest($originalRequest);
	 * }
	 * $this->redirect('someDefaultActionAfterLogin');
	 *
	 * @param \TYPO3\Flow\Mvc\ActionRequest $originalRequest The request that was intercepted by the security framework, NULL if there was none
	 *
	 * @return string
	 */
	protected function onAuthenticationSuccess(\TYPO3\Flow\Mvc\ActionRequest $originalRequest = NULL) {
		// TODO: Implement onAuthenticationSuccess() method.

		$this->securityLogger->log("called onAuthenticationSuccess");

	}

	public function logoutAction() {
		$this->authenticationManager->logout();
		$this->flashMessageContainer->addMessage(new \TYPO3\Flow\Error\Error('Successfully logged out.'));
		$this->redirect('index', 'Login');
	}

	/**
	 *
	 */
	public function loginAction() {
		$this->securityLogger->log("called loginAction");
		if ($this->securityContext->getAccount() !== NULL) {
			$this->securityLogger->log("called loginAction - success");
			$this->redirect('index', 'Dashboard');
		} else {
			$this->securityLogger->log("called loginAction - failed, redirect back to loginAction");
			parent::loginAction();
		}
	}
}
?>