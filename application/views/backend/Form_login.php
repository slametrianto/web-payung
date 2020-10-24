<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/desain_backend/assets/js/jquery.min.js"></script>

   <!--  <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/desain_backend/assets/css/loader-style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/desain_backend/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/desain_backend/assets/css/signin.css">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/foto/icon.png">
  <style type="text/css">
    body {
      background:url('<?php echo base_url(); ?>assets/desain_backend/assets/img/bg8.jpg') no-repeat top center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
    }

</style>
  
<script language="JavaScript">
var text="Administrator Area, Please Login First !";
var delay=10;
var currentChar=1;
var destination="[none]";
function type()
{
//if (document.all)
{
var dest=document.getElementById(destination);
if (dest)// && dest.innerHTML)
{
dest.innerHTML=text.substr(0, currentChar)+"<blink></blink>";
currentChar++;
if (currentChar>text.length)
{
currentChar=1;
setTimeout("type()", 80000);
}
else
{
setTimeout("type()", delay);
}
}
}
}
function startTyping(textParam, delayParam, destinationParam)
{
text=textParam;
delay=delayParam;
currentChar=1;
destination=destinationParam;
type();
}
</script> 
<style>
          *{
            padding: 0;margin: 0;
             }
               a{
             text-decoration: none;
          color: #333;
        }
     
    iframe{
      }
        h1{
             }
                h2{
                 margin: 15px 0;
               line-height: 1em;
            font-size: 17px;
           }
         p{
      margin:10px 0;
    }
  #loading {
position: fixed;
  left: 0px;
    top: 0px;
      width: 100%;
        height: 100%;
z-index: 9999;
   background: url(<?php echo base_url('assets/foto/loading.gif'); ?>) 50% 50% no-repeat #fff;
    }
     }
</style> 


  <script src="<?php echo base_url(); ?>assets/material/login/alertify/lib/alertify.min.js"></script>
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/material/login/alertify/themes/alertify.core.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/material/login/alertify/themes/alertify.default.css" id="toggleCSS" />
   <script type="text/javascript">
        $(window).load(function() { $("#loading").fadeOut("slow"); })
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

 <style>
          .loadingmessage {
            visibility: hidden;
            background-color: rgba(255,255,255,0.7);
            position: absolute;
            z-index: +100 !important;
            width: 100%;
            height:100%;
          }

          .loadingmessage img {
            position: relative;
            top:50%;
            left:50%;
          }
          </style>

      <script type="text/javascript">
      $(document).ready(function(){
      $('#btnSubmit').click(function(){
         $('#loadingmessage').show();
          var username         = $('#username').val();
          var password         = $('#password').val();
         
         if(username=="" &&  password==""  ){ 
           reset();
            alertify.alert("INFORMASI TIDAK VALID");
             $('#loadingmessage').hide(); 
             alertify.error("Kami Menggunakan Cookies Pada Website Ini. </br> <font size='1'>Semua sumber dilindungi.</font>");
             return false;
          } else if(username== ""){ 
            reset();
            alertify.alert("USERNAME TIDAK VALID");
             $('#loadingmessage').hide(); 
             alertify.error("Silahkan hubungi administrator untuk mendaftarkan akun anda. </br> <font size='1'>USERNAME HARUS DI ISI.</font>");
             return false;
        } 
         else if(password== ""){ 
          reset();
            alertify.alert("PASSWORD TIDAK VALID");
             $('#loadingmessage').hide(); 
             alertify.error("Silahkan hubungi administrator untuk mendaftarkan akun anda. </br> <font size='1'>PASSWORD HARUS DI ISI.</font>");
             return false;
        } 
      });
      });
      </script>
      <script>
    function reset () {
      $("#toggleCSS").attr("href", "<?php echo base_url(); ?>assets/material/login/alertify/themes/alertify.default.css");
      alertify.set({
        labels : {
          ok     : "OK",
          cancel : "Cancel"
        },
        delay : 7000,
        buttonReverse : false,
        buttonFocus   : "ok"
      });
    }
  </script></head>

<body>
    <!-- Preloader -->
      <div id="loading"></div>
        <div id="status">&nbsp;</div>
    </div>
    <div class="container">



        <div class="" id="login-wrapper">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div id="logo-login">
                       <h1 color:="" ff0000="" font:=""  margin:="" style="background-color: transparent;  color: white; text-shadow: 1px 1px 2px black, 0 0 25px black, 0 0 10px white; font-family: Impact;">PT.Payung Anak Bangsa 
                            
                        </h1>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="account-box">

                        <form role="form"  action="" method="post" id="frmDaftar" enctype="multipart/form-data">
                            <div class="form-group">
                                <p class="pull-right label-forgot">
                                  <?php echo form_error('username');?></p>
                                <label for="inputUsernameEmail">Username</label>
                                <input type="text" id="username" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <p  class="pull-right label-forgot"><?php echo form_error('password');?></p>
                                <label for="inputPassword">Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6 row-block">
                                     <input type="checkbox"  id="customCheck"> Remember me</label>
                                </div>
                                <div class="col-md-6 row-block">
                                     <input type="checkbox" class="custom-control-input" id="customChecks" onclick="showpassword()"> Show Password</label>
                                </div>
                            </div>
                        <div class="or-box">
                            <center><span class="text-center login-with"> <button class="btn btn btn-primary "  id="btnSubmit" data-toggle="tooltip" data-placement="bottom" title="Sign In ?" >
                                <strong>Sign In</strong>
                            </button> </span></center>
                            <div class="row">
                                <?php echo $this->session->flashdata('message');?>
                            </div>
                            <div style="margin-top:25px" class="row">
                                <div id='loadingmessage' style='display:none' class="btn btn-default">
                            <center><font color="black" size="4">
                           <strong>Sedang memuat ,silahkan tunggu...  <img src='<?php echo base_url(); ?>assets/material/ajax.gif'/> </strong></font></center>
                          </div>
                            </div>
                        </div>
                        </form>
                            <div class="row">
                                <div class="col-md-12 row-block" id="logo-login">
                                  <center>
                      <font color="white" size="2"> <b>
                       <div 0px="" 12px="" arial="" color:="" ff0000="" font:="" id="textDestination" margin:="" style="background-color: transparent;  color: white; text-shadow: 1px 1px 2px black, 0 0 25px black, 0 0 10px black; font-family: Arial;"></div></b> 
                              <script language="JavaScript">
                              javascript:startTyping(text, 30, "textDestination");
                              </script></center></font></h3>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="text-align:center;margin:0 auto;">
            <h6 style="color:#fff;">Payung Anak Bangsa  © <strong> PAB <span>v1.0</span></strong> Development Team <u><?php echo date('Y'); ?></u> </h6>
        </div>

    </div>
    <!-- <div id="test1" class="gmap3"></div> -->

<script>
        function showpassword() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
      </script>
       <script>
     $("form#frmDaftar").submit(function(){
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '<?php echo base_url(); ?>backend/login/login_form',
        type: 'POST',
        data: formData,
        async: false,
        success: function (data) {
          $('#loadingmessage').hide(); 
           $('#loadingmessage').html(data);
          document.forms["loadingmessage"].reset();
            $("#btnSubmit").attr("enabled", "enabled");
          },
        cache: false,
        contentType: false,
        processData: false
    }
    );
      return false;
  });
</script>

    <!--  END OF PAPER WRAP -->




    <!-- MAIN EFFECT -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/desain_backend/assets/js/preloader.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/desain_backend/assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/desain_backend/assets/js/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/desain_backend/assets/js/load.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/desain_backend/assets/js/main.js"></script>

</body>

</html>
