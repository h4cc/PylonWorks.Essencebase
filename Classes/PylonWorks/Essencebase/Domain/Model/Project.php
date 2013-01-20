<?php
namespace PylonWorks\Essencebase\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "PylonWorks.Essencebase".*
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Project
 *
 * @Flow\Entity
 */
class Project {

	/**
	 * The name
	 * @var string
	 */
	protected $name;

	/**
	 * The test plan
	 * @var \PylonWorks\Essencebase\Domain\Model\TestPlan
	 * @ORM\OneToMany(mappedBy="project")
	 */
	protected $testPlan;


	/**
	 * Get the Project's name
	 *
	 * @return string The Project's name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets this Project's name
	 *
	 * @param string $name The Project's name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Get the Project's test plan
	 *
	 * @return \PylonWorks\Essencebase\Domain\Model\TestPlan The Project's test plan
	 */
	public function getTestPlan() {
		return $this->testPlan;
	}

	/**
	 * Sets this Project's test plan
	 *
	 * @param \PylonWorks\Essencebase\Domain\Model\TestPlan $testPlan The Project's test plan
	 * @return void
	 */
	public function setTestPlan($testPlan) {
		$this->testPlan = $testPlan;
	}

}
?>