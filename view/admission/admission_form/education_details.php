<style>
    fieldset {
        min-width: 0;
        padding: 1rem;
        /* margin: 0; */
        width: 100%;
        border: 1px solid #989898;
        border-radius: 5px;
        margin-bottom: 1rem;
        border-style: dotted;
    }

    legend {
        width: unset;
        padding: .25rem .5rem;
        margin-bottom: 0;
        font-size: 1.2rem;
        text-transform: uppercase;
        font-weight: 600;
    }
</style>
<script>
    if ("<?php echo (isset($allotment_details_decoded['admission_type'])) ? $allotment_details_decoded['admission_type'] : $user["admission_type"]; ?>" == "F") {
        $('.DSE').remove();
        $('.alert-for-admision-type').remove();
    } else if ("<?php echo (isset($allotment_details_decoded['admission_type'])) ? $allotment_details_decoded['admission_type'] : $user["admission_type"]; ?>" == "S") {
        $('.FE').remove();
        $('.alert-for-admision-type').remove();
    } else {
        $('.admission-card input').attr('disabled', 'true');
    }
</script>
<div class="card mb-3 admission-card">
    <form action="" method="post">
        <div class="card-head">
            <p class="text-danger"><i class="fa fa-user"></i> Educational Details</p>
        </div>
        <div class="card-body">
            <div class="alert alert-warning alert-for-admision-type">Please Select You Admission Type First</div>
            <div class="row">
                <div class="form-group col-md-12 DSE">
                    <label for="">ARA / DTE Application ID</label>
                    <input type="text" name="dte_ID" class="require form-control">
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-12 FE">
                    <label for="">State cell Application ID</label>
                    <input type="text" name="sca_ID" class="require form-control">
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-3 FE">
                    <label for="">MHT-CET 2019 Roll No</label>
                    <input type="text" name="mhtcet_number" class="require form-control">
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-3 FE">
                    <label for="">MHT-CET 2019 Marks</label>
                    <input type="text" name="mhtcet_marks" class="require form-control">
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-3 FE">
                    <label for="">JEE Main 2019 Roll No</label>
                    <input type="text" name="jee_number" class="require form-control">
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-3 FE">
                    <label for="">JEE 2019 Marks</label>
                    <input type="text" name="jee_marks" class="require form-control">
                    <small class="text-muted">*Required</small>
                </div>
                <fieldset class="">
                    <legend>SSC (X) or Equivalent</legend>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="">Name of Institution <small>(As mentioned in Leaving or transfer certificate)</small></label>
                            <input type="text" name="ssc_college_name" class="require form-control">
                            <small class="text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">State of Institution</label>
                            <input type="text" name="ssc_state" class="require form-control">
                            <small class="text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">10<sup>th</sup> Seat Number</label>
                            <input type="text" name="ssc_seat_number" class="require form-control">
                            <small class="text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">10<sup>th</sup> Board</label>
                            <input type="text" name="ssc_board" class="require form-control">
                            <small class="text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">10<sup>th</sup> Passing Month & Year</label>
                            <input type="text" name="ssc_month_year" class="require form-control text-capatilize">
                            <small class="text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="">10<sup>th</sup> %</label>
                            <input type="text" name="ssc_percentage" class="require form-control">
                            <small class="text-muted">*Required</small>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="FE">
                    <legend>HSC (XII)</legend>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="">Name of Institution <small>(As mentioned in Leaving or transfer certificate)</small></label>
                            <input type="text" name="hsc_college_name" class="require form-control">
                            <small class="text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">State of Institution</label>
                            <input type="text" name="hsc_state" class="require form-control">
                            <small class="text-muted">*Required</small>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">HSC Seat Number</label>
                            <input type="text" name="hsc_seat_number" class="require form-control">
                            <small class="text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">HSC Board</label>
                            <input type="text" name="hsc_board" class="require form-control">
                            <small class="text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">HSC Passing Month & Year</label>
                            <input type="text" name="hsc_month_year" class="require form-control text-capatilize">
                            <small class="text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="">HSC %</label>
                            <input type="text" name="hsc_percentage" class="require form-control">
                            <small class="text-muted">*Required</small>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="DSE">
                    <legend>Diploma</legend>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="">Name of Institution <small>(As mentioned in Leaving or transfer certificate)</small></label>
                            <input type="text" name="diploma_college_name" class="require form-control">
                            <small class="text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">State of Institution</label>
                            <input type="text" name="diploma_state" class="require form-control">
                            <small class="text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Diploma Seat Number</label>
                            <input type="text" name="diploma_seat_number" class="require form-control">
                            <small class="text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Diploma Board</label>
                            <input type="text" name="diploma_board" class="require form-control">
                            <small class="text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Diploma Passing Month & Year</label>
                            <input type="text" name="diploma_month_year" class="require form-control text-capatilize">
                            <small class="text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="">Diploma %</label>
                            <input type="text" name="diploma_percentage" class="require form-control">
                            <small class="text-muted">*Required</small>
                        </div>
                    </div>
                </fieldset>
            </div>

        </div>
        <div class="card-foot d-flex justify-content-between flex-column-reverse flex-md-row">
            <div class="d-flex justify-content-between">
                <input type="button" data-toggle="tab" tabindex="-1" href="#p2" class="btn btn-dark btn-sm m-1" value="Prev">
                <input type="button" data-toggle="tab" tabindex="-1" href="#p4" class="btn btn-primary btn-sm m-1" value="Next">
            </div>
            <div class="row align-items-center justify-content-between">
                <p class="mr-2">*Please remember to save the changes</p>
                <input type="submit" class="btn btn-success btn-dark btn-sm m-1" name="education_details" value="Saved" disabled>
            </div>
        </div>
    </form>
</div>