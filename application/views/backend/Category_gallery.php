
                       
                        <div class="nest" id="elementClose">
                            <div class="title-alt">
                                <h6>
                                   <strong>FORM</strong> <small> <?php echo $title; ?></small></h6>
                                <div class="titleClose">
                                    <a class="gone" href="#elementClose">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                                <div class="titleToggle">
                                    <a class="nav-toggle-alt" href="#elementClose">
                                        <span class="entypo-up-open"></span>
                                    </a>
                                </div>

                            </div>

                              <form action="<?php echo base_url(); ?>backend/category_gallery/proses" method="post" enctype="multipart/form-data" class="form-horizontal bucket-form" data-validate="parsley">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category Gallery</label></div>
                                        <div class="col-12 col-md-3"><input type="text" class="form-control" data-required="true" name="category" value="<?php echo set_value('category'); ?>" placeholder="Category Gallery">                        
                                <small class="form-text text-muted"><?php echo form_error('category'); ?></small></div>
                                    </div>
                                  <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Language  </label></div>
                                        <div class="col-12 col-md-3">
                                            <select name="lang" id="select" class="form-control" value="<?php echo set_value('lang'); ?>">
                                    <option value="">==Select==</option>
                                    <option value="EN">INGGRIS</option>
                                    <option value="ID">INDONESIA</option>
                               </select>
                                        <small class="help-block form-text"><?php echo form_error('lang'); ?></small></div>
                                      </div>
                                        </div>
                                   <br><br><br>
                            <div class="panel-toolbar text-center">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Save
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset Form
                                </button>
                                <br><br><br><br><br><br>
                            </div>
                        </div>
                         </form>
                      </div>
                    </div>