/* admin/site-pages/pagesList.js.php v.4.0.0. 24/05/2017 */

$(document).ready(function() {
	
	$('.tree').treegrid({
		'initialState': 'collapsed',
		'saveState': true,
		});
	
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false,
		show_title: false    
		});
		
	});