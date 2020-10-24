<!DOCTYPE html>
<html lang="en">
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/artikel/ckeditor/ckeditor.js"></script>
  <script src="<?php echo base_url(); ?>assets/artikel/ckeditor/samples/js/sample.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/artikel/ckeditor/samples/css/samples.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/artikel/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">

    <script type='text/javascript' src="<?php echo base_url(); ?>assets/artikel/js/plugins/select/select2.min.js"></script>
</head>
<body> 
  <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong></strong> <small> <?php echo $title; ?></small>
                            </div>
                            <div class="card-body card-block">
  <?php foreach ($single_room as $single_room) ?>             
      <form data-validate="parsley" action="<?php echo site_url('backend/room/update_room');?>/<?php echo $single_room["id"]; ?>" method="post" enctype="multipart/form-data">
              <div class="col-md-12">
                  <div class="panel panel-primary" id="demo">
                      <div class="panel-heading">
                          <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Room</h3>
                              <div class="panel-toolbar text-right">
                                </div>
                                   </div>
                                      <div class="panel-toolbar text-left"></div>
                                        <div class="btn-group"></div>
                                         <div class="col-sm-6">
                                          <div class="form-group ">
                                            <label>Category</label><input type="hidden" name="id" value="<?php echo $single_room["id"]; ?>"/>
                                             <select name="id_category" class="form-control">
                                           <option value="<?php echo $single_room["id_category"]; ?>">
                                                <?php echo $single_room["category"]; ?></option>
                                                <?php foreach($category_room as $category_room){ ?>
                                                  <option value="<?php echo $category_room["id_category"]; ?>">
                                                    <?php echo $category_room["category"]; ?></option>
                                                <?php } ?>
                                              

                                            </select><?php echo form_error('id_category'); ?></div></div>
                                            
                                         <div class="col-sm-6">
                                           <div class="form-group">
                                          <label>Title</label>
                                          <input type="text" class="form-control" data-required="true" name="title" value="<?php echo $single_room["title"]; ?>"/>
                                        <?php echo form_error('title'); ?></div></div>
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                            <label>Author</label>
                                              <input type="text" class="form-control" data-required="true" name="author" value="<?php echo $single_room["author"]; ?>">                        
                                             <?php echo form_error('author'); ?></div></div>
                                         

                                         <div class="col-sm-3">
                                          <div class="form-group">
                                            <label>Language</label>
                                                <select name="bahasa" id="select" class="form-control" value="<?php echo set_value('bahasa'); ?>">
                                                  <?php if($single_room["bahasa"] =="ENG"){ 
                                                ?>
                                            <option value="ENG">INGGRIS</option>
                                            <option value="IDN">INDONESIA</option>
                                            <?php }else{ ?>
                                              <option value="IDN">INDONESIA</option>
                                            <option value="ENG">INGGRIS</option>
                                            <?php } ?>
                                           </select>                    
                                             <?php echo form_error('bahasa'); ?>
                                               </div>
                                            </div>
                                        
                                         <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>Foto</label>
                                          <input type="file" class="form-control" data-required="true" name="foto" value="<?php echo set_value('foto'); ?>">                        
                                         <?php if($single_room["foto"] != null){
                                          echo $single_room["foto"];
                                          echo "&nbsp;&nbsp;<img height='70' width='70' src='".base_url('assets/foto/'.$single_room['foto'])."' > "; 
                                          ?><?php } elseif($single_room["foto"] == null){
                                          echo "Foto Belum Diupload";
                                          echo "&nbsp;&nbsp;<img height='70' width='70' src='".base_url('assets/foto/foto.jpg')."' > "; 
                                             } ?></div></div> <div class="col-sm-12">
                                       <div class="form-group">
                                     <label>Description</label>
                                   <textarea id="editor" rows="10" cols="30"  name="description" value="<?php echo set_value('description'); ?>"><?php echo $single_room["description"]; ?></textarea>
                                  <?php echo form_error('description'); ?></div></div>
                               </br>
                               </br>
                               </br>
                               </br>
                               </br>
                                    <div class="col-sm-6"><div class="form-group">
                                        <label>Status</label></br>
                                         <?php if($single_room["status"] == 1){
                                          echo "<td><span>  
                                         <input type='radio' name='status' value='1' checked='checked>
                                         <label value='1'>&nbsp;&nbsp;Publish</label>   
                                         </span></td></br><td><span>  
                                         <input type='radio' name='status' value='0' >
                                         <label value='0'>&nbsp;&nbsp;Draft</label>   
                                         </span></td><?php echo form_error('status'); ?></div></div>"; ?>
                                        <?php 
                                        } 
                                        elseif($single_room["status"] == 0)
                                          {
                                          echo "<td><span>  
                                         <input type='radio' name='status' value='1' >
                                         <label value='1'>&nbsp;&nbsp;Publish</label>   
                                         </span></td></br><td><span>  
                                         <input type='radio' name='status' value='0' checked='checked >
                                         <label value='0'>&nbsp;&nbsp;Draft</label>   
                                        </span></td><?php echo form_error('status'); ?></div></div>"; 
                                          }
                                          ?>
                                         
                                        
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Save
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset Form
                                </button>
                            </div>
                        </div>
                         </form>

<br><br><br><br><br><br><br><br>
                     </div>
<script>
  initSample();
</script>  
    
</body>
</html>                               