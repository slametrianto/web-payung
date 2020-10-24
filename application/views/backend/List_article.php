<!DOCTYPE html>
<html>
            <form action="<?php echo base_url(); ?>backend/article/cek" method="post">
             <?php echo $this->session->flashdata('message'); ?>
                      <div class="nest" id="demo">
                            <div class="title-alt">
                                <h6>
                                     ARTICLE</h6>
                                <div class="titleClose">
                                    <a class="gone" href="#demo">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                                <div class="titleToggle">
                                    <a class="nav-toggle-alt" href="#tableStatic">
                                        <span class="entypo-up-open"></span>
                                    </a>
                                </div>
                            </div>
                                <div class="panel-toolbar text-right" id="demo">
                                    <div class="btn-group">
                                   <a type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Add data?" href="<?php echo base_url('backend/article');?>"><i class="icon ico-pencil"></i> Add Data ?</a>
                                </div>
                            </div>
                            <div class="table-responsive panel-collapse pull out">
                               <div class="col-md-3">
                                  <select class="form-control mt4" name="action">
                                     <option value="delete">MULTIPLE DELETE</option>
                                        </select></div>
                                    <input type="submit" id="selected" name="selected" class="btn btn-s-md btn-info" formaction="<?php echo base_url(); ?>backend/article/delete_multiple" value="Proses ?" ><p align="right"></p>
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
                                             
                    if(empty($article))
                     {
                     echo " <div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <i class='fa fa-ban-circle'></i><strong><p align='center'>Xory gan ,datanya belum ane input :P</p></strong> 
                                      </div>"; }else
                     {

                         for ($i = 0; $i < count($article); ++$i) {
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
               <input type="checkbox" name="selected[]" id="selected-<?php echo $selected; ?>" class="selected" value="<?php echo $article[$i]["id_article"]; ?>" data-toggle="checkall" data-target="#table1">  
                   <th  style="width:5%"><?php echo ($page+$i+1); ?></th>
                       <th  style="width:5%"><?php echo $article[$i]["title"]; ?></th>
                         <th  style="width:5%"><?php echo $article[$i]["date_post"]; ?></th>
                          <th  style="width:5%"><?php if($article[$i]["lang"]=="EN"){
                            echo "<p class='btn-success'>INGGRIS</p>";
                            }
                            else{
                              echo "<p class='btn-info'>INDONESIA</p>";
                            } ?></th>
                          <th  style="width:5%"><?php
                          if ($article[$i]["status"]  == 1) 
                          {
                              echo '<strong>Publish</strong>';
                          } 
                          elseif ($article[$i]["status"] == 0) 
                          {
                              echo '<u>Draft</u>';
                          }
                          ?></th>
                          <th  style="width:10%"><?php
                          echo $article[$i]["author"]
                          ?>
                        </th>
                          <th  style="width:10%"><?php echo word_limiter($article[$i]["description"],5); ?></th>
                          <th  style="width:10%"><center><img src="<?php echo base_url();?>assets/foto/<?php echo $article[$i]["foto"];?>" width="60" height="60" onError="this.onerror=null;this.src='<?php echo base_url();?>assets/foto/foto.png';" width="60" height="60" /></center></th>
                        <th  style="width:10%">   <center><a type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="left" title="Update data?" href="<?php echo base_url('backend/article/edit_article');?>/<?php echo $article[$i]["id_article"] ?>"><font color="white">UBAH</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Data?" href="<?php echo base_url('backend/article/delete');?>/<?php echo $article[$i]["id_article"] ?>"onClick="return confirm('Anda Yakin Akan Menghapus Data Ini?');">HAPUS</a></center></th>
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
