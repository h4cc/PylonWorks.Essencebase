<?php
namespace PylonWorks\Essencebase\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "PylonWorks.Essencebase".*
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Test plan
 *
 * @Flow\Entity
 */
class TestPlan {

	/**
	 * The name
	 * @var string
	 */
	protected $name;

	/**
	 * The active
	 * @var boolean
	 */
	protected $active;

	/**
	 * @var \PylonWorks\Essencebase\Domain\Model\Project
	 * @ORM\ManyToOne(inversedBy="testPlan")
	 */
	protected $project;

	/**
	 * Get the Test plan's name
	 *
	 * @return string The Test plan's name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets this Test plan's name
	 *
	 * @param string $name The Test plan's name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Get the Test plan's active
	 *
	 * @return boolean The Test plan's active
	 */
	public function getActive() {
		return $this->active;
	}

	/**
	 * Sets this Test plan's active
	 *
	 * @param boolean $active The Test plan's active
	 * @return void
	 */
	public function setActive($active) {
		$this->active = $active;
	}

}
?>