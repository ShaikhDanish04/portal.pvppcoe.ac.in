<div class="card mb-3">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-head">
            <p class="text-danger"><i class="fa fa-user"></i> Personal Details (Identity) </p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" class="require form-control text-uppercase" <?php echo (!isset($personal_details_decoded['first_name'])) ? 'value="' . $user['u_name'] . '"' : '' ?> readonly>
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" class="require form-control text-uppercase" <?php echo (!isset($personal_details_decoded['last_name'])) ? 'value="' . $user['u_surname'] . '"' : '' ?> readonly>
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Father's Name</label>
                    <input type="text" name="father_name" class="require form-control text-uppercase">
                    <small class="text-muted">*Required</small>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Mother's Name</label>
                    <input type="text" name="mother_name" class="require form-control text-uppercase">
                    <small class="text-muted">*Required</small>
                </div>
            </div>
            <div class="divider mb-3"></div>
            <div class="row">
                <div class="col-md-3">
                    <div class="image-response"></div>
                    <div class="form-group">
                        <label for="">My Photo</label>
                        <div class="personal_photo upload-here" data-upload="photo" id="photo">
                            <img src="<?php echo (!isset($allotment_details_decoded["C_UID"])) ? "data:image/jpg;base64," . base64_encode(file_get_contents("uploads/" . $user['student_id'] . "/photo.jpg")) : "uploads/" . $allotment_details_decoded['C_UID'] . "/photo.jpg" ?>" alt="Profile Photo" height="100%" width="100%" />
                        </div>
                        <small class="text-muted">*Required</small>
                    </div>
                    <div class="form-group">
                        <label for="">Signature</label>
                        <div class="personal_photo upload-here" data-upload="signature" id="signature">
                            <img src="<?php echo (!isset($allotment_details_decoded["C_UID"])) ? "data:image/jpg;base64," . base64_encode(file_get_contents("uploads/" . $user['student_id'] . "/signature.jpg")) : "uploads/" . $allotment_details_decoded['C_UID'] . "/signature.jpg" ?>" alt="Profile Photo" height="100%" width="100%" />
                        </div>
                        <small class="text-muted">*Required</small>
                    </div>
                </div>
                <style>
                    .personal_photo {
                        overflow: hidden;
                        display: block;
                        margin: 12px auto;
                        border: 1px solid;
                        border-radius: .5rem;
                        background-color: #f3f3f3;
                        position: relative;
                    }

                    #photo {
                        height: 150px;
                        width: 120px;
                        background: url('<?php echo $addr_space ?>assets/img/dummy-avatar.png');
                        background-size: 100%;
                        background-position: center;
                        background-repeat: no-repeat;
                    }

                    #signature {
                        height: 60px;
                        width: 180px;
                    }
                </style>

                <div class="col-md-9 row p-0">

                    <div class="form-group col-md-8">
                        <label for="">Email</label>
                        <input type="email" name="u_email" <?php echo (!isset($personal_details_decoded['u_email'])) ? 'value="' . $user['u_email'] . '"' : '' ?> class="require form-control" readonly>
                        <small class="text-muted">*Required</small>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Phone</label>
                        <input type="text" name="phone_number" pattern="[1-9]{1}[0-9]{9}" maxlength="10" class="require form-control">
                        <small class="text-muted">*Required</small>
                    </div>

                    <style>
                        .input-date .row {
                            margin: 0px -5px;
                        }

                        .input-date .col {
                            padding: 0px 5px;
                        }
                    </style>
                    <div class="form-group col-md-8 input-date">
                        <label for="">Date of Birth</label>
                        <div class="row">
                            <div class="col col-4 col-sm-3 py-1 py-md-0">
                                <input type="number" name="b_day" class="require form-control" placeholder="Day" min=1 max=31>
                            </div>
                            <div class="col col-8 col-sm-5 py-1 py-md-0">
                                <select name="b_month" class="require form-control">
                                    <option value="" class="text-muted">--- Month ---</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="col col-12 col-sm-4 py-1 py-md-0">
                                <input type="number" name="b_year" class="require form-control" placeholder="Year" min=1950>
                            </div>
                        </div>
                        <small class="text-muted">*Required</small>
                    </div>

                    <script>
                        $('.input-date input,.input-date select').on('keyup select focusout change', function() {
                            if ($('.input-date [name="b_month"]').val() % 2 == 0) {
                                if ($('.input-date [name="b_month"]').val() == 2) {
                                    if ($('.input-date [name="b_year"]').val() % 4 == 0) {
                                        if ($('.input-date [name="b_year"]').val() % 100 == 0) {
                                            // the year is a leap year if it is divisible by 400.
                                            if ($('.input-date [name="b_year"]').val() % 400 == 0)
                                                $('.input-date [name="b_day"]').attr('max', '29');
                                            else
                                                $('.input-date [name="b_day"]').attr('max', '28');
                                        } else
                                            $('.input-date [name="b_day"]').attr('max', '29');
                                    } else
                                        $('.input-date [name="b_day"]').attr('max', '28');

                                } else {
                                    $('.input-date [name="b_day"]').attr('max', '30');
                                }
                            } else {
                                $('.input-date [name="b_day"]').attr('max', '31');
                            }
                            $('[name="date_of_birth"]').val(

                                $('.input-date [name="b_year"]').val() + "-" +
                                $('.input-date [name="b_month"]').val() + "-" +
                                $('.input-date [name="b_day"]').val());
                        })
                    </script>
                    <div class="form-group col-md-4">
                        <label for="">Birth Place</label>
                        <input type="text" name="birth_place" class="require form-control">
                        <small class="text-muted">*Required</small>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Gender</label>
                        <select type="text" name="gender" class="require form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <small class="text-muted">*Required</small>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Blood Group</label>
                        <select type="text" name="blood_group" class="require form-control">
                            <option value="A Positive (A+)">A Positive (A+)</option>
                            <option value="A Negative (A-)">A Negative (A-)</option>
                            <option value="B Positive (B+)">B Positive (B+)</option>
                            <option value="B Negative (B-)">B Negative (B-)</option>
                            <option value="O Positive (O+)">O Positive (O+)</option>
                            <option value="O Negative (O-)">O Negative (O-)</option>
                            <option value="AB Positive (AB+)">AB Positive (AB+)</option>
                            <option value="AB Negative (AB-)">AB Negative (AB-)</option>
                        </select>
                        <small class="text-muted">*Required</small>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Category</label>
                        <select type="text" name="category" class="require form-control">
                            <option value="OPEN">OPEN</option>
                            <option value="SEBC">SEBC</option>
                            <option value="SC">SC</option>
                            <option value="ST">ST</option>
                            <option value="VJ">VJ/DT</option>
                            <option value="NT-A">NT A</option>
                            <option value="NT-B">NT B</option>
                            <option value="NT-C">NT C</option>
                            <option value="NT-D">NT D</option>
                            <option value="OBC">OBC</option>
                            <option value="SBC">SBC</option>
                            <option value="EBC">EBC</option>
                            <option value="Minority">Minority</option>
                        </select>
                        <small class="text-muted">*Required</small>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Religion</label>
                        <input type="text" name="religion" class="require form-control text-capitalize">
                        <small class="text-muted">*Required</small>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Sub Cast</label>
                        <input type="text" name="sub_cast" class="form-control">
                        <small class="text-muted">*Not Required</small>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Nationlity</label>
                        <input type="text" name="nationality" class="require form-control text-capitalize">
                        <small class="text-muted">*Required</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-foot d-flex justify-content-between flex-column-reverse flex-md-row">
            <div class="d-flex justify-content-between">
                <input type="button" data-toggle="tab" tabindex="-1" href="#p1" class="btn btn-primary btn-sm m-1" value="Next">
            </div>
            <div class="row align-items-center justify-content-between">
                <p class="mr-2">*Please remember to save the changes</p>
                <input type="submit" class="btn btn-success btn-dark btn-sm m-1" name="personal_details" value="Saved" disabled>
            </div>
        </div>
    </form>
</div>