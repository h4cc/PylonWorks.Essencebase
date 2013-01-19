require.config({
	shim: {
		'bootstrap-dropdown' : ['jquery']
	}
});

require(['jquery', 'bootstrap-dropdown'], function($) {
	$('#dropdown').dropdown({

	});
})
