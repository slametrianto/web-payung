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
      <form data-validate="parsley" action="<?php echo base_url(); ?>backend/sub_page/proses" method="post" enctype="multipart/form-data">
              <div class="col-md-12">
                  <div class="panel panel-primary" id="demo">
                      <div class="panel-heading">
                          <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Menu Description</h3>
                              <div class="panel-toolbar text-right">
                                </div>
                            </div>
                            <div class="panel-toolbar text-left"></div>
                                  <div class="btn-group"></div>
                                       <div class="col-sm-3">
                                       <div class="form-group ">
                                      <label>Menu</label>
                                  <select name="id_page" class="form-control">
                                   <?php foreach($list_page as $list_page){ ?>
                                    <option value="<?php echo $list_page["id_page"]; ?>">
                                      <?php echo $list_page["page"]; ?></option><?php } ?></select><?php echo form_error('id_page'); ?></div></div>
                                     
                                <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>Title</label>
                                  <input type="text" class="form-control" data-required="true" name="title" placeholder="Title" value="<?php echo set_value('title'); ?>"/>
                                <?php echo form_error('title'); ?>
                              </div></div>
                                <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>Author</label>
                                        <input type="text" class="form-control" data-required="true" name="author" value="<?php echo $pengguna->name; ?>">                        
                                <?php echo form_error('author'); ?>
                              </div></div>
                                
                                <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>Foto</label>
                                        <input type="file" class="form-control" data-required="true" name="foto" value="<?php echo set_value('foto'); ?>">                        
                               </div></div>

                                <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>Language</label>
                                         <select name="lang" id="select" class="form-control" value="<?php echo set_value('lang'); ?>">
                                        <option value="">==Select==</option>
                                        <option value="EN">INGGRIS</option>
                                        <option value="ID">INDONESIA</option>
                                   </select>                      
                                   </div><small class="help-block form-text"><?php echo form_error('lang'); ?></small>
                                 </div>
                                   
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                      <label>Description</label>
                <textarea id="editor" rows="10" cols="30"  name="description" value="<?php echo set_value('description'); ?>"></textarea>
                <?php echo form_error('description'); ?></div></div>
                <script type="text/javascript">
                 $(document).ready(function() {
                    $('#div1').find("input").val('test hello');
                  });</script>  <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Status</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="radio">
                                                    <label for="radio1" class="form-check-label ">
                                                        <input type="radio" id="radio1" name="status" value="1" class="form-check-input">Publish
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="radio2" class="form-check-label ">
                                                        <input type="radio" id="radio2" name="status" value="0" class="form-check-input">Draft
                                                    </label>
                                                 <small class="help-block form-text"><?php echo form_error('status'); ?></small></div>
                                            </div>
                                        </div>
                                    </div>
                        </div> </div>
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
<script>
  initSample();
</script>  
    
</body>
</html>                             