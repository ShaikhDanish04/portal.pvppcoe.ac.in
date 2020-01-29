<div class="card mb-3 allotment-card">
    <form action="" method="post">
        <div class="card-head">
            <p class="text-danger"><i class="fa fa-user"></i> Allotment Details</p>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="form-group col-md-4">
                    <label for="">GR Number</label>
                    <input type="text" name="GR_NO" class="require form-control">
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">College ID</label>
                    <input type="text" name="C_UID" class="require form-control" <?php echo (!isset($allotment_details['C_UID'])) ? 'value="' . $user['student_id'] . '"' : '' ?> readonly>
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Admission Batch</label>
                    <select type="text" name="admission-batch" class="require form-control">
                        <option value="1011">2010-2011</option>
                        <option value="1112">2012-2012</option>
                        <option value="1213">2012-2013</option>
                        <option value="1314">2013-2014</option>
                        <option value="1415">2014-2015</option>
                        <option value="1516">2015-2016</option>
                        <option value="1617">2016-2018</option>
                        <option value="1718">2017-2018</option>
                        <option value="1819">2018-2019</option>
                    </select>
                    <small class="text-muted">*Required</small>
                </div>

                <div class="divider col-md-12 m-3"></div>

                <div class="form-group col-md-12">
                    <label for="">Admission Type</label>
                    <div class="require form-control form-radio">
                        <input type="radio" value="F" name="admission_type" class="ml-0">
                        <label for="">First Year (FE)</label>
                        <input type="radio" value="S" name="admission_type" class="ml-3">
                        <label for="">Direct Second Year (DSE)</label>
                        <input type="radio" value="T" name="admission_type" class="ml-3">
                        <label for="">Transfer From Other College </label>
                    </div>
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-12">
                    <label for="">Branch Admitted</label>
                    <select type="text" name="branch_admitted" class="require form-control">
                        <option>--- Select ---</option>
                        <option value="COMP">Computer Engineering (CO)</option>
                        <option value="EXTC">Electronics and Telecommuication Engineering (ELEX)</option>
                        <option value="IT">Information Technology (IT)</option>
                    </select>
                    <small class="text-muted">*Required</small>
                </div>


                <div class="form-group col-md-4">
                    <label for="">Admission on Basis</label>
                    <select type="text" name="admission_basis" class="require form-control">
                        <option value="CAP Round - I">CAP Round - I</option>
                        <option value="CAP Round - II">CAP Round - II</option>
                        <option value="CAP Round - III">CAP Round - III</option>
                        <option value="SBEC">SBEC</option>
                        <option value="TFWS">TFWS</option>
                        <option value="J & K">J & K</option>
                        <option value="Against CAP Vacancies">Against CAP Vacancies</option>
                        <option value="Institution Quota(20%)">Institution Quota(20%)</option>
                        <option value="NRI Quota(5%)">NRI Quota(5%)</option>
                    </select>
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Seat Type</label>
                    <select type="text" name="seat_type" class="require form-control">
                        <option value="MS">MS</option>
                        <option value="OMS">OMS</option>
                        <option value="JK">JK</option>
                        <option value="GOI/NRI">GOI/NRI</option>
                    </select>
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Seat Alloted</label>
                    <select type="text" name="seat_alloted" class="require form-control">
                        <option value="A,B,C,D,E">A,B,C,D,E</option>
                        <option value="DEF - I">DEF - I</option>
                        <option value="DEF - II">DEF - II</option>
                        <option value="DEF - III">DEF - III</option>
                        <option value="P.H. 1">P.H. 1</option>
                        <option value="P.H. 2">P.H. 2</option>
                        <option value="P.H. 3">P.H. 3</option>
                    </select>
                    <small class="text-muted">*Required</small>
                </div>
            </div>

        </div>
        <div class="card-foot d-flex justify-content-between flex-column-reverse flex-md-row">
            <div class="d-flex justify-content-between">
                <input type="button" data-toggle="tab" tabindex="-1" href="#p1" class="btn btn-dark btn-sm m-1" value="Prev">
                <input type="button" data-toggle="tab" tabindex="-1" href="#p4" class="btn btn-primary btn-sm m-1" value="Next">
            </div>
            <div class="row align-items-center justify-content-between">
                <p class="mr-2">*Please remember to save the changes</p>
                <input type="submit" class="btn btn-success btn-dark btn-sm m-1" name="allotment_details" value="Saved" disabled>
            </div>
        </div>
    </form>
</div>