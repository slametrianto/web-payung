<!DOCTYPE html>
<html>

<form action="<?php echo base_url(); ?>backend/faq/cek" method="post">

      <?php echo $this->session->flashdata('message'); ?>
         <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary" id="demo">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Frequently Asked Question</h3>
                                <div class="panel-toolbar text-right">
                                   
                                </div>
                            </div>
                                <div class="panel-toolbar text-right">
                                    <div class="btn-group">
                                    </div>
                            </div>
                           <script>
                                  jQuery(function ($) {
                           
                                      var $checks = $('input[name="selected[]"]');
                                      $("#selected").click(function () {
                                          if ($checks.filter(':checked').length == 0) {
                                              alert('DATA BELUM DIPILIH !');
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
                        <th class="th-sortable" data-toggle="class" style="width:10%">No
                          <span class="th-sort">
                          </span>
                        </th>
                          <th class="th-sortable" data-toggle="class"  style="width:5%">Pengirim<span class="th-sort">
                          </span></th>
                          <th class="th-sortable" data-toggle="class"  style="width:5%">Email<span class="th-sort">
                          </span></th>
                          </span></th>
                           <th class="th-sortable" data-toggle="class"  style="width:5%">No.HP<span class="th-sort">
                          </span></th>
                         <th class="th-sortable" data-toggle="class"  style="width:30%">Pesan<span class="th-sort">
                          </span></th>
                         <th class="th-sortable" data-toggle="class"  style="width:5%">Status<span class="th-sort">
                          </span></th>
                         <th class="th-sortable" data-toggle="class"  style="width:10%">Tanggal Pesan<span class="th-sort">
                          </span></th>
                          <th class="th-sortable" data-toggle="class"  style="width:5%">Website<span class="th-sort">
                          </span></th>
                         <th class="th-sortable" data-toggle="class"  style="width:15%"><center>Action</center><span class="th-sort">
                          </span></th>
                         
                        </tr>
                    </thead>
                      <tbody>
                         <?php
                          $selected=1;
                                             
                    if(empty($faq))
                     {
                     echo " <div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <i class='fa fa-ban-circle'></i><strong><p align='center'>Xory gan ,datanya belum ane input :P</p></strong> 
                                      </div>"; }else
                     {

                         for ($i = 0; $i < count($faq); ++$i) {
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
                   <th  style="width:10%"><?php echo ($page+$i+1); ?></th>
                       <th  style="width:5%"><?php echo $faq[$i]["nama"]; ?></th>
                       <th  style="width:5%"><?php echo $faq[$i]["email"]; ?></th>
                       <th  style="width:5%"><?php echo $faq[$i]["no_hp"]; ?></th>
                       <th  style="width:30%"><?php echo word_limiter($faq[$i]["description"], 10); ?></th>                    
                       <th  style="width:10%"><?php if($faq[$i]["status"]==0){
                        echo "DRAFT";
                      }else{
                        echo "PUBLISH";
                       } ?></th>
                       <th  style="width:5%"><?php echo $faq[$i]["date_post"]; ?></th>
                        <th  style="width:5%"><?php echo $faq[$i]["website"]; ?></th>
                       <th  style="width:15%"> <center> 
                      <a type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete Data?" href="<?php echo base_url('backend/faq/delete');?>/<?php echo $faq[$i]["id_faq"] ?>"onClick="return confirm('Anda Yakin Akan Menghapus Data Ini?');">Hapus</a></center></th>
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