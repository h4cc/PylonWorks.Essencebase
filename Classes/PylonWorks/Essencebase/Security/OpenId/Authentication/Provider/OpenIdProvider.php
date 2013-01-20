<?php
namespace PylonWorks\Essencebase\Security\OpenId\Authentication\Provider;

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Security\Authentication\Provider\AbstractProvider;

class OpenIdProvider extends AbstractProvider {

	/**
	 * Returns the classnames of the tokens this provider is responsible for.
	 *
	 * @return array The classname of the token this provider is responsible for
	 */
	public function getTokenClassNames()
	{
		// TODO: Implement getTokenClassNames() method.
	}

	/**
	 * Tries to authenticate the given token. Sets isAuthenticated to TRUE if authentication succeeded.
	 *
	 * @param \TYPO3\Flow\Security\Authentication\TokenInterface $authenticationToken The token to be authenticated
	 * @return void
	 */
	public function authenticate(\TYPO3\Flow\Security\Authentication\TokenInterface $authenticationToken)
	{
		// TODO: Implement authenticate() method.
	}

}