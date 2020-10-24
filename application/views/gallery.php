<section class="breadcrumb-area">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
                        <div class="section-heading">
                            <h2 class="sec__title mb-0">All Portfolio</h2>
                        </div><!-- end section-heading -->
                        <ul class="list-items d-flex align-items-center">
                            <li class="active__list-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                           
                        </ul>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
       START BLOG AREA
================================= -->
<section class="blog-area padding-top-100px padding-bottom-100px">
    <div class="container">
        <div class="row">
          <?php
          $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
                  "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
                  $_SERVER['REQUEST_URI']; 
   foreach($list_gallery as $list_gallery){ ?>
            <div class="col-lg-4 column-td-6">
                <div class="card-item card-item-layout-2">
                    <div class="card-content-wrap">
                        <div class="card-badge-wrap">
                            <span class="card-badge">gallery</span>
                            <div class="icon-element">
                                <i class="la la-share-alt"></i>
                                 <ul class="shared-list">
                                  <li><a href="http://www.facebook.com/share.php?u=<?php echo $link; ?>" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                                     <li><a href="http://twitter.com/intent/tweet?url=<?php echo $link; ?>&amp;text=PT.Payung Anak Bangsa&amp;hashtags=PT.Payung Anak Bangsa" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                     <li><a target="_blank" href="whatsapp://send?text=<?php echo $link; ?>"><i class="fa fa-whatsapp"></i></a></li>
                                 </ul>
                            </div>
                        </div>
                        
                        <img  width="352" height="200" src="<?php echo base_url(); ?>assets/foto/<?php echo $list_gallery["foto"]; ?>" alt="" onError="this.onerror=null;this.src='<?php echo base_url();?>assets/images/noimage.png';" >
                        <div class="card-content">
                            <p class="card-meta">
                                <span class="d-block"><img src="<?php echo base_url(); ?>assets/foto/<?php echo $list_gallery["foto"]; ?>" alt="" onError="this.onerror=null;this.src='<?php echo base_url();?>assets/images/noimage.png';"  class="author-avatar"></span>
                                <span class="font-weight-semi-bold"><?php echo $list_gallery["author"]; ?></span>
                                <span>- <?php echo $list_gallery["date_post"]; ?></span>
                            </p>
                            <h4 class="card-title">
                                <?php echo $list_gallery["title"]; ?>
                            </h4>
                            <hr>
                            <?php echo word_limiter($list_gallery["description"],25); ?><hr>
                             <p><center><a class="btn btn-light btn-radius grd1 btn-brd"  href="<?php echo base_url(); ?>portfolio/<?php echo strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '.', $list_gallery['slug_gallery']))); ?>"><?php if(get_cookie('lang_is') === 'in'){ ?>
                                Selengkapnya&rarr;
                              <?php }else{ ?>
                                Read More&rarr;
                                <?php } ?></center></a></p>
                        </div><!-- end card-content -->
                    </div><!-- end card-content-wrap -->
                </div><!-- end card-item -->
            </div><!-- end col-lg-4 -->
            <?php }?>
            <!-- end col-lg-4 -->
        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="page-navigation-wrap mt-4">
                    <div class="page-navigation mx-auto">
                       
                        <ul class="page-navigation-nav">
                          
<?php echo $pagination; ?>
                        </ul>
                       
                    </div>
                </div><!-- end page-navigation-wrap -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end blog-area -->