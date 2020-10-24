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

                              <form action="<?php echo base_url(); ?>backend/article/proses" method="post" enctype="multipart/form-data" class="form-horizontal bucket-form" data-validate="parsley">

                            <div class="panel-toolbar text-left"></div>
                                  <div class="btn-group"></div>
                                       <div class="col-sm-3">
                                       <div class="form-group ">
                                      <label>Category</label>
                                  <select name="id_category_article" class="form-control">
                                   <?php foreach($list_category as $list_category){ ?>
                                    <option value="<?php echo $list_category["id_category_article"]; ?>">
                                      <?php echo $list_category["category_article"]; ?></option><?php } ?></select><?php echo form_error('id_category_article'); ?></div></div>
                                     
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
                                   
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                      <label>Description</label>
                <textarea id="editor" rows="100" cols="100" name="description" value="<?php echo set_value('description'); ?>"></textarea>
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
                                <input type="text" value="<?php echo set_value('tag'); ?>" name="tag" data-role="tagsinput" id="tag" class="form-control">
                         
                                  </br><code><font color="black">Enter some words ,one or more with comma (,) separator for advanced seo.</font></code>
                                </br><!-- <ul>To remove tags ,press (x) , see on this screenshoot. <img src="<?php echo base_url(); ?>assets/images/tags.png" width="400" height="50"></ul></br> -->
                                <hr>
                                <code><font color="black">Slug / url will generated automatically.</font></code>
                                <hr>

                                        <small class="help-block form-text"><?php echo form_error('tag'); ?></small>
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
                      </div>
                    </div>
<script>
  initSample();
</script>  