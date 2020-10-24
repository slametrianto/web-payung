<section class="breadcrumb-area about-breadcrumb">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content text-center">
                        <div class="section-heading">

                          <?php if(get_cookie('lang_is') === 'in'){ ?>
                            <h2 class="sec__title mb-3 line-height-55">Kami adalah pintu gerbang solusi TI untuk siapa saja.</h2>
                            <p class="sec__desc color-white-rgba">
                                Selama lebih dari <strong class="text-white">7</strong> tahun di teknikal, <strong class="text-white">Payung Anak Bangsa</strong> atau (Kami ) ,adalah perusahaan IT yang kami ciptakan berdasarkan kecintaan kami pada dunia teknologi informasi, kami ingin tumbuh dan ingin terus memajukan ekosistem TI di Indonesia dan di dunia.
                                <br>
                                We want to be a gateway for anyone, so that it can be a solution, especially in the world of information technology.
                            </p>
                            <?php }else{ ?>
                              <h2 class="sec__title mb-3 line-height-55">We are the gateway to IT solutions for anyone.</h2>
                            <p class="sec__desc color-white-rgba">
                                For over <strong class="text-white">7</strong> years in technical, <strong class="text-white">Payung Anak Bangsa</strong> As (We ) ,is an IT company that we created based on our love for the world of information technology, we want to grow and want to continue to advance the IT ecosystem in Indonesia and in the world.
                                <br>
                                We want to be a gateway for anyone, so that it can be a solution, especially in the world of information technology.
                            </p>
                              <?php } ?>
                            
                        </div><!-- end section-heading -->
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->

        <div class="btn-box watch-video-btn">
            <a href="<?php echo base_url(); ?>assets/video/PAYUNG ANAK BANGSA.mp4" class="icon-element mfp-iframe video-popup-btn btn-rgb" autoplay loop muted>
        <i class="la la-play"></i></a>
        </div>
    </div><!-- end breadcrumb-wrap -->
</section>
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START ERROR AREA
================================= -->

 <?php 
  $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
                  "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
                  $_SERVER['REQUEST_URI']; 
    //echo $link;
  ?> 
<section class="hiw-area text-center section-bg padding-top-100px padding-bottom-85px">
   <section class="blog-area padding-top-100px padding-bottom-70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-single-card">
                    <div class="card-item card-item-layout-2">
                        <div class="card-content-wrap">
                            <div class="card-badge-wrap">
                                <span class="card-badge">Company</span>
                                <div class="icon-element">
                                <i class="la la-share-alt"></i>
                                 <ul class="shared-list">
                                    <li><a href="http://www.facebook.com/share.php?u=<?php echo $link; ?>" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                                     <li><a href="http://twitter.com/intent/tweet?url=<?php echo $link; ?>&amp;text=PT.Payung Anak Bangsa&amp;hashtags=PT.Payung Anak Bangsa" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                     <li><a target="_blank" href="whatsapp://send?text=<?php echo $link; ?>"><i class="fa fa-whatsapp"></i></a></li>
                                 </ul>
                            </div>
                            </div>
                            <?php
   foreach($page_detail as $page_detail){ ?>
 <?php if($page_detail["foto"] != null){ ?>
                            <img src="<?php echo base_url(); ?>assets/foto/<?php echo $page_detail["foto"]; ?>" alt="" onError="this.onerror=null;this.src='<?php echo base_url();?>assets/foto/foto.png';" class="img-responsive" width="1200" height="700">
                <?php }else{ ?>
                      <?php }?>
                            <div class="card-content">
                                <p class="card-meta">
                                    <span class="d-block"><img src="<?php echo base_url(); ?>assets/foto/<?php echo $page_detail["foto"]; ?>" alt="" class="author-avatar"></span>
                                    <span class="font-weight-semi-bold"><?php echo $page_detail["author"]; ?></span>
                                    <span>- <?php echo $page_detail["date_post"]; ?></span>
                                    <span class="ml-1 mr-1"> - <?php $page = strtolower($page_detail["page"]);
                                     echo ucwords($page); ?> </span>
                                </p>
                                <h4 class="card-title mb-4 font-size-24 line-height-35">
                                    <?php echo $page_detail["title"]; ?>
                                </h4>
                                <div class="section-block"></div>
                                <p class="card-text mt-4 mb-3">
                                   <?php echo $page_detail["description"]; ?>
                                </p>
                               
                               
                                <div class="tag-items mt-4">
                                    <ul class="social-profile mt-4">
                                       
                                        <li class="font-weight-semi-bold color-text-2 mr-2">Share post:</li>
                                        <li><a href="http://www.facebook.com/share.php?u=<?php echo $link; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="http://twitter.com/intent/tweet?url=<?php echo $link; ?>&amp;text=PT.Payung Anak Bangsa&amp;hashtags=PT.Payung Anak Bangsa" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li><a target="_blank" href="mailto:info@payunganakbangsa.com?subject=PT.Payung Anak Bangsa&body=<?php echo $link; ?>"><i class="fa fa-envelope"></i></a></li>
                                        <li><a target="_blank" href="whatsapp://send?text=<?php echo $link; ?>"><i class="fa fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div><!-- end card-content -->
                        </div><!-- end card-content-wrap -->
                    </div><!-- end card-item -->
                   <?php }?>
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end blog-area -->
<!-- ================================
       START BLOG AREA
================================= -->
</section><!-- end error-area -->
<!-- ================================
    END ERROR AREA
================================= -->

<div class="section-block"></div>