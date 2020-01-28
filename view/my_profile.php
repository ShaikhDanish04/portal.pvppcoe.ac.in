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
            position: relative;

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
                    <img src="data:image/jpg;base64,<?php echo base64_encode(file_get_contents("uploads/" . $user['student_id'] . "/profile-picture.jpg")) ?>" alt="Photo" height="100%" width="100%" />
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
            </style>
            <div class="card ">
                <?php include('view/profile/student_id.php') ?>
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
                        </div>
                        <div class="tab-pane container fade" id="menu1">...</div>
                        <div class="tab-pane container fade" id="menu2">...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>