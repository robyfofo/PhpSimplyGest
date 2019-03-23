/* timecard/pitems.js v.1.0.0. 03/03/2019 */
var requestSent = false;

$(document).ready(function() {
	$('#listDataID').DataTable( {
		responsive: true,
		processing: true,
		serverSide: true,
		stateSave: true,
		ajax: {
		 	type: "GET",
		 	url: siteUrl+CoreRequestAction+"/listAjaxAite",
		 	async: "true",
			cache: "false",
			dataSrc: function (json) {				
				return json.data;
            },            
		},	
		"drawCallback": function(settings) {
			 alertDelete();
			 exportFormat();
      },
		order: 
		[
			[ 4, "desc" ]
		],
		columns: [
			{data: "id"},
			{data: "id_user"},
			{data: "project"},
			{data: "content"},
			{data: "datains"},
			{data: "starttime"},
			{data: "endtime"},
			{data: "worktime"},
			{data: "actions"}
			],
		columnDefs: [
    		{orderable: false, "targets": 8},
    		{className: "text-right",targets: 8},
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
	
function exportFormat() {
	$("#listDataID").on('click','.export',function(e) {
		e.preventDefault(e);
		var table = $('#listDataID').DataTable();
		var filter = table.search();
		var location = siteUrl+CoreRequestAction+'/exportXlsAite';
		if (filter != '') location = location +'/'+filter;
		window.location.replace(location);
	});
}     

	
	