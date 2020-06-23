$(function(e) {
	$('#provinceTable').dataTable( {
	"language": {
	"search": "Filter by province:"
	}
	} );
	$('#populationTable').dataTable( {
	"language": {
	"search": "Filter by population:"
	}
	} );
	$('#examples1').DataTable();
	$('#packages').DataTable( {
		 "bFilter": false,
		 "lengthChange": false,
		 "pageLength": 20,
		  "scrollX": true,
		  "ordering": false
	});
	var table = $('#example1').DataTable();
	/* $('button').on("click", function(e) {
		var data = table.$('input, select').serialize();
		alert(
			"The following data would have been submitted to the server: \n\n"+
			data.substr( 0, 120 )+'...'
		);
		return false;
	}); */
	$('#example2').DataTable( {
		"scrollY":        "200px",
		"scrollCollapse": true,
		"paging":         false
	});
	 $('#example3').DataTable( {
		responsive: {
			details: {
				display: $.fn.dataTable.Responsive.display.modal( {
					header: function ( row ) {
						var data = row.data();
						return 'Details for '+data[0]+' '+data[1];
					}
				} ),
				renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
					tableClass: 'table'
				} )
			}
		}
	});
	var table = $('#example').DataTable( {
		lengthChange: false,
		buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
	} );
	table.buttons().container()
		.appendTo( '#example_wrapper .col-md-6:eq(0)');
		
	//sample datatable	
	$('#example-2').DataTable();
	
	//Details display datatable
	$('#example-1').DataTable( {
		responsive: {
			details: {
				display: $.fn.dataTable.Responsive.display.modal( {
					header: function ( row ) {
						var data = row.data();
						return 'Details for '+data[0]+' '+data[1];
					}
				} ),
				renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
					tableClass: 'table'
				} )
			}
		}
	} );
});