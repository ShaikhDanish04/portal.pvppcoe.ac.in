<div class="fluid-container">
    <div class="row">
        <div class="col-md-3 p-0">
            <div class="head-card bg-success-gradient">
                <div>
                    <span class="count total-forms">0</span>
                    <p>Total Forms</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 p-0">
            <div class="head-card bg-secondary-gradient">
                <div>
                    <span class="count verified-forms">0</span>
                    <p>Verified Forms</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 p-0">
            <div class="head-card bg-warning-gradient">
                <div>
                    <span class="count pending-forms">0</span>
                    <p>Pending Forms</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 p-0">
            <div class="head-card bg-danger-gradient">
                <div>
                    <span class="count rejected-forms">0</span>
                    <p>Rejected Forms</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col p-0">
             <div class="card">
            <div class="card-head">
                <p><i class="fa fa-database"></i> List of Admission</p>
                <button id="reload_table" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
            </div>
            <div class="card-body">
                <div class="pb-3">
                    <div id="data"></div>

                    <!-- <table id="reg_table" class="table display border-light mb-3"> -->
                    <style>
                        .table td,
                        .table th {
                            vertical-align: middle;
                        }

                        .table .ref-td {
                            padding: 0px;
                            display: flex;
                            align-items: center;
                            justify-content: space-between;
                        }
                    </style>
                    <!-- </table> -->

                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $("#data").load("view/student_section/admission/admission_form_table.php");
        
        $('#reload_table').click(function(){
            $("#data").load("view/student_section/admission/admission_form_table.php");
        })
        
    })
</script>

<script>
    // $(document).ready(function() {

    //     var t = $('#reg_table').DataTable({
    //         dom: 'Bfrtip',
    //         // "scrollX": true,
    //         lengthMenu: [
    //             [10, 25, 50, -1],
    //             ['10 rows', '25 rows', '50 rows', 'Show all']
    //         ],
    //         buttons: [{
    //                 extend: 'copyHtml5',
    //                 title: 'registeration_table',
    //                 exportOptions: {
    //                     columns: [0, ':visible']
    //                 }
    //             },
    //             {
    //                 extend: 'excelHtml5',
    //                 title: 'registeration_table',
    //                 exportOptions: {
    //                     columns: ':visible'
    //                 }
    //             },
    //             {
    //                 extend: 'pdfHtml5',
    //                 title: 'registeration_table',
    //                 exportOptions: {
    //                     columns: ':visible'
    //                 }
    //             },
    //             'pageLength',
    //             {
    //                 extend: 'colvisGroup',
    //                 text: 'Default',
    //                 className: 'button-primary',
    //                 show: [0],
    //                 hide: [4, 5, 6, 9, 10, 11, 12, 13, 15, 16, 17, 18, 19, 20, 21, 22, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45]
    //                 // hide: 'hidden'
    //             },
    //             {
    //                 extend: 'colvisGroup',
    //                 text: 'Show all',
    //                 show: ':hidden'
    //             },
    //             'colvis'
    //         ],
    //         "data": admission_form,
    //         "columns": [{
    //                 "title": "Sr. No."
    //             }, {
    //                 "title": "UID",
    //                 "data": "u_uid",
    //                 "render": function(data, type, row, meta) {
    //                     if (type === 'display') {
    //                         data = '<a href="">' + data + '</a>';
    //                     }
    //                     return data;
    //                 }
    //             },
    //             {
    //                 "title": "C_UID",
    //                 "data": "C_UID"
    //             }
    //         ],
    //         "columnDefs": [{
    //             "render": function(data, type, full, meta) {
    //                 admission_form[meta.row].id = meta.row + 1; // adds id to dataset
    //                 return meta.row + 1; // adds id to serial no
    //             },
    //             "targets": 0
    //         }]
    //     });
    // });
</script>

<style>
    #reg_table {
        width: 100% !important;
        display: block;
        overflow: hidden;
        transition: .5s;
    }
</style>