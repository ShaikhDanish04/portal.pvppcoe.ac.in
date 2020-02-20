<div class="fluid-container p-0">

    <div class="card pt-2">
        <div class="card-head justify-content-center">
            <p class="h3 text-primary"> OUR TEAM</p>
        </div>
        <div class="card-body container p-1 pb-4">
            <div class="row">
                <div class="col-lg-6">
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
                <div class="col-lg-6">
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
                <div class="col-lg-6">
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