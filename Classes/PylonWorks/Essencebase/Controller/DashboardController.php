<?php
namespace PylonWorks\Essencebase\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "PylonWorks.Essencebase".*
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

/**
 * Dashboard controller for the PylonWorks.Essencebase package
 *
 * @Flow\Scope("singleton")
 */
class DashboardController extends \TYPO3\Flow\Mvc\Controller\ActionController {

	/**
	 * @var \TYPO3\Flow\Security\Context
	 * @Flow\Inject
	 */
	protected $securityContext;

	/**
	 * Index action
	 *
	 * @return void
	 */
	public function indexAction() {
		$account = $this->securityContext->getAccount();

		$this->view->assign('account', $account);
	}
}

?>