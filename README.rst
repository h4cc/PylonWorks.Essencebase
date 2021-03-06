++++++++++++++++++++++++
Essencebase
++++++++++++++++++++++++

:Author: Michael Klapper <development@morphodo.com>
:Author: Marcel Silberhorn <c0d3+essencebase@childno.de>
:Description: TYPO3 Flow based test plan tool
:Homepage: http://www.pylonworks.com
:planning poker: http://kunagi.pylonworks.com/kunagi
:Build status: |buildStatusIcon|
:g+: http://plus.google.com/105875200743002032350
:fb: not (yet)





Update
================

Manual update on command line
------------

::

	sudo composer update pylonworks/essencebase

Flush cache
================

Default context
----------------
As default "Development" is used by TYPO3 Flow
::
	$ ./flow flow:cache:flush

Testing context
----------------

::

	$ FLOW_CONTEXT=Testing ./flow flow:cache:flush

Command line testing with PHPUnit
================

Unit tests
-------------

::

	phpunit -c Packages/Application/PylonWorks.Essencebase/Tests/Unit.xml

Functional tests
-------------

::

	phpunit -c Packages/Application/PylonWorks.Essencebase/Tests/Functional.xml

Create admin user
=================

::

	./flow admin:create admin@pylonworks.com passsword

TYPO3 Fluid XML namespace in PHPStorm
=================

General namespace declaration
-------------
Add the following namespace declaration to the ``Fluid`` templates in order to enable tag auto completion.
::
	<?xml version="1.0" encoding="UTF-8" ?>
	<html xmlns="http://www.w3.org/1999/xhtml"
		xmlns:bootstrap="http://www.pylonworks.pw/ns/TYPO3/Twitter/Bootstrap/ViewHelpers"
		xmlns:f="http://www.pylonworks.pw/ns/TYPO3/Fluid/ViewHelpers" lang="en">

Download XSD files
-------------

|downloadXsdFiles|

If the bulb doesn't appear, just hit alt-Enter

.. |buildStatusIcon| image:: https://travis-ci.org/PylonWorks/PylonWorks.Essencebase.png?branch=master
   :alt: Build Status
   :target: https://travis-ci.org/PylonWorks/PylonWorks.Essencebase

.. |downloadXsdFiles| image:: https://raw.github.com/PylonWorks/PylonWorks.Essencebase/master/Resources/Documentation/Images/IncludeXSD.png
