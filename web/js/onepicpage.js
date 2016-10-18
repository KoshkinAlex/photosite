$(document).ready(function(){
	resizeField();
});

$(window).resize(function() {
	resizeField();
});

function resizeField () {
	$('#picTable').height($(window).height() - 220);
}


$('#picInfo textarea').live('click', function(e) {
	$(this).select();
	return false;
});

$('#codeInsertButton').live('click', function(e) {
	$('#codeTextarea').toggle();
	$('#codeTextarea').focus();
	$('#codeTextarea').select();
	return false;
});


$('a.srvIA, .srvIA a').live('click', function( event ) {
	var href = $(this).attr('href');	
	var $container = $(this).closest('.srvUC');
	$container.addClass('loading');
	$.post(href, null, function(html){ $container.html(html); $container.removeClass('loading'); });
	return false;
});
