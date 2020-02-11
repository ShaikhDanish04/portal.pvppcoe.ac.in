<?php
$sql = "SELECT * FROM users WHERE u_type='student'";
$result = $conn->query($sql);

$table = array();
$i = 0;

while ($row = $result->fetch_assoc()) {
    array_push($table, $row);
    // print_r($row);
}

$JSON_admission_form = json_encode($table);
// echo $JSON_admission_form;
// include('student_contraints.php');
?>

<script>
    var admission_form = JSON.parse('<?php echo $JSON_admission_form ?>');
</script>

<div class="fluid-container">
    <div class="col p-0">
        <textarea name="" id="" cols="30" rows="10">object</textarea>
        <div class="card">
            <div class="card-head">
                <p><i class="fa fa-database"></i> List of All Students</p>
            </div>
            <div class="card-body">
                <div class="pb-3">
                    <table id="reg_table" class="table display border-light mb-3"></table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-head">Mass Operation</div>
        <div class="card-body">
            <p class="h6">Student Selected</p>
            <div class="selected-students"></div>
        </div>
    </div>
</div>
<div class="data"></div>

<script>
    $(document).ready(function() {
        $('#reg_table').on('click', '.user-select', function() {

            if ($(this).prop("checked") == true) {
                if (!$("[id = '" + $(this).attr('data-uid') + "']").length) {
                    $('.selected-students').append(
                        $('<div id="' + $(this).attr('data-uid') + '"></div>').html('<span class="">' + $(this).attr('data-uid') + "</span>")
                    );
                    $("textarea").append($(this).attr('data-uid') + ',');
                }
            } else if ($(this).prop("checked") == false) {
                if ($("[id = '" + $(this).attr('data-uid') + "']").length) {
                    $("[id = '" + $(this).attr('data-uid') + "']").remove();

                    var $remove_val = $(this).attr('data-uid') + ',';

                    $("textarea").val($("textarea").val().replace($remove_val, ''));
                }
            }

        })

        $('#reg_table').on('click', '#checkAll', function() {
            $('.user-select:checkbox').prop('checked', this.checked);
            if ($(this).prop("checked") == true) {
                $.each($(".user-select:checked"), function() {
                    if ($(this).prop("checked") == true) {
                        if (!$("[id = '" + $(this).attr('data-uid') + "']").length) {
                            $('.selected-students').append(
                                $('<div id="' + $(this).attr('data-uid') + '"></div>').html('<span class="">' + $(this).attr('data-uid') + "</span>")
                            );
                        }
                    }
                });
            } else if ($(this).prop("checked") == false) {
                $('.selected-students').html("");
            }
        });


        $('#reg_table').on('click', '.user-ref', function() {

            $.post("view/student_section/student_database/student_contraints.php", {
                    user_uid_form: $(this).attr('data-uid')
                },
                function(data, status) {
                    // alert("Data: " + data + "\nStatus: " + status);
                    $('.data').html(data);
                    $(".SC-modal").modal("show");
                });
        })

        $('#reg_table').DataTable({
            dom: 'Bfrtip',
            // "scrollX": true,
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [{
                    extend: 'copyHtml5',
                    title: 'registeration_table',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: 'registeration_table',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: 'registeration_table',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'pageLength',
                'colvis'
            ],
            "data": admission_form,
            "columns": [{
                    "title": '<input type="checkbox" id="checkAll">',
                    "data": "INS_ID",
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            data = '<input class="user-select" data-uid="' + data + '" type="checkbox">';
                        }
                        return data;
                    },
                    "orderable": false
                }, {
                    "title": "Sr. No."
                },
                {
                    "title": "College ID",
                    "data": "INS_ID"
                },
                {
                    "title": "First Name",
                    "data": "u_fname"
                },
                {
                    "title": "Last Name",
                    "data": "u_lname"
                },
                {
                    "title": "Email",
                    "data": "u_email"
                }, {
                    "title": "Constraints",
                    "data": "UID",
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            data = '<button class="btn btn-primary d-block mx-auto btn-sm user-ref" data-uid="' + data + '"> View </button>';
                        }
                        return data;
                    }
                }
            ],
            "columnDefs": [{
                "render": function(data, type, full, meta) {
                    // admission_form[meta.row].id = meta.row + 1; // adds id to dataset
                    return meta.row + 1; // adds id to serial no
                },
                "targets": 1
            }]
        });


    });
</script>

<style>
    #reg_table {
        width: 100% !important;
        display: block;
        overflow: hidden;
        transition: .5s;
    }

    .user-select {
        height: 20px;
        width: 20px;
    }
</style>