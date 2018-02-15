$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load
$(function() {
	$(window).bind("load", function() {
		if ($(this).width() < 768) {
			$('div.sidebar-collapse').addClass('collapse')
			} else {
				$('div.sidebar-collapse').removeClass('collapse')
				}
		})
	})

//Collapses the sidebar on window resize
$(function() {
	$(window).bind("resize", function() {
		if ($(this).width() < 768) {
			$('div.sidebar-collapse').addClass('collapse')
			} else {
				$('div.sidebar-collapse').removeClass('collapse')
     			}
		})
	})


$(function () {
	$("a.confirm").click(function(e) {
	    e.preventDefault();
	    var location = $(this).attr('href');
	    bootbox.confirm(messages['Sei sicuro?'],function(confirmed) {
	        if(confirmed) {
	        window.location.replace(location);
	        }
	    });
	});     
});