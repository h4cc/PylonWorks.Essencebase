++++++++++++++++++++++++
Essencebase
++++++++++++++++++++++++

:Author: Michael Klapper <development@morphodo.com>
:Author: Marcel Silberhorn
:Description: TYPO3 Flow based test plan tool
:Homepage: http://www.pylonworks.com
:Build status: |buildStatusIcon|

Update
================

Manual update on command line
------------

::

	sudo composer update pylonworks/essencebase


Testing
================

Command line PHPUnit test 
-------------

::

	phpunit -c Packages/Application/PylonWorks.Essencebase/Tests/Unit.xml


.. |buildStatusIcon| image:: https://travis-ci.org/PylonWorks/PylonWorks.Essencebase.png?branch=master
   :alt: Build Status
   :target: https://travis-ci.org/PylonWorks/PylonWorks.Essencebase
