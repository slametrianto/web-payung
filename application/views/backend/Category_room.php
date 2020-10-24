  <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>FORM</strong> <small> <?php echo $title; ?></small>
                            </div>
                            <div class="card-body card-block">
                              <form class="form-horizontal" action="<?php echo base_url(); ?>backend/category_room/proses" method="post" enctype="multipart/form-data" data-validate="parsley">
                                   
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category Room</label></div>
                                        <div class="col-12 col-md-3"><input type="text" class="form-control" data-required="true" name="category" value="<?php echo set_value('category'); ?>" placeholder="Category Room">                        
                                <small class="form-text text-muted"><?php echo form_error('category'); ?></small></div>
                                    </div>
                                  <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Language  </label></div>
                                        <div class="col-12 col-md-3">
                                            <select name="bahasa" id="select" class="form-control" value="<?php echo set_value('bahasa'); ?>">
                                    <option value="">==Select==</option>
                                    <option value="ENG">INGGRIS</option>
                                    <option value="IDN">INDONESIA</option>
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

<br><br><br><br><br><br><br><br>
                     </div>