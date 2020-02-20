<div class="card mb-3">
    <form action="" method="post">



        <div class="card-head">
            <p class="text-danger"><i class="fa fa-user"></i> Bank Details</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Bank Name</label>
                    <input type="text" name="bank_name" class="require form-control">
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Bank Branch</label>
                    <input type="text" name="bank_branch" class="require form-control text-capitalize">
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Account No.</label>
                    <input type="text" name="account_number" maxlength="30" class="require form-control">
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">IFSC Code</label>
                    <input type="text" name="IFSC_Code" maxlength="20" class="require form-control">
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">MICR Code No</label>
                    <input type="text" name="MICR_Code" maxlength="20" class="require form-control">
                    <small class="text-muted">*Required</small>
                </div>
            </div>
            <div class="divider mb-3"></div>

            <div class="row">

                <div class="form-group col-md-4">
                    <label for="">Is Aadhar Linked With Bank ?</label>
                    <div class="require form-control form-radio">
                        <input type="radio" value="yes" name="aadhar_link" class="ml-0">
                        <label for="">Yes</label>
                        <input type="radio" value="no" name="aadhar_link" class="ml-3">
                        <label for="">No</label>
                    </div>
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Aadhar Card Number</label>
                    <input type="text" name="aadhar_number" maxlength="12" class="require form-control">
                    <small class="text-muted">*Non Mandatory</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Pan Card Number</label>
                    <input type="text" name="pan_number" class="require form-control">
                    <small class="text-muted">*Non Mandatory</small>
                </div>
            </div>

        </div>
        <div class="card-foot d-flex justify-content-between flex-column-reverse flex-md-row">
            <div class="d-flex justify-content-between">
                <input type="button" data-toggle="tab" tabindex="-1" href="#p2" class="btn btn-dark btn-sm m-1" value="Prev">
                <input type="button" data-toggle="tab" tabindex="-1" href="#p5" class="btn btn-primary btn-sm m-1" value="Next">
            </div>
            <div class="row align-items-center justify-content-between">
                <p class="mr-2">*Please remember to save the changes</p>
                <input type="submit" class="btn btn-success btn-dark btn-sm m-1" name="bank_details" value="Saved" disabled>
            </div>
        </div>
    </form>
</div>