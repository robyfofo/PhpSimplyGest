/* contacts/listItem.js v.1.0.0. 28/02/2017 */
var requestSent = false;

$(document).ready(function() {
	$('#listDataID').DataTable( {
		responsive: true,
		processing: true,
		serverSide: true,
		stateSave: true,
			ajax: {
		 	type: "GET",
		 	url: siteUrl+CoreRequestAction+"/listAjaxItem",
		 	async: "true",
			cache: "false",
			dataSrc: function (json) {
				alertDelete();
				return json.data;
            }       
		 	},	
		columns: [
			{data: "id"},
			{data: "name"},
			{data: "surname"},
			{data: "email"},
			{data: "actions"}
			],
		columnDefs: [
    		{orderable: false, "targets": 4},
    		{className: "text-right",targets: 4},
  			],
		language: {
			sSearch: lang['search'],
         lengthMenu: lang['lengthMenu'],
         zeroRecords: lang['zeroRecords'],
         info: lang['datatableInfo'],
         infoEmpty: lang['infoEmpty'],
         infoFiltered: lang['infoFiltered'],
         loadingRecords: lang['loadingRecords'],
    		processing:     lang['processing'],
         paginate: {
        		first:      lang['paginate']['first'],
        		last:       lang['paginate']['last'],
        		next:       lang['paginate']['next'],
        		previous:   lang['paginate']['previous']
    			}
      	}	 
		});
		
	});


function alertDelete() {
	$("#listDataID").on('click','.confirmdelete',function(e) {
		e.preventDefault(e);
		var location = $(this).attr('href');
		bootbox.confirm(messages['Sei sicuro?'],function(confirmed) {
			if(confirmed) {
				window.location.replace(location);
				}
			});
		});     
	};
