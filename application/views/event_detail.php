
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
       <div class="about-box">
    <div class="container">
      <div class="row">
<?php
   foreach($event_detail as $event_detail){ ?>
 <?php if($event_detail["foto"] != null){ ?>
           <div class="col-md-5">
                    <div class="post-media wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                        <img src="<?php echo base_url(); ?>assets/foto/<?php echo $event_detail["foto"]; ?>" alt="" onError="this.onerror=null;this.src='<?php echo base_url();?>assets/images/noimage.png';" class="img-responsive">
                      </div><!-- end media -->
                </div>
          <?php }else{ ?>
          <?php }?>
        <div class="col-md-7">
          <div class="message-box right-ab">
           <h4>Date Post : <?php echo $event_detail["date_post"]; ?> & Visited : <?php echo $event_detail["counter"]; ?> <br><hr></h4>
                        <h2><?php echo $event_detail["title"]; ?></h2>
                    <hr><p><div class="justify"><?php echo $event_detail["description"]; ?> </div></p>
            </div>
        </div>
      </div>
      <?php }?>
    </div>
  </div>

