<div class="card mb-3">
    <form action="" method="post">
        <div class="card-head">
            <p class="text-danger"><i class="fa fa-user"></i> Address Details</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="">Address for correspondence</label>
                    <textarea name="address" class="require form-control text-capitalize"></textarea>
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Country</label>
                    <input type="text" name="country" class="require form-control text-capitalize">
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">State</label>
                    <input type="text" name="state" class="require form-control text-capitalize">
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">City</label>
                    <input type="text" name="city" class="require form-control text-capitalize">
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Taluka</label>
                    <input type="text" name="taluka" class="require form-control text-capitalize">
                    <small class="text-muted">*Non Mandatory</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">District</label>
                    <input type="text" name="district" class="require form-control text-capitalize">
                    <small class="text-muted">*Non Mandatory</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Pin Code</label>
                    <input type="text" name="pin_code" pattern="[0-9]+" maxlength="7" class="require form-control">
                    <small class="text-muted">*Required</small>
                </div>
            </div>

        </div>
        <div class="card-foot d-flex justify-content-between flex-column-reverse flex-md-row">
            <div class="d-flex justify-content-between">
                <input type="button" data-toggle="tab" tabindex="-1" href="#p0" class="btn btn-dark btn-sm m-1" value="Prev">
                <input type="button" data-toggle="tab" tabindex="-1" href="#p2" class="btn btn-primary btn-sm m-1" value="Next">
            </div>
            <div class="row align-items-center justify-content-between">
                <p class="mr-2">*Please remember to save the changes</p>
                <input type="submit" class="btn btn-success btn-dark btn-sm m-1" name="address_details" value="Saved" disabled>
            </div>
        </div>
    </form>
</div>