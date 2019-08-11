		$(document).ready(function() {
			$('#example').DataTable( {
				dom: 'Bfrtip',
				buttons: [
					//'copyHtml5',
					'excelHtml5',
					//'csvHtml5',
					'pdfHtml5'
				]
			} );
			
			/*
			$('#example').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
    } );
			*/
			
			/*
			$('#example').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
			*/
			
			
			
		} );
		
		
		/*
		For adding a new row
		
		$(document).ready(function() {
    var t = $('#example').DataTable();
    var counter = 1;
 
    $('#addRow').on( 'click', function () {
        t.row.add( [
            counter +'.1',
            counter +'.2',
            counter +'.3',
            counter +'.4',
            counter +'.5'
        ] ).draw( false );
 
        counter++;
    } );
 
    // Automatically add a first row of data
    $('#addRow').click();
} );
		*/


/*
 *This stub is used to select and deselect all the input checkboxes in a table 
 * $(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
});
 */