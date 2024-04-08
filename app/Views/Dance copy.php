<?php include('header.php'); ?>
<!-- <div class="wrapper-container">
    <div class="video-container">
        <video class="video-dance musicv" width="100%"  height = "21.5rem%" controls="1" autoplay="0" loop="0">
            <source src="public/images/Dance/DanceVidio.mp4" type="video/mp4">
        </video>


    </div>
</div> -->
<style>

</style>


<section class="s_header-section">
    <div class="container-fluid mt-2">
        <div class="row ">
            <div class="col-lg-12 col-md-12 col-12 p-5">
                <div class="bannervs">
                    <video class="video-dance bannerv" autoplay loop muted  controls="1">
                        <source src="<?=base_url(); ?>public/images/Dance/DanceVidio.mp4" type="video/mp4">
                    </video>                
                </div>
            </div>
            <!-- <div class="col-lg-4 col-md-4 bsimg">
            <div class="banneris">
                <img src="<?=base_url(); ?>public/images/Home/ball.png" class="img-fluid mt-5" alt="Image 4">
                </div>
            </div> -->
        </div>
    </div>
</section>
<section class="mt-4 dancepage">
    <div class="container">

        <!-- pills -->
        <div class="typesOfDance-tab">

            <ul class="row nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="col-lg-1 col-md-1 dancebthide ">
                </li>
                <!-- Kathak -->
                <li class="col-lg-2 col-md-2 col-6 nav-item " role="presentation">
                    <button class="nav-link  active" id="pills-Kathak-tab" data-bs-toggle="pill" data-bs-target="#pills-Kathak" type="button" role="tab" aria-controls="pills-Kathak" aria-selected="true">Kathak</button>
                </li>
                <!-- Bharatnatyam -->
                <li class="col-lg-2 col-md-2 col-6 nav-item " role="presentation">
                    <button class="nav-link " id="pills-Bharatnatyam-tab" data-bs-toggle="pill" data-bs-target="#pills-Bharatnatyam" type="button" role="tab" aria-controls="pills-Bharatnatyam" aria-selected="false">Bharatnatyam</button>
                </li>
                <!-- Odissi -->
                <li class="col-lg-2 col-md-2 col-6 nav-item " role="presentation">
                    <button class="nav-link " id="pills-Odissi-tab" data-bs-toggle="pill" data-bs-target="#pills-Odissi" type="button" role="tab" aria-controls="pills-Odissi" aria-selected="false">Odissi</button>
                </li>
                <!-- Bollywood -->
                <li class="col-lg-2 col-md-2 col-6 nav-item " role="presentation">
                    <button class="nav-link " id="pills-Bollywood-tab" data-bs-toggle="pill" data-bs-target="#pills-Bollywood" type="button" role="tab" aria-controls="pills-Bollywood" aria-selected="false">Bollywood Dance</button>
                </li>

                <!-- Western -->
                <li class="col-lg-2 col-md-2 col-6 nav-item " role="presentation">
                    <button class="nav-link " id="pills-Western-tab" data-bs-toggle="pill" data-bs-target="#pills-Western" type="button" role="tab" aria-controls="pills-Western" aria-selected="false">Western Dance</button>
                </li>
                <li class="col-lg-1 col-md-1 dancebthide ">
                </li>
                <!-- Semi-classical -->
                <li class="col-lg-4 col-md-4 col-6 nav-item " role="presentation">
                    <button class="nav-link big" id="pills-Semiclassical-tab" data-bs-toggle="pill" data-bs-target="#pills-Semiclassical" type="button" role="tab" aria-controls="pills-Semiclassical" aria-selected="false">Semi Classical</button>
                </li>
                <!-- Bhangra -->
                <li class="col-lg-4 col-md-4 col-6 nav-item " role="presentation">
                    <button class="nav-link big" id="pills-Bhangra-tab" data-bs-toggle="pill" data-bs-target="#pills-Bhangra" type="button" role="tab" aria-controls="pills-Bhangra" aria-selected="false">Bhangra</button>
                </li>
                <!-- Folk -->
                <li class="col-lg-4 col-md-4 col-6 nav-item " role="presentation">
                    <button class="nav-link big" id="pills-Folk-tab" data-bs-toggle="pill" data-bs-target="#pills-Folk" type="button" role="tab" aria-controls="pills-Folk" aria-selected="false">Folk Dance</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <!-- Kathak -->
                <div class="tab-pane fade show active" id="pills-Kathak" role="tabpanel" aria-labelledby="pills-Kathak-tab">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <img src="public/images/Dance/kathakImg1.svg" class="danceimg">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 textPara-col kathakp">
                            <h3 class="heading"> Kathak</h3>
                            <p>
                                Looking for the best online Kathak classes with a comprehensive syllabus? Look no further than our platform! Our online Kathak classes are designed to provide you with an immersive learning experience that will help you master this beautiful dance form. Our syllabus covers everything from the basics of footwork and hand gestures to complex choreography and improvisation techniques. With our experienced instructors and state-of-the-art technology, you can learn Kathak from the comfort of your own home and at your own pace. Join us today and discover the joy of Kathak dancing!
                            </p>
                            <div class="text-end mt-4">
                                <a type="button" class="btn btndemoh" href="<?= base_url(); ?>Home#pricing-section">START NOW</a>
                            </div>
                        </div>
                    </div>

                    <section class="learningBtn ">
                        <div class="container">
                            <ul class="list-inline row ">
                                <li class="col-lg-1 ">

                                </li>

                                <li class="list-inline-item col-lg-2 col-md-3 col-6">
                                    <!-- <button type="button" class="btn btndemo step">What you will learn</button> -->
                                    <a href="#learnKathak" class="btn btndemo step active" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">What you will learn</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Modules</button> -->
                                    <a href="#mod-kathak" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Modules</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Testimonials</button> -->
                                    <a href="#testimonials" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Testimonials</span>
                                        </span>
                                    </a>

                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Instructors</button> -->
                                    <a href="#Instructors" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Instructors</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-3 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Pricing</button> -->
                                    <a href="#pricing" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Pricing</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="col-lg-1 ">

                                </li>

                            </ul>
                        </div>
                    </section>

                    <section class="learningsec" id="learnKathak">
                        <div class="container">
                            <div class="row mt-5">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <h3>What you will learn</h3>
                                    <p class="">
                                        Our online Kathak dance classes are the perfect way to begin! Our comprehensive syllabus consists of seven steps that cover the essential elements of Kathak dance.
                                    </p>
                                    <ul class="list-group">
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Basic postures and hand gestures.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Focuses on the footwork and rhythms.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Introduces the spins and turns.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Chakkars.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Explores complex footwork patterns.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Delves into abhinaya, the art of facial expressions.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">
                                                Combines all the elements into a cohesive dance piece.</span>
                                        </li>
                                    </ul>


                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <img src="public/images/Dance/kathakImg2.svg" class="danceimg">
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="modulesec mft" id="mod-kathak">
                        <div class="container">
                   
                            <div class="month-row">
                                <div class="row">
                                    <div class="col-lg-12 col-12 text-center modulesdiv">
                                        <h3>Modules
                                        </h3>
                                        <span class="line"></span>

                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12 text-center imgmodule">
                                        <img src="public/images/Dance/kathakImg3.svg" class="danceimg danceimg5">

                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12 kathakp">
                                        <!-- trying new tab  -->
                                        <ul class="row nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <!-- Month 1 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link active monthtypes kathak" id="pills-KathakMonth1-tab" data-bs-toggle="pill" data-bs-target="#pills-KathakMonth1" type="button" role="tab" aria-controls="pills-KathakMonth1" aria-selected="true">Month 1</button>
                                            </li>
                                            <!-- Month 2 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-KathakMonth2-tab" data-bs-toggle="pill" data-bs-target="#pills-KathakMonth2" type="button" role="tab" aria-controls="pills-KathakMonth2" aria-selected="false">Month 2</button>
                                            </li>
                                            <!-- Month 3 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-KathakMonth3-tab" data-bs-toggle="pill" data-bs-target="#pills-KathakMonth3" type="button" role="tab" aria-controls="pills-KathakMonth3" aria-selected="false">Month 3</button>
                                            </li>
                                            <!-- Month 4 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-KathakMonth4-tab" data-bs-toggle="pill" data-bs-target="#pills-KathakMonth4" type="button" role="tab" aria-controls="pills-KathakMonth4" aria-selected="false">Month 4 </button>
                                            </li>
                                            <!-- Month 5 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-KathakMonth5-tab" data-bs-toggle="pill" data-bs-target="#pills-KathakMonth5" type="button" role="tab" aria-controls="pills-KathakMonth5" aria-selected="false">Month 5 </button>
                                            </li>
                                            <!-- Month 6 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-KathakMonth6-tab" data-bs-toggle="pill" data-bs-target="#pills-KathakMonth6" type="button" role="tab" aria-controls="pills-KathakMonth6" aria-selected="false">Month 6 </button>
                                            </li>
                                            <!-- Month 7 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-KathakMonth7-tab" data-bs-toggle="pill" data-bs-target="#pills-KathakMonth7" type="button" role="tab" aria-controls="pills-KathakMonth7" aria-selected="false">Month 7</button>
                                            </li>
                                            <!-- Month 8 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-KathakMonth8-tab" data-bs-toggle="pill" data-bs-target="#pills-KathakMonth8" type="button" role="tab" aria-controls="pills-KathakMonth8" aria-selected="false">Month 8</button>
                                            </li>
                                            <!-- Month 9 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-KathakMonth9-tab" data-bs-toggle="pill" data-bs-target="#pills-KathakMonth9" type="button" role="tab" aria-controls="pills-KathakMonth9" aria-selected="false">Month 9</button>
                                            </li>
                                            <!-- Month 10 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-KathakMonth10-tab" data-bs-toggle="pill" data-bs-target="#pills-KathakMonth10" type="button" role="tab" aria-controls="pills-KathakMonth10" aria-selected="false">Month 10</button>
                                            </li>
                                            <!-- Month 11 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-KathakMonth11-tab" data-bs-toggle="pill" data-bs-target="#pills-KathakMonth11" type="button" role="tab" aria-controls="pills-KathakMonth11" aria-selected="false">Month 11</button>
                                            </li>
                                            <!-- Month 12 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-KathakMonth12-tab" data-bs-toggle="pill" data-bs-target="#pills-KathakMonth12" type="button" role="tab" aria-controls="pills-KathakMonth12" aria-selected="false">Month 12</button>
                                            </li>
                                        </ul>
                                        <div class="contentSec">
                                            <div class="">
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8.png">
                                                    Live Private class -8
                                                </div>
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8.png">
                                                    Practice video -6
                                                </div>
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8-literature.png">
                                                    Reading content/Quiz - 2
                                                </div>
                                                <div class="module-text">

                                                    <div class="tab-content" id="pills-tabContent">
                                                        <!-- Month 1 -->
                                                        <div class="tab-pane fade show active" id="pills-KathakMonth1" role="tabpanel" aria-labelledby="pills-KathakMonth1-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 1 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Kathak Dance Style.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic Footwork Techniques.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Hand Gestures (Mudras).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Understanding Rhythm and Timing.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 2 -->
                                                        <div class="tab-pane fade" id="pills-KathakMonth2" role="tabpanel" aria-labelledby="pills-KathakMonth2-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 2 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic Chakkar (Spins).
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Introduction to Tatkar (Footwork with Bells). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Simple Hand and Feet Coordination.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic Kathak postures. Rhythm and Timing.</li>
                                                                </ul>

                                                            </div>
                                                        </div>

                                                        <!-- Month 3 -->
                                                        <div class="tab-pane fade" id="pills-KathakMonth3" role="tabpanel" aria-labelledby="pills-KathakMonth3-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 3 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic Pirouette Technique.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Kavitt (Narrative Dance). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic Hastak (Hand Movement) Exercises.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Practice of Basic Kathak Compositions.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 4 -->
                                                        <div class="tab-pane fade" id="pills-KathakMonth4" role="tabpanel" aria-labelledby="pills-KathakMonth4-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 4 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Tihai (A Three-fold Repetition).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Teen Taal (16-Beat Rhythm Cycle). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic Expression Techniques (Abhinaya).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Practice of Basic Kathak Compositions.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 5 -->
                                                        <div class="tab-pane fade" id="pills-KathakMonth5" role="tabpanel" aria-labelledby="pills-KathakMonth5-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 5 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate Footwork Techniques.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Intermediate Chakkar (Spins). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate Hand and Feet Coordination.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Practice of Intermediate Kathak Compositions.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 6 -->
                                                        <div class="tab-pane fade" id="pills-KathakMonth6" role="tabpanel" aria-labelledby="pills-KathakMonth6-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 6 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Advanced Footwork Techniques.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Advanced Chakkar (Spins). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Advanced Hand and Feet Coordination.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Practice of Advanced Kathak Compositions.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 7 -->
                                                        <div class="tab-pane fade" id="pills-KathakMonth7" role="tabpanel" aria-labelledby="pills-KathakMonth7-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 7 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Vilambit Laya (Slow Tempo).
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Introduction to Ek Taal (12-Beat Rhythm Cycle). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Bandish (Lyrics).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Practice of Vilambit Kathak Compositions.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 8 -->
                                                        <div class="tab-pane fade" id="pills-KathakMonth8" role="tabpanel" aria-labelledby="pills-KathakMonth8-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 8 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Drut Laya (Fast Tempo).
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Introduction to Jhap Taal (10-Beat Rhythm Cycle). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Tukda (Short Compositions).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Practice of Drut Laya Kathak Compositions.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 9 -->
                                                        <div class="tab-pane fade" id="pills-KathakMonth9" role="tabpanel" aria-labelledby="pills-KathakMonth9-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 9 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Advanced Expression Techniques (Abhinaya).
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Practice of Advanced Kathak Compositions. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Kavit (Poetry).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Practice of Kavit-Based Kathak Compositions.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 10 -->
                                                        <div class="tab-pane fade" id="pills-KathakMonth10" role="tabpanel" aria-labelledby="pills-KathakMonth10-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 10 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Tarana (Musical Composition).
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Practice of Tarana-Based Kathak Compositions. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Advanced Practice of Footwork and Hand Gestures.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Guru-Shishya Tradition.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 11 -->
                                                        <div class="tab-pane fade" id="pills-KathakMonth11" role="tabpanel" aria-labelledby="pills-KathakMonth11-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 11:</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Thaat (Posture).
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Introduction to Jaati (Complex Rhythm Patterns). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Advanced Practice of Kathak Compositions.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Practice of Choreography for Stage Performances.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 12 -->
                                                        <div class="tab-pane fade" id="pills-KathakMonth12" role="tabpanel" aria-labelledby="pills-KathakMonth12-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 12 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Practice of Kathak Compositions for Stage Performances.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Review and Recap of Techniques and Compositions. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Practice of Abhinaya.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Final Performance and Certiﬁcation.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class=" row  mt-3 Notediv">
                                                            <p class="Notepara">
                                                                <strong>Note : </strong>
                                                                Each month could have more speciﬁc topics and exercises, depending on the level and goals of the students. Additionally, it is important to have regular assessments and feedback to ensure progress and adaptation to the individual needs of the students.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>

                <!-- Bharatnatyam -->
                <div class="tab-pane fade" id="pills-Bharatnatyam" role="tabpanel" aria-labelledby="pills-Bharatnatyam-tab">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <img src="public/images/Dance/Bharatnatyam.svg" class="danceimg">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 textPara-col">
                            <h3 class="heading"> Bharatnatyam</h3>
                            <p>
                                Experience the grace and beauty of Bharatanatyam with our online dance classes! Our syllabus covers the fundamentals of this ancient Indian classical dance form, from basic postures and hand gestures to complex choreography and improvisation techniques. Our experienced instructors provide personalized guidance and support to help you perfect your technique and develop your own unique style. With our convenient online platform, you can learn Bharatanatyam from the comfort of your own home and at your own pace. Join our community of dancers today and discover the rich cultural heritage and artistry of Bharatanatyam!
                            </p>
                            <div class="text-end mt-4">
                                <a type="button" class="btn btndemoh" href="<?= base_url(); ?>Home#pricing-section">START NOW</a>
                            </div>
                        </div>
                    </div>

                    <section class="learningBtn">
                        <div class="container">
                            <ul class="list-inline row ">
                                <li class="col-lg-1 ">

                                </li>

                                <li class="list-inline-item col-lg-2 col-md-3 col-6 ">
                                    <!-- <button type="button" class="btn btndemo step">What you will learn</button> -->
                                    <a href="#learnbharatnatyam" class="btn btndemo step active" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">What you will learn</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Modules</button> -->
                                    <a href="#mod-bharatnatyam" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Modules</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Testimonials</button> -->
                                    <a href="#testimonials" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Testimonials</span>
                                        </span>
                                    </a>

                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Instructors</button> -->
                                    <a href="#Instructors" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Instructors</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-3 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Pricing</button> -->
                                    <a href="#pricing" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Pricing</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="col-lg-1 ">

                                </li>

                            </ul>
                        </div>
                    </section>
                    <section class="learningsec" id="learnbharatnatyam">
                        <div class="container">
                            <div class="row mt-5">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <h3>What you will learn</h3>
                                    <p>
                                        Our online Kathak dance classes are the perfect way to begin! Our comprehensive syllabus consists of seven steps that cover the essential elements of Kathak dance.
                                    </p>
                                    <ul class="list-group">
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Basic postures and hand gestures.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Focuses on the footwork and rhythms.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Introduces the spins and turns.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Chakkars.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Explores complex footwork patterns.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Delves into abhinaya, the art of facial expressions.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">
                                                Combines all the elements into a cohesive dance piece.</span>
                                        </li>
                                    </ul>


                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <img src="public/images/Dance/2.svg" class="danceimg">
                                </div>
                            </div>
                        </div>
                    </section>


                    <section class="modulesec mft" id="mod-bharatnatyam">
                        <div class="container">
                            <div class="row">

                                <span class="text-center"> <button type="button" class="btn step mkathak dancemodul">Modules</button></span>
                            </div>
                            <div class="month-row">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-12 text-center">
                                        <img src="public/images/Dance/bharatnatyam-3.svg" class="danceimg danceimg5">

                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12">


                                        <!-- trying new tab  -->
                                        <ul class="row nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <!-- Month 1 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link active monthtypes kathak" id="pills-BharatnatyamMonth1-tab" data-bs-toggle="pill" data-bs-target="#pills-BharatnatyamMonth1" type="button" role="tab" aria-controls="pills-BharatnatyamMonth1" aria-selected="true">Month 1</button>
                                            </li>
                                            <!-- Month 2 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BharatnatyamMonth2-tab" data-bs-toggle="pill" data-bs-target="#pills-BharatnatyamMonth2" type="button" role="tab" aria-controls="pills-BharatnatyamMonth2" aria-selected="false">Month 2</button>
                                            </li>
                                            <!-- Month 3 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BharatnatyamMonth3-tab" data-bs-toggle="pill" data-bs-target="#pills-BharatnatyamMonth3" type="button" role="tab" aria-controls="pills-BharatnatyamMonth3" aria-selected="false">Month 3</button>
                                            </li>
                                            <!-- Month 4 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BharatnatyamMonth4-tab" data-bs-toggle="pill" data-bs-target="#pills-BharatnatyamMonth4" type="button" role="tab" aria-controls="pills-BharatnatyamMonth4" aria-selected="false">Month 4 </button>
                                            </li>
                                            <!-- Month 5 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BharatnatyamMonth5-tab" data-bs-toggle="pill" data-bs-target="#pills-BharatnatyamMonth5" type="button" role="tab" aria-controls="pills-BharatnatyamMonth5" aria-selected="false">Month 5 </button>
                                            </li>
                                            <!-- Month 6 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BharatnatyamMonth6-tab" data-bs-toggle="pill" data-bs-target="#pills-BharatnatyamMonth6" type="button" role="tab" aria-controls="pills-BharatnatyamMonth6" aria-selected="false">Month 6 </button>
                                            </li>
                                            <!-- Month 7 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BharatnatyamMonth7-tab" data-bs-toggle="pill" data-bs-target="#pills-BharatnatyamMonth7" type="button" role="tab" aria-controls="pills-BharatnatyamMonth7" aria-selected="false">Month 7</button>
                                            </li>
                                            <!-- Month 8 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BharatnatyamMonth8-tab" data-bs-toggle="pill" data-bs-target="#pills-BharatnatyamMonth8" type="button" role="tab" aria-controls="pills-BharatnatyamMonth8" aria-selected="false">Month 8</button>
                                            </li>
                                            <!-- Month 9 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BharatnatyamMonth9-tab" data-bs-toggle="pill" data-bs-target="#pills-BharatnatyamMonth9" type="button" role="tab" aria-controls="pills-BharatnatyamMonth9" aria-selected="false">Month 9</button>
                                            </li>
                                            <!-- Month 10 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BharatnatyamMonth10-tab" data-bs-toggle="pill" data-bs-target="#pills-BharatnatyamMonth10" type="button" role="tab" aria-controls="pills-BharatnatyamMonth10" aria-selected="false">Month 10</button>
                                            </li>
                                            <!-- Month 11 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BharatnatyamMonth11-tab" data-bs-toggle="pill" data-bs-target="#pills-BharatnatyamMonth11" type="button" role="tab" aria-controls="pills-BharatnatyamMonth11" aria-selected="false">Month 11</button>
                                            </li>
                                            <!-- Month 12 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BharatnatyamMonth12-tab" data-bs-toggle="pill" data-bs-target="#pills-BharatnatyamMonth12" type="button" role="tab" aria-controls="pills-BharatnatyamMonth12" aria-selected="false">Month 12</button>
                                            </li>
                                        </ul>
                                        <div class="contentSec">
                                            <div class="">
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8.png">
                                                    Live Private class -8
                                                </div>
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8.png">
                                                    Practice video -6
                                                </div>
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8-literature.png">
                                                    Reading content/Quiz - 2
                                                </div>
                                                <div class="module-text">

                                                    <div class="tab-content" id="pills-tabContent">
                                                        <!-- Month 1 -->
                                                        <div class="tab-pane fade show active" id="pills-BharatnatyamMonth1" role="tabpanel" aria-labelledby="pills-BharatnatyamMonth1-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 1 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Bharatanatyam and its history.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic posture and hand gestures (hastas).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Simple adavus (basic steps).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Mudras (hand gestures) and their meanings.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic rhythm (tala) exercises.</li>
                                                                </ul>

                                                            </div>
                                                        </div>

                                                        <!-- Month 2 -->
                                                        <div class="tab-pane fade" id="pills-BharatnatyamMonth2" role="tabpanel" aria-labelledby="pills-BharatnatyamMonth2-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 2 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to facial expressions (abhinaya).
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Basic adavus (steps) in different rhythms (tala). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Jathis (rhythmic patterns).</li>

                                                                </ul>


                                                            </div>
                                                        </div>

                                                        <!-- Month 3 -->
                                                        <div class="tab-pane fade" id="pills-BharatnatyamMonth3" role="tabpanel" aria-labelledby="pills-BharatnatyamMonth3-tab">

                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 3 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to music in Bharatanatyam.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Basic adavus (steps) in different speeds (laya). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Asamyuta Hasta (single hand gestures).</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 4 -->
                                                        <div class="tab-pane fade" id="pills-BharatnatyamMonth4" role="tabpanel" aria-labelledby="pills-BharatnatyamMonth4-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 4 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Natya Shastra (ancient Indian text on performing arts).
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Basic adavus (steps) in different directions. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Samyuta Hasta (double hand gestures).</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 5 -->
                                                        <div class="tab-pane fade" id="pills-BharatnatyamMonth5" role="tabpanel" aria-labelledby="pills-BharatnatyamMonth5-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 5 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the concept of Bhava (emotions).
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Basic adavus (steps) in different tempos (gati). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Hastas used in Natya (dramatic) pieces.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 6 -->
                                                        <div class="tab-pane fade" id="pills-BharatnatyamMonth6" role="tabpanel" aria-labelledby="pills-BharatnatyamMonth6-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 6 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the concept of Rasa (aesthetic emotions) .
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Basic adavus (steps) in different styles (bhavas). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Adavu combinations.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 7 -->
                                                        <div class="tab-pane fade" id="pills-BharatnatyamMonth7" role="tabpanel" aria-labelledby="pills-BharatnatyamMonth7-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 7 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the Abhinaya Darpana (classical text on Abhinaya).
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Introduction to Abhinaya (expression) in Bharatanatyam. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic adavus (steps) in different Nayikas (heroine) and Nayakas (hero) styles.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 8 -->
                                                        <div class="tab-pane fade" id="pills-BharatnatyamMonth8" role="tabpanel" aria-labelledby="pills-BharatnatyamMonth8-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 8 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Hastas used in Nritta (pure dance) pieces.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Basic adavus (steps) in different Hastas combinations.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Alarippu (opening dance).</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 9 -->
                                                        <div class="tab-pane fade" id="pills-BharatnatyamMonth9" role="tabpanel" aria-labelledby="pills-BharatnatyamMonth9-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 9 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Varnam (a complex dance piece that combines both Nritta and Abhinaya).
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Basic adavus (steps) in different Varnam styles. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Pada Varnam (dance piece with lyrics).</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 10 -->
                                                        <div class="tab-pane fade" id="pills-BharatnatyamMonth10" role="tabpanel" aria-labelledby="pills-BharatnatyamMonth10-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 10 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the concept of Tala (rhythm) and its variations.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Basic adavus (steps) in different Tala variations. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the concept of Laya (tempo) and its variations.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 11 -->
                                                        <div class="tab-pane fade" id="pills-BharatnatyamMonth11" role="tabpanel" aria-labelledby="pills-BharatnatyamMonth11-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 11:</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Tillana (fast-paced pure dance piece).
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Basic adavus (steps) in different Tillana styles. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Shabdam (dance piece with lyrics and Abhinaya).</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 12 -->
                                                        <div class="tab-pane fade" id="pills-BharatnatyamMonth12" role="tabpanel" aria-labelledby="pills-BharatnatyamMonth12-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 12 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Margam (traditional Bharatanatyam repertoire).
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Recap of all adavus and Hastas learned in the previous months. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to performance techniques and stage presence.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class=" row  mt-3 Notediv">
                                                            <p class="Notepara">
                                                                <strong>Note : </strong>
                                                                Each month could have more speciﬁc topics and exercises, depending on the level and goals of the students. Additionally, it is important to have regular assessments and feedback to ensure progress and adaptation to the individual needs of the students.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>

                <!-- Odissi -->
                <div class="tab-pane fade" id="pills-Odissi" role="tabpanel" aria-labelledby="pills-Odissi-tab">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <img src="public/images/Dance/odissi.png" class="danceimg">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 textPara-col">
                            <h3 class="heading"> Odissi</h3>
                            <p>
                                Explore the captivating rhythms and movements of Odissi with our online dance classes! Our expert instructors offer a comprehensive syllabus that covers the basics of this traditional Indian classical dance form, from footwork and hand gestures to complex choreography and storytelling techniques. Our personalized approach and state-of-the-art technology allow you to learn Odissi from anywhere in the world, at your own pace. Whether you’re a beginner or an experienced dancer, our online Odissi classes provide a fun and engaging way to develop your skills and deepen your appreciation of this beautiful art form. Join us today and discover the magic of Odissi!
                            </p>
                            <div class="text-end mt-4">
                                <a type="button" class="btn btndemoh" href="<?= base_url(); ?>Home#pricing-section">START NOW</a>
                            </div>
                        </div>
                    </div>

                    <section class="learningBtn">
                        <div class="container">
                            <ul class="list-inline row ">
                                <li class="col-lg-1 ">

                                </li>

                                <li class="list-inline-item col-lg-2 col-md-3 col-6 ">
                                    <!-- <button type="button" class="btn btndemo step">What you will learn</button> -->
                                    <a href="#learnodissi" class="btn btndemo step active" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">What you will learn</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Modules</button> -->
                                    <a href="#mod-odissi" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Modules</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Testimonials</button> -->
                                    <a href="#testimonials" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Testimonials</span>
                                        </span>
                                    </a>

                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Instructors</button> -->
                                    <a href="#Instructors" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Instructors</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-3 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Pricing</button> -->
                                    <a href="#pricing" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Pricing</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="col-lg-1 ">

                                </li>

                            </ul>
                        </div>
                    </section>
                    <section class="learningsec" id="learnodissi">
                        <div class="container">
                            <div class="row mt-5">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <h3>What you will learn</h3>
                                    <p>
                                        Our online Kathak dance classes are the perfect way to begin! Our comprehensive syllabus consists of seven steps that cover the essential elements of Kathak dance.
                                    </p>
                                    <ul class="list-group">
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Basic postures and hand gestures.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Focuses on the footwork and rhythms.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Introduces the spins and turns.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Chakkars.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Explores complex footwork patterns.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Delves into abhinaya, the art of facial expressions.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">
                                                Combines all the elements into a cohesive dance piece.</span>
                                        </li>
                                    </ul>


                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <!-- Odissi -->
                                    <img src="public/images/Dance/odissi-3.png" class="danceimg">
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="modulesec mft" id="mod-odissi">
                        <div class="container">
                            <div class="row">
                                <span class="text-center"> <button type="button" class="btn step mkathak dancemodul">Modules</button></span>
                            </div>
                            <div class="month-row">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-12 text-center">
                                        <img src="public/images/Dance/odissi-4.png" class="danceimg danceimg5">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <!-- trying new tab  -->
                                        <ul class="row nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <!-- Month 1 & 2 -->
                                            <li class="col-lg-4 col-md-4 col-6 nav-item" role="presentation">
                                                <button class="nav-link active monthtypes CombTwoMonths" id="pills-OdissiMonth1-2-tab" data-bs-toggle="pill" data-bs-target="#pills-OdissiMonth1-2" type="button" role="tab" aria-controls="pills-OdissiMonth1-2" aria-selected="true">Month 1-2</button>
                                            </li>
                                            <!-- Month 3 & 4-->
                                            <li class="col-lg-4 col-md-4 col-6 nav-item" role="presentation">
                                                <button class="nav-link monthtypes CombTwoMonths" id="pills-OdissiMonth3-4-tab" data-bs-toggle="pill" data-bs-target="#pills-OdissiMonth3-4" type="button" role="tab" aria-controls="pills-OdissiMonth3-4" aria-selected="false">Month 3-4</button>
                                            </li>
                                            <!-- Month 5 & 6-->
                                            <li class="col-lg-4 col-md-4 col-6  nav-item" role="presentation">
                                                <button class="nav-link monthtypes CombTwoMonths" id="pills-OdissiMonth5-6-tab" data-bs-toggle="pill" data-bs-target="#pills-OdissiMonth5-6" type="button" role="tab" aria-controls="pills-OdissiMonth5-6" aria-selected="false">Month 5-6</button>
                                            </li>
                                            <!-- Month  7 & 8  -->
                                            <li class="col-lg-4 col-md-4 col-6  nav-item" role="presentation">
                                                <button class="nav-link monthtypes CombTwoMonths" id="pills-Month7-8-tab" data-bs-toggle="pill" data-bs-target="#pills-OdissiMonth7-8" type="button" role="tab" aria-controls="pills-OdissiMonth7-8" aria-selected="false">Month 7-8 </button>
                                            </li>
                                            <!-- Month 9 & 10 -->
                                            <li class="col-lg-4 col-md-4 col-6 nav-item" role="presentation">
                                                <button class="nav-link monthtypes CombTwoMonths" id="pills-Month9-10-tab" data-bs-toggle="pill" data-bs-target="#pills-OdissiMonth9-10" type="button" role="tab" aria-controls="pills-OdissiMonth9-10" aria-selected="false">Month 9-10</button>
                                            </li>
                                            <!-- Month  11 & 12  -->
                                            <li class="col-lg-4 col-md-4 col-6  nav-item" role="presentation">
                                                <button class="nav-link monthtypes CombTwoMonths" id="pills-Month11-12-tab" data-bs-toggle="pill" data-bs-target="#pills-OdissiMonth11-12" type="button" role="tab" aria-controls="pills-OdissiMonth11-12" aria-selected="false">Month 11-12 </button>
                                            </li>

                                        </ul>
                                        <div class="contentSec">
                                            <div class="">
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8.png">
                                                    Live Private class -8
                                                </div>
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8.png">
                                                    Practice video -6
                                                </div>
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8-literature.png">
                                                    Reading content/Quiz - 2
                                                </div>
                                                <div class="module-text">

                                                    <div class="tab-content" id="pills-tabContent">
                                                        <!-- Month 1 & 2 -->
                                                        <div class="tab-pane fade show active" id="pills-OdissiMonth1-2" role="tabpanel" aria-labelledby="pills-OdissiMonth1-2-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 1-2 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Odissi and its history.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic posture and hand gestures (hastas).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic rhythm (tala) exercises.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the Odissi music and its instruments.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic mudras (hand gestures) and their meanings.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic adavus (dance steps) in different rhythms (tala).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the concept of Bhava (emotions) in Odissi.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 3 & 4 -->
                                                        <div class="tab-pane fade" id="pills-OdissiMonth3-4" role="tabpanel" aria-labelledby="pills-OdissiMonth3-4-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 3-4 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the three primary positions (tribhangi, chowk and samabhanga).
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Basic adavus (dance steps) in different positions (tribhangi, chowk and samabhanga). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic abhinaya (facial expressions) in Odissi.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic adavus (dance steps) in different tempos (laya).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the basic repertoire of Odissi.</li>
                                                                </ul>

                                                            </div>

                                                        </div>

                                                        <!-- Month 5 & 6 -->
                                                        <div class="tab-pane fade" id="pills-OdissiMonth5-6" role="tabpanel" aria-labelledby="pills-OdissiMonth5-6-tab">

                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 5-6 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the basic mudras (hand gestures) and their use in Odissi.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Basic adavus (dance steps) in different directions and lines. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic tala (rhythm) exercises with music.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the basic poses (asanas) in Odissi.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic adavus (dance steps) in different speeds (gati)</li>
                                                                </ul>

                                                            </div>


                                                        </div>

                                                        <!-- Month 7 & 8  -->
                                                        <div class="tab-pane fade" id="pills-OdissiMonth7-8" role="tabpanel" aria-labelledby="pills-OdissiMonth7-8-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 7-8 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the basic hasta (hand gestures) and their use in Odissi.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Basic adavus (dance steps) in different styles (bhava). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic abhinaya (facial expressions) in different emotions (rasa).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic adavus (dance steps) in different Nayikas (heroine) and Nayakas (hero) styles.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the concept of Taala (rhythm) and its variations.</li>
                                                                </ul>

                                                            </div>


                                                        </div>

                                                        <!-- Month 9 & 10 -->
                                                        <div class="tab-pane fade" id="pills-OdissiMonth9-10" role="tabpanel" aria-labelledby="pills-OdissiMonth9-10-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 9-10 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate adavus (dance steps) and their variations.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Intermediate tala (rhythm) exercises with music. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate abhinaya (facial expressions) in different emotions (rasa)</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate mudras (hand gestures) and their use in Odissi.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate adavus (dance steps) in different Nayikas (heroine) and Nayakas (hero) styles.
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 11 & 12 -->
                                                        <div class="tab-pane fade" id="pills-OdissiMonth11-12" role="tabpanel" aria-labelledby="pills-OdissiMonth11-12-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 11-12 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate poses (asanas) in Odissi.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Intermediate adavus (dance steps) in different speeds (gati). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the basic repertoire of Abhinaya (expressive) pieces.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate adavus (dance steps) in different positions (tribhangi, chowk and samabhanga).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate adavus (dance steps) in different tempos (laya).
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class=" row  mt-3 Notediv">
                                                            <p class="Notepara">
                                                                <strong>Note : </strong>
                                                                The syllabus may vary based on the instructor’s preference and the student’s progress. It’s important to practice regularly and seek feedback from the instructor to improve.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>

                <!-- Bollywood -->
                <div class="tab-pane fade" id="pills-Bollywood" role="tabpanel" aria-labelledby="pills-Bollywood-tab">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <img src="public/images/Dance/bollywood-dance.png" class="danceimg">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 textPara-col">
                            <h3 class="heading"> Bollywood</h3>
                            <p>
                                Ready to add some Bollywood ﬂair to your dance routine? Our online Bollywood dance classes have got you covered! Our expert instructors will guide you through everything from basic steps to complex choreography, helping you master the signature moves of Bollywood dance. Our comprehensive syllabus includes techniques for Bollywood-style footwork, hand gestures, and facial expressions, as well as tips for incorporating your own personal style into your dancing. With our ﬂexible scheduling and convenient online platform, you can learn Bollywood dance from anywhere, at any time. Join us today and start moving to the beat of Bollywood!
                            </p>
                            <div class="text-end mt-4">
                                <a type="button" class="btn btndemoh" href="<?= base_url(); ?>Home#pricing-section">START NOW</a>
                            </div>
                        </div>
                    </div>

                    <section class="learningBtn">
                        <div class="container">
                            <ul class="list-inline row ">
                                <li class="col-lg-1 ">

                                </li>

                                <li class="list-inline-item col-lg-2 col-md-3 col-6">
                                    <!-- <button type="button" class="btn btndemo step">What you will learn</button> -->
                                    <a href="#learnBollywood" class="btn btndemo step active" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">What you will learn</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Modules</button> -->
                                    <a href="#mod-Bollywood" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Modules</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Testimonials</button> -->
                                    <a href="#testimonials" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Testimonials</span>
                                        </span>
                                    </a>

                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Instructors</button> -->
                                    <a href="#Instructors" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Instructors</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-3 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Pricing</button> -->
                                    <a href="#pricing" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Pricing</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="col-lg-1 ">

                                </li>

                            </ul>
                        </div>
                    </section>
                    <section class="learningsec" id="learnBollywood">
                        <div class="container">
                            <div class="row mt-5">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <h3>What you will learn</h3>
                                    <p>
                                        Our online Kathak dance classes are the perfect way to begin! Our comprehensive syllabus consists of seven steps that cover the essential elements of Kathak dance.
                                    </p>
                                    <ul class="list-group">
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Basic postures and hand gestures.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Focuses on the footwork and rhythms.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Introduces the spins and turns.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Chakkars.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Explores complex footwork patterns.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Delves into abhinaya, the art of facial expressions.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">
                                                Combines all the elements into a cohesive dance piece.</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <!-- Bollywood -->
                                    <img src="public/images/Dance/bollywood-21.png" class="danceimg">
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="modulesec mft" id="mod-Bollywood">
                        <div class="container">
                            <div class="row">
                                <span class="text-center"> <button type="button" class="btn step mkathak dancemodul">Modules</button></span>
                            </div>
                            <div class="month-row">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-12 text-center">
                                        <img src="public/images/Dance/bollywood-3.png" class="danceimg danceimg5">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <!-- trying new tab  -->
                                        <ul class="row nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <!-- Month 1 & 2 -->
                                            <li class="col-lg-4 col-md-4 col-6 nav-item" role="presentation">
                                                <button class="nav-link active monthtypes CombTwoMonths" id="pills-BollywoodMonth1-2-tab" data-bs-toggle="pill" data-bs-target="#pills-BollywoodMonth1-2" type="button" role="tab" aria-controls="pills-BollywoodMonth1-2" aria-selected="true">Month 1-2</button>
                                            </li>
                                            <!-- Month 3 & 4-->
                                            <li class="col-lg-4 col-md-4 col-6 nav-item" role="presentation">
                                                <button class="nav-link monthtypes CombTwoMonths" id="pills-BollywoodMonth3-4-tab" data-bs-toggle="pill" data-bs-target="#pills-BollywoodMonth3-4" type="button" role="tab" aria-controls="pills-BollywoodMonth3-4" aria-selected="false">Month 3-4</button>
                                            </li>
                                            <!-- Month 5 & 6-->
                                            <li class="col-lg-4 col-md-4 col-6 nav-item" role="presentation">
                                                <button class="nav-link monthtypes CombTwoMonths" id="pills-BollywoodMonth5-6-tab" data-bs-toggle="pill" data-bs-target="#pills-BollywoodMonth5-6" type="button" role="tab" aria-controls="pills-BollywoodMonth5-6" aria-selected="false">Month 5-6</button>
                                            </li>
                                            <!-- Month  7 & 8  -->
                                            <li class="col-lg-4 col-md-4 col-6 nav-item" role="presentation">
                                                <button class="nav-link monthtypes CombTwoMonths" id="pills-BollywoodMonth7-8-tab" data-bs-toggle="pill" data-bs-target="#pills-BollywoodMonth7-8" type="button" role="tab" aria-controls="pills-BollywoodMonth7-8" aria-selected="false">Month 7-8 </button>
                                            </li>
                                            <!-- Month 9 & 10 -->
                                            <li class="col-lg-4 col-md-4 col-6 nav-item" role="presentation">
                                                <button class="nav-link monthtypes CombTwoMonths" id="pills-BollywoodMonth9-10-tab" data-bs-toggle="pill" data-bs-target="#pills-BollywoodMonth9-10" type="button" role="tab" aria-controls="pills-BollywoodMonth9-10" aria-selected="false">Month 9-10</button>
                                            </li>
                                            <!-- Month  11 & 12  -->
                                            <li class="col-lg-4 col-md-4 col-6 nav-item" role="presentation">
                                                <button class="nav-link monthtypes CombTwoMonths" id="pills-BollywoodMonth11-12-tab" data-bs-toggle="pill" data-bs-target="#pills-BollywoodMonth11-12" type="button" role="tab" aria-controls="pills-BollywoodMonth11-12" aria-selected="false">Month 11-12 </button>
                                            </li>
                                        </ul>
                                        <div class="contentSec">
                                            <div class="">
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8.png">
                                                    Live Private class -8
                                                </div>
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8.png">
                                                    Practice video -6
                                                </div>
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8-literature.png">
                                                    Reading content/Quiz - 2
                                                </div>
                                                <div class="module-text">
                                                    <div class="tab-content" id="pills-tabContent">
                                                        <!-- Month 1 & 2 -->
                                                        <div class="tab-pane fade show active" id="pills-BollywoodMonth1-2" role="tabpanel" aria-labelledby="pills-BollywoodMonth1-2-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 1-2 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Bollywood dance and its history.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic posture and hand gestures (mudras).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Simple footwork and grooves.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic rhythm (beat) exercises.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the Indian ﬁlm industry and music composers.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic facial expressions and emotions (bhavas).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic poses and movements.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- Month 3 & 4 -->
                                                        <div class="tab-pane fade" id="pills-BollywoodMonth3-4" role="tabpanel" aria-labelledby="pills-BollywoodMonth3-4-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 3-4 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to different styles of Bollywood dance.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate hand gestures (hastas) and their use in dance compositions. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate footwork and grooves.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>Intermediate rhythm (beat) exercises with hand claps.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to different Indian musical genres used in Bollywood dance.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate facial expressions and emotions (bhavas).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the use of props in Bollywood dance.
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- Month 5 & 6 -->
                                                        <div class="tab-pane fade" id="pills-BollywoodMonth5-6" role="tabpanel" aria-labelledby="pills-BollywoodMonth5-6-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 5-6 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate hand gestures (hastas) and their use in different styles (bhava).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>Intermediate footwork and grooves in different tempos (laya). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate rhythm (beat) exercises with footwork and hand claps.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate facial expressions and emotions (bhavas) in different songs.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Bollywood choreography and its elements.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate poses and movements with different expressions.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- Month 7 & 8  -->
                                                        <div class="tab-pane fade" id="pills-BollywoodMonth7-8" role="tabpanel" aria-labelledby="pills-BollywoodMonth7-8-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 7-8 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the basic hasta (hand gestures) and their use in Odissi.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>Basic adavus (dance steps) in different styles (bhava). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic abhinaya (facial expressions) in different emotions (rasa).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic adavus (dance steps) in different Nayikas (heroine) and Nayakas (hero) styles.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the concept of Taala (rhythm) and its variations.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- Month 9 & 10 -->
                                                        <div class="tab-pane fade" id="pills-BollywoodMonth9-10" role="tabpanel" aria-labelledby="pills-BollywoodMonth9-10-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 9-10 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate adavus (dance steps) and their variations.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate tala (rhythm) exercises with music. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate abhinaya (facial expressions) in different emotions (rasa)</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate mudras (hand gestures) and their use in Odissi.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate adavus (dance steps) in different Nayikas (heroine) and Nayakas (hero) styles.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- Month 11 & 12 -->
                                                        <div class="tab-pane fade" id="pills-BollywoodMonth11-12" role="tabpanel" aria-labelledby="pills-BollywoodMonth11-12-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 11-12 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate poses (asanas) in Odissi.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate adavus (dance steps) in different speeds (gati). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the basic repertoire of Abhinaya (expressive) pieces.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate adavus (dance steps) in different positions (tribhangi, chowk and samabhanga).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate adavus (dance steps) in different tempos (laya). </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- Note -->
                                                        <div class=" row  mt-3 Notediv">
                                                            <p class="Notepara">
                                                                <strong>Note : </strong>
                                                                The syllabus may vary based on the instructor’s preference and the student’s progress. It’s important to practice regularly and seek feedback from the instructor to improve.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>


                <!-- Western -->
                <div class="tab-pane fade" id="pills-Western" role="tabpanel" aria-labelledby="pills-Western-tab">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <img src="public/images/Dance/western-dance.png" class="danceimg">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 textPara-col">
                            <h3 class="heading"> Western</h3>
                            <p>
                                Get ready to move to the rhythm of Western dance with our online classes! Our syllabus covers a variety of styles, from contemporary and jazz to hip-hop and tap dance. Our expert instructors provide personalized guidance and support to help you perfect your technique and develop your own unique style. With our state-of-the-art technology and convenient online platform, you can learn Western dance from anywhere in the world, at your own pace. Whether you’re a beginner or an experienced dancer, our online classes provide a fun and engaging way to explore the richness of Western dance culture. Join us today and let’s dance!
                            </p>
                            <div class="text-end mt-4">
                                <a type="button" class="btn btndemoh" href="<?= base_url(); ?>Home#pricing-section">START NOW</a>
                            </div>
                        </div>
                    </div>

                    <section class="learningBtn">
                        <div class="container">
                            <ul class="list-inline row ">
                                <li class="col-lg-1 ">

                                </li>

                                <li class="list-inline-item col-lg-2 col-md-3 col-6">
                                    <!-- <button type="button" class="btn btndemo step">What you will learn</button> -->
                                    <a href="#learnWestern" class="btn btndemo step active" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">What you will learn</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Modules</button> -->
                                    <a href="#mod-Western" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Modules</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Testimonials</button> -->
                                    <a href="#testimonials" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Testimonials</span>
                                        </span>
                                    </a>

                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Instructors</button> -->
                                    <a href="#Instructors" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Instructors</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-3 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Pricing</button> -->
                                    <a href="#pricing" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Pricing</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="col-lg-1 ">

                                </li>

                            </ul>
                        </div>
                    </section>

                    <section class="learningsec" id="learnWestern">
                        <div class="container">
                            <div class="row mt-5">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <h3>What you will learn</h3>
                                    <p>
                                        Our online Kathak dance classes are the perfect way to begin! Our comprehensive syllabus consists of seven steps that cover the essential elements of Kathak dance.
                                    </p>
                                    <ul class="list-group">
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Basic postures and hand gestures.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Focuses on the footwork and rhythms.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Introduces the spins and turns.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Chakkars.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Explores complex footwork patterns.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Delves into abhinaya, the art of facial expressions.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">
                                                Combines all the elements into a cohesive dance piece.</span>
                                        </li>
                                    </ul>


                                </div>
                                <div class="col-lg-6 col-md-6 col-12">


                                    <!-- Western -->

                                    <img src="public/images/Dance/western-3.png" class="danceimg">

                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="modulesec mft" id="mod-Western">
                        <div class="container">
                            <div class="row">
                                <span class="text-center"> <button type="button" class="btn step mkathak dancemodul">Modules</button></span>
                            </div>
                            <div class="month-row">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-12 text-center">
                                        <img src="public/images/Dance/western-dance-2.png" class="danceimg danceimg5">

                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12">


                                        <!-- trying new tab  -->
                                        <ul class="row nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <!-- Month 1 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link active monthtypes kathak" id="pills-WesternMonth1-tab" data-bs-toggle="pill" data-bs-target="#pills-WesternMonth1" type="button" role="tab" aria-controls="pills-WesternMonth1" aria-selected="true">Month 1</button>
                                            </li>
                                            <!-- Month 2 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-WesternMonth2-tab" data-bs-toggle="pill" data-bs-target="#pills-WesternMonth2" type="button" role="tab" aria-controls="pills-WesternMonth2" aria-selected="false">Month 2</button>
                                            </li>
                                            <!-- Month 3 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-WesternMonth3-tab" data-bs-toggle="pill" data-bs-target="#pills-WesternMonth3" type="button" role="tab" aria-controls="pills-WesternMonth3" aria-selected="false">Month 3</button>
                                            </li>
                                            <!-- Month 4 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-WesternMonth4-tab" data-bs-toggle="pill" data-bs-target="#pills-WesternMonth4" type="button" role="tab" aria-controls="pills-WesternMonth4" aria-selected="false">Month 4 </button>
                                            </li>
                                            <!-- Month 5 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-WesternMonth5-tab" data-bs-toggle="pill" data-bs-target="#pills-WesternMonth5" type="button" role="tab" aria-controls="pills-WesternMonth5" aria-selected="false">Month 5 </button>
                                            </li>
                                            <!-- Month 6 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-WesternMonth6-tab" data-bs-toggle="pill" data-bs-target="#pills-WesternMonth6" type="button" role="tab" aria-controls="pills-WesternMonth6" aria-selected="false">Month 6 </button>
                                            </li>
                                            <!-- Month 7 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-WesternMonth7-tab" data-bs-toggle="pill" data-bs-target="#pills-WesternMonth7" type="button" role="tab" aria-controls="pills-WesternMonth7" aria-selected="false">Month 7</button>
                                            </li>
                                            <!-- Month 8 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-WesternMonth8-tab" data-bs-toggle="pill" data-bs-target="#pills-WesternMonth8" type="button" role="tab" aria-controls="pills-WesternMonth8" aria-selected="false">Month 8</button>
                                            </li>
                                            <!-- Month 9 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-WesternMonth9-tab" data-bs-toggle="pill" data-bs-target="#pills-WesternMonth9" type="button" role="tab" aria-controls="pills-WesternMonth9" aria-selected="false">Month 9</button>
                                            </li>
                                            <!-- Month 10 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-WesternMonth10-tab" data-bs-toggle="pill" data-bs-target="#pills-WesternMonth10" type="button" role="tab" aria-controls="pills-WesternMonth10" aria-selected="false">Month 10</button>
                                            </li>
                                            <!-- Month 11 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-WesternMonth11-tab" data-bs-toggle="pill" data-bs-target="#pills-WesternMonth11" type="button" role="tab" aria-controls="pills-WesternMonth11" aria-selected="false">Month 11</button>
                                            </li>
                                            <!-- Month 12 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-WesternMonth12-tab" data-bs-toggle="pill" data-bs-target="#pills-WesternMonth12" type="button" role="tab" aria-controls="pills-WesternMonth12" aria-selected="false">Month 12</button>
                                            </li>
                                        </ul>
                                        <div class="contentSec">
                                            <div class="">
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8.png">
                                                    Live Private class -8
                                                </div>
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8.png">
                                                    Practice video -6
                                                </div>
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8-literature.png">
                                                    Reading content/Quiz - 2
                                                </div>
                                                <div class="module-text">

                                                    <div class="tab-content" id="pills-tabContent">
                                                        <!-- Month 1 -->
                                                        <div class="tab-pane fade show active" id="pills-WesternMonth1" role="tabpanel" aria-labelledby="pills-WesternMonth1-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 1 : Introduction to Western Dance</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Overview of various Western dance styles like Jazz, Ballet, Contemporary, and Hip-Hop.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basics of Western dance posture and footwork.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Understanding the rhythm and beats of Western music.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 2 -->
                                                        <div class="tab-pane fade" id="pills-WesternMonth2" role="tabpanel" aria-labelledby="pills-WesternMonth2-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 2 : Intermediate Western Dance Techniques</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> More advanced Western dance footwork and movements. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Focus on building stamina and strength. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Incorporating hand and arm movements in Western dance.</li>

                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 3 -->
                                                        <div class="tab-pane fade" id="pills-WesternMonth3" role="tabpanel" aria-labelledby="pills-WesternMonth3-tab">

                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 3 : Western Dance Choreography</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learn a complete Western dance routine.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>

                                                                        Focus on precision and timing in dance steps. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Introduction to Western music composition and structure.</li>

                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 4 -->
                                                        <div class="tab-pane fade" id="pills-WesternMonth4" role="tabpanel" aria-labelledby="pills-WesternMonth4-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 4 : Jazz Dance</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Jazz dance techniques and history.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Focus on Jazz walk, turns, and jumps. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learning a Jazz dance routine./li>

                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 5 -->
                                                        <div class="tab-pane fade" id="pills-WesternMonth5" role="tabpanel" aria-labelledby="pills-WesternMonth5-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 5 : Ballet Dance</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Ballet dance techniques and history.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Focus on Ballet positions, plies, and pirouettes. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> ILearning a Ballet dance routine.</li>

                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 6 -->
                                                        <div class="tab-pane fade" id="pills-WesternMonth6" role="tabpanel" aria-labelledby="pills-WesternMonth6-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 6 : Contemporary Dance</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Contemporary dance techniques and history.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Focus on ﬂuid and expressive movements</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learning a Contemporary dance routine.</li>

                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 7 -->
                                                        <div class="tab-pane fade" id="pills-WesternMonth7" role="tabpanel" aria-labelledby="pills-WesternMonth7-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 7 : Hip-Hop Dance</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Hip-Hop dance techniques and history.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Focus on Hip-Hop groove, isolation, and footwork. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learning a Hip-Hop dance routine.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 8 -->
                                                        <div class="tab-pane fade" id="pills-WesternMonth8" role="tabpanel" aria-labelledby="pills-WesternMonth8-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 8 : Advanced Western Dance Techniques</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Focus on advanced Western dance movements and footwork.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Incorporating more complex hand and arm movements in dance routines.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to lifts and partner work in Western dance.</li>

                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 9 -->
                                                        <div class="tab-pane fade" id="pills-WesternMonth9" role="tabpanel" aria-labelledby="pills-WesternMonth9-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 9 : Dance Improvisation</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to improvisation and freestyle dance.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Focus on self-expression and creativity in dance.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learning to improvise to different music styles.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 10 -->
                                                        <div class="tab-pane fade" id="pills-WesternMonth10" role="tabpanel" aria-labelledby="pills-WesternMonth10-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 10 : Dance Fitness and Conditioning</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to dance ﬁtness and conditioning exercises.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Focus on building strength and endurance for dance.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learning dance ﬁtness routines.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 11 -->
                                                        <div class="tab-pane fade" id="pills-WesternMonth11" role="tabpanel" aria-labelledby="pills-WesternMonth11-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 11: Production and Performance</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Collaborate with other students to create a dance production.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Focus on teamwork and communication in dance productions. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to stage design, lighting, and sound.</li>

                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 12 -->
                                                        <div class="tab-pane fade" id="pills-WesternMonth12" role="tabpanel" aria-labelledby="pills-WesternMonth12-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 12 : Final Performance and Showcase</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Rehearse and perform a full Western dance production. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Focus on showcasing the skills and techniques learned throughout the course. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Celebration of completion of the course and achievement of dance goals.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- Note -->
                                                        <div class=" row  mt-3 Notediv">
                                                            <p class="Notepara">
                                                                <strong>Note : </strong>
                                                                Each month could have more speciﬁc topics and exercises, depending on the level and goals of the students. Additionally, it is important to have regular assessments and feedback to ensure progress and adaptation to the individual needs of the students.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>


                <!-- Semi-classical -->
                <div class="tab-pane fade" id="pills-Semiclassical" role="tabpanel" aria-labelledby="pills-Semiclassical-tab">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <img src="public/images/Dance/kathakImg1.svg" class="danceimg">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 textPara-col">
                            <h3 class="heading"> Semi-classical</h3>

                            <p>
                                Unleash your inner artist with our online semi-classical dance classes! Our syllabus covers the fusion of classical and contemporary dance styles, blending the grace and elegance of classical dance with the energy and excitement of modern dance. Our expert instructors provide personalized guidance and support to help you perfect your technique and develop your own unique style. With our convenient online platform, you can learn semi-classical dance from the comfort of your own home and at your own pace. Whether you’re a beginner or an experienced dancer, our online classes provide a fun and engaging way to explore the richness of Indian dance culture. Join us today and let’s dance!
                            </p>
                            <div class="text-end mt-4">
                                <a type="button" class="btn btndemoh" href="<?= base_url(); ?>Home#pricing-section">START NOW</a>
                            </div>
                        </div>
                    </div>

                    <section class="learningBtn">
                        <div class="container">
                            <ul class="list-inline row ">
                                <li class="col-lg-1 ">

                                </li>

                                <li class="list-inline-item col-lg-2 col-md-3 col-6">
                                    <!-- <button type="button" class="btn btndemo step">What you will learn</button> -->
                                    <a href="#learnSemiclassical" class="btn btndemo step active" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">What you will learn</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Modules</button> -->
                                    <a href="#mod-Semiclassical" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Modules</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Testimonials</button> -->
                                    <a href="#testimonials" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Testimonials</span>
                                        </span>
                                    </a>

                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Instructors</button> -->
                                    <a href="#Instructors" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Instructors</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-3 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Pricing</button> -->
                                    <a href="#pricing" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Pricing</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="col-lg-1 ">

                                </li>

                            </ul>
                        </div>
                    </section>

                    <section class="learningsec" id="learnSemiclassical">
                        <div class="container">
                            <div class="row mt-5">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <h3>What you will learn</h3>
                                    <p>
                                        Our online Kathak dance classes are the perfect way to begin! Our comprehensive syllabus consists of seven steps that cover the essential elements of Kathak dance.
                                    </p>
                                    <ul class="list-group">
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Basic postures and hand gestures.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Focuses on the footwork and rhythms.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Introduces the spins and turns.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Chakkars.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Explores complex footwork patterns.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Delves into abhinaya, the art of facial expressions.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">
                                                Combines all the elements into a cohesive dance piece.</span>
                                        </li>
                                    </ul>


                                </div>
                                <div class="col-lg-6 col-md-6 col-12">


                                    <!-- Semi-classical  -->

                                    <img src="public/images/Dance/kathakImg2.svg" class="danceimg">

                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="modulesec mft" id="mod-Semiclassical">
                        <div class="container">
                            <div class="row">
                                <span class="text-center"> <button type="button" class="btn step mkathak dancemodul">Modules</button></span>
                            </div>
                            <div class="month-row">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-12 text-center">
                                        <img src="public/images/Dance/kathakImg3.svg" class="danceimg danceimg5">

                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12 mftm">

                                        <!-- trying new tab  -->
                                        <ul class="row nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <!-- Month 1 & 2 -->
                                            <li class="col-lg-4 col-md-4 col-6 nav-item" role="presentation">
                                                <button class="nav-link active monthtypes CombTwoMonths" id="pills-Month1_2-tab" data-bs-toggle="pill" data-bs-target="#pills-Month1_2" type="button" role="tab" aria-controls="pills-Month1_2" aria-selected="true">Month 1-2</button>
                                            </li>
                                            <!-- Month 3 & 4-->
                                            <li class="col-lg-4 col-md-4 col-6 nav-item" role="presentation">
                                                <button class="nav-link monthtypes CombTwoMonths" id="pills-Month3_4-tab" data-bs-toggle="pill" data-bs-target="#pills-Month3_4" type="button" role="tab" aria-controls="pills-Month3_4" aria-selected="false">Month 3-4</button>
                                            </li>
                                            <!-- Month 5 & 6-->
                                            <li class="col-lg-4 col-md-4 col-6 nav-item" role="presentation">
                                                <button class="nav-link monthtypes CombTwoMonths" id="pills-Month5_6-tab" data-bs-toggle="pill" data-bs-target="#pills-Month5_6" type="button" role="tab" aria-controls="pills-Month5_6" aria-selected="false">Month 5-6</button>
                                            </li>
                                            <!-- Month  7 & 8  -->
                                            <li class="col-lg-4 col-md-4 col-6 nav-item" role="presentation">
                                                <button class="nav-link monthtypes CombTwoMonths" id="pills-Month7_8-tab" data-bs-toggle="pill" data-bs-target="#pills-Month7_8" type="button" role="tab" aria-controls="pills-Month7_8" aria-selected="false">Month 7-8 </button>
                                            </li>
                                            <!-- Month 9 & 10 -->
                                            <li class="col-lg-4 col-md-4 col-6 nav-item" role="presentation">
                                                <button class="nav-link monthtypes CombTwoMonths" id="pills-Month9_10-tab" data-bs-toggle="pill" data-bs-target="#pills-Month9_10" type="button" role="tab" aria-controls="pills-Month9_10" aria-selected="false">Month 9-10</button>
                                            </li>
                                            <!-- Month  11 & 12  -->
                                            <li class="col-lg-4 col-md-4 col-6 nav-item" role="presentation">
                                                <button class="nav-link monthtypes CombTwoMonths" id="pills-Month11_12-tab" data-bs-toggle="pill" data-bs-target="#pills-Month11_12" type="button" role="tab" aria-controls="pills-Month11_12" aria-selected="false">Month 11-12 </button>
                                            </li>

                                        </ul>
                                        <div class="contentSec">
                                            <div class="">
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8.png">
                                                    Live Private class -8
                                                </div>
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8.png">
                                                    Practice video -6
                                                </div>
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8-literature.png">
                                                    Reading content/Quiz - 2
                                                </div>
                                                <div class="module-text">

                                                    <div class="tab-content" id="pills-tabContent">
                                                        <!-- Month 1 & 2 -->
                                                        <div class="tab-pane fade show active" id="pills-Month1_2" role="tabpanel" aria-labelledby="pills-Month1_2-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 1-2 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Bollywood dance and its history.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic posture and hand gestures (mudras).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Simple footwork and grooves.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic rhythm (beat) exercises.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the Indian ﬁlm industry and music composers.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic facial expressions and emotions (bhavas).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic poses and movements.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 3 & 4 -->
                                                        <div class="tab-pane fade" id="pills-Month3_4" role="tabpanel" aria-labelledby="pills-Month3_4-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 3-4 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to different styles of Bollywood dance.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate hand gestures (hastas) and their use in dance compositions. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate footwork and grooves.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>Intermediate rhythm (beat) exercises with hand claps.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to different Indian musical genres used in Bollywood dance.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate facial expressions and emotions (bhavas).
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the use of props in Bollywood dance.
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 5 & 6 -->
                                                        <div class="tab-pane fade" id="pills-Month5_6" role="tabpanel" aria-labelledby="pills-Month5_6-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 5-6 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate hand gestures (hastas) and their use in different styles (bhava). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate footwork and grooves in different tempos (laya). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate rhythm (beat) exercises with footwork and hand claps.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate facial expressions and emotions (bhavas) in different songs.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Bollywood choreography and its elements.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate poses and movements with different expressions.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 7 & 8  -->
                                                        <div class="tab-pane fade" id="pills-Month7_8" role="tabpanel" aria-labelledby="pills-Month7_8-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 7-8 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the basic hasta (hand gestures) and their use in Odissi.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Basic adavus (dance steps) in different styles (bhava). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic abhinaya (facial expressions) in different emotions (rasa).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basic adavus (dance steps) in different Nayikas (heroine) and Nayakas (hero) styles.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the concept of Taala (rhythm) and its variations.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 9 & 10 -->
                                                        <div class="tab-pane fade" id="pills-Month9_10" role="tabpanel" aria-labelledby="pills-Month9_10-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 9-10 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate adavus (dance steps) and their variations.
                                                                    </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i>
                                                                        Intermediate tala (rhythm) exercises with music. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate abhinaya (facial expressions) in different emotions (rasa)</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate mudras (hand gestures) and their use in Odissi.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate adavus (dance steps) in different Nayikas (heroine) and Nayakas (hero) styles.
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 11 & 12 -->
                                                        <div class="tab-pane fade" id="pills-Month11_12" role="tabpanel" aria-labelledby="pills-Month11_12-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 11-12 :</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate poses (asanas) in Odissi.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate adavus (dance steps) in different speeds (gati). </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to the basic repertoire of Abhinaya (expressive) pieces.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate adavus (dance steps) in different positions (tribhangi, chowk and samabhanga).</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Intermediate adavus (dance steps) in different tempos (laya).
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class=" row  mt-3 Notediv">
                                                            <p class="Notepara">
                                                                <strong>Note : </strong>
                                                                The syllabus may vary based on the instructor’s preference and the student’s progress. It’s important to practice regularly and seek feedback from the instructor to improve.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- </div> -->
                            </div>
                    </section>
                </div>

                <!-- Bhangra -->
                <div class="tab-pane fade" id="pills-Bhangra" role="tabpanel" aria-labelledby="pills-Bhangra-tab">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <img src="public/images/Dance/bhangra.png" class="danceimg">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 textPara-col">
                            <h3 class="heading"> Bhangra</h3>
                            <p>
                                Get ready to experience the vibrant energy and infectious rhythm of Bhangra with our online dance classes! Our syllabus covers the basics of this traditional Punjabi dance form, from footwork and hand gestures to the high-energy movements that make Bhangra so exhilarating. Our expert instructors provide personalized guidance and support to help you perfect your technique and develop your own unique style. With our state-of-the-art technology and convenient online platform, you can learn Bhangra dance from anywhere in the world, at your own pace. Whether you’re a beginner or an experienced dancer, our online classes provide a fun and engaging way to explore the richness of Bhangra dance culture.
                                Join us today and let’s dance to the beat of Bhangra!
                            </p>
                            <div class="text-end mt-4">
                                <a type="button" class="btn btndemoh" href="<?= base_url(); ?>Home#pricing-section">START NOW</a>
                            </div>
                        </div>
                    </div>

                    <section class="learningBtn">
                        <div class="container">
                            <ul class="list-inline row ">
                                <li class="col-lg-1 ">

                                </li>

                                <li class="list-inline-item col-lg-2 col-md-3 col-6">
                                    <!-- <button type="button" class="btn btndemo step">What you will learn</button> -->
                                    <a href="#learnBhangra" class="btn btndemo step active" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">What you will learn</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Modules</button> -->
                                    <a href="#mod-Bhangra" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Modules</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Testimonials</button> -->
                                    <a href="#testimonials" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Testimonials</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Instructors</button> -->
                                    <a href="#Instructors" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Instructors</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-3 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Pricing</button> -->
                                    <a href="#pricing" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Pricing</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="col-lg-1 ">

                                </li>
                            </ul>
                        </div>
                    </section>

                    <section class="learningsec" id="learnBhangra">
                        <div class="container">
                            <div class="row mt-5">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <h3>What you will learn</h3>
                                    <p>
                                        Our online Kathak dance classes are the perfect way to begin! Our comprehensive syllabus consists of seven steps that cover the essential elements of Kathak dance.
                                    </p>
                                    <ul class="list-group">
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Basic postures and hand gestures.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Focuses on the footwork and rhythms.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Introduces the spins and turns.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Chakkars.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Explores complex footwork patterns.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Delves into abhinaya, the art of facial expressions.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">
                                                Combines all the elements into a cohesive dance piece.</span>
                                        </li>
                                    </ul>


                                </div>
                                <div class="col-lg-6 col-md-6 col-12">


                                    <!-- Bhangra -->

                                    <img src="public/images/Dance/bhangra-2.png" class="danceimg">

                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="modulesec mft" id="mod-Bhangra">
                        <div class="container">
                            <div class="row">
                                <span class="text-center"> <button type="button" class="btn step mkathak dancemodul">Modules</button></span>
                            </div>
                            <div class="month-row">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-12 text-center">
                                        <img src="public/images/Dance/bhangra-2-1.png" class="danceimg danceimg5">

                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12">


                                        <!-- trying new tab  -->
                                        <ul class="row nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <!-- Month 1 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link active monthtypes kathak" id="pills-BhangraMonth1-tab" data-bs-toggle="pill" data-bs-target="#pills-BhangraMonth1" type="button" role="tab" aria-controls="pills-BharatnatyamMonth1" aria-selected="true">Month 1</button>
                                            </li>
                                            <!-- Month 2 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BhangraMonth2-tab" data-bs-toggle="pill" data-bs-target="#pills-BhangraMonth2" type="button" role="tab" aria-controls="pills-BharatnatyamMonth2" aria-selected="false">Month 2</button>
                                            </li>
                                            <!-- Month 3 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BhangraMonth3-tab" data-bs-toggle="pill" data-bs-target="#pills-BhangraMonth3" type="button" role="tab" aria-controls="pills-BharatnatyamMonth3" aria-selected="false">Month 3</button>
                                            </li>
                                            <!-- Month 4 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BhangraMonth4-tab" data-bs-toggle="pill" data-bs-target="#pills-BhangraMonth4" type="button" role="tab" aria-controls="pills-BharatnatyamMonth4" aria-selected="false">Month 4 </button>
                                            </li>
                                            <!-- Month 5 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BhangraMonth5-tab" data-bs-toggle="pill" data-bs-target="#pills-BhangraMonth5" type="button" role="tab" aria-controls="pills-BharatnatyamMonth5" aria-selected="false">Month 5 </button>
                                            </li>
                                            <!-- Month 6 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BhangraMonth6-tab" data-bs-toggle="pill" data-bs-target="#pills-BhangraMonth6" type="button" role="tab" aria-controls="pills-BharatnatyamMonth6" aria-selected="false">Month 6 </button>
                                            </li>
                                            <!-- Month 7 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BhangraMonth7-tab" data-bs-toggle="pill" data-bs-target="#pills-BhangraMonth7" type="button" role="tab" aria-controls="pills-BharatnatyamMonth7" aria-selected="false">Month 7</button>
                                            </li>
                                            <!-- Month 8 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BhangraMonth8-tab" data-bs-toggle="pill" data-bs-target="#pills-BhangraMonth8" type="button" role="tab" aria-controls="pills-BharatnatyamMonth8" aria-selected="false">Month 8</button>
                                            </li>
                                            <!-- Month 9 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BhangraMonth9-tab" data-bs-toggle="pill" data-bs-target="#pills-BhangraMonth9" type="button" role="tab" aria-controls="pills-BharatnatyamMonth9" aria-selected="false">Month 9</button>
                                            </li>
                                            <!-- Month 10 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BhangraMonth10-tab" data-bs-toggle="pill" data-bs-target="#pills-BhangraMonth10" type="button" role="tab" aria-controls="pills-BharatnatyamMonth10" aria-selected="false">Month 10</button>
                                            </li>
                                            <!-- Month 11 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BhangraMonth11-tab" data-bs-toggle="pill" data-bs-target="#pills-BhangraMonth11" type="button" role="tab" aria-controls="pills-BharatnatyamMonth11" aria-selected="false">Month 11</button>
                                            </li>
                                            <!-- Month 12 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-BhangraMonth12-tab" data-bs-toggle="pill" data-bs-target="#pills-BhangraMonth12" type="button" role="tab" aria-controls="pills-BharatnatyamMonth12" aria-selected="false">Month 12</button>
                                            </li>
                                        </ul>
                                        <div class="contentSec">
                                            <div class="">
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8.png">
                                                    Live Private class -8
                                                </div>
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8.png">
                                                    Practice video -6
                                                </div>
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8-literature.png">
                                                    Reading content/Quiz - 2
                                                </div>
                                                <div class="module-text">

                                                    <div class="tab-content" id="pills-tabContent">
                                                        <!-- Month 1 -->
                                                        <div class="tab-pane fade show active" id="pills-BhangraMonth1" role="tabpanel" aria-labelledby="pills-BhangraMonth1-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 1 : Introduction to Bhangra dance and its history</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basics of Bhangra posture and footwork.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Understanding the rhythm and beats of Bhangra music.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to traditional Bhangra dance steps.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 2 -->
                                                        <div class="tab-pane fade" id="pills-BhangraMonth2" role="tabpanel" aria-labelledby="pills-BhangraMonth2-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 2 : Intermediate Bhangra dance techniques</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> More advanced Bhangra footwork and movements. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Incorporating hand and arm movements in Bhangra dance.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 3 -->
                                                        <div class="tab-pane fade" id="pills-BhangraMonth3" role="tabpanel" aria-labelledby="pills-BhangraMonth3-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 3 : Bhangra dance choreography</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learn a complete Bhangra dance routine. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Focus on precision and timing in dance steps. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Bhangra music composition and structure.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 4 -->
                                                        <div class="tab-pane fade" id="pills-BhangraMonth4" role="tabpanel" aria-labelledby="pills-BhangraMonth4-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 4 : Introduction to props in Bhangra dance</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Understanding the role of props in Bhangra dance. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Dhol and its role in Bhangra music. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learning to dance with Dhol sticks.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 5 -->
                                                        <div class="tab-pane fade" id="pills-BhangraMonth5" role="tabpanel" aria-labelledby="pills-BhangraMonth5-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 5 : Advanced Bhangra dance techniques</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Focus on advanced Bhangra movements and footwork. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Incorporating more complex hand and arm movements in dance routines. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Bhangra acrobatics and lifts.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 6 -->
                                                        <div class="tab-pane fade" id="pills-BhangraMonth6" role="tabpanel" aria-labelledby="pills-BhangraMonth6-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 6 : Fusion Bhangra dance</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learn to combine Bhangra dance with other dance styles. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Understanding the role of Bhangra in Bollywood and Western music. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Bhangra ﬁtness and workout routines.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 7 -->
                                                        <div class="tab-pane fade" id="pills-BhangraMonth7" role="tabpanel" aria-labelledby="pills-BhangraMonth7-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 7 : Choreography and performance</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learn and rehearse a full Bhangra dance performance. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Focus on stage presence and audience engagement. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to costume design and stage lighting.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 8 -->
                                                        <div class="tab-pane fade" id="pills-BhangraMonth8" role="tabpanel" aria-labelledby="pills-BhangraMonth8-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 8 : Advanced Bhangra dance choreography</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learning more advanced Bhangra dance routines. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Understanding the role of storytelling in Bhangra dance.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Bhangra dance competitions and events.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 9 -->
                                                        <div class="tab-pane fade" id="pills-BhangraMonth9" role="tabpanel" aria-labelledby="pills-BhangraMonth9-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 9 : Contemporary Bhangra dance</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learn to combine Bhangra with contemporary dance styles. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Focus on improvisation and self-expression in Bhangra dance. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to Bhangra fusion music.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 10 -->
                                                        <div class="tab-pane fade" id="pills-BhangraMonth10" role="tabpanel" aria-labelledby="pills-BhangraMonth10-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 10 : Fusion Bhangra dance performances</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learn and rehearse a fusion Bhangra dance performance. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Focus on incorporating different dance styles in Bhangra dance. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to video production and editing for dance performances.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 11 -->
                                                        <div class="tab-pane fade" id="pills-BhangraMonth11" role="tabpanel" aria-labelledby="pills-BhangraMonth11-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 11: Choreography and production</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Collaborate with other students to create a Bhangra dance production. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Focus on teamwork and communication in dance productions. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to marketing and promotion for dance productions.</li>

                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 12 -->
                                                        <div class="tab-pane fade" id="pills-BhangraMonth12" role="tabpanel" aria-labelledby="pills-BhangraMonth12-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 12 : Final performance and showcase</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Rehearse and perform a full Bhangra dance production. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Focus on showcasing the skills and techniques learned throughout the course. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Celebration of completion of the course and achievement of dance goals.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class=" row  mt-3 Notediv">
                                                            <p class="Notepara">
                                                                <strong>Note : </strong>
                                                                Each month could have more speciﬁc topics and exercises, depending on the level and goals of the students. Additionally, it is important to have regular assessments and feedback to ensure progress and adaptation to the individual needs of the students.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>

                <!-- Folk -->
                <div class="tab-pane fade" id="pills-Folk" role="tabpanel" aria-labelledby="pills-Folk-tab">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <img src="public/images/Dance/folk-dance.png" class="danceimg">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 textPara-col">
                            <h3 class="heading"> Folk</h3>

                            <p>
                                Explore the richness and diversity of traditional folk dances with our online classes! Our syllabus covers a variety of styles from different regions of India, including Garba, Bihu, Dandiya, and more. Our expert instructors provide personalized guidance and support to help you perfect your technique and develop your own unique style. With our convenient online platform, you can learn these dynamic and expressive folk dances from the comfort of your own home and at your own pace. Whether you’re a beginner or an experienced dancer, our online classes provide a fun and engaging way to discover the beauty and richness of Indian folk dance culture.
                                Join us today and let’s dance to the rhythm of tradition!
                            </p>
                            <div class="text-end mt-4">
                                <a type="button" class="btn btndemoh" href="<?= base_url(); ?>Home#pricing-section">START NOW</a>
                            </div>
                        </div>
                    </div>

                    <section class="learningBtn">
                        <div class="container">
                            <ul class="list-inline row ">
                                <li class="col-lg-1 ">

                                </li>

                                <li class="list-inline-item col-lg-2 col-md-3 col-6">
                                    <!-- <button type="button" class="btn btndemo step">What you will learn</button> -->
                                    <a href="#learnFolk" class="btn btndemo step active" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">What you will learn</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Modules</button> -->
                                    <a href="#mod-Folk" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Modules</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Testimonials</button> -->
                                    <a href="#testimonials" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Testimonials</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-2 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Instructors</button> -->
                                    <a href="#Instructors" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Instructors</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item col-lg-2 col-md-3 col-6">
                                    <!-- <button type="button" class="btn btndemo step">Pricing</button> -->
                                    <a href="#pricing" class="btn btndemo step" role="button">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-text">Pricing</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="col-lg-1 ">

                                </li>
                            </ul>
                        </div>
                    </section>

                    <section class="learningsec" id="learnFolk">
                        <div class="container">
                            <div class="row mt-5">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <h3>What you will learn</h3>
                                    <p>
                                        Our online Kathak dance classes are the perfect way to begin! Our comprehensive syllabus consists of seven steps that cover the essential elements of Kathak dance.
                                    </p>
                                    <ul class="list-group">
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Basic postures and hand gestures.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Focuses on the footwork and rhythms.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Introduces the spins and turns.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Chakkars.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Explores complex footwork patterns.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">Delves into abhinaya, the art of facial expressions.</span>
                                        </li>
                                        <li class="mb-4"><span class="list-icon"><i class="fas fa-check-circle" aria-hidden="true"></i></span>
                                            <span class="list-text">
                                                Combines all the elements into a cohesive dance piece.</span>
                                        </li>
                                    </ul>

                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <!-- Folk -->
                                    <img src="public/images/Dance/folk-dance-2.png" class="danceimg">
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="modulesec mft" id="mod-Folk">
                        <div class="container">
                            <div class="row">
                                <span class="text-center"> <button type="button" class="btn step mkathak dancemodul">Modules</button></span>
                            </div>
                            <div class="month-row">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-12 text-center">
                                        <img src="public/images/Dance/folk-dance.png" class="danceimg danceimg5">

                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12">


                                        <!-- trying new tab  -->
                                        <ul class="row nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <!-- Month 1 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link active monthtypes kathak" id="pills-FolkMonth1-tab" data-bs-toggle="pill" data-bs-target="#pills-FolkMonth1" type="button" role="tab" aria-controls="pills-FolkMonth1" aria-selected="true">Month 1</button>
                                            </li>
                                            <!-- Month 2 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-FolkMonth2-tab" data-bs-toggle="pill" data-bs-target="#pills-FolkMonth2" type="button" role="tab" aria-controls="pills-FolkMonth2" aria-selected="false">Month 2</button>
                                            </li>
                                            <!-- Month 3 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-FolkMonth3-tab" data-bs-toggle="pill" data-bs-target="#pills-FolkMonth3" type="button" role="tab" aria-controls="pills-FolkMonth3" aria-selected="false">Month 3</button>
                                            </li>
                                            <!-- Month 4 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-FolkMonth4-tab" data-bs-toggle="pill" data-bs-target="#pills-FolkMonth4" type="button" role="tab" aria-controls="pills-FolkMonth4" aria-selected="false">Month 4 </button>
                                            </li>
                                            <!-- Month 5 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-FolkMonth5-tab" data-bs-toggle="pill" data-bs-target="#pills-FolkMonth5" type="button" role="tab" aria-controls="pills-FolkMonth5" aria-selected="false">Month 5 </button>
                                            </li>
                                            <!-- Month 6 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-FolkMonth6-tab" data-bs-toggle="pill" data-bs-target="#pills-FolkMonth6" type="button" role="tab" aria-controls="pills-FolkMonth6" aria-selected="false">Month 6 </button>
                                            </li>
                                            <!-- Month 7 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-FolkMonth7-tab" data-bs-toggle="pill" data-bs-target="#pills-FolkMonth7" type="button" role="tab" aria-controls="pills-FolkMonth7" aria-selected="false">Month 7</button>
                                            </li>
                                            <!-- Month 8 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-FolkMonth8-tab" data-bs-toggle="pill" data-bs-target="#pills-FolkMonth8" type="button" role="tab" aria-controls="pills-FolkMonth8" aria-selected="false">Month 8</button>
                                            </li>
                                            <!-- Month 9 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-FolkMonth9-tab" data-bs-toggle="pill" data-bs-target="#pills-FolkMonth9" type="button" role="tab" aria-controls="pills-FolkMonth9" aria-selected="false">Month 9</button>
                                            </li>
                                            <!-- Month 10 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-FolkMonth10-tab" data-bs-toggle="pill" data-bs-target="#pills-FolkMonth10" type="button" role="tab" aria-controls="pills-FolkMonth10" aria-selected="false">Month 10</button>
                                            </li>
                                            <!-- Month 11 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-FolkMonth11-tab" data-bs-toggle="pill" data-bs-target="#pills-FolkMonth11" type="button" role="tab" aria-controls="pills-FolkMonth11" aria-selected="false">Month 11</button>
                                            </li>
                                            <!-- Month 12 -->
                                            <li class="col-lg-3 col-md-3 col-4 nav-item" role="presentation">
                                                <button class="nav-link monthtypes kathak" id="pills-FolkMonth12-tab" data-bs-toggle="pill" data-bs-target="#pills-FolkMonth12" type="button" role="tab" aria-controls="pills-FolkMonth12" aria-selected="false">Month 12</button>
                                            </li>
                                        </ul>
                                        <div class="contentSec">
                                            <div class="">
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8.png">
                                                    Live Private class -8
                                                </div>
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8.png">
                                                    Practice video -6
                                                </div>
                                                <div class="content">
                                                    <img src="public/images/Dance/icons8-literature.png">
                                                    Reading content/Quiz - 2
                                                </div>
                                                <div class="module-text">

                                                    <div class="tab-content" id="pills-tabContent">
                                                        <!-- Month 1 -->
                                                        <div class="tab-pane fade show active" id="pills-FolkMonth1" role="tabpanel" aria-labelledby="pills-FolkMonth1-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 1 : Introduction to Folk Dance</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Overview of various folk dance styles from different regions.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Basics of folk dance posture and footwork.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Understanding the rhythm and beats of folk music.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 2 -->
                                                        <div class="tab-pane fade" id="pills-FolkMonth2" role="tabpanel" aria-labelledby="pills-FolkMonth2-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 2 : Intermediate Folk Dance Techniques</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> More advanced Bhangra footwork and movements. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Focus on building stamina and strength.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Incorporating hand and arm movements in Folk dance.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 3 -->
                                                        <div class="tab-pane fade" id="pills-FolkMonth3" role="tabpanel" aria-labelledby="pills-FolkMonth3-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 3 : Folk dance choreography</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learn a complete folk dance routine.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Focus on precision and timing in dance steps. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to folk music composition and structure.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 4 -->
                                                        <div class="tab-pane fade" id="pills-FolkMonth4" role="tabpanel" aria-labelledby="pills-FolkMonth4-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 4 : Traditional Folk Dance</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learn traditional folk dances from different regions. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Understanding the cultural signiﬁcance of different dance styles. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to regional costumes and accessories.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 5 -->
                                                        <div class="tab-pane fade" id="pills-FolkMonth5" role="tabpanel" aria-labelledby="pills-FolkMonth5-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 5 : Folk Dance with Props</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Understanding the role of props in folk dance. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to various props used in folk dances. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learning to dance with props like sticks, scarves, and ribbons.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 6 -->
                                                        <div class="tab-pane fade" id="pills-FolkMonth6" role="tabpanel" aria-labelledby="pills-FolkMonth6-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 6 : Fusion Folk Dance</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learn to combine folk dance with other dance styles. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Understanding the role of folk dance in modern music and dance. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to fusion music.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 7 -->
                                                        <div class="tab-pane fade" id="pills-FolkMonth7" role="tabpanel" aria-labelledby="pills-FolkMonth7-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 7 : Choreography and Performance/h5>
                                                                    <ul class="icon-list-items">
                                                                        <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learn and rehearse a full Folk dance performance. </li>
                                                                        <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Focus on stage presence and audience engagement. </li>
                                                                        <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to stage design and lighting.</li>
                                                                    </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 8 -->
                                                        <div class="tab-pane fade" id="pills-FolkMonth8" role="tabpanel" aria-labelledby="pills-FolkMonth8-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 8 : Advanced Folk Dance Techniques</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Focus on advanced folk dance movements and footwork.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Incorporating more complex hand and arm movements in dance routines.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to folk acrobatics and lifts.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 9 -->
                                                        <div class="tab-pane fade" id="pills-FolkMonth9" role="tabpanel" aria-labelledby="pills-FolkMonth9-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 9 : Folk Dance and Storytelling</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Understanding the role of storytelling in folk dance. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learn dances that tell a story.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Focus on expression and conveying emotion in dance.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 10 -->
                                                        <div class="tab-pane fade" id="pills-FolkMonth10" role="tabpanel" aria-labelledby="pills-FolkMonth10-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 10 : Contemporary Folk Dances</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learn to combine folk dance with contemporary dance styles. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Focus on improvisation and self-expression in folk dance. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to contemporary folk music.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 11 -->
                                                        <div class="tab-pane fade" id="pills-FolkMonth11" role="tabpanel" aria-labelledby="pills-FolkMonth11-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 11: Folk Dance and Globalization</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Understanding the impact of globalization on folk dance.</li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Learning to appreciate and preserve folk dance traditions. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Introduction to cultural exchange and collaboration in dance.</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- Month 12 -->
                                                        <div class="tab-pane fade" id="pills-FolkMonth12" role="tabpanel" aria-labelledby="pills-FolkMonth12-tab">
                                                            <div class="month-text">
                                                                <h5 class="MonthHeading">Month 12 : Final Performance and Showcase</h5>
                                                                <ul class="icon-list-items">
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Rehearse and perform a full folk dance production. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Focus on showcasing the skills and techniques learned throughout the course. </li>
                                                                    <li class="icon-list-item"><i class="fas fa-angle-double-right" aria-hidden="true"></i> Celebration of completion of the course and achievement of dance goals.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class=" row  mt-3 Notediv">
                                                            <p class="Notepara">
                                                                <strong>Note : </strong>
                                                                Each month could have more speciﬁc topics and exercises, depending on the level and goals of the students. Additionally, it is important to have regular assessments and feedback to ensure progress and adaptation to the individual needs of the students.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- </section> -->
<section class="testimonials mft" id="testimonials">
    <div class="container-fluid">
        <!-- <div class="row">
            <span class="text-center testimonialsdiv"><button type="button" class="btn step mkathak">Testimonials</button></span>
        </div> -->

        
        <div class="month-row">
            <div class="row">
            <div class="col-lg-12 col-12 text-center testimonialsdiv">
                <h3>Testimonials
                </h3>
                <span class="line"></span>

            </div>
                <!-- Main Carousel -->
                <div class="col-lg-12 col-md-12 col-12 testimonialsp">
                    <div id="combinedCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item motd active">
                                <div class="row">
                               
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="carousel-caption">
                                            <p class="semicolone"><i aria-hidden="true" class="fas fa-quote-left"></i><span>Aiden C ( London -Uk )<span></p>
                                            <p>Enatyam's yoga courses are a total game-changer for me.<br> The instructors keep it real, making every pose feel achievable. <br>It's like having a personal yoga guide right in my living room.</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12 himg">
                                        <img src="public/images/happyfaces/1h.png" class="haimg">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item motd">
                                <div class="row">
                                
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="carousel-caption">
                                            <p class="semicolone"><i aria-hidden="true" class="fas fa-quote-left"></i><span>Sweta ( Australia )</span></p>
                                            <p>I'm new to yoga, and Enatyam is the perfect starting point.<br> The classes are not intimidating, and  <br>the instructors break down each pose in a way that's easy to understand.<br> Feeling more zen already!</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12 himg">
                                        <img src="public/images/happyfaces/2h.png" class="haimg">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item motd">
                                <div class="row">
                                
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="carousel-caption">
                                            <p class="semicolone"><i aria-hidden="true" class="fas fa-quote-left"></i><span>Sneha ( Canada )</span></p>
                                            <p>Enatyam's yoga classes are like a breath of fresh air. <br> The instructors create a friendly atmosphere, making the sessions enjoyable. <br> It's become a daily ritual that I genuinely look forward to."</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12 himg">
                                        <img src="public/images/happyfaces/3h.png" class="haimg">
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item motd">
                                <div class="row">
                                
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="carousel-caption">
                                            <p class="semicolone"><i aria-hidden="true" class="fas fa-quote-left"></i><span>Kavita ( Pune )</span></p>
                                            <p>I've tried a few online yoga platforms, but Enatyam stands out.<br> The variety of classes keeps things interesting, and <br>the instructors feel like friends guiding you through a mindful journey. <br> Highly recommend!"</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12 himg">
                                        <img src="public/images/happyfaces/4h.png" class="haimg">
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item motd">
                                <div class="row">
                                
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="carousel-caption">
                                            <p class="semicolone"><i aria-hidden="true" class="fas fa-quote-left"></i><span>Ayesha ( Singapore )</span></p>
                                            <p>Enatyam's yoga is a perfect fit for a busy mom like me. <br> The quick
                                                sessions are manageable, and <br>the instructors make it feel like a mini wellness retreat. <br>
                                                Grateful for this accessible and effective platform!
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12 himg">
                                        <img src="public/images/happyfaces/6h.png" class="haimg">
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item motd">
                                <div class="row">
                                
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="carousel-caption">
                                            <p class="semicolone"><i aria-hidden="true" class="fas fa-quote-left"></i><span>Rajiv ( Lucknow )</span></p>
                                            <p>The variety of yoga classes on Enatyam is impressive. Whether I need a <br>
                                                gentle stretch or an energizing flow, <br> there's something for every mood.  The instructors
                                                make <br> it easy for anyone to enjoy the benefits of yoga.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12 himg">
                                        <img src="public/images/happyfaces/7h.png" class="haimg">
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item motd">
                                <div class="row">
                                
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="carousel-caption">
                                            <p class="semicolone"><i aria-hidden="true" class="fas fa-quote-left"></i><span>Vikram ( Delhi )</span></p>
                                            <p>Enatyam's yoga classes have made me realize that yoga is for everyone. <br>
                                                The inclusive approach of the instructors and <br>the straightforward guidance make it a
                                                comfortable and enjoyable practice."
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12 himg">
                                        <img src="public/images/happyfaces/8h.png" class="haimg">
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item motd">
                                <div class="row">
                                
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="carousel-caption">
                                            <p class="semicolone"><i aria-hidden="true" class="fas fa-quote-left"></i><span>Vishal ( Chandigarh )</span></p>
                                            <p>I've always struggled to stick with a workout routine, <br> but
                                                Enatyam's yoga has been a consistent part of my day. <br>The short sessions fit into my
                                                schedule, and the instructors'<br> encouragement keeps me motivated."
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12 himg">
                                        <img src="public/images/happyfaces/10h.png" class="haimg">
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item motd">
                                <div class="row">
                                
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="carousel-caption">
                                            <p class="semicolone"><i aria-hidden="true" class="fas fa-quote-left"></i><span>Kajal ( Delhi )</span></p>
                                            <p>I appreciate how Enatyam's yoga classes cater to various levels.<br> Whether
                                                you're a beginner or an experienced yogi, there's always  <br>room for growth. The instructors
                                                make sure everyone feels welcome."
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12 himg">
                                        <img src="public/images/happyfaces/11h.png" class="haimg">
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item motd">
                                <div class="row">
                                
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="carousel-caption">
                                            <p class="semicolone"><i aria-hidden="true" class="fas fa-quote-left"></i><span>Scarlett family ( Germany )</span></p>
                                            <p>Yoga is a daily dose of positivity for me . The instructors <br>
                                                radiate good vibes, and the classes have become <br>my source of calm in the midst of a
                                                busy schedule.<br> A fantastic platform for holistic well-being!"
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12 himg">
                                        <img src="public/images/happyfaces/12h.png" class="haimg">
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item motd">
                                <div class="row">
                                
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="carousel-caption">
                                            <p class="semicolone"><i aria-hidden="true" class="fas fa-quote-left"></i><span>Emma ( UK )</span></p>
                                            <p>Yoga is my daily escape from the hustle. The instructors make it easy to<br>
                                                disconnect and focus on the present moment.It's a simple yet powerful  <br>practice that has
                                                become a non-negotiable in my routine.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12 himg">
                                        <img src="public/images/happyfaces/14h.png" class="haimg">
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item motd">
                                <div class="row">
                                
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="carousel-caption">
                                            <p class="semicolone"><i aria-hidden="true" class="fas fa-quote-left"></i><span>Michael (Mike) ( USA)</span></p>
                                            <p>Enatyam's yoga is like a personal wellness retreat at home. <br>The
                                                instructors create a serene atmosphere,<br> and the classes feel like a journey into both 
                                                physical <br> and mental well-being. Truly transformative
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12 himg">
                                        <img src="public/images/happyfaces/15h.png" class="haimg">
                                    </div>
                                </div>
                            </div>
                            <!-- Add more carousel items as needed -->
                        </div>

                        <a class="carousel-control-prev" href="#combinedCarousel" role="button" data-slide="prev">
                            <span aria-hidden="true"><i class="fa fa-arrow-left"></i></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#combinedCarousel" role="button" data-slide="next">
                            <span aria-hidden="true"><i class="fa fa-arrow-right"></i></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



    </div>
    </div>
    </div>
</section>

<?php include('InstruInstructer.php'); ?>

<?php include('pricing.php'); ?>

<?php include('bookdemocallb.php'); ?>



<?php include('Dancefaq.php'); ?>

<?php include('footer.php'); ?>