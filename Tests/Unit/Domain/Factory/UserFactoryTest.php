<?php
namespace PylonWorks\Essencebase\Domain\Factory;

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Security\AccountFactory;

/**
 * Created by JetBrains PhpStorm.
 * User: silberhorn
 * Date: 21.01.13
 * Time: 02:00
 */
class UserFactoryTest extends \TYPO3\Flow\Tests\UnitTestCase {

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
		$userFactory = new UserFactory();

		$this->assertInstanceOf("\TYPO3\Party\Domain\Model\Person", $userFactory->create("test", "user"));
	}
}