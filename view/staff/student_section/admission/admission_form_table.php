<style>
    .status {
        font-size: 18px;
    }

    .form-edit .slider {
        cursor: not-allowed;
    }

    .table {
        overflow-x: scroll;
        display: block;
        max-width: 100%;
    }

    .head-search {
        width: calc(100% + 20px);
        margin: 0px;
        font-size: 14px;
        height: 0px;
        padding: 0px;
        opacity: 0;
        transition: .2s;
        transition-delay: 0s;
    }

    th:hover .head-search {
        transition-delay: .5s;
        margin: 5px -10px;
        padding: 5px;
        opacity: 1;
        height: 100%;
    }

    th.search-on {
        color: #007bff;
        border-bottom: 3px solid #007bff !important;
    }

    .selected-students {
        display: flex;

    }

    .selected-student {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0px 12px;
        border: 1px solid #b8b8b8;
        border-radius: 5rem;
        background: #f2f2f2;
        box-shadow: 2px 1px 13px #d2d2d2;
        margin: 0px 4px;
    }

    .selected-student .remove-student {
        padding: 5px;
        cursor: pointer;
    }
</style>
<?php
include('../../../../connect.php');

$sql = "SELECT * FROM student_admission_table";
$result = $conn->query($sql);

$table = array();
$JSON_admission_form = "";
$i = 0;
while ($row_admission = $result->fetch_assoc()) {
    $UID = $row_admission['UID'];
    $JSON_admission_form .= json_encode(
        array_merge(
            array("UID" => $row_admission['UID']),
            json_decode(openssl_decrypt($row_admission['personal'], "AES-128-CTR", "$UID", 0, $iv), true),
            json_decode(openssl_decrypt($row_admission['address'], "AES-128-CTR", "$UID", 0, $iv), true),
            json_decode(openssl_decrypt($row_admission['allotment'], "AES-128-CTR", "$UID", 0, $iv), true),
            json_decode(openssl_decrypt($row_admission['education'], "AES-128-CTR", "$UID", 0, $iv), true),
            json_decode(openssl_decrypt($row_admission['bank'], "AES-128-CTR", "$UID", 0, $iv), true),
            json_decode(openssl_decrypt($row_admission['family'], "AES-128-CTR", "$UID", 0, $iv), true),
            array("form_status" => $row_admission['form_status'])
        )
    );
    if (++$i != $result->num_rows)
        $JSON_admission_form .= ",";
}
// print_r($JSON_admission_form);
?>
<script>
    var admission_form = JSON.parse('[<?php echo $JSON_admission_form ?>]');

    $(document).ready(function() {

        pending_count = 0;
        verified_count = 0;
        rejected_count = 0;
        not_filled = 0;


        for (var i = 0; i < admission_form.length; i++) {
            switch (admission_form[i]["form_status"]) {
                case "pending":
                    pending_count++;
                    break;
                case "verified":
                    verified_count++;
                    break;
                case "rejected":
                    rejected_count++;
                    break;
                case "not_filled":
                    not_filled++;
                    break
            }
        }

        $('.pending-forms').text(pending_count);
        $('.verified-forms').text(verified_count);
        $('.rejected-forms').text(rejected_count);

        $('.total-forms').text(pending_count + verified_count + rejected_count + not_filled);

        $('#admission_table').on('mouseenter', '.head-search', function() {
            $(this).focus();
            $($(this).closest('th')).addClass('search-on');
        })
        $('#admission_table').on('mouseleave', '.head-search', function() {
            $(this).focus();
            if ($(this).val() == "") {
                $($(this).closest('th')).removeClass('search-on');
            }
        })
        $('#admission_table').on('click', '.user-ref', function() {
            $("#admission_modal").modal("show");

            $.post("view/staff/student_section/admission/admission_form_review.php", {
                    user_uid_form: $(this).attr('data-uid')
                },
                function(data, status) {
                    // alert("Data: " + data + "\nStatus: " + status);
                    $('#admission_modal .modal-body').html(data);
                });
        })
        $.fn.dataTable.ext.errMode = 'none';
        $('#admission_table').dataTable({
            dom: 'Bfrtip',
            // "scrollX": true,
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [{
                    extend: 'copyHtml5',
                    title: 'admission_table',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                }, {
                    extend: 'excelHtml5',
                    title: 'admission_table',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    extend: 'pdfHtml5',
                    title: 'admission_table',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'pageLength', {
                    extend: 'colvisGroup',
                    text: 'Default',
                    className: 'btn btn-primary',
                    // show: [0],
                    hide: [5, 6, 9, 11, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81],

                }, {
                    extend: 'colvisGroup',
                    text: 'Show all',
                    show: ':hidden'
                },
                'colvis'
            ],
            "data": admission_form,
            "columns": [{
                "title": "Sr. No."
            }, {
                "title": "College ID",
                "data": "C_UID"
            }, {
                "title": "GR No.",
                "data": "GR_NO"
            }, {
                "title": "First Name",
                "data": "first_name"
            }, {
                "title": "Last Name",
                "data": "last_name"
            }, {
                "title": "Father's Name",
                "data": "father_name"
            }, {
                "title": "Mother's Name",
                "data": "mother_name"
            }, {
                "title": "Email",
                "data": "u_email"
            }, {
                "title": "Contact",
                "data": "phone_number"
            }, {
                "title": "Birth Place",
                "data": "birth_place"
            }, {
                "title": "Gender",
                "data": "gender"
            }, {
                "title": "Blood Group",
                "data": "blood_group"
            }, {
                "title": "Category",
                "data": "category"
            }, {
                "title": "Religion",
                "data": "religion"
            }, {
                "title": "Sub Cast",
                "data": "sub_cast"
            }, {
                "title": "Nationality",
                "data": "nationality"
            }, {
                "title": "Address",
                "data": "address"
            }, {
                "title": "Country",
                "data": "country"
            }, {
                "title": "State",
                "data": "state"
            }, {
                "title": "City",
                "data": "city"
            }, {
                "title": "Taluka",
                "data": "taluka"
            }, {
                "title": "District",
                "data": "district"
            }, {
                "title": "Pin Code",
                "data": "pin_code"
            }, {
                "title": "Admission Batch",
                "data": "admission-batch"
            }, {
                "title": "Admission Type",
                "data": "admission_type"
            }, {
                "title": "Branch Admitted",
                "data": "branch_admitted"
            }, {
                "title": "Admission Basis",
                "data": "admission_basis"
            }, {
                "title": "Seat Type",
                "data": "seat_type"
            }, {
                "title": "Seat Alloted",
                "data": "seat_alloted"
            }, {
                "title": "DTE Id",
                "data": "dte_ID"
            }, {
                "title": "SCA Id",
                "data": "sca_ID"
            }, {
                "title": "MHTCET Number",
                "data": "mhtcet_number"
            }, {
                "title": "MHTCET Marks",
                "data": "mhtcet_marks"
            }, {
                "title": "JEE Number",
                "data": "jee_number"
            }, {
                "title": "JEE Marks",
                "data": "jee_marks"
            }, {
                "title": "SSC College",
                "data": "ssc_college_name"
            }, {
                "title": "SSC State",
                "data": "ssc_state"
            }, {
                "title": "SSC Seat No.",
                "data": "ssc_seat_number"
            }, {
                "title": "SSC Board",
                "data": "ssc_board"
            }, {
                "title": "SSC Month Year",
                "data": "ssc_month_year"
            }, {
                "title": "SSC Percentage",
                "data": "ssc_percentage"
            }, {
                "title": "HSC College",
                "data": "hsc_college_name"
            }, {
                "title": "HSC State",
                "data": "hsc_state"
            }, {
                "title": "HSC Seat No.",
                "data": "hsc_seat_number"
            }, {
                "title": "HSC Board",
                "data": "hsc_board"
            }, {
                "title": "HSC Month Year",
                "data": "hsc_month_year"
            }, {
                "title": "HSC Percentage",
                "data": "hsc_percentage"
            }, {
                "title": "Diploma College",
                "data": "diploma_college_name"
            }, {
                "title": "Diploma State",
                "data": "diploma_state"
            }, {
                "title": "Diploma Seat No.",
                "data": "diploma_seat_number"
            }, {
                "title": "Diploma Board",
                "data": "diploma_board"
            }, {
                "title": "Diploma Month Year",
                "data": "diploma_month_year"
            }, {
                "title": "Diploma Percentage",
                "data": "diploma_percentage"
            }, {
                "title": "Bank Name",
                "data": "bank_name"
            }, {
                "title": "Bank Branch",
                "data": "bank_branch"
            }, {
                "title": "Account Number",
                "data": "account_number"
            }, {
                "title": "IFSC Code",
                "data": "IFSC_Code"
            }, {
                "title": "MICR No.",
                "data": "MICR_Code"
            }, {
                "title": "Aadhar Link",
                "data": "aadhar_link"
            }, {
                "title": "Aadhar Number",
                "data": "aadhar_number"
            }, {
                "title": "PAN Number",
                "data": "pan_number"
            }, {
                "title": "Father Status",
                "data": "father_status"
            }, {
                "title": "Father Last Name",
                "data": "father_last_name"
            }, {
                "title": "Father Name",
                "data": "father_name"
            }, {
                "title": "Father Middle Name",
                "data": "father_middle_name"
            }, {
                "title": "Father Occupation",
                "data": "father_occupation"
            }, {
                "title": "Father Phone",
                "data": "father_phone"
            }, {
                "title": "Father Email",
                "data": "father_email"
            }, {
                "title": "Mother Status",
                "data": "mother_status"
            }, {
                "title": "Mother Last Name",
                "data": "mother_last_name"
            }, {
                "title": "Mother Name",
                "data": "mother_name"
            }, {
                "title": "Mother Middle Name",
                "data": "mother_middle_name"
            }, {
                "title": "Mother Occupation",
                "data": "mother_occupation"
            }, {
                "title": "Mother Phone",
                "data": "mother_phone"
            }, {
                "title": "Mother Email",
                "data": "mother_email"
            }, {
                "title": "Guardian Status",
                "data": "guardian_status"
            }, {
                "title": "Guardian Last Name",
                "data": "guardian_last_name"
            }, {
                "title": "Guardian Name",
                "data": "guardian_name"
            }, {
                "title": "Guardian Middle Name",
                "data": "guardian_middle_name"
            }, {
                "title": "Guardian Occupation",
                "data": "guardian_occupation"
            }, {
                "title": "Guardian Phone",
                "data": "guardian_phone"
            }, {
                "title": "Guardian Email",
                "data": "guardian_email"
            }, {
                "title": "Annual Income",
                "data": "family_annual_income"
            }, {
                "title": "Form status",
                "data": "form_status"
            }, {
                "title": "Operation",
                "data": "UID",
                "className": "text-center",
                "render": function(data, type, row, meta) {
                    if (type === 'display') {
                        data = '<button class="btn btn-primary btn-sm user-ref" data-uid="' + data + '"> View </button>';
                    }
                    return data;
                }
            }],
            "columnDefs": [{
                "render": function(data, type, full, meta) {
                    return meta.row + 1; // adds id to serial no
                },
                "targets": 0
            }, {
                "targets": [5, 6, 9, 11, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81],
                "visible": false
            }],
            initComplete: function() {
                $('#admission_table thead th').each(function(i) {
                    var title = $('#admission_table thead th').eq($(this).index()).text();
                    $(this).append('<input type="text"class="form-control head-search" placeholder="Search ' + title + '" data-index="' + i + '" />');
                });

                // this.api().columns([4, 5]).visible(false);
                table = this.api();
                $(this.api().table().container()).on('keyup', 'thead input', function() {
                    table
                        .column($(this).data('index'))
                        .search(this.value)
                        .draw();
                });
            }
        });


    })
</script>

<table id="admission_table" class="table table-borderless table-striped"></table>