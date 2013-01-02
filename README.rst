TODO
************
Update file ``/var/www/essencebase/sandbox/Configuration/Routes.yaml`` and replace the welcome package settings with:

::
	-
      name: 'PylonWorksEssencebase'
      uriPattern: '<PylonWorksEssencebaseSubroutes>'
      defaults:
        '@format': 'html'
      subRoutes:
        PylonWorksEssencebaseSubroutes:
          package: PylonWorks.Essencebase

