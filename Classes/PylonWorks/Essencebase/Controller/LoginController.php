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
	 * Index action
	 *
	 * @return void
	 */
	public function indexAction() {
	}

	/**
	 * Is called if authentication was successful. If there has been an
	 * intercepted request due to security restrictions, you might want to use
	 * something like the following code to restart the originally intercepted
	 * request:
	 *
	 * @param \TYPO3\Flow\Mvc\ActionRequest $originalRequest The request that was intercepted by the security framework, NULL if there was none
	 *
	 * @return string
	 */
	protected function onAuthenticationSuccess(\TYPO3\Flow\Mvc\ActionRequest $originalRequest = NULL) {
		$this->flashMessageContainer->addMessage(new \TYPO3\Flow\Error\Message('Successfully logged in.', NULL, array(), 'Welcome!'));
		$this->redirect('index', 'Dashboard');
	}

	/**
	 * Is called if authentication failed.
	 *
	 * @param \TYPO3\Flow\Security\Exception\AuthenticationRequiredException $exception The exception thrown while the authentication process
	 * @return void
	 */
	protected function onAuthenticationFailure(\TYPO3\Flow\Security\Exception\AuthenticationRequiredException $exception = NULL) {
		$this->flashMessageContainer->addMessage(new \TYPO3\Flow\Error\Error('Authentication failed!', ($exception === NULL ? 1347016771 : $exception->getCode())));
		$this->redirect('index', 'Login');
	}

	/**
	 * Logout action
	 *
	 * @return void
	 */
	public function logoutAction() {
		parent::logoutAction();
		$this->flashMessageContainer->addMessage(new \TYPO3\Flow\Error\Message('Successfully logged out.'));
		$this->redirect('index', 'Login');
	}
}
?>