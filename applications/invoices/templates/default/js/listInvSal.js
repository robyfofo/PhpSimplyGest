/* invoices/listInvSal.js v.1.0.0. 12/04/2018 */
var requestSent = false;

$(document).ready(function() {
	$('#listDataID').DataTable( {
		responsive: true,
		processing: true,
		serverSide: true,
		stateSave: true,
		order: [
			[ 1, "desc" ]
			],
		columns: [
			{data: "id"},
			{data: "dateinslocal" },
			{data: "datescalocal" },
			{data: "customer" },
			{data: "number" },
			{data: "note" },
			{data: "total" },
			{data: "totaltaxes" },
			{data: "totalinvoice" },
			{data: "articles" },
			{data: "pdf" },
			{data: "actions" }
			],
		columnDefs: [
			{orderable: false, "targets": 9},
			{orderable: false, "targets": 10},
    		{orderable: false, "targets": 11},
    		{className: "text-right", "targets": 6},
    		{className: "text-right", "targets": 7},
    		{className: "text-right", "targets": 8},
    		{className: "text-right", "targets": 9},
    		{className: "text-right", "targets": 10}
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
      	},
      ajax: {
		 	type : "GET",
		 	url : siteUrl+CoreRequestAction+"/listAjaxInvSal",
		 	async: "true",
			cache: "false",
			dataSrc: function ( json ) {
				//Make your callback here.
				alertDelete();
				return json.data;
            }       
		 	}
     
		 
    } );
		
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