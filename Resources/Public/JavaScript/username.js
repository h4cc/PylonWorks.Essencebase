define(['jquery', 'jquery-cookie'], function($) {
	$('#username span').text($.cookie('username'));
})