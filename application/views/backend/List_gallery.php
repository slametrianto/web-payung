<!DOCTYPE html>
<html>
<head><script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
</head>
 <form action="<?php echo base_url(); ?>backend/gallery/cek" method="post">
             <?php echo $this->session->flashdata('message'); ?>
                    <div class="col-md-12">
                        <div class="panel panel-info" id="demo">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-users"></i></span> Gallery</h3>
                                <div class="panel-toolbar text-right">
                                </div>
                            </div>
                                <div class="panel-toolbar text-right">
                                    <div class="btn-group">
                                   <a type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Add data?" href="<?php echo base_url('backend/gallery');?>"><i class="icon ico-pencil"></i> Add Data ?</a>
                                </div>
                            </div>
                            <div class="table-responsive panel-collapse pull out">
                               <div class="col-md-3">
                                  <select class="form-control mt4" name="action">
                                     <option value="delete">MULTIPLE DELETE</option>
                                        </select></div>
                                    <input type="submit" id="selected" name="selected" class="btn btn-s-md btn-info" formaction="<?php echo base_url(); ?>backend/gallery/delete_multiple" value="Proses ?" ><p align="right"></p>
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
                        <th class="th-sortable" data-toggle="class" style="width:5%">No.
                          <span class="th-sort">
                          </span>
                        </th>
                        <th class="th-sortable" data-toggle="class"  style="width:5%">Title<span class="th-sort">
                          </span></th>
                        <th class="th-sortable" data-toggle="class"  style="width:5%">Date Post<span class="th-sort">
                          </span></th>
                          <th class="th-sortable" data-toggle="class"  style="width:5%">Language<span class="th-sort">
                          </span></th>  
                           <th class="th-sortable" data-toggle="class"  style="width:5%">Client Name<span class="th-sort">
                          </span></th>
                           <th class="th-sortable" data-toggle="class"  style="width:5%">Client Foto<span class="th-sort">
                          </span></th>
                           <th class="th-sortable" data-toggle="class"  style="width:5%">Status<span class="th-sort">
                          </span></th>
                           <th class="th-sortable" data-toggle="class"  style="width:10%">Author<span class="th-sort">
                          </span></th></th>
                           <th class="th-sortable" data-toggle="class"  style="width:10%">Description<span class="th-sort">
                          </span></th>
                           <th class="th-sortable" data-toggle="class"  style="width:10%"><center>Picture</center><span class="th-sort">
                          </span></th>
                          
                        <th  style="width:15%"><center>Action</center></th>
                      </tr>
                    </thead>
                      <tbody>
                         <?php
                          $selected=1;
                                             
                    if(empty($gallery))
                     {
                     echo " <div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <i class='fa fa-ban-circle'></i><strong><p align='center'>Xory gan ,datanya belum ane input :P</p></strong> 
                                      </div>"; }else
                     {

                         for ($i = 0; $i < count($gallery); ++$i) {
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
                  <th style="width:5%">
               <input type="checkbox" name="selected[]" id="selected-<?php echo $selected; ?>" class="selected" value="<?php echo $gallery[$i]["id_gallery"]; ?>" data-toggle="checkall" data-target="#table1">  
                   <th  style="width:5%"><?php echo ($page+$i+1); ?></th>
                       <th  style="width:5%"><?php echo $gallery[$i]["title"]; ?></th>
                         <th  style="width:5%"><?php echo $gallery[$i]["date_post"]; ?></th>
                          <th  style="width:5%"><?php if($gallery[$i]["lang"]=="EN"){
                            echo "<p class='btn-success'>INGGRIS</p>";
                            }
                            else{
                              echo "<p class='btn-info'>INDONESIA</p>";
                            } ?></th>
                            <th  style="width:5%"><?php echo $gallery[$i]["client_name"]; ?></th>
                            <th  style="width:5%"> <img src="<?php echo base_url();?>assets/foto/<?php echo $gallery[$i]["client_foto"];?>" width="60" height="60" onError="this.onerror=null;this.src='<?php echo base_url();?>assets/foto/foto.jpg';" width="60" height="60" /></th>
                          <th  style="width:5%"><?php
                          if ($gallery[$i]["status"]  == 1) 
                          {
                              echo '<strong>Publish</strong>';
                          } 
                          elseif ($gallery[$i]["status"] == 0) 
                          {
                              echo '<u>Draft</u>';
                          }
                          ?></th>
                          <th  style="width:10%"><?php
                          echo $gallery[$i]["author"]
                          ?>
                        </th>
                          <th  style="width:10%"><?php echo word_limiter($gallery[$i]["description"],5); ?></th>
                          <th  style="width:10%"><center>
                            <img src="<?php echo base_url();?>assets/foto/<?php echo $gallery[$i]["foto"];?>" width="60" height="60" onError="this.onerror=null;this.src='<?php echo base_url();?>assets/foto/foto.jpg';" width="60" height="60" />
                          </center></th>



                        <th  style="width:10%">   <center><a type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="left" title="Update data?" href="<?php echo base_url('backend/gallery/edit_gallery');?>/<?php echo $gallery[$i]["id_gallery"] ?>"><font color="white">UBAH</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Data?" href="<?php echo base_url('backend/gallery/delete');?>/<?php echo $gallery[$i]["id_gallery"] ?>"onClick="return confirm('Anda Yakin Akan Menghapus Data Ini?');">HAPUS</a></center></th>
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
                         </div>
<br><br><br><br><br><br><br><br>
                     </div>