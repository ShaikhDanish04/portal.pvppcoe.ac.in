<!DOCTYPE html>
<html lang="en">

<head>
    <title>PVPP Portal</title>

    <?php $addr_space = ""; ?>
    <?php include("head.php"); ?>

    <link rel="stylesheet" href="<?php echo $addr_space ?>assets/dataTables/jquery.dataTables.min.css?v4.6">
    <link rel="stylesheet" href="<?php echo $addr_space ?>assets/dataTables/buttons.dataTables.min.css?v4.6.1">
    <link rel="stylesheet" href="<?php echo $addr_space ?>assets/slick/slick.css?v4.6">
    <link rel="stylesheet" href="<?php echo $addr_space ?>assets/slick/slick-theme.css?v4.6">

    <script src="<?php echo $addr_space ?>assets/action.js?v4.6"></script>

    <?php
    if (!isset($_SESSION["UID"])) {
        header('Location: login');
    } else if (!isset($_GET['page'])) {
        $_GET['page'] = "dashboard.view";
    }

    $UID = $_SESSION["UID"];
    if ($_SESSION['u_type'] == "student") {
        $result = $conn->query("SELECT * FROM users INNER JOIN student_academic_manager ON users.UID = student_academic_manager.UID 
                            WHERE users.UID = '$UID' OR student_academic_manager.student_id = '$UID'");
        $user = $result->fetch_assoc();
    }
    if ($_SESSION['u_type'] == "staff") {
        $result = $conn->query("SELECT * FROM users INNER JOIN staff_role_manager ON users.UID = staff_role_manager.UID 
                                WHERE users.UID = '$UID' OR staff_role_manager.staff_biometic = '$UID'");
        $user = $result->fetch_assoc();
    }
    ?>


</head>
<div id="admission_modal" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Admission Form Verification</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body bg-dark">
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<style>
    .body-loading-overlay {
        position: fixed;
        height: 100%;
        width: 100%;
        background: #fff;
        /* background: rgba(0, 0, 0, 0.75); */
        display: flex;
        z-index: 99999;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .content-view .body-loading-overlay {
        position: absolute;
        top: 0;
        background: rgba(0, 0, 0, 0.75);
    }

    .pre-loader {
        position: relative;
    }

    .content-view .pre-loader {
        background: #fff;
        padding: 30px 10px;
        border-radius: 2rem;
    }

    .content-view .body-loading-overlay .pre-loader-logo {
        height: 160px;
    }

    .body-loading-overlay .pre-loader-logo {
        height: 200px;
        display: block;
        margin: auto;
    }

    .body-loading-overlay .pre-loader-gif {
        height: 80px;
        display: block;
        margin: auto;
    }

    .body-loading-overlay .fa {
        margin-top: 20px;
        color: #fff;
        display: block;
        font-size: 50px;
    }

    .bar-menu {
        transition: .3s;
        height: 0px;
        font-size: 0px;
        width: 0px;
        padding: 0px;
        overflow: hidden;
        color: #fff;
        border-radius: 5rem;
        background: rgba(0, 0, 0, 0);
    }

    .bar-menu.open {
        background: rgba(0, 0, 0, 0.5);
        font-size: unset;
        height: unset;
        width: unset;
        padding: 4px 10px;
    }

    .bar-menu i.fa:hover {
        cursor: pointer;
        text-shadow: 0 0 3px;
    }

    .caret-on .banner {
        padding: 0;
        height: 0;
    }
</style>

<body>
    <div class="body-loading-overlay">
        <div class="pre-loader">
            <img src="assets/img/college_logo.png" alt="" class="pre-loader-logo">
            <p class="h3 mt-3 mb-1">Portal</p>
            <img src="assets/img/loader.gif" alt="" class="pre-loader-gif">

            <!-- <i class="fa fa-circle-o-notch fa-spin "></i> -->
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('.body-loading-overlay').fadeOut();
        })
    </script>
    <div class="body-container">
        <div class="banner">
            <div class="banner-heading">
                <img src="assets/img/college_logo.png" alt="college logo">
                <div class="banner-title">
                    <p>Padmabhushan Vasantdada Patil Pratishthan's</p>
                    <p>College of Engineering</p>
                </div>

            </div>
            <div class="banner-zoom">
                <button onclick="$('body').css('font-size','1.0rem');" class="btn scale-zoom-in">+</button>
                <button onclick="$('body').css('font-size','0.8rem');" class="btn scale-initial btn-primary">A</button>
                <button onclick="$('body').css('font-size','0.7rem');" class="btn scale-zoom-out">-</button>
            </div>
        </div>
        <div class="top-bar">
            <div class="top-bar-left">
                <div class="bar-item">
                    <i id="lock_side" class="fa fa-bars"></i>
                </div>
                <div class="bar-menu">
                    <i id="pin_menu" class="fa fa-thumb-tack mx-1"></i>
                    <i id="full_screen" class="fa fa-desktop mx-1"></i>
                    <i id="banner_up" class="fa fa-caret-square-o-up mx-1"></i>
                </div>
            </div>
            <div class="top-bar-right">
                <div class="user-content dropdown">
                    <i class="fa fa-bell" data-toggle="dropdown"></i>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-head">
                            <p class="h5">Notifications</p>
                        </div>
                        <div class="dropdown-item content-data">
                            <p class="title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque facere laudantium ullam tempora enim harum quaerat officia, doloremque laboriosam quae molestiae expedita aliquam dolore id quasi officiis et ab. Illo.</p>
                            <div class="date-time">01/06/2020 - 10:12 PM</div>
                        </div>
                        <div class="dropdown-item content-data">
                            <p class="title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque facere laudantium ullam tempora enim harum quaerat officia, doloremque laboriosam quae molestiae expedita aliquam dolore id quasi officiis et ab. Illo.</p>
                            <div class="date-time">01/06/2020 - 10:12 PM</div>
                        </div>
                        <div class="dropdown-item content-data">
                            <p class="title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque facere laudantium ullam tempora enim harum quaerat officia, doloremque laboriosam quae molestiae expedita aliquam dolore id quasi officiis et ab. Illo.</p>
                            <div class="date-time">01/06/2020 - 10:12 PM</div>
                        </div>
                        <div class="dropdown-foot">
                            <a href="javascript:0"> See all notifications</a>
                        </div>
                    </div>
                </div>
                <div class="user-content">
                    <i class="fa fa-calendar"></i>
                </div>
                <a href="">
                    <div class="user-content">
                        <p>Logout</p> <i class="fa fa-power-off ml-1"> </i>
                    </div>
                </a>
            </div>
        </div>

        <style>
            .user-content .dropdown-menu.show {
                top: 15px !important;
                left: 15px !important;
                text-shadow: 0 0 0;
                padding-bottom: 0px;
                overflow: hidden;
            }

            .user-content .content-data p.title {
                white-space: nowrap;
                width: 250px;
                overflow: hidden;
                font-size: 12px;
                text-overflow: ellipsis;
                padding: 5px 0px;
                font-weight: 400;
            }

            .user-content .dropdown-foot {
                font-size: 12px;
                background: #ebebeb;
                padding: 10px;
                margin-top: 10px;
                text-align: center;
                font-weight: 400;
            }

            .user-content .dropdown-head {
                text-align: center;
                color: #ad2822;
                padding: 10px;
                border-bottom: 1px solid #ebebeb;
                margin-bottom: 10px;
            }

            .content-data .date-time {
                transition: .2s;
                height: 0;
                overflow: hidden;
                font-size: 10px;
                /* color: inher; */
            }

            .content-data:hover .date-time {
                height: unset;
            }

            .banner-zoom {
                display: flex;
                flex-direction: column;
            }

            .banner-zoom .btn {
                padding: 0.1rem .4rem !important;
                /* box-shadow: none; */
                border-radius: 5rem;
                font-size: 10px;
            }

            .side.hover .my-profile:hover,
            .side.stick .my-profile:hover {
                /* transition: all 1s; */
                background: linear-gradient(-45deg, #dcdcdc, #969696);
                box-shadow: 0 0 10px #000;
                height: 265px;
            }

            .my-profile {
                cursor: pointer;

            }

            .my-profile .profile-link {
                transition: .5s;
                height: 0px;
                /* display: inline-block; */
                overflow: hidden;
            }

            .side:hover .my-profile:hover .profile-link {
                transition: .5s;
                height: 20px;
            }

            .side-dropdown {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                padding-right: 10px;
            }

            .content.stick {
                margin-left: 200px;
                width: calc(100% - 150px);
            }

            .ui-loader {
                opacity: 0;
            }
        </style>

        <div class="content-view">
            <div class="body-loading-overlay" style="display:none">
                <div class="pre-loader">
                    <img src="assets/img/college_logo.png" alt="" class="pre-loader-logo">
                    <p class="h3 mt-3 mb-1">Loading ...</p>
                    <img src="assets/img/loader.gif" alt="" class="pre-loader-gif">

                    <!-- <i class="fa fa-circle-o-notch fa-spin "></i> -->
                </div>
            </div>
            <div class="side">
                <div class="my-profile">
                    <a href="?page=profile/my_profile" class="text-decoration-none ref-item">
                        <div class="profile-card">
                            <div>
                                <!-- <img class="user-img" src="" alt=""> -->
                                <div class="user-img">
                                    <img src="data:image/jpg;base64,<?php echo base64_encode(file_get_contents("uploads/" . $user['student_id'] . "/profile-picture.jpg")) ?>" alt="Photo" height="100%" width="100%" />
                                </div>
                                <div class="profile-link">

                                    <p class="text-dark">View Profile</p>

                                </div>
                            </div>
                            <!-- <div class="divider"></div> -->
                            <div class="user-greet">
                                <p class="user-name h5 text-capitalize"><?php echo $user['u_name']; ?></p>
                                <p class="user-position h6 text-capitalize"><?php echo $user['u_surname']; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div id="student-accordion" class="side-list">
                    <?php //include("path_controller.php") ?>
                    <?php

                    // $pathObj = new PathController;
                    // // $pathObj->default();

                    // if ($user['u_admin'] == "1") {
                    //     $pathObj->controlPanel();
                    //     $pathObj->web_control();
                    //     $pathObj->student_admission();
                    //     $pathObj->student_section();
                    //     $pathObj->student_academics();
                    //     $pathObj->student_department();
                    //     $pathObj->student_examination();
                    // } else {
                    //     if ($user['u_usage'] == '1') {
                    //         switch ($user['u_type']) {
                    //             case "staff":
                    //                 $row_result = $conn->query("SELECT * FROM staff_role_manager WHERE `UID` = '$UID'");
                    //                 $role_row = $row_result->fetch_assoc();
                    //                 switch ($role_row['staff_branch']) {
                    //                     case "Student section":
                    //                         $pathObj->student_section();
                    //                         break;

                    //                     case "Registrar Office":
                    //                         $pathObj->controlPanel();
                    //                         $pathObj->student_section();
                    //                         break;
                    //                 }
                    //                 break;

                    //             case "student":
                    //                 $pathObj->student_admission();
                    //                 $pathObj->student_academics();
                    //                 $pathObj->student_department();
                    //                 $pathObj->student_examination();
                    //                 break;
                    //             default:
                    //                 $_GET['page'] = "my_profile";
                    //         }
                    //     } else {
                    //         $_GET['page'] = "my_profile";
                    //     }
                    // }
                    ?>

                </div>
                <a class="list-item side-bottom" href="?page=settings">
                    <div class="toggle-side-bar"><i class="fa fa-gear"></i></div>
                    <p>Settings</p>
                </a>

            </div>
            <div class="content">
                <div class="view">
                    <div class="min-height">
                        <?php //include('utility/navigation.php'); ?>
                        <div class="include"></div>
                        <script>
                            // $(document).ready(function() {
                            //     $('a.list-item[href],a.ref-item').click(function(e) {


                            //         $('.content-view .body-loading-overlay').fadeIn();

                            //         e.preventDefault();
                            //         ref = $(this).attr('href').split('=');

                            //         current_page = ref[1].split('/');
                            //         $('.breadcrumb-item.active').text(current_page[current_page.length - 1].replace(/_/g, " "));

                            //         localStorage.setItem("page", ref[1]);

                            //         $.ajax({
                            //             method: "POST",
                            //             url: "page_controller.php",
                            //             async: true,
                            //             data: {
                            //                 page: ref[1],
                            //                 path_view: '<?php echo json_encode($pathObj->paths_view) ?>',
                            //                 form_data: ''
                            //             },
                            //             success: function(data) {
                            //                 $('.include').html(data);

                            //                 $('.content-view .body-loading-overlay').slideUp();

                            //                 $('.side').removeClass('hover');
                            //                 $('.side-overlay').removeClass('show');

                            //             }
                            //         })
                            //     });

                            //     if (localStorage.getItem('page') != '') {
                            //         $('.content-view .body-loading-overlay').fadeIn();

                            //         current_page = localStorage.getItem('page').split('/');
                            //         $('.breadcrumb-item.active').text(current_page[current_page.length - 1].replace(/_/g, " "));

                            //         $.ajax({
                            //             method: "POST",
                            //             url: "page_controller.php",
                            //             async: true,
                            //             data: {
                            //                 page: localStorage.getItem('page'),
                            //                 path_view: '<?php echo json_encode($pathObj->paths_view) ?>',
                            //                 form_data: ''
                            //             },
                            //             success: function(data) {
                            //                 $('.include').html(data);
                            //                 $('.content-view .body-loading-overlay').slideUp();
                            //             }
                            //         })
                            //     } else {
                            //         $('.include').load('page_controller.php');
                            //     }
                            // })
                        </script>


                    </div>
                </div>

                <div class="footer flex-column-reverse flex-sm-row-reverse">
                    <p>© PVPP College of Engineering</p>
                    <p><a href="?page=our_team" class="ref-item text-white text-uppercase">Meet Our Team</a></p>
                    <p><b>Developed By</b> - Danish Shaikh and Team</p>
                </div>

            </div>
            <div class="side-overlay"></div>

            <script>
                var activeListItem = $('a.list-item[href="' + window.location.search + '"]');

                activeListItem.addClass('superactive');

                $(activeListItem).closest('.collapse').addClass('show');

                var closetListContent = $(activeListItem).closest('.list-content');

                $(closetListContent.find('[data-toggle="collapse"]')).addClass('active');

                $('[data-toggle="collapse"]').click(function() {
                    $('a.list-item').removeClass('active');
                    $(this).addClass('active');
                })

                $('#pin_menu').click(function() {
                    if (innerWidth > 996) {

                        $('.side,.content').toggleClass('stick');


                        if ($('.side,.content').hasClass('stick')) {
                            $('#pin_menu').css('transform', 'rotateZ(-45deg)')
                            localStorage.setItem("side-stick", "true");
                        } else {
                            $('#pin_menu').css('transform', 'rotateZ(0deg)')
                            localStorage.setItem("side-stick", "false");
                        }
                    }
                })

                $('#full_screen').click(function() {
                    if (document.fullscreen) {
                        document.exitFullscreen();
                    } else {
                        document.documentElement.requestFullscreen();
                    }
                });



                var caret_on = 0;
                $('#banner_up').click(function() {
                    if (caret_on == 0) {
                        $('.body-container').addClass('caret-on');
                        $('.content-view').css("height", "calc(100% - " + Number($('.top-bar').outerHeight()) + "px)");
                        $('.content').css("height", "calc(" + Number($(window).outerHeight()) + "px - " + Number($('.top-bar').outerHeight()) + "px + 1px)");

                        caret_on = 1;
                    } else {
                        $('.body-container').removeClass('caret-on');
                        $('.content').css("height", "calc(" + Number($(window).outerHeight()) + "px - " + Number($('.banner').outerHeight() + $('.top-bar').outerHeight()) + "px + 1px)");
                        $('.content-view').css("height", "calc(100% - " + Number($('.banner').outerHeight() + $('.top-bar').outerHeight()) + "px)");

                        caret_on = 0;
                    }
                })

                if (localStorage.getItem("side-stick") == "true" && innerWidth > 996) {
                    $('.side,.content').addClass('stick');
                    $('#pin_menu').css('transform', 'rotateZ(-45deg)')
                    // $('.bar-menu').addClass('open');
                }

                $('#lock_side,.side-overlay').click(function() {
                    $('.side').toggleClass('hover');
                    $('.bar-menu').removeClass('open');
                    $('.side-overlay').toggleClass('show');
                });

                $('#lock_side').click(function() {
                    $('.bar-menu').toggleClass('open');
                })

                $('.list-content').click(function() {
                    $('.side').addClass('hover');
                    $('.side-overlay').addClass('show');
                })
            </script>
        </div>

    </div>
</body>
<div id="file_handle"></div>


<style>
    .min-height {
        min-height: calc(100vh - 120px);
    }

    .reg-user-img {
        display: block;
        height: 65px;
        width: 65px;
        border-radius: 5rem;
        background: url(assets/img/dummy-avatar.png);
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        box-shadow: 0 3px 5px #ddd;

    }
</style>


<?php $addr_space = "" ?>
<script src="<?php echo $addr_space ?>assets/dataTables/jquery.dataTables.min.js?v4.6"></script>
<script src="<?php echo $addr_space ?>assets/dataTables/dataTables.buttons.min.js?v4.6"></script>
<script src="<?php echo $addr_space ?>assets/dataTables/jszip.min.js?v4.6"></script>
<script src="<?php echo $addr_space ?>assets/dataTables/pdfmake.min.js?v4.6"></script>
<script src="<?php echo $addr_space ?>assets/dataTables/vfs_fonts.js?v4.6"></script>
<script src="<?php echo $addr_space ?>assets/dataTables/buttons.html5.min.js?v4.6"></script>
<script src="<?php echo $addr_space ?>assets/dataTables/buttons.colVis.min.js?v4.6"></script>

<script src="<?php echo $addr_space ?>assets/slick/slick.js?v4.6"></script>

<style>
    table:hover {
        overflow-x: scroll !important;
    }
</style>

</html>