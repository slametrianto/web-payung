<!DOCTYPE html>
<html lang="en">
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/artikel/ckeditor/ckeditor.js"></script>
  <script src="<?php echo base_url(); ?>assets/artikel/ckeditor/samples/js/sample.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/artikel/ckeditor/samples/css/samples.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/artikel/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">

    <script type='text/javascript' src="<?php echo base_url(); ?>assets/artikel/js/plugins/select/select2.min.js"></script>
<style type="text/css">
.bootstrap-tagsinput {
  background-color: #eee;
  border: 1px solid #000;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  display: inline-block;
  padding: 4px 6px;
  color: #f00;
  vertical-align: middle;
  border-radius: 4px;
  max-width: 100%;
  line-height: 22px;
  cursor: text;
}
.bootstrap-tagsinput input {
  border: none;
  box-shadow: none;
  color: brown;
  outline: none;
  background-color: white;
  padding: 0 6px;
  margin: 0;
  width: auto;
  max-width: inherit;
}
.bootstrap-tagsinput.form-control input::-moz-placeholder {
  color: #777;
  opacity: 1;
}
.bootstrap-tagsinput.form-control input:-ms-input-placeholder {
  color: #777;
}
.bootstrap-tagsinput.form-control input::-webkit-input-placeholder {
  color: #777;
}
.bootstrap-tagsinput input:focus {
  border: none;
  box-shadow: none;
}
.bootstrap-tagsinput .tag {
  margin-right: 2px;
  color: black;
}
.bootstrap-tagsinput .tag [data-role="remove"] {
  margin-left: 8px;
  cursor: pointer;
}
.bootstrap-tagsinput .tag [data-role="remove"]:after {
  content: "x";
  padding: 0px 2px;
}
.bootstrap-tagsinput .tag [data-role="remove"]:hover {
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
}
.bootstrap-tagsinput .tag [data-role="remove"]:hover:active {
  box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
}
</style>
</head>
<body> 
 
      <form data-validate="parsley" action="<?php echo base_url(); ?>backend/gallery/proses" method="post" enctype="multipart/form-data">
              <div class="col-md-12">
                  <div class="panel panel-primary" id="demo">
                      <div class="panel-heading">
                          <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Gallery</h3>
                              <div class="panel-toolbar text-right">
                                </div>
                            </div>
                            <div class="panel-toolbar text-left"></div>
                                  <div class="btn-group"></div>
                                       <div class="col-sm-3">
                                       <div class="form-group ">
                                      <label>Category</label>
                                  <select name="id_category" class="form-control">
                                   <?php foreach($list_category_gallery as $list_category_gallery){ ?>
                                    <option value="<?php echo $list_category_gallery["id_category"]; ?>">
                                      <?php echo $list_category_gallery["category"]; ?></option><?php } ?></select><?php echo form_error('id_category'); ?></div></div>
                                     
                                <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>Title</label>
                                  <input type="text" class="form-control" data-required="true" name="title" placeholder="Title" value="<?php echo set_value('title'); ?>"/>
                                <?php echo form_error('title'); ?>
                              </div></div>
                              <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>Client Name</label>
                                  <input type="text" class="form-control" data-required="true" name="client_name" placeholder="Client Name" value="<?php echo set_value('client_name'); ?>"/>
                                <?php echo form_error('client_name'); ?>
                              </div></div>
                               <div class="col-sm-6">
                                       <div class="form-group">
                                      <label>Client Foto</label>
                                        <input type="file" class="form-control" data-required="true" name="client_foto" value="<?php echo set_value('client_foto'); ?>">                        
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
                                   
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                      <label>Description</label>
                <textarea id="editor" rows="10" cols="30"  name="description" value="<?php echo set_value('description'); ?>"></textarea>
                <?php echo form_error('description'); ?></div></div>
                <script type="text/javascript">
                 $(document).ready(function() {
                    $('#div1').find("input").val('test hello');
                  });</script>  

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
                         
                          <div class="row form-group">
                                        <div class="col col-md-3">
                                          <label for="select" class=" form-control-label">Tags </label></div>
                                        <div class="col-12 col-md-6">
                                <input type="text" value="<?php echo set_value('tags'); ?>" name="tags" data-role="tagsinput" id="tags" class="form-control">
                         
                                  </br><code><font color="black">Enter some words ,one or more with comma (,) separator for advanced seo.</font></code></br>
                                <code><font color="black">Slug / url will generated automatically.</font></code>
                                <hr>
                                        <small class="help-block form-text"><?php echo form_error('tags'); ?></small>
                                      </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                          <label class=" form-control-label">Status</label></div>
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

                     </div>
<script>
  initSample();
</script>  
    
</body>
</html>                              