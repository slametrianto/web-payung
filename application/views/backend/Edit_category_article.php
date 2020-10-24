
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
          <form action="<?php echo site_url('backend/category_article/update_category');?>" method="post" accept-charset="utf-8" role="form" class="form-horizontal bucket-form" enctype="multipart/form-data">
            <?php foreach ($single_category as $single_category){ ?>
                                     <div class="form-group">
                                            <label class="col-sm-3 control-label">Category</label>
                                            <div class="col-sm-6">
                                              <input type="hidden" name="id_category_article" value="<?php echo $single_category->id_category_article; ?>">
                                                <input type="text" class="form-control" data-required="true" name="category_article" value="<?php echo $single_category->category_article; ?>" placeholder="Category">
                                          <small class="form-text text-muted"><?php echo form_error('category_article'); ?></small></div>
                                              </div>
                                               <div class="form-group">
                                            <label class="col-sm-3 control-label">Language</label>
                                            <div class="col-sm-3">
                                               <select name="lang" id="select" class="form-control" value="<?php echo $single_category->lang; ?>">
                                              <?php if($single_category->lang =="EN"){ 
                                                ?>
                                    <option value="EN">INGGRIS</option>
                                    <option value="ID">INDONESIA</option>
                                    <?php }else{ ?>
                                      <option value="ID">INDONESIA</option>
                                    <option value="EN">INGGRIS</option>
                                    <?php } ?>
                                  </select>
                                        <small class="help-block form-text"><?php echo form_error('lang'); ?></small>
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
                      <?php } ?>  
                      </div>
                    </div>

               