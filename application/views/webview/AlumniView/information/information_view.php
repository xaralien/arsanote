    <div class="hero-information" style="  background-color:transparent;">

        <div class="background-image">
            <img id="background-image" src="" alt="">
        </div>

        <div class="wrapper-body">
            <div class="hero-slider pt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="slick">
                            <div class="item">
                                <img class="bg" src="https://literasictarsa.id/assets/images/asset_landing/hs03.jpg">
                            </div>
                            <div class="item">
                                <img class="bg" src="https://literasictarsa.id/assets/images/asset_landing/hs01.jpg">

                            </div>
                            <div class="item">
                                <img class="bg" src="https://literasictarsa.id/assets/images/asset_landing/hs03.jpg">

                            </div>
                            <div class="item">
                                <img class="bg" src="https://literasictarsa.id/assets/images/asset_tentang_kami/arsagigi/6A.jpg">

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <section id="portfolio" class="portfolio">
        <div class="wrapper-body" data-aos="fade-up">

            <div class="container-search d-flex justify-content-center mb-5">

                <div class="col-lg-10  search-filter d-flex justify-content-center align-items-center">
                    <div class="col-lg-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32" fill="none">
                            <path d="M24.3333 24.3333L31 31M1 14.3333C1 17.8696 2.40476 21.2609 4.90524 23.7614C7.40573 26.2619 10.7971 27.6667 14.3333 27.6667C17.8696 27.6667 21.2609 26.2619 23.7614 23.7614C26.2619 21.2609 27.6667 17.8696 27.6667 14.3333C27.6667 10.7971 26.2619 7.40573 23.7614 4.90524C21.2609 2.40476 17.8696 1 14.3333 1C10.7971 1 7.40573 2.40476 4.90524 4.90524C2.40476 7.40573 1 10.7971 1 14.3333Z" stroke="black" stroke-opacity="0.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="col-lg-7">

                        <div class="search-bar">
                            <!-- <div class="icon-search"> <svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
                                <path d="M24.3324 24.7529L30.999 31.4196M0.999023 14.7529C0.999023 18.2891 2.40378 21.6805 4.90427 24.181C7.40475 26.6815 10.7961 28.0862 14.3324 28.0862C17.8686 28.0862 21.26 26.6815 23.7604 24.181C26.2609 21.6805 27.6657 18.2891 27.6657 14.7529C27.6657 11.2167 26.2609 7.82528 23.7604 5.3248C21.26 2.82431 17.8686 1.41956 14.3324 1.41956C10.7961 1.41956 7.40475 2.82431 4.90427 5.3248C2.40378 7.82528 0.999023 11.2167 0.999023 14.7529Z" stroke="black" stroke-opacity="0.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg></div> -->


                            <input class="form-control" type="text" placeholder="Search...">
                        </div>
                    </div>


                    <div class="col-lg-2">
                        <select class="select2 js-example-basic-single">
                            <option>Terbaru</option>
                            <option>Terpopuler</option>

                        </select>
                    </div>
                </div>

            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <button class="btn filter-information filter-active"><a style="text-decoration:none;" class="text-dark" href="<?php echo base_url('information') ?>">All</a></button>
                        <?php foreach ($category as $row) { ?>
                            <button class="filter-information btn"><?php echo $row->category_name ?></button>

                        <?php } ?>


                    </ul>
                </div>
            </div>

            <div class="section-title">
                <h2 class="text-center">Information</h2>
                <p class="text-center">Temukan berbagai Informasi yang penting mengenai hal-hal yang </p>
                <p class="text-center">berkaitan dengan alumni SMAU CTARSA</p>
            </div>

            <div class="informationcard justify-content-center">
                <div class="card">
                    <?php foreach ($kabaralumni as $row) { ?>
                        <div class="row justify-content-center" onclick="showDetail(<?php echo $row->id ?>)" style="cursor:pointer">

                            <div class="col-md-4 justify-content-center">
                                <div class="card-title">
                                    <?php echo ($row->category_name) ?>

                                </div>
                                <h4> <?php echo ($row->title) ?>
                                </h4>
                                <p class="card-date"> <?php echo ($row->date) ?> | <i class="bi bi-eye pe-1"></i> <?php echo $row->count ?> kali dilihat</p>
                                <p> <?php echo substr($row->description, 0, 350) . "..." ?></p>
                            </div>

                            <div class="col-md-8 d-flex justify-content-end">
                                <a href="<?php echo base_url(); ?>Information/detail/?id=<?php echo $row->id ?>">
                                    <img class="image-alumni" src="<?php echo base_url(); ?>uploads/information/<?php echo $row->thumbnail_image; ?>" alt="">
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
    </section>

    <!--Populer Section -->

    <section id="carouselExampleControls" class="card-information-carosel">
        <div class="wrapper-body">
            <div class="title-section ">
                <div class="col-lg-12 d-flex justify-content-between">
                    <div class="col-lg-6 ">
                        <p>Sedang Populer</p>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end ">
                        <button type="button" class="btn btn-primary" onclick="showPopuler()">Lihat Semua</button>

                    </div>
                </div>
            </div>


            <div class="carousel">
                <div class="slider carousel-inner">
                    <?php foreach ($populer as $row) { ?>
                        <div class="carousel-items me-3" onclick="showDetail(<?php echo $row->id ?>)" style="cursor:pointer">
                            <div class="card">
                                <a href="<?php echo base_url(); ?>Information/detail/?id=<?php echo $row->id ?>">
                                    <img src="<?php echo base_url(); ?>uploads/information/<?php echo $row->thumbnail_image; ?>" class="card-img-top" alt="" />
                                </a>
                                <div class="card-body ">
                                    <div class="d-flex justify-content-between">
                                        <p class="title-category"><?php echo $row->category_name ?></p>
                                        <p class="card-title"><?php echo $row->date ?></p>
                                    </div>
                                    <p class="card-text">
                                        <?php echo $row->title ?>
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <a class="seemore" href="<?php echo base_url(); ?>Information/detail/?id=<?php echo $row->id ?>">
                                            <p>see more</p>
                                        </a>
                                        <p><i class="bi bi-eye pe-1"></i> <?php echo $row->count ?> kali dilihat</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } ?>




                </div>
            </div>
        </div>
    </section>


    <!-- End Populer section -->

    <!--Populer Section -->

    <section id="carouselExampleControls" class="card-information-carosel">
        <div class="wrapper-body">
            <div class="title-section ">
                <div class="col-lg-12 d-flex justify-content-between">
                    <div class="col-lg-6 ">
                        <p>Terbaru</p>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end ">
                        <button type="button" class="btn btn-primary" onclick="showTerbaru()">Lihat Semua</button>

                    </div>
                </div>
            </div>


            <div class="carousel">
                <div class="slider carousel-inner">
                    <?php foreach ($terbaru as $t) { ?>
                        <div class="carousel-items me-3" onclick="showDetail(<?php echo $t->id ?>)" style="cursor:pointer">
                            <div class="card">
                                <a href="<?php echo base_url(); ?>Information/detail/?id=<?php echo $t->id ?>"><img src=" <?php echo base_url(); ?>uploads/information/<?php echo $row->thumbnail_image; ?>" class="card-img-top" alt="Hollywood Sign on The Hill" />
                                </a>
                                <div class="card-body ">
                                    <div class="d-flex justify-content-between">
                                        <p class="title-category"><?php echo $t->category_name ?></p>
                                        <p class="card-title"><?php echo $t->date ?></p>
                                    </div>
                                    <p class="card-text">
                                        <?php echo $t->title ?>
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <a class="seemore" href="<?php echo base_url(); ?>Information/detail/?id=<?php echo $t->id ?>">
                                            <p>see more</p>
                                        </a>
                                        <p><i class="bi bi-eye pe-1"></i> <?php echo $t->count ?> kali dilihat</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
    </section>


    <!-- End Populer section -->




    <style>
        .hero-information {
            margin-top: 5rem;
            /* margin-bottom: 5rem; */
        }

        .slick .item .bg {
            width: 700px;
            height: 405px;
            object-fit: cover;
            border-radius: 30px;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.80) 32.15%, rgba(78, 102, 113, 0.00) 100%);
            background-position: center;
            background-size: cover;
            transition: .3s;
            margin: 0 -150px;
            opacity: .2;
            -webkit-transform: scale3d(0.8, 0.8, 1);
            transform: scale3d(0.8, 0.8, 1);
            transition: all 0.3s ease-in-out;

        }

        .slick .slick-list {
            padding: 20px 0 !important;
            /* padding-top:20px!important;
	padding-bottom:20px!important; */
        }

        .slick .slick-center .bg {
            opacity: 1;
            -webkit-transform: scale3d(1.0, 1.0, 1);
            transform: scale3d(1.0, 1.0, 1);
        }

        .slick-slide {
            outline: none
        }

        .slick-slide .slick-active .bg {
            margin: 0 30px !important;
        }

        .slick-prev,
        .slick-next {
            position: absolute;
            top: 50%;
            z-index: 1;
        }

        .slick-prev {
            left: 100px;
        }

        .slick-next {
            right: 100px;
        }

        .background-image {
            position: absolute;
            display: flex;
            width: 100vw;
            height: 678.42px;

            /* width: 100%;
            height: 60%; */
            object-fit: cover;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .background-image:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            /* width: 100vw;
            height: 60vh; */
            width: 100vw;
            height: 678.42px;
            object-fit: cover;
            background-color: rgba(255, 255, 255, .6);
            /* height: 100vh; */
            backdrop-filter: blur(10px);
            z-index: 11;
        }

        .background-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all .3s;

        }


        .hero-wrapper {
            width: 100%;
            height: 100vh;
            display: block;
            margin: auto;
            overflow: hidden;
        }
    </style>


    <script>
        function showDetail(id) {
            alert(id);
            url = "<?php echo base_url(); ?>Information/detail/?id=" + id,

                window.location = url
        }

        function showPopuler() {
            url = "<?php echo base_url('Information/populer_section'); ?>"
            window.location = url
        }

        function showTerbaru() {
            url = "<?php echo base_url('Information/newest_section'); ?>"
            window.location = url
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>