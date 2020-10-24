
<!DOCTYPE html>
<html lang="en">
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/artikel/ckeditor/ckeditor.js"></script>
  <script src="<?php echo base_url(); ?>assets/artikel/ckeditor/samples/js/sample.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/artikel/ckeditor/samples/css/samples.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/artikel/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
    <script type='text/javascript' src="<?php echo base_url(); ?>assets/artikel/js/plugins/select/select2.min.js"></script>
    <form action="<?php echo base_url(); ?>backend/slide/cek" method="post">

      <?php echo $this->session->flashdata('message'); ?>
                    <div class="col-md-12">
                        <div class="panel panel-primary" id="demo">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> SLIDE</h3>
                                <div class="panel-toolbar text-right">
                                   
                                </div>
                            </div>
                                <div class="panel-toolbar text-right">
                                    <div class="btn-group">
                                   <a type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="left" title="Add data?" href="<?php echo base_url('backend/slide');?>"><i class="icon ico-pencil"></i> Add Data ?</a>
                                </div>
                            </div>
                            <div class="table-responsive panel-collapse pull out">
                               <div class="col-md-4">
                                  <select class="form-control mt4" name="action">
                                     <option value="delete">MULTIPLE DELETE</option>
                                        </select></div>
                                    <input type="submit" id="selected" name="selected" class="btn btn-s-md btn-info" formaction="<?php echo base_url(); ?>backend/slide/delete_multiple" value="ACTION"><p align="right"></p>
                           <script>
                                  jQuery(function ($) {
                           
                                      var $checks = $('input[name="selected[]"]');
                                      $("#selected").click(function () {
                                          if ($checks.filter(':checked').length == 0) {
                                              alertify.alert('DATA BELUM DIPILIH !');
                                              return false;
                                          }  else {
                                              return confirm('APAKAH DATA YANG DI CONTRENG SUDAH BENAR ???');
                                          }
                                      });
                                  }); 
                            </script>
                  <table class="table table-striped table-bordered table-hover" id="row-detail">
                    <thead>
                      <tr>
                        <th style="width:20px;"></th>
                        <th class="th-sortable" data-toggle="class" style="width:10%">No
                          <span class="th-sort">
                          </span>
                        </th>
                          <th class="th-sortable" data-toggle="class"  style="width:30%">Title<span class="th-sort">
                          </span></th>
                          <th class="th-sortable" data-toggle="class"  style="width:30%">Sub Title<span class="th-sort">
                          </span></th>
                          <th class="th-sortable" data-toggle="class"  style="width:30%">Slug Slide<span class="th-sort">
                          </span></th>
                          <th class="th-sortable" data-toggle="class"  style="width:30%">Counter<span class="th-sort">
                          </span></th>
                          <th class="th-sortable" data-toggle="class"  style="width:5%">Language<span class="th-sort">
                          </span></th>
                          <th class="th-sortable" data-toggle="class"  style="width:30%">Description<span class="th-sort">
                          </span></th>
                           <th class="th-sortable" data-toggle="class"  style="width:30%">Status<span class="th-sort">
                          </span></th>
                        <th class="th-sortable" data-toggle="class"  style="width:30%">Picture<span class="th-sort">
                          </span></th>
                        <th  style="width:35%">Action</th>
                      </tr>
                    </thead>
                      <tbody>
                         <?php
                          $selected=1;
                                             
                    if(empty($slide))
                     {
                     echo " <div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <i class='fa fa-ban-circle'></i><strong><p align='center'>Xory gan ,datanya belum ane input :P</p></strong> 
                                      </div>"; }else
                     {

                         for ($i = 0; $i < count($slide); ++$i) {
                          ?>
                            <?php
                        if(isset($_POST['submit']))
                          {
                          if(!empty($_POST['selected'])) 
                            {  
                               $checked_count = count($_POST['selected']);
                                  foreach($_POST['selected'] as $selected) 
                                    {
                                    echo ""; 
                                   }
                                  echo " </br>";  }
                                  else
                                    {
                                   echo " <script>
                                       alert('CHECKBOX BELUM DICENTANG!');
                                     window.location = window.location.pathname;
                                </script>"; 
                               }
                            }
                       ?>
                     <tr>
                  <th>
               <input type="checkbox" name="selected[]" id="selected-<?php echo $selected; ?>" class="selected" value="<?php echo $slide[$i]["id"]; ?>" data-toggle="checkall" data-target="#table1">  
                   <th  style="width:10%"><?php echo ($page+$i+1); ?></th>
                       <th  style="width:30%"><?php echo word_limiter($slide[$i]["title"],5); ?></th>
                       <th  style="width:30%"><?php echo word_limiter($slide[$i]["sub_title"],5); ?></th>
                       <th  style="width:30%"><?php echo word_limiter($slide[$i]["slug_slider"],5); ?></th>
                       <th  style="width:30%"><?php echo word_limiter($slide[$i]["counter"],5); ?></th>
                        <th  style="width:5%"><?php if($slide[$i]["lang"]=="EN"){
                            echo "<p class='btn-success'>INGGRIS</p>";
                            }
                            else{
                              echo "<p class='btn-info'>INDONESIA</p>";
                            } ?></th>
                       <th  style="width:30%"><?php echo word_limiter($slide[$i]["description"], 10); ?></th>
                       <th  style="width:5%"><?php
                          if ($slide[$i]["status"]  == 1) 
                          {
                              echo '<strong>Publish</strong>';
                          } 
                          elseif ($slide[$i]["status"] == 0) 
                          {
                              echo '<u>Draft</u>';
                          }
                          ?></th>
                          <th  style="width:30%">
                            <?php $path = $slide[$i]["foto"];
                            if(substr(strrchr($path, "."), 1) == 'mp4'){
                             ?>
                             <video width="150px" height="150px" class="video-fluid" controls>
                          <source src="<?php echo base_url(); ?>assets/foto/<?php echo $slide['foto']; ?>" type="video/mp4">
                        </video>
                          <?php }else{ ?>
                            <img src="<?php echo base_url();?>assets/foto/<?php echo $slide[$i]["foto"];?>" width="150px" height="150px" onError="this.onerror=null;this.src='<?php echo base_url();?>assets/foto/foto.jpg';" width="150px" height="150px" />
                            <?php } ?> </th>
                       <th  style="width:30%">   <a type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="left" title="Update data?" href="<?php echo base_url('backend/slide/edit_slide');?>/<?php echo $slide[$i]["id"] ?>"><font color="white">Ubah</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="right" title="Delete Data?" href="<?php echo base_url('backend/slide/delete');?>/<?php echo $slide[$i]["id"] ?>"onClick="return confirm('Anda Yakin Akan Menghapus Data Ini?');">Hapus</a></th>
                   </tr> 
                   <?php
                    $selected++;
                       $selected = $selected++;
                       }
                    ?> 
                </tbody>
            </table>
      <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-2">   
                  <span class="radio custom-radio custom-radio-primary">  
                      <input type='radio' id='customradio1' name="customradio1" onClick='for (i=1;i<<?php echo $selected; ?>;i++){document.getElementById("selected-"+i).checked=true;}'>
                          <label for="customradio1">&nbsp;&nbsp;Select All</label></span></div>
                               <div class="col-sm-2"><span class="radio custom-radio custom-radio-primary">  
                                    <input type='radio' id='nopilih' name="customradio1" onClick='for (i=1;i<<?php echo $selected; ?>;i++){document.getElementById("selected-"+i).checked=false;}'>
                                        <label for="nopilih">&nbsp;&nbsp;Cancel</label></span></div>
                                           <div class="col-sm-4 text-right text-center-xs">                
                                              <ul class="pagination pagination-sm m-t-none m-b-none">
                                        <?php echo $pagination; ?>
                                       </ul>
                                      </div>
                                  </div>
                               <?php 
                              }
                          ?>  
                   </footer>
                      </div>
                 </div>
            </form>  
            </div> </div>
                       