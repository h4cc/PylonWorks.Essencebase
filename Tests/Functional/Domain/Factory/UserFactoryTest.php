<?php
namespace PylonWorks\Essencebase\Tests\Functional\Domain\Factory;

use TYPO3\Flow\Annotations as Flow;
use PylonWorks\Essencebase\Domain\Factory\UserFactory;
use TYPO3\Flow\Security\AccountFactory;

/**
 * Created by JetBrains PhpStorm.
 * User: silberhorn
 * Date: 21.01.13
 * Time: 02:00
 */
class UserFactoryTest extends \TYPO3\Flow\Tests\FunctionalTestCase {

	/**
	 * @var \PylonWorks\Essencebase\Domain\Factory\UserFactory
	 * @Flow\Inject
	 */
	protected $userFactory;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Security\AccountFactory
	 */
	protected $accountFactory;


	/*
	protected function setUp()
	{
		$this->userFactory = new UserFactory();
		$this->accountFactory = new AccountFactory();
	}
	*/

	/**
	 * @test
	 */
	public function testCreate() {
		/* @var \PylonWorks\Essencebase\Domain\Factory\UserFactory $userFactory */
		$userFactory = new UserFactory();

		$this->assertInstanceOf("\TYPO3\Party\Domain\Model\Person", $userFactory->create("test", "user"));
	}
}