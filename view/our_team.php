<script>
    $(document).ready(function() {
        $('.content').scrollTop(0)
    })
</script>
<div class="fluid-container p-0">
    <div class="card">
        <div class="card-head justify-content-center">
            <p class="h3 text-success"> Technology Stack</p>
        </div>
        <div class="card-body">
            <div class="row tech-list">

                <div class="col col-sm-4 col-lg-2 col-md-3">
                    <div class="card" style="background-color:#e44d26">
                        <div class="tech-logo">
                            <img src="assets/img/tech_stack/html5.png">
                            <p class="card-text h6 text-dark">HTML 5</p>
                        </div>
                        <div class="card-body p-0">
                            <p class="card-text h6">HTML 5</p>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-4 col-lg-2 col-md-3">
                    <div class="card" style="background-color:#264de4">
                        <div class="tech-logo">
                            <img src="assets/img/tech_stack/css3.png">
                            <p class="card-text h6 text-dark">CSS 3</p>
                        </div>
                        <div class="card-body p-0">
                            <p class="card-text h6">CSS 3</p>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-4 col-lg-2 col-md-3">
                    <div class="card" style="background-color:#f7e018">
                        <div class="tech-logo">
                            <img src="assets/img/tech_stack/js_org.png">
                            <p class="card-text h6 text-dark">JavaScript</p>
                        </div>
                        <div class="card-body p-0">
                            <p class="card-text h6 text-dark">JavaScript</p>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-4 col-lg-2 col-md-3">
                    <div class="card" style="background-color:#303030">
                        <div class="tech-logo">
                            <img src="assets/img/tech_stack/jquery.png">
                            <p class="card-text h6 text-dark">jQuery</p>
                        </div>
                        <div class="card-body p-0">
                            <p class="card-text h6">jQuery</p>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-4 col-lg-2 col-md-3">
                    <div class="card" style="background-color:#331361">
                        <div class="tech-logo">
                            <img src="assets/img/tech_stack/bootstrap4.png">
                            <p class="card-text h6 text-dark">Bootstrap 4</p>
                        </div>
                        <div class="card-body p-0">
                            <p class="card-text h6">Bootstrap 4</p>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-4 col-lg-2 col-md-3">
                    <div class="card" style="background-color:#2c89c8">
                        <div class="tech-logo">
                            <img src="assets/img/tech_stack/ajax.png">
                            <p class="card-text h6 text-dark">AJAX</p>
                        </div>
                        <div class="card-body p-0">
                            <p class="card-text h6">AJAX</p>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-4 col-lg-2 col-md-3">
                    <div class="card" style="background-color:#181818">
                        <div class="tech-logo">
                            <img src="assets/img/tech_stack/json.png">
                            <p class="card-text h6 text-dark">JSON</p>
                        </div>
                        <div class="card-body p-0">
                            <p class="card-text h6">JSON</p>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-4 col-lg-2 col-md-3">
                    <div class="card" style="background-color:#e48e02">
                        <div class="tech-logo">
                            <img src="assets/img/tech_stack/mysql.jpg">
                            <p class="card-text h6 text-dark">MySQL</p>
                        </div>
                        <div class="card-body p-0">
                            <p class="card-text h6">MySQL</p>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-4 col-lg-2 col-md-3">
                    <div class="card" style="background-color:#9ea1c6">
                        <div class="tech-logo">
                            <img src="assets/img/tech_stack/php.png">
                            <p class="card-text h6 text-dark">PHP</p>
                        </div>
                        <div class="card-body p-0">
                            <p class="card-text h6">PHP</p>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-4 col-lg-2 col-md-3">
                    <div class="card" style="background-color:#f05033">
                        <div class="tech-logo">
                            <img src="assets/img/tech_stack/git.png">
                            <p class="card-text h6 text-dark">Git</p>
                        </div>
                        <div class="card-body p-0">
                            <p class="card-text h6">Git</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .tech-list * {
                transition: .5s;
            }


            .tech-list .card {
                border-radius: 1.5rem;
                padding: .5rem;
                width: 130px;
                background-color: #888888;
                color: #fff;
                text-align: center;
                margin: 1rem auto;
            }

            .tech-logo {
                background-color: #fff;
                border-radius: 1rem;
                box-shadow: 0 0 15px #ccc inset;
                width: calc(130px - 1rem);
                height: 150px;

                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .tech-logo img {
                width: 60%;
            }

            .tech-list .card:hover .tech-logo {
                height: 185px;
            }

            .tech-list .card .card-text,
            .tech-list .card:hover .tech-logo .card-text {
                margin-bottom: .5rem;
                margin-top: .5rem;
                font-size: unset;
                font-size: 1rem;
            }

            .tech-list .card:hover .card-text,
            .tech-list .card .tech-logo .card-text {
                font-size: 1rem;
                font-weight: 500;
                line-height: 1.2;
                font-size: 0px;
                margin-bottom: 0;
                margin-top: 0;
            }

            .tech-list .card:hover .tech-logo .card-text {
                margin-bottom: 1.5rem;
                margin-top: 1rem;
            }
        </style>
    </div>
    <div class="card">
        <div class="card-head justify-content-center">
            <p class="h3 text-primary"> Our Team</p>
        </div>
        <div class="card-body container p-1 pb-4">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card flip-card">
                        <div class="team-card">
                            <img class="dev-img" src="assets/img/team/danish_shaikh.jpg" alt="">
                            <div class="card-body">
                                <p class="dev-name">Danish Shaikh</p>
                                <p class="dev-role">Project Leader | Full Stack Developer</p>
                                <p class="dev-quote">
                                    "Everything takes Time & Time give Everyting."
                                </p>
                            </div>
                        </div>
                        <div class="info-card">
                            <div class="card-body">
                                <p class="h4 mb-3 text-dark">Contact Details</p>
                                <div class="divider mb-3"></div>
                                <p class="mb-2"><b><i class="fa fa-envelope"></i> Email : </b>shaikh.danish4444@gmail.com</p>
                                <p class="mb-2"><b><i class="fa fa-phone"></i> Phone : </b>+91 865 533 2519</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card flip-card">
                        <div class="team-card">
                            <img class="dev-img" src="assets/img/team/sayalee_falle.jpeg" alt="">
                            <div class="card-body">
                                <p class="dev-name">Sayalee Falle</p>
                                <p class="dev-role">UX Designer | Tester</p>

                                <p class="dev-quote">
                                    "Everything takes Time & Time give Everyting."
                                </p>
                            </div>
                        </div>
                        <div class="info-card">
                            <div class="card-body">
                                <p class="h4 mb-3 text-dark">Contact Details</p>
                                <div class="divider mb-3"></div>
                                <p class="mb-2"><b><i class="fa fa-envelope"></i> Email : </b></p>
                                <p class="mb-2"><b><i class="fa fa-phone"></i> Phone : </b></p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card flip-card">
                        <div class="team-card">
                            <img class="dev-img" src="assets/img/team/sandeep_raskar.png" alt="">
                            <div class="card-body">
                                <p class="dev-name">Dr. Sandeep Raskar</p>
                                <p class="dev-role">Project Mentor</p>

                                <p class="dev-quote">
                                    "Everything takes Time & Time give Everyting."
                                </p>
                            </div>
                        </div>
                        <div class="info-card">
                            <div class="card-body">
                                <p class="h4 mb-3 text-dark">Contact Details</p>
                                <div class="divider mb-3"></div>
                                <p class="mb-2"><b><i class="fa fa-envelope"></i> Email : </b></p>
                                <p class="mb-2"><b><i class="fa fa-phone"></i> Phone : </b></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card * {
            transition: .5s;
        }

        .flip-card {
            overflow: hidden;
            border-radius: 1rem;
            margin-bottom: 1rem;
            position: relative;
            transform: rotateY(0deg);
            transition-delay: .5s;
            border-right: 5px solid #ad284a;
            height: 200px;
            overflow: hidden;
        }

        .flip-card * {
            transition-delay: .5s;
        }

        .info-card {
            height: 100%;
            width: 100%;
            /* background: linear-gradient(45deg, #fcf352, #f9aa18); */
            background: linear-gradient(45deg, white, #d6d6d6);
            padding: 1rem;
            text-align: center;
            opacity: 0;
            transform: rotateY(180deg);
            position: absolute;
            display: flex;
            align-items: center;
        }


        .team-card {
            position: absolute;
            display: flex;
            flex-direction: row;
            background: linear-gradient(45deg, white, #d6d6d6);
            position: relative;
        }

        .flip-card:hover {
            transform: rotateY(180deg);
        }

        .flip-card:hover .info-card {
            opacity: 1;
        }

        .team-card:before {
            right: 5px;
            border-radius: 50%;
            width: 35px;
            top: 8px;
            content: "";
            position: absolute;
            height: 35px;
            background: #fff;
            display: block;
            background-size: 85%;
            background-image: url(assets/img/college_logo.png);
            background-repeat: no-repeat;
            background-position: center;
            box-shadow: -3px 5px 15px #ccc;
        }

        .team-card:hover {
            transition: .5s;
            background: linear-gradient(145deg, white, #d6d6d6);

        }

        .team-card:hover .dev-name {
            text-shadow: 0 0 5px;
        }

        .dev-img {
            box-shadow: 0 0 15px #666;
            width: 180px;
            height: 200px;
            flex-shrink: 0;
        }

        .dev-name {
            padding-left: .2rem;
            font-size: 1.4rem;
            font-weight: 600;
            padding-bottom: .5rem;
            border-bottom: 1px solid #aaa;
            margin-bottom: .5rem;
        }

        .dev-role {
            padding-left: .2rem;
        }

        .dev-quote {
            margin-top: 1rem;
            padding-left: .2rem;
            font-size: 1rem;
            font-style: italic;
            text-align: justify;
        }

        @media (max-width: 575px) {
            .flip-card {
                border-right: 0;
                border-bottom: 5px solid #ad284a;
                height: unset;
            }

            .team-card {
                flex-direction: column;
            }

            .dev-img {
                width: 150px;
                height: 150px;
                margin: 20px auto;
                border-radius: 50%;
            }

            .dev-name,
            .dev-role {
                padding-left: 0px;
                text-align: center;
            }
        }
    </style>
</div>