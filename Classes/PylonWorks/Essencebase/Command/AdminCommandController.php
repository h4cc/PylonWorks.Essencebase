<?php
namespace PylonWorks\Essencebase\Command;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "PylonWorks.Essencebase".*
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

/**
 * Admin command controller for the PylonWorks.Essencebase package
 *
 * @Flow\Scope("singleton")
 */
class AdminCommandController extends \TYPO3\Flow\Cli\CommandController {

	/**
	 * @var \TYPO3\Flow\Security\AccountRepository
	 * @Flow\Inject
	 */
	protected $accountRepository;

	/**
	 * @var \PylonWorks\Essencebase\Domain\Factory\UserFactory
	 * @Flow\Inject
	 */
	protected $userFactory;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Party\Domain\Repository\PartyRepository
	 */
	protected $partyRepository;

	/**
	 * Create new admin user account
	 *
	 * @param string $identifier Email address must be unique
	 * @param string $password At least 8 character
	 * @param string $role Default is set to: Administrator
	 *
	 * @return void
	 */
	public function createCommand($identifier, $password, $role = "Administrator") {
		try {
			$user = $this->userFactory->create($identifier, $password, $firstName = 'firstname', $lastName = 'lastname', array($role));
			$this->partyRepository->add($user);
			$this->accountRepository->add($user->getAccounts()->first());
			$this->outputLine("Created new admin user: %s", array($identifier));
		} catch (\TYPO3\Flow\Persistence\Exception\IllegalObjectTypeException $exception) {
			$this->outputLine("Admin user already exists.");
		}
	}
}

?>