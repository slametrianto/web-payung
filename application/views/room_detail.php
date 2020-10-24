
  <?php if(empty($room_detail)){ ?>

      <!-- Post Content Column -->
     <div class="container">
    <h1 class="mt-4 mb-3">
      <small>
      </small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo base_url(); ?>">Home</a>
      </li>
      <li class="breadcrumb-item active"></li>
    </ol>

    <div class="row">
      <!-- Post Content Column -->
      <div class="col-lg-8">
        <!-- Preview Image -->
        <hr>
        <!-- Date/Time -->
        <p>No Data Displayed</p>
        <hr>
        <!-- Post Content -->
        <hr>
     
        <!-- Single Comment -->
        <!-- Comment with nested comments -->
       </div>



  <?php }else{ ?>
    <?php
   foreach($room_detail as $room_detail){ ?>
  <div class="container">
<h1 class="mt-4 mb-3"><?php echo $room_detail["title"]; ?>
     
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo base_url(); ?>">Home</a>
      </li>
      <li class="breadcrumb-item active"><?php echo $room_detail["category"]; ?></li><li class="breadcrumb-item"><?php echo $room_detail["title"]; ?></li>
    </ol>

    <div class="row">
      <!-- Post Content Column -->
      <div class="col-lg-12">
        <!-- Preview Image -->

        <?php if($room_detail["foto"] != null){ ?>
          <img class="img-fluid rounded" src="<?php echo base_url(); ?>assets/foto/<?php echo $room_detail["foto"]; ?>" alt="" onError="this.onerror=null;this.src='<?php echo base_url();?>assets/images/noimage.png';" >
          <?php }else{ ?>
          <?php }?>

          
        
        <hr>
        <!-- Date/Time -->
        <p>Post <?php echo $room_detail["date_post"]; ?> 

         </p>
        <hr>
        <!-- Post Content -->
        <div class="justify"><?php echo $room_detail["description"]; ?></div>
        <hr>
     
        <!-- Single Comment -->
        <!-- Comment with nested comments -->
       </div>
 <?php }} ?>
      <!-- Sidebar Widgets Column -->
    
    </div>