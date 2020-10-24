 <?php if(get_cookie('lang_is') === 'in'){ ?>
   <h1 class="mt-4 mb-3">Daftar
      <small>Ruang Kreatif</small>
    </h1>
      <ol class="breadcrumb">
     <li class="breadcrumb-item">
        <a href="<?php echo base_url(); ?>">Beranda</a>
      </li>
      <li class="breadcrumb-item active">Ruang Kreatif</li>
    </ol>

       <?php }else{ ?>
         <h1 class="mt-4 mb-3">All
      <small>Creative Space</small>
    </h1>
       <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo base_url(); ?>">Home</a>
      </li>
      <li class="breadcrumb-item active">Creative Space</li>
    </ol>
      <?php } ?>


    <div class="row">
      <?php foreach($list_room as $list_room){ ?>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
           <?php if($list_room["foto"] != null){ ?>
           <a href="<?php echo base_url(); ?>page/room_detail/<?php echo strtolower(str_replace(' ','-',preg_replace("/[^a-zA-Z0-9\s]/", "", $list_room['id']).'/'.$list_room['title'])); ?>" ><img class="card-img-top" src="<?php echo base_url(); ?>assets/foto/<?php echo $list_room['foto']; ?>" alt="" 
            onError="this.onerror=null;this.src='<?php echo base_url();?>assets/images/noimage.png';" class="card-img-top" ></a>
          <?php }else{ ?>
          <?php }?>
          <div class="card-body">
            <h4 class="card-title">
              <?php echo $list_room["title"]; ?>
            </h4>
            <p class="card-text"><div class="justify"><?php echo word_limiter($list_room["description"],20); ?></div></p>
          </div><div class="card-footer">
            <center>
              <a id="bold" href="<?php echo base_url(); ?>page/room_detail/<?php echo strtolower(str_replace(' ','-',preg_replace("/[^a-zA-Z0-9\s]/", "", $list_room['id']).'/'.$list_room['title'])); ?>" class="btn btn-danger"><?php if(get_cookie('lang_is') === 'in'){ ?>
              Selengkapnya&rarr;
            <?php }else{ ?>
              Read More&rarr;
              <?php } ?></a>
            </center>
          </div>
        </div>
      </div>
       <?php } ?>
    </div>

    <!-- Pagination -->
    <ul class="pagination justify-content-center">
       <?php echo $pagination; ?>
      </li>
    </ul> 
 