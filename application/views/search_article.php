<section class="breadcrumb-area">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
                        <div class="section-heading">
                            <h2 class="sec__title mb-0">Article Result</h2>
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
                                     echo trim(ucwords($final_tags)); ?></a></li>
                                 <?php }} ?>
                           </ul>
                        </ul>
                                   </div><!-- end sidebar -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-8">
                <div class="row">
                   <?php 
          $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
                  "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
                  $_SERVER['REQUEST_URI']; 
         ?>


         <?php if($article_detail == null){ 
              //   echo "<script>
              //  alert('NO DATA DISPLAYED');
              // </script>";   
                     ?>
                     <div class="col-lg-12">
                            <div class="card-content-wrap">
                                <div class="card-badge-wrap">
                    <div class="blockquote-item margin-top-30px">
                                    <blockquote class="mb-0">
                                        <i class="fa fa-quote-right blockquote__icon"></i>
                                        <p class="blockquote__text">
                                             <code>
                    Sory ,no data displayed for this keyword. <hr>
                   </code>
                                        </p>
                                        <h4 class="blockquote__meta">Please try again, <span> with another keyword.</span></h4>
                                    </blockquote>
                                </div>
                                </div>
                    <?php 
                    }
                    else{
                foreach($article_detail as $article_detail){ 
           ?>
          <div class="col-lg-6">
                        <div class="card-item card-item-layout-2">
                            <div class="card-content-wrap">
                                <div class="card-badge-wrap">
                                    <span class="card-badge"><?php echo $article_detail["category_article"]; ?></span>
                                    <div class="icon-element">
                                    <i class="la la-share-alt"></i>
                                     <ul class="shared-list">
                                       <li><a href="http://www.facebook.com/share.php?u=<?php echo $link; ?>" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                                     <li><a href="http://twitter.com/intent/tweet?url=<?php echo $link; ?>&amp;text=PT.Payung Anak Bangsa&amp;hashtags=PT.Payung Anak Bangsa" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                     <li><a target="_blank" href="whatsapp://send?text=<?php echo $link; ?>"><i class="fa fa-whatsapp"></i></a></li>
                                     </ul>
                                </div>
                                </div>
                                <img src="<?php echo base_url(); ?>assets/foto/<?php echo $article_detail["foto"]; ?>" alt="<?php echo $article_detail["foto"]; ?>" onError="this.onerror=null;this.src='<?php echo base_url();?>assets/images/noimage.png';" class="img-fluid">
                                <div class="card-content">
                                    <p class="card-meta">
                                        <span class="d-block"><img src="images/small-team1.jpg" alt="" class="author-avatar"></span>
                                        <span class="font-weight-semi-bold"><?php echo $article_detail["author"]; ?></span>
                                        <span>- <?php echo $article_detail["date_post"]; ?></span>
                                    </p>
                                    <h4 class="card-title">
                                        <a href="<?php echo base_url(); ?>article/<?php echo strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '.', $article_detail['slug_article']))); ?>"><?php echo $article_detail["title"]; ?></a>
                                    </h4>
                                </div><!-- end card-content -->
                            </div><!-- end card-content-wrap -->
                        </div><!-- end card-item -->
                    </div><?php }} ?>
                   <!-- end col-lg-4 -->
                </div><!-- end row -->
            </div><!-- end col-lg-8 -->
        </div><!-- end row -->
       <!-- end row -->
    </div><!-- end container -->
</section><!-- end blog-area -->