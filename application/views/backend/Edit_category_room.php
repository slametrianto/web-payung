  <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>FORM</strong> <small> <?php echo $title; ?></small>
                            </div>
                            <div class="card-body card-block">
          <form action="<?php echo site_url('backend/category_room/update_category_room');?>" method="post" accept-charset="utf-8" role="form" enctype="multipart/form-data">
            <?php foreach ($single_category_room as $single_category_room){ ?>
                                    <div class="row form-group">
                                      <input type="hidden" name="id_category" value="<?php echo $single_category_room->id_category; ?>">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category</label></div>
                                        <div class="col-12 col-md-3"><input type="text" class="form-control" data-required="true" name="category" value="<?php echo $single_category_room->category; ?>" placeholder="Category">                        
                                <small class="form-text text-muted"><?php echo form_error('category'); ?></small></div>
                                    </div>
                                   <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Language  </label></div>
                                        <div class="col-12 col-md-3">
                                            <select name="bahasa" id="select" class="form-control" value="<?php echo $single_category_room->bahasa; ?>">
                                              <?php if($single_category_room->bahasa =="ENG"){ 
                                                ?>
                                    <option value="ENG">INGGRIS</option>
                                    <option value="IDN">INDONESIA</option>
                                    <?php }else{ ?>
                                      <option value="IDN">INDONESIA</option>
                                    <option value="ENG">INGGRIS</option>
                                    <?php } ?>
                               </select>
                                        <small class="help-block form-text"><?php echo form_error('bahasa'); ?></small></div>
                                    </div>
                            </div>
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
<?php } ?>
<br><br><br><br><br><br><br><br>
                     </div>