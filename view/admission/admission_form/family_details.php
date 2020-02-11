<div class="card mb-3">
    <form action="" method="post">

        <div class="card-head">
            <p class="text-danger"><i class="fa fa-user"></i> Parent's or Guradian's Details</p>
        </div>
        <div class="card-body">
            <p class="h3 mb-2 px-2"> Father's Detail</p>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Is Alive ?</label>
                    <div class="require form-control form-radio">
                        <input type="radio" value="1" name="father_status" class="ml-0">
                        <label for="">Yes</label>
                        <input type="radio" value="0" name="father_status" class="ml-0">
                        <label for="">No</label>
                    </div>
                    <small class="text-muted">*Required</small>
                </div>
                <style>
                    .parent-name .row {
                        margin: 0px -5px;
                    }

                    .parent-name .col {
                        padding: 5px;
                    }
                </style>
                <div class="form-group col-md-8 parent-name">
                    <label for="">Name of Father</label>
                    <div class="row">
                        <div class="col col-12 col-md-4">
                            <input type="text" name="last_name" class="require form-control text-uppercase" placeholder="Surname">
                        </div>
                        <div class="col col-12 col-md-4">
                            <input type="text" name="father_name" class="require form-control text-uppercase" placeholder="Name">
                        </div>
                        <div class="col col-12 col-md-4">
                            <input type="text" name="father_middle_name" class="require form-control text-uppercase" placeholder="Father Name">
                        </div>

                    </div>
                    <small class="text-muted">*Required : Enter your parents details carefully and correct</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Occupation</label>
                    <input type="text" name="father_occupation" class="require form-control text-capitalize">
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Phone</label>
                    <input type="text" name="father_phone" pattern="[1-9]{1}[0-9]{9}" maxlength="10" class="require form-control">
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Email</label>
                    <input type="text" name="father_email" class="form-control">
                    <small class="text-muted">*Non Mandatory</small>
                </div>
            </div>
            <div class="divider mb-3"></div>

            <p class="h3 mb-2 px-2"> Mother's Detail</p>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Is Alive ?</label>
                    <div class="require form-control form-radio">
                        <input type="radio" value="1" name="mother_status" class="ml-0">
                        <label for="">Yes</label>
                        <input type="radio" value="0" name="mother_status" class="ml-0">
                        <label for="">No</label>
                    </div>
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-8 parent-name">
                    <label for="">Name of Mother</label>
                    <div class="row">
                        <div class="col col-12 col-md-4">
                            <input type="text" name="last_name" class="require form-control text-uppercase" placeholder="Surname">
                        </div>
                        <div class="col col-12 col-md-4">
                            <input type="text" name="mother_name" class="require form-control text-uppercase" placeholder="Name">
                        </div>
                        <div class="col col-12 col-md-4">
                            <input type="text" name="mother_middle_name" class="require form-control text-uppercase" placeholder="Father / Husband Name">
                        </div>

                    </div>
                    <small class="text-muted">*Required : Enter your parents details carefully and correct</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Occupation</label>
                    <input type="text" name="mother_occupation" class="require form-control text-capitalize">
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Phone</label>
                    <input type="text" name="mother_phone" pattern="[1-9]{1}[0-9]{9}" maxlength="10" class="require form-control">
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Email</label>
                    <input type="text" name="mother_email" class="form-control">
                    <small class="text-muted">*Non Mandatory</small>
                </div>
            </div>

            <div class="divider mb-3"></div>
            <p class="h3 mb-2 px-2"> Guardian's Detail</p>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">If Any ?</label>
                    <div class="require form-control form-radio">

                        <input type="radio" value="1" name="guardian_status" class="ml-0">
                        <label for="">Yes</label>
                        <input type="radio" value="0" name="guardian_status" class="ml-0">
                        <label for="">No</label>
                    </div>
                    <small class="text-muted">*Non Mandatory</small>
                </div>

                <div class="form-group col-md-8">
                    <label for="">Full Name</label>
                    <input type="text" name="guardian_full_name" class="form-control text-uppercase">
                    <small class="text-muted">*Non Mandatory</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Occupation</label>
                    <input type="text" name="guardian_occupation" class="form-control text-capitalize">
                    <small class="text-muted">*Non Mandatory</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Phone</label>
                    <input type="text" name="guardian_phone" pattern="[1-9]{1}[0-9]{9}" maxlength="10" class="form-control">
                    <small class="text-muted">*Non Mandatory</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Email</label>
                    <input type="text" name="guardian_email" class="form-control">
                    <small class="text-muted">*Non Mandatory</small>
                </div>
            </div>
            <div class="divider mb-3"></div>
            <div class="row">

                <style>
                    input[name=family_annual_income] {
                        font-size: 24px;
                        font-weight: 600;
                        letter-spacing: 5px;
                    }
                </style>
                <div class="form-group col-md-4">

                    <label for="">&#8377; Family Annual Income from all sources</label>
                    <input type="number" name="family_annual_income" class="require form-control" min="0">
                    <small class="text-muted">*Required</small>
                </div>
            </div>

        </div>
        <div class="card-foot d-flex justify-content-between flex-column-reverse flex-md-row">
            <div class="d-flex justify-content-between">
                <input type="button" data-toggle="tab" tabindex="-1" href="#p4" class="btn btn-dark btn-sm m-1" value="Prev">
                <input type="button" data-toggle="tab" tabindex="-1" href="#p6" class="btn btn-primary btn-sm m-1" value="Next">

            </div>
            <div class="row align-items-center justify-content-between">
                <p class="mr-2">*Please remember to save the changes</p>
                <input type="submit" class="btn btn-success btn-dark btn-sm m-1" name="family_details" value="Saved" disabled>
            </div>
        </div>
    </form>
</div>