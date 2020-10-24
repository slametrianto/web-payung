<div class="tag-area padding-top-130px padding-bottom-90px text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="sec__title mb-0">  
                    <?php if(get_cookie('lang_is') === 'in'){ ?>
                    Keahlian Teknikal
                    <?php }else{ ?> 
                    Technical  Expertise
                    <?php } ?>
                    </h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row mt-4">
            <div class="col-lg-6 mx-auto">
                <ul class="list-items job-tags d-flex flex-wrap justify-content-center">
                    <li><a href="#" class="disabled">UI/UX Designer</a></li>
                    <li><a href="#" class="disabled">Database Cluster</a></li>
                    <li><a href="#" class="disabled">Server</a></li>
                    <li><a href="#" class="disabled">DevOps</a></li>
                    <li><a href="#" class="disabled">Storage</a></li>
                    <li><a href="#" class="disabled">Cloud Computing</a></li>
                    <li><a href="#" class="disabled">Data Center</a></li>
                    <li><a href="#" class="disabled">Web Development</a></li>
                    <li><a href="#" class="disabled">Android Development</a></li>
                    <li><a href="#" class="disabled">Dekstop Development</a></li>
                    <li><a href="#" class="disabled">Engineering</a></li>
                    <li><a href="#" class="disabled">Freelance</a></li>
                    <li><a href="#" class="disabled">Microservice</a></li>
                    <li><a href="#" class="disabled">Wise Installer</a></li>
                    <li><a href="#" class="disabled">Portable Display</a></li>
                </ul>
                <p class="font-weight-medium mt-3">
                <?php if(get_cookie('lang_is') === 'in'){ ?>
                    Kami berpengalaman dalam pemeerintahan ,perusahaan swasta, pendidikan dan projek nasional.
                    <?php }else{ ?> 
                    We've experience on governmant,corporate,education & national project.
                    <?php } ?></p>
            </div>
        </div>
    </div>
</div>
<!-- ================================
    END TAG AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
    START CAT AREA
================================= -->
<section class="cat-area padding-top-100px padding-bottom-110px text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                     <?php if(get_cookie('lang_is') === 'in'){ ?>
                    <h2 class="sec__title">Hasil Karya</h2>
                    <p class="sec__desc">
                        Ini adalah beberapa hasil karya kami.
                    </p>
                    <?php }else{ ?> 
                   
                    <h2 class="sec__title">Portfolio</h2>
                    <p class="sec__desc">
                        This's some of our portfolio.
                    </p>
                    <?php } ?>


                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row mt-5 justify-content-center">
            <?php foreach($all_gallery as $gallery){ ?>
              <div class="col-lg-3 column-td-6">
                <div class="category-item">
                    <a href="<?php echo base_url(); ?>portfolio/<?php echo strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '.', $gallery['slug_gallery']))); ?>" class="cat-fig-box d-block p-4">
                        <div class="icon-element mb-3">
                            <i class="la la-desktop"></i>
                        </div>
                        <div class="cat-content">
                            <h4 class="cat__title mb-2"><?php echo $gallery["title"]; ?></h4>
                            <span class="font-weight-medium">1</span>
                        </div>
                    </a>
                </div>
               <!-- end category-item -->
            </div> <?php } ?><!-- end col-lg-3 -->
          <!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="btn-box text-center mt-4">
                    <a href="<?php echo base_url(); ?>jobs" class="theme-btn">
                     <?php if(get_cookie('lang_is') === 'in'){ ?>
                    <p class="sec__desc">
                       Selengkapnya 
                    </p>
                    <?php }else{ ?> 
                   
                    <p class="sec__desc">
                        More  
                    </p>
                    <?php } ?>
                </a>
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end cat-area -->
<!-- ================================
    END CAT AREA
================================= -->

<!-- ================================
    START HIW AREA
================================= -->
<section class="hiw-area text-center section-bg padding-top-100px padding-bottom-85px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">

                     <?php if(get_cookie('lang_is') === 'in'){ ?>
                    <h2 class="sec__title">Bagaimana kami dapat membantu Anda?</h2>
                    <p class="sec__desc">
                      Kami siap untuk membantu meningkatkan ide baik atas bisnis Anda.
                    </p>
                    <?php }else{ ?> 
                   
                    <h2 class="sec__title">What we can do for You?</h2>
                    <p class="sec__desc">
                       We are ready to help improve good ideas for your business.
                    </p>
                    <?php } ?>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row mt-5">

 <?php if(get_cookie('lang_is') === 'in'){ ?>
            <div class="col-lg-4 column-td-6">
                <div class="icon-box">
                    <div class="icon-element">
                        <i class="la la-search-plus"></i>
                        <span class="info-number">1</span>
                    </div><!-- end icon-element-->
                    <div class="info-content mt-4">
                       <h4 class="info__title mb-3">Anda Sudah menemukan kami sebagai Solusi Anda </h4>
                        <p class="info__desc">
                            Kami sangat senang mendengarkan apa yang dapat kami lakukan untuk solusi yang tepat di bisnis Anda.
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <?php }else{ ?> 
                <div class="col-lg-4 column-td-6">
                <div class="icon-box">
                    <div class="icon-element">
                        <i class="la la-search-plus"></i>
                        <span class="info-number">1</span>
                    </div><!-- end icon-element-->
                    <div class="info-content mt-4">
                       <h4 class="info__title mb-3">You have found us as your solution </h4>
                        <p class="info__desc">
                            We're so happy to listen what we can do for the right solution at Your business.
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
    <?php } ?>


<?php if(get_cookie('lang_is') === 'in'){ ?>
            <div class="col-lg-4 column-td-6">
                <div class="icon-box">
                    <div class="icon-element">
                        <i class="la la-search-plus"></i>
                        <span class="info-number">2</span>
                    </div><!-- end icon-element-->
                    <div class="info-content mt-4">
                       <h4 class="info__title mb-3">Jelaskan kepada Kami kebutuhan Anda</h4>
                        <p class="info__desc">
                            Kami akan mengerjakan kebutuhan anda dengan segera.
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <?php }else{ ?> 
                <div class="col-lg-4 column-td-6">
                <div class="icon-box">
                    <div class="icon-element">
                        <i class="la la-search-plus"></i>
                        <span class="info-number">2</span>
                    </div><!-- end icon-element-->
                    <div class="info-content mt-4">
                       <h4 class="info__title mb-3">Share with Us</h4>
                        <p class="info__desc">
                             We'll do what you need, asap.
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
    <?php } ?>



<?php if(get_cookie('lang_is') === 'in'){ ?>
            <div class="col-lg-4 column-td-6">
                <div class="icon-box">
                    <div class="icon-element">
                        <i class="la la-search-plus"></i>
                        <span class="info-number">3</span>
                    </div><!-- end icon-element-->
                    <div class="info-content mt-4">
                       <h4 class="info__title mb-3">Fokus pada Bisnis Anda</h4>
                        <p class="info__desc">
                            Gunakan aplikasi Anda, dan jadikan itu sebagai solusi ,bersama dengan kami.
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
            <?php }else{ ?> 
                <div class="col-lg-4 column-td-6">
                <div class="icon-box">
                    <div class="icon-element">
                        <i class="la la-search-plus"></i>
                        <span class="info-number">3</span>
                    </div><!-- end icon-element-->
                    <div class="info-content mt-4">
                       <h4 class="info__title mb-3">Focus on Your Business</h4>
                        <p class="info__desc">
                             Use Your app, and make it as your solution ,together with us.
                        </p>
                    </div><!-- end info-content -->
                </div><!-- end icon-box -->
            </div><!-- end col-lg-4 -->
    <?php } ?>
           <!-- end icon-box -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end hiw-area -->
<!-- ================================
    END HIW AREA
================================= -->

<!-- ================================
    START CARD AREA
================================= -->
<section class="card-area padding-top-100px padding-bottom-110px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <?php if(get_cookie('lang_is') === 'in'){ ?>
                    <h2 class="sec__title">Blog <br></h2>
                    <p class="sec__desc">
                        Berita Terbaru.
                    </p>
                    <?php }else{ ?>
                    <h2 class="sec__title">Article <br></h2>
                    <p class="sec__desc">
                        Latest article.
                    </p><?php } ?>

                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row mt-5">
            <div class="col-lg-12">
                <!-- <div class="tab-shared">
                    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link theme-btn active" id="recent-tab" data-toggle="tab" href="#recent-job" role="tab" aria-controls="recent-job" aria-selected="true">
                                Recent Jobs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link theme-btn" id="feature-tab" data-toggle="tab" href="#feature-job" role="tab" aria-controls="feature-job" aria-selected="false">
                                Feature Jobs
                            </a>
                        </li>
                    </ul>
                </div> -->
                <div class="tab-content margin-top-35px" id="myTabContent">
                    <div class="tab-pane fade show active" id="recent-job" role="tabpanel" aria-labelledby="recent-tab">
                        <div class="row">
                           <?php foreach($latest_article as $latest_article){ ?>
                            <div class="col-lg-4 column-td-6">
                                <div class="job-card">
                                    <div class="job-card-content">
                                        <a href="<?php echo base_url(); ?>article/<?php echo strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '.', $latest_article['slug_article']))); ?>" class="d-block">
                                            <div class="card-head d-flex align-items-center">
                                                <div class="company-avatar mr-3">
                                                    <img class="card-svg" src="<?php echo base_url(); ?>assets/foto/<?php echo $latest_article['foto']; ?>" x="0px" y="0px" viewBox="0 0 512.007 512.007" style="enable-background:new 0 0 512.007 512.007;">
                                                        
                                                </div>
                                                <div class="company-title-box">
                                                    <h4 class="card-title mb-1"><?php echo $latest_article['title']; ?></h4>
                                                    <p class="card-sub"><i class="la la-user"></i> <?php echo $latest_article['author']; ?></p>
                                                </div>
                                            </div>
                                            <div class="card-content mt-4 margin-bottom-30px">
                                                <h4 class="card-title mb-2">Art Production Specialist</h4>
                                                <p class="card-sub"><?php echo word_limiter($latest_article['description'],30); ?></p>
                                            </div>
                                            <div class="section-block-2"></div>
                                            <div class="card-foot d-flex align-items-center justify-content-between mt-4">
                                                <span class="color-text-2 font-size-13"><i class="la la-briefcase"></i> <?php echo $latest_article['date_post']; ?></span>
                                                <span class="color-text-2 font-size-13"><i class="la la-eye"></i> <?php echo $latest_article['counter']; ?> x</span>
                                                
                                            </div>
                                        </a>
                                    </div><!-- end job-card-content -->
                                </div><!-- end job-card -->
                            </div><!-- end col-lg-4 -->
                          <?php } ?>
                        </div>
                    </div><!-- end tab-pane -->
                </div><!-- end tab-content -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="btn-box text-center mt-4">
                    <a href="<?php echo base_url("blog"); ?>" class="theme-btn">
                    <?php if(get_cookie('lang_is') === 'in'){ ?>Lihat Artikel<?php }else{ ?>View Blog<?php } ?>
                </a>
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end card-area -->
<!-- ================================
    END CARD AREA
================================= -->

<!-- ================================
    START FUN-FACT AREA
================================= -->
<section class="funfact-area section-bg-2 padding-top-100px padding-bottom-60px text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <?php if(get_cookie('lang_is') === 'in'){ ?>
                    <h2 class="sec__title text-white">Bukti ada di puncak!</h2>
                    <p class="sec__desc color-white-rgba">
                         Client Kami
                    </p><?php }else{ ?>
                    <h2 class="sec__title text-white">Evidence is at the top!</h2>
                    <p class="sec__desc color-white-rgba">
                        Our Client
                    </p><?php } ?>


                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row margin-top-35px">
            <div class="col-lg-9 mx-auto">
                <div class="client-logo-wrap d-flex flex-wrap justify-content-center align-items-center">
                    <?php foreach($all_client as $all_client){ ?>
                      <div class="client-logo-item">
                        <img src="<?php echo base_url(); ?>assets/foto/<?php echo $all_client['client_foto']; ?>" width="100" height="100" alt="<?php echo $all_client['client_name']; ?>">
                        <!-- <?php echo $all_client['client_name']; ?> -->
                    </div><!-- end client-logo-item -->
                  <?php } ?>
                </div><!-- end client-logo-wrap-->
            </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end funfact-area -->

<!-- ================================
    END FUN-FACT AREA
================================= -->

<!-- ================================
       START TESTIMONIAL AREA
================================= -->

<!-- ================================
    END CTA AREA
================================= -->

<!-- ================================
    START MOBILE-APP AREA
================================= -->
<!-- <section class="mobile-app-area padding-top-100px padding-bottom-110px">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="mobile-img">
                    <img src="<?php echo base_url(); ?>assets/desain_frontend/images/mobile.png" alt="mobile-img">
                </div>
            </div>
            <div class="col-lg-6 ml-auto">
                <div class="mobile-app-content">
                    <div class="section-heading margin-bottom-30px">
                        <h2 class="sec__title"> 
                         <?php if(get_cookie('lang_is') === 'in'){ ?>Unduh Pencarian Aplikasi Seluler kami untuk Pekerjaan di Perjalanan<?php }else{ ?>Download Our Mobile App Search for Jobs on the Go
                         <?php } ?>
                        </h2>
                    </div>
                    <ul class="info-list contact-links">
                        
                        <li class="d-flex align-items-center mb-4">
                            <span class="flex-shrink-0 la la-bell-o"></span>
                            <div class="app-title-box">
                                <?php if(get_cookie('lang_is') === 'in'){ ?><h4 class="widget-title pb-2 font-weight-bold"> Hubungi kami dengan Mudah</h4>
                                <p class="color-text-3">
                                   Terhubung bersama kami ,dimanapun ,kapanpun.
                                </p><?php }else{ ?><h4 class="widget-title pb-2 font-weight-bold"> Contact Us Easy</h4>
                                <p class="color-text-3">
                                   Connect  with us, anywhere, anytime.
                                </p><?php } ?>
                            </div>
                        </li>
                    </ul>
                    <div class="btn-box d-flex text-left margin-top-40px">
                        <a href="#" class="theme-btn download-btn"><i class="la la-android"></i>Google Play</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- ================================
    END MOBILE-APP AREA
================================= -->

<div class="section-block"></div>

<!-- ================================
       START BLOG AREA
================================= -->
