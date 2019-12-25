
<!--   Core JS Files   -->
<script src="{{ asset("/Backend") }}/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="{{ asset("/Backend") }}/assets/js/core/popper.min.js"></script>
<script src="{{ asset("/Backend") }}/assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="{{ asset("/Backend") }}/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="{{ asset("/Backend") }}/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset("/Backend") }}/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Chart JS -->
<script src="{{ asset("/Backend") }}/assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset("/Backend") }}/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="{{ asset("/Backend") }}/assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="{{ asset("/Backend") }}/assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset("/Backend") }}/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="{{ asset("/Backend") }}/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset("/Backend") }}/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Sweet Alert -->
<script src="{{ asset("/Backend") }}/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Atlantis JS -->
<script src="{{ asset("/Backend") }}/assets/js/atlantis.min.js"></script>

<!-- Toastr js file -->
<script src="{{ asset("/toastr") }}/toastr.js"></script>

<script>
    toastr.options = {
        "newestOnTop": true,
        "timeOut": "5000",
        "showMethod": "slideDown",
    }
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
    @if(Session::has('error'))
    toastr.success("{{ Session::get('error') }}")
    @endif
    @if(Session::has('info'))
    toastr.success("{{ Session::get('info') }}")
    @endif
    @if(Session::has('warning'))
    toastr.success("{{ Session::get('warning') }}")
    @endif

</script>
<!-- Toastr js file end-->

<script>
    $('#lineChart').sparkline([102,109,120,99,110,105,115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: 'rgba(255, 255, 255, .5)',
        fillColor: 'rgba(255, 255, 255, .15)'
    });

    $('#lineChart2').sparkline([99,125,122,105,110,124,115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: 'rgba(255, 255, 255, .5)',
        fillColor: 'rgba(255, 255, 255, .15)'
    });

    $('#lineChart3').sparkline([105,103,123,100,95,105,115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: 'rgba(255, 255, 255, .5)',
        fillColor: 'rgba(255, 255, 255, .15)'
    });
</script>

<script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({

        });

        $('#multi-filter-select').DataTable( {
            "pageLength": 5,
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });

        // Add Row
        $('#add-row').DataTable({
            // "pageLength": 5,
        });

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
            ]);
            $('#addRowModal').modal('hide');

        });
    });
</script>

<!-- ckeditor js CDN Call-->
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'long_description' );
</script>
<!-- ckeditor js CDN Call end-->


 <!-- ckeditor JS -->
{{-- <script src="{{ asset("/Backend/ckeditor") }}/ckeditor.js"></script>
 <script src="{{ asset("/Backend/ckeditor") }}/sample.js"></script>

<script>
    initSample();
</script>--}}
<!-- ckeditor JS end -->
