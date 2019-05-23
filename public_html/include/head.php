<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="icon" type="image/png" href="./resources/img/logo_exertime.png" />

<link rel="stylesheet" media="screen" href="resources/css/reset.css">
<link rel="stylesheet" media="screen" href="resources/css/style.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="resources/js/modal_edit.js"></script>


<!-- datatable plugin (https://datatables.net/examples/data_sources/server_side) -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<!-- <script type="text/javascript" src="resources/js/jquery.dataTables.min.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="resources/css/jquery.dataTables.min.css"> -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable( {
            "processing": true,
            "scrollY": 500,
            "scrollCollapse": true,
            "lengthMenu": [[3, 5, 10, 20, -1], [3, 5, 10, 20, "All"]],
            "pageLength": 5
        } );
    } );
</script>
