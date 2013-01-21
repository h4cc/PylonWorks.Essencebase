<?php
namespace PylonWorks\Essencebase\Domain\Factory;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "PylonWorks.Essencebase".*
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Party\Domain\Model\PersonName;
use TYPO3\Party\Domain\Model\Person;

/**
 * A factory to create User models
 *
 * @Flow\Scope("singleton")
 */
class UserFactory {

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Security\AccountFactory
	 */
	protected $accountFactory;

	/**
	 * @param string $identifier The username of created user.
	 * @param string $password Password of created user.
	 * @param string $firstName First name of created user.
	 * @param string $lastName Last name of created user.
	 * @param array $roles List of roles the user becomes.
	 * @return \TYPO3\Party\Domain\Model\Person
	 */
	public function create($identifier, $password, $firstName = 'tee', $lastName = 'ssss', array $roles = array('Tester')) {
		/** @var \TYPO3\Party\Domain\Model\Person $user */
		$user = new Person();
		/** @var \TYPO3\Party\Domain\Model\PersonName $name */
		$name = new PersonName('', $firstName, '', $lastName);

		$user->setName($name);
		$account = $this->accountFactory->createAccountWithPassword($identifier, $password, $roles);
		$user->addAccount($account);

		return $user;
	}
}
