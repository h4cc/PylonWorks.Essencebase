require.config({
	shim: {
		'bootstrap-dropdown' : ['jquery'],
		'jquery-cookie': ['jquery'],
		'username': ['jquery-cookie']
	}
});

require(['jquery', 'username', 'bootstrap-dropdown'], function($, username) {
	$('#dropdown').dropdown({});
})
