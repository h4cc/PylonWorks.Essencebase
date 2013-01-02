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
	 * Index action
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('navigationItems', array(
			array(
				'id' => 'navProjects',
				'label' => 'Projects',
				'items' => array(
					array(
						'label' => 'Show projects',
						'href' => "http://google.com"
					),
					array(
						'divider' => TRUE
					),
					array(
						'label' => 'New Project',
						'href' => "http://google.com"
					)
				)
			),
			array(
				'id' => 'navTasks',
				'label' => 'Tasks',
				'href' => "http://google.com"
			)
		));
	}

}

?>