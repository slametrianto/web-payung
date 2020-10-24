  <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>FORM</strong> <small> <?php echo $title; ?></small>
                            </div>
                            <div class="card-body card-block">
                               <?php foreach ($single_user as $user) ?>
          <form action="<?php echo site_url('backend/webmaster/update_user');?>/<?php echo $user->id_administrator; ?>" method="post" accept-charset="utf-8" role="form" enctype="multipart/form-data">
            <?php foreach ($single_user as $user): ?>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Username</label></div>
                                        <div class="col-12 col-md-9"><input type="text" class="form-control" data-required="true" name="username" value="<?php echo $user->username; ?>" placeholder="Username">                        
                                <small class="form-text text-muted"><?php echo form_error('username'); ?></small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password</label></div>
                                        <div class="col-12 col-md-9"><input type="text" class="form-control" data-required="true" name="password" value="<?php echo $user->password; ?>" placeholder="Password"><small class="help-block form-text"><?php echo form_error('password'); ?></small></div>
                                    </div>
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                                        <div class="col-12 col-md-9"><input type="text" class="form-control" data-required="true" name="name" value="<?php echo $user->name; ?>" placeholder="Name"><small class="help-block form-text"><?php echo form_error('name'); ?></small></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Level </label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="level_login" id="select" class="form-control" value="<?php echo set_value('level_login'); ?>">
                                            <?php if($user->level_login == 1){
                                              echo '<option value="1">ADMINISTRATOR</option>';
                                            }
                                            ?>
                                     </select>
                                        <small class="help-block form-text"><?php echo form_error('level_login'); ?></small></div>
                                    </div>
                                   
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Status</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="radio">

                                                  <?php if($user->status == 1){
                                                    echo'
                                                    <label for="radio1" class="form-check-label ">
                                                        <input type="radio" id="radio1" name="status" value="1" checked="checked" class="form-check-input">Aktif
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="radio2" class="form-check-label ">
                                                        <input type="radio" id="radio2" name="status" value="0" class="form-check-input">Tidak Aktif
                                                    </label>';
                                                  }elseif($user->status == 2){
                                                    echo '<div class="radio">
                                                    <label for="radio2" class="form-check-label ">
                                                        <input type="radio" id="radio2" name="status" value="0" checked="checked" class="form-check-input">Tidak Aktif
                                                    </label>
                                                    <label for="radio1" class="form-check-label ">
                                                        <input type="radio" id="radio1" name="status" value="1" class="form-check-input">Aktif
                                                    </label>
                                                </div>';
                                                  }
                                                  ?>
                                                 <small class="help-block form-text"><?php echo form_error('status'); ?></small></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Foto User</label></div>
                                        <div class="col-12 col-md-9">
                                          
                                          <label>Foto</label>
                                          <input type="file" class="form-control" data-required="true" name="foto" value="<?php echo set_value('foto'); ?>">                        
                                         <?php if($user->foto != null){
                                          echo $user->foto;
                                          echo "&nbsp;&nbsp;<img height='70' width='70' src='".base_url('assets/foto/'.$user->foto)."' > "; 
                                          ?><?php } elseif($user->foto == null){
                                          echo "Foto Belum Diupload";
                                          echo "&nbsp;&nbsp;<img height='70' width='70' src='".base_url('assets/foto/foto.jpg')."' > "; 
                                             } ?></div>
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
<?php endforeach; ?>
<br><br><br><br><br><br><br><br>
                     </div>