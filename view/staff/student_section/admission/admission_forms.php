<div class="fluid-container">
    <div class="row">
        <div class="col-6 col-sm-6 col-md-3 p-0">
            <div class="head-card bg-success-gradient">
                <div>
                    <span class="count total-forms">0</span>
                    <p>Total Forms</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-3 p-0">
            <div class="head-card bg-secondary-gradient">
                <div>
                    <span class="count verified-forms">0</span>
                    <p>Verified Forms</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-3 p-0">
            <div class="head-card bg-warning-gradient">
                <div>
                    <span class="count pending-forms">0</span>
                    <p>Pending Forms</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-3 p-0">
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
                    <div id="admission_table_data"></div>

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
        $("#admission_table_data").load("view/staff/student_section/admission/admission_form_table.php");
        
        $('#reload_table').click(function(){
            $("#admission_table_data").load("view/staff/student_section/admission/admission_form_table.php");
        })
        
    })
</script>

<style>
    #reg_table {
        width: 100% !important;
        display: block;
        overflow: hidden;
        transition: .5s;
    }
</style>