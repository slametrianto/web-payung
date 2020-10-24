
  <div class="all-title-box">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Event</h2>
          <!-- Breadcrumbs -->
          <nav id="breadcrumbs">
            <ul>
              <li><a href="#">Home</a></li>
              <li><?php echo $title; ?></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
      <div id="features" class="section wb">
  <div class="container">
    <div class="section-title row text-center">
      <div class="col-md-8 col-md-offset-2">
        <small>All Awesome Of Our Event</small>
        <h3>Event Details</h3>
        <hr>
        <p class="lead" style="visibility: visible; animation-name: fadeIn;" >Let's Join With Us For The Next Event !</p>
      </div><!-- end col -->
    </div><!-- end title -->
    
    <hr class="invis"> 

    <div class="row">
      <?php
   foreach($list_event as $list_event){ ?>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="service-widget">
          <div class="property-main">
            <div class="property-wrap">
              <?php if($list_event["foto"] != null){ ?>
              <figure class="post-media wow fadeIn">
                <a href="<?php echo base_url(); ?>assets/foto/<?php echo $list_event["foto"]; ?>" alt="" onError="this.onerror=null;this.src='<?php echo base_url();?>assets/images/noimage.png';" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                <img src="<?php echo base_url(); ?>assets/foto/<?php echo $list_event["foto"]; ?>" alt="" onError="this.onerror=null;this.src='<?php echo base_url();?>assets/images/noimage.png';" alt="" class="img-responsive">
                 <?php }else{ ?>
              <?php }?>
                <div class="label-inner">
                  <span class="label-status label"><?php echo $list_event["author"]; ?></span>
                </div>
               <!--  <div class="price">
                  <span class="item-sub-price">$5.550/sq ft</span> 
                </div> -->
              </figure>
              <div class="item-body">
                <h3><?php echo word_limiter($list_event["title"],3); ?></a></h3>
                <div class="info">
                </div>
                <div class="adderess">
                  <?php echo word_limiter($list_event["description"],20); ?>
                  <hr>
                 
                </div>
              </div>
            </div>
            <div class="item-foot">
              <div class="pull-center">
                 <p><center><a class="btn btn-light btn-radius grd1 btn-brd"  href="<?php echo base_url(); ?>page/event_detail/<?php echo strtolower(str_replace(' ','-',preg_replace("/[^a-zA-Z0-9\s]/", "", $list_event['id_event']).'/'.$list_event['title'])); ?>" ><?php if(get_cookie('lang_is') === 'in'){ ?>
              Selengkapnya&rarr;
            <?php }else{ ?>
              Read More&rarr;
              <?php } ?></center></a></p>
              </div>
            </div>
          </div>
        </div>
        <!-- end service -->
      </div> <?php }?>
      <!-- end service -->
      </div>
    </div><!-- end row -->
  </div><!-- end container -->
</div><!-- end section -->
    <?php echo $pagination; ?>
