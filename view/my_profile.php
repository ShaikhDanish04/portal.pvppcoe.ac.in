<?php if ($user['u_usage'] == "0") {
    echo '<div class="alert alert-danger">Your Email is not verified. Please verify your email to use the system. <a href="#verification" class="alert-link d-inline-block">Click Here to Proceed</a></div>';
} ?>

<div class="fluid-container">
    <style>
        .profile-card {
            overflow: hidden;
            position: relative;
            margin-bottom: 5px;
        }


        .profile-card .card-cover {
            height: 300px;
            width: 100%;
            background: #d8d8d8;
            box-shadow: 3px 0px 9px #676767;
            position: relative;
        }


        .connect-button-container {
            position: absolute;
            display: flex;
            align-items: center;
            bottom: 20px;
            left: 20px;
        }

        .profile-picture-container {
            position: absolute;
            right: 25px;
            bottom: -140px;

        }

        @media (max-width: 768px) {
            .profile-card {
                text-align: center;
            }

            .profile-card .card-cover {
                height: 200px;
                margin-bottom: 75px;
            }

            .profile-picture-container {
                right: 50%;
                top: 75px;
                transform: translateX(50%);
            }

            .connect-button-container {
                top: 20px;
                bottom: unset;
            }

            .connect-button-container .h4 {
                font-size: 1rem;
            }
        }

        .connect-button-container .h4 {
            text-shadow: 1px 1px 5px #333;
        }

        .cover-img {
            height: 100%;
            width: 100%;
            object-fit: fill;
        }

        .profile-picture {
            display: block;
            height: 200px;
            width: 200px;
            margin: 0px 40px;
            /* border: 4px solid #595959; */
            border-radius: 50%;
            background: url(assets/img/dummy-avatar.png);
            background-color: #fdfdfd;
            background-position: center;
            background-size: 70%;
            background-repeat: no-repeat;
            box-shadow: 1px 1px 7px #aaa;
            overflow: hidden;
        }

        .profile-name {
            font-size: 52px;

        }

        .badge {
            margin-bottom: 5px;
        }

        @media (max-width: 456px) {
            .profile-card .card-cover {
                height: 160px;
                margin-bottom: 60px;
            }

            .profile-picture {
                height: 160px;
                width: 160px;
            }

            .profile-name {
                font-size: 34px;
            }

        }
    </style>
    <div class="card profile-card">
        <div class="card-cover">
            <img class="cover-img" src="assets/img/cover.jpg" alt="">
            <div class="connect-button-container">
                <p class="h4 d-inline text-white">0 Activities</p>
                <button class="btn btn-success btn-sm mx-3"><i class="fa fa-comment"></i></button>
            </div>
            <div class="profile-picture-container">
                <div class="profile-picture">
                    <img src="data:image/jpg;base64,<?php echo base64_encode(file_get_contents("uploads/" . $user['student_id'] . "/profile_photo.jpg")) ?>" alt="Profile Photo" height="100%" width="100%" />
                </div>

            </div>
        </div>
        <div class="card-body px-0 px-sm-3">
            <div class="col-md-6">
                <p class="profile-name d-inline-block"><?php echo $user['u_name'] . " " . $user['u_surname']; ?></p>
                <p class="small text-mute">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima magnam facilis incidunt quam, aspernatur non ipsam possimus consequatur quo aliquam recusandae libero dicta dolorum ipsum vitae corporis numquam dolorem veritatis.</p>
                <div class="divider mb-3"></div>
                <span class="badge badge-primary p-2"><i class="fa fa-user"></i> <?php echo $user['u_type']; ?></span>
                <span class="badge badge-info p-2"><i class="fa fa-university"></i><?php echo $user['student_branch']; ?></p></span>
                <span class="badge badge-success p-2"><i class="fa fa-graduation-cap"></i> 8th Semester</p></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 p-0">
            <?php if ($user['u_usage'] == "0") {
                include('constraint/email_verification.php');
            } ?>
            <div class="card">
                <div class="card-head">
                    <p class="small">Contact Infomation</p>
                </div>
                <div class="card-body pt-0">
                    <div class="info-item">
                        <i class="fa fa-home"></i>
                        <p></p>
                    </div>
                    <div class="info-item">
                        <i class="fa fa-envelope"></i>
                        <p><?php echo $user['u_email']; ?></p>
                    </div>
                    <div class="info-item">
                        <i class="fa fa-phone"></i>
                        <p><?php echo $user['u_phone']; ?></p>
                    </div>
                </div>
            </div>
            <style>
                .info-item {
                    display: flex;
                    align-items: baseline;
                    border-bottom: 1px solid #e7e7e7;
                    padding: 10px;
                    font-size: 12px;
                }

                .info-item i.fa {
                    width: 30px;
                    flex-shrink: 0;
                    text-align: center;
                    color: #681864;
                }

                .info-item:last-child {
                    border-bottom: 0px;
                }

                .id-card-holder {
                    overflow-x: scroll;
                    padding: 10px;
                    background: #242424;
                }
            </style>
            <div class="card ">
                <div class="card-head">
                    <p class="small">Identity Card</p>
                </div>
                <div class="card-body id-card-holder">
                    <div class="card id-card <?php echo $user['student_branch'] ?>">
                        <div class="id-card-bg"></div>
                        <div class="id-card-header">
                            <img class="college-logo" src="assets/img/college_logo.png" alt="">
                            <div class="college-heading">
                                <p class="h6">Padmabhushan Vasantdada Patil Pratishthan’s</p>
                                <p class="h6">College of Engineering</p>
                                <p>Sion, Mumbai - 400 022.</p>
                            </div>
                        </div>
                        <div class="id-card-body">
                            <div class="image-col">
                                <!-- <img src="" alt=""> -->
                                <img class="photo" src="data:image/jpg;base64,<?php echo base64_encode(file_get_contents("uploads/" . $user['student_id'] . "/profile_photo.jpg")) ?>" alt="Profile Photo" height="100%" width="100%" />
                                <img class="sign" src="data:image/jpg;base64,<?php echo base64_encode(file_get_contents("uploads/" . $user['student_id'] . "/signature.jpg")) ?>" alt="Profile Photo" height="100%" width="100%" />
                                <p>Student's Sign</p>
                            </div>
                            <div class="details-col">
                                <p class="h6 mb-2">Identity Card</p>
                                <p><span>Name :</span> SHAIKH MOHD DANISH MOHD SHABBIR DILAFROZ</p>
                                <div class="d-flex">
                                    <div class="mr-3">
                                        <p><span>Course:</span> COMP ENGG</p>
                                        <p><span>Birthday:</span> 04-01-1999</p>
                                        <p><span>ID No.:</span> VU1S1718012</p>
                                        <p><span>Admission :</span> DSE 2017-18</p>
                                        <p><span>Category :</span> OPEN</p>
                                    </div>
                                    <div>
                                        <p><span>Blood Group:</span> O+ (Positive)</p>
                                        <p><span>GR No:</span> 6443</p>
                                        <div class="principal-sign">
                                            <img src="" alt="">
                                            <p>Dr. Alam N. Shaikh</p>
                                            <p>Principal</p>
                                        </div>
                                    </div>

                                </div>
                                <p class="text-center valid">VALID UPTO JULY-2020</p>
                            </div>
                        </div>

                    </div>
                    <style>
                        .id-card-body .details-col .principal-sign img {
                            display: block;
                            /* background: red; */
                            width: 100%;
                            height: .6cm;
                        }

                        .id-card-body .details-col .principal-sign p {
                            text-align: center;
                            font-size: 8px;
                        }

                        .id-card-bg {
                            height: 3cm;
                            width: 12cm;
                            position: absolute;
                            border-radius: 50%;
                            top: -49px;
                            left: -17px;
                            border-bottom: 2px solid #007bff;
                            box-shadow: 3px 1px 5px #222;

                        }

                        .EXTC .id-card-bg {
                            background: #008000;
                        }

                        .COMP .id-card-bg {
                            background: #d71c1c;
                        }

                        .IT .id-card-bg {
                            background: #0b0b88;
                        }

                        .id-card {
                            background: #f3f3f3;
                            width: 8.6cm;
                            height: 5.4cm;
                            border-radius: .25rem;
                            position: relative;
                            overflow: hidden;
                            z-index: 0;
                            margin: 10px auto;
                        }

                        .id-card .id-card-header {
                            padding: .2cm .3cm .1cm;
                            display: flex;
                            z-index: 1;
                            color: #ffffff;
                        }

                        .id-card .college-heading .h6 {
                            font-family: sans-serif;
                            font-size: 10px;
                            text-transform: uppercase;
                            text-align: center;
                            font-weight: 600;
                        }

                        .id-card .college-heading p {
                            font-size: 10px;
                            text-align: center;
                        }

                        .id-card .college-logo {
                            height: 1.5cm;
                            border-radius: 0.25rem;
                            height: 1.5cm;
                            background: #fff;
                            padding: .1cm;
                            width: 1.5cm;
                        }

                        .id-card-body {
                            display: flex;
                        }

                        .id-card-body .image-col p {
                            font-size: 10px;
                            text-align: center;
                            font-weight: 600;
                        }

                        .id-card-body .details-col p.name {
                            height: .75cm;
                        }

                        .id-card-body .details-col p {
                            font-size: 10px;
                            text-align: left;
                            font-weight: 600;
                        }

                        .id-card-body .details-col span {
                            color: red;
                        }

                        .id-card-body .details-col .h6 {
                            font-size: 12px;
                            text-align: center;
                            text-transform: uppercase;
                            font-weight: 600;
                            font-style: italic;
                            margin-bottom: .1cm !important;
                        }

                        .id-card-body .details-col {
                            width: 100%;
                        }

                        .id-card-body .image-col .photo {
                            height: 2.2cm;
                            width: 2cm;
                            display: block;
                            border: 2px solid #7e7e7e;
                            margin: 0 .2cm;
                            background: url(assets/img/dummy-avatar.png);
                            background-size: contain;
                            background-repeat: no-repeat;
                            margin-bottom: 0;
                        }

                        .id-card-body .image-col .sign {
                            margin: 0 .2cm;
                            margin-top: 0;
                            height: 0.6cm;
                            width: 2cm;
                            display: block;
                            border: 2px solid #7e7e7e;
                            border-top: 0;
                        }

                        .id-card-body .details-col p.valid {
                            font-size: 8px;
                        }
                    </style>
                </div>
            </div>
        </div>
        <div class="col-md-8 p-0">
            <div class="card user-details">
                <div class="card-body" style="height: 625px;">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#home">Timeline</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" data-toggle="pill" href="#menu1">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" data-toggle="pill" href="#menu1">
                                <p class="text-dark d-inline">0</p> Achievements
                            </a>
                        </li>
                    </ul>
                    <div class="divider my-3"></div>
                    <div class="tab-content">
                        <div class="tab-pane container active" id="home">
                            <?php include('view/id_card.php');?>
                        </div>
                        <div class="tab-pane container fade" id="menu1">...</div>
                        <div class="tab-pane container fade" id="menu2">...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>