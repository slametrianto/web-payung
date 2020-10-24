<section class="breadcrumb-area">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
                        <div class="section-heading">
                            <h2 class="sec__title mb-0">Portfolio</h2>
                        </div><!-- end section-heading -->
                        <ul class="list-items d-flex align-items-center">
                            <li class="active__list-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li> <?php
                          foreach($header_gallery_detail as $header_gallery_detail){ 
                            $title = strtolower($header_gallery_detail["title"]);
                          echo ucwords($title); } ?></li>
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
            <div class="col-lg-8">
                  <?php 
  $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
                  "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
                  $_SERVER['REQUEST_URI']; 
    //echo $link;
         foreach($gallery_detail as $gallery_detail){ ?>
                    <div class="col-lg-12">
                        <div class="card-item card-item-layout-2">
                            <div class="card-content-wrap">
                                <div class="card-badge-wrap">
                                    <span class="card-badge">Client : <?php echo $gallery_detail['client_name']; ?></span>
                                    <div class="icon-element">
                                    <i class="la la-share-alt"></i>
                                      <ul class="shared-list">
                                       <li><a href="http://www.facebook.com/share.php?u=<?php echo $link; ?>" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                                     <li><a href="http://twitter.com/intent/tweet?url=<?php echo $link; ?>&amp;text=PT.Payung Anak Bangsa&amp;hashtags=PT.Payung Anak Bangsa" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                     <li><a target="_blank" href="whatsapp://send?text=<?php echo $link; ?>"><i class="fa fa-whatsapp"></i></a></li>
                                   </ul>
                                </div>
                                </div>
                                <img src="<?php echo base_url(); ?>assets/foto/<?php echo $gallery_detail["foto"]; ?>" alt="<?php echo $gallery_detail["foto"]; ?>" onError="this.onerror=null;this.src='<?php echo base_url();?>assets/images/noimage.png';" width="800" height="300" >

                                <div class="card-content">
                                    <p class="card-meta">
                                        <span class="d-block"><img src="<?php echo base_url(); ?>assets/foto/<?php echo $gallery_detail["client_foto"]; ?>" alt="<?php echo $gallery_detail["client_foto"]; ?>" class="author-avatar"></span>
                                        <span class="font-weight-semi-bold"><i class="la la-user"></i> <?php echo $gallery_detail["author"]; ?></span> | 
                                        <i class="la la-briefcase"></i> <?php echo $gallery_detail["date_post"]; ?> | Category : <?php echo $gallery_detail["category"]; ?> | <i class="la la-eye"> <?php echo $gallery_detail["counter"]; ?> </i></p>
                                         <hr>
                                <p class="card-text mt-4 mb-3">
                                   <?php echo $gallery_detail["description"]; ?><br>
                                    <div class="section-block"></div>
                                Tags : 
                                  <ul class="tag-list mt-4">
                                 <?php $data_tags = explode(",",$gallery_detail["tags"]); 
                                   $count_tags = count($data_tags)-1;
                                   for ($tags = 0; $tags <= $count_tags; $tags ++) {
                                  ?><li><a href="#"><?php echo $data_tags[$tags]; ?></a></li>
                                 <?php } ?>
                               </ul>
         
                                 
                                </p>
                               <hr>
                               
                                <div class="tag-items mt-4">
                                    <ul class="social-profile mt-4">
                                        <li class="font-weight-semi-bold color-text-2 mr-2">Share post: </li>
                                        <li><a href="http://www.facebook.com/share.php?u=<?php echo $link; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="http://twitter.com/intent/tweet?url=<?php echo $link; ?>&amp;text=PT.Payung Anak Bangsa&amp;hashtags=PT.Payung Anak Bangsa" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li><a target="_blank" href="mailto:info@payunganakbangsa.com?subject=PT.Payung Anak Bangsa&body=<?php echo $link; ?>"><i class="fa fa-envelope"></i></a></li>
                                        <li><a target="_blank" href="whatsapp://send?text=<?php echo $link; ?>"><i class="fa fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                       
                                </div><!-- end card-content -->
                            </div><!-- end card-content-wrap -->
                        </div><!-- end card-item -->
                    </div><!-- end col-lg-4 -->
                     <?php }?>
                    <!-- end col-lg-4 -->
                <!-- end row -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="sidebar section-bg radius-round padding-30">
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Search</h3>
                        <div class="title-shape"></div>
                        <div class="contact-form-action mt-4">
                           <form action="<?php echo base_url(); ?>page/search_article" method="post" enctype="multipart/form-data">
                                <div class="form-group mb-0">
                                    <input class="form-control pl-3" type="text" name="title" value="<?php echo set_value('title'); ?>" placeholder="Search here">
                                    <button class="submit-btn"><i class="la la-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div><!-- end sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Category</h3>
                        <div class="title-shape"></div>
                        <ul class="mt-4">
                          <?php foreach($list_category as $list_category){ ?>
                            <li>
                                <div class="custom-checkbox">
                                    <label for="chb1" class="font-weight-medium"><a href="<?php echo base_url(); ?>category_article/<?php echo strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $list_category['category_article']))); ?>"><?php echo $list_category['category_article']; ?></a><hr></label>
                                </div>
                            </li>
                           <?php } ?>
                        </ul>
                    </div><!-- end sidebar-widget -->
                    <div class="sidebar-widget posts-widget">
                        <h3 class="widget-title">Trending Posts</h3>
                        <div class="title-shape"></div>
                        <div class="sidebar-posts mt-4">
                            <?php foreach($trending_article as $trending_article){ ?>
                              <div class="recent-item align-items-center mb-3">
                                <div class="recent-img">
                                    <a href="<?php echo base_url(); ?>article/<?php echo strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '.', $trending_article['slug_article']))); ?>">
                                        <img src="<?php echo base_url(); ?>assets/foto/<?php echo $trending_article['foto']; ?>" alt="<?php echo $trending_article['title']; ?>">
                                    </a>
                                </div><!-- end recent-img -->
                                <div class="recent-post-body">
                                    <h4 class="recent__link">
                                        <a href="<?php echo base_url(); ?>article/<?php echo strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '.', $trending_article['slug_article']))); ?>"><?php echo $trending_article['title']; ?></a>
                                    </h4>
                                    <p class="recent__meta">By <a href="#"><?php echo $trending_article['author']; ?></a> <?php echo $trending_article['date_post']; ?></p>
                                </div><!-- end recent-img -->
                            </div><!-- end recent-item -->
                            <?php } ?><!-- end recent-img -->
                            </div><!-- end recent-item -->
                        </div><!-- end sidebar-posts -->
                    </div><!-- end sidebar-widget -->
                    <div class="sidebar-widget tag-widget">
                        <h3 class="widget-title">Latest Tags</h3>
                        <div class="title-shape"></div>
                         <ul class="tag-list mt-4">
                             <ul class="tag-list mt-4">
                            <?php foreach($all_tags_article as $all_tags_article){ 
                                $data_tag = explode(",",$all_tags_article["tag"]); 
                                   $count_tags = count($data_tag)-1;
                                   for ($tag = 0; $tag <= $count_tags; $tag ++) {
                                  ?><li><a href="<?php echo base_url(); ?>article_by_tag/<?php echo strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', trim($data_tag[$tag])))); ?>">
                                      <?php 
                                      $final_tags = strtolower($data_tag[$tag]);
                                     echo ucwords($final_tags); ?></a></li>
                                 <?php }} ?>
                           </ul>
                        </div><!-- end sidebar-widget -->
                   <!--  <div class="sidebar-widget social-widget">
                        <h3 class="widget-title">Follow &amp; Connect</h3>
                        <div class="title-shape"></div>
                        <ul class="social-profile padding-top-30px">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- end row -->
    </div><!-- end container -->
</section><!-- end blog-area -->