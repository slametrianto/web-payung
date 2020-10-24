<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <!-- Favicon -->
     <link rel="icon" href="<?php echo base_url(); ?>assets/foto/icon.png">

    <!-- Google Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:100,300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/desain_frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/desain_frontend/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/desain_frontend/css/line-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/desain_frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/desain_frontend/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/desain_frontend/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/desain_frontend/css/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/desain_frontend/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/desain_frontend/css/jquery.filer.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/desain_frontend/css/jquery.filer-dragdropbox-theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/desain_frontend/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/desain_frontend/css/style.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
                
  <script type="text/javascript">
    $('.carousel').carousel({
    interval: 10000
  })
  </script>
 <style>
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
</style>
<script language="JavaScript">
   <?php if(get_cookie('lang_is') === 'in'){ ?>
    var text="Kami adalah Pintu Gerbang <br/>Untuk Menigkatkan bisnis Anda!";
    <?php }else{ ?> 
    var text="We are the Gateway <br/>To Help Your Business!";
    <?php } ?>
    var delay=30;
    var currentChar=1;
    var destination="[none]";
    function type()
    {
    //if (document.all)
    {
    var dest=document.getElementById(destination);
    if (dest)// && dest.innerHTML)
    {
    dest.innerHTML=text.substr(0, currentChar)+"<blink>_</blink>";
    currentChar++;
    if (currentChar>text.length)
    {
    currentChar=1;
    setTimeout("type()", 5000);
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
    
</head>
<body>
   <a class="wabutton" target="_blank" href="https://api.whatsapp.com/send?phone=6285206451636&text=Hi,We need web application for my business."><img title="custom-chat-whatsaap-button" src="<?php echo base_url(); ?>assets/wa_chat.png" alt="Whatsapp Chat" width="40" height="40" /></a>
<style>
.wabutton{
width:110px;
height:70px;
position:fixed;
bottom:0px;
right:0px;
z-index:100;
}
</style>
         <style>
            /* body {*/
            /*  font-family: Arial, Helvetica, sans-serif;*/
            /*  font-size: 20px;*/
            /*}*/
             
            #myBtn {
              display: none;
              position: fixed;
              bottom: 20px;
              right: 30px;
              z-index: 99;
              font-size: 12px;
              border: none;
              outline: none;
              background-color: transparent;
              color: white;
              cursor: pointer;
              padding: 15px;
              border-radius: 4px;
            }
            
            #myBtn:hover {
              background-color: #555;
            }
            </style>
<!-- start per-loader -->
<div class="loader-container">
    <div class="loader-circle">
        <div class="loader">
            <div class="loader-dot"></div>
            <div class="loader-dot"></div>
            <div class="loader-dot"></div>
            <div class="loader-dot"></div>
            <div class="loader-dot"></div>
            <div class="loader-dot"></div>
        </div>
    </div>
</div>
<!-- end per-loader -->

<!-- ================================
            START HEADER AREA
================================= -->
<header class="header-area">
    <div class="header-menu-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-full-width">
                        <div class="logo">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/foto/icon.png" alt="logo" width="80" height="50"><strong><font color="black" size="2">PT.PAYUNG ANAK BANGSA</font></strong></a>
                        </div><!-- end logo -->
                        <div class="main-menu-content">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="<?php echo base_url(); ?>"><?php if(get_cookie('lang_is') === 'in'){ ?>Beranda<?php }else{ ?>Home<?php } ?></a>
                                     </li>
                                    <?php foreach($menu as $menu){ 
                                       $page = strtolower($menu["page"]);
                                     ?> 
                                      <li>
                                     <a href="<?php echo base_url(); ?>company/<?php echo strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '.', $menu['slug_sub_page']))); ?>">
                                       <strong><?php echo ucwords($page); ?></strong></a>
                                      </li>
                                    <?php } ?>
                                  
                                   <?php if(get_cookie('lang_is') === 'in'){ ?>
                                   <li><a href="<?php echo base_url("jobs"); ?>">Karya</a></li>
                                 <li> <a href="<?php echo base_url("blog"); ?>">Artikel</a></li>
                                 <li><a href="<?php echo base_url("faq"); ?>">Bukutamu</a></li>
                                   
                                    <li>
                                  <form action="<?php echo base_url('lang_setter/set_to/english');?>" method="post">
                                  <select name='dropdown' onchange='this.form.submit()' class="btn-default">
                                  <option value="ID">Indonesia</option>
                                  <option value="EN">English</option>
                                  </select>
                                      <noscript><input type="submit" value="Submit"/></noscript></li>
                                      <?php }else{ ?>
                                 <li><a href="<?php echo base_url("jobs"); ?>">Portfolio</a></li>
                                 <li> <a href="<?php echo base_url("blog"); ?>">Blog</a></li>
                                 <li><a href="<?php echo base_url("faq"); ?>">Contact Us</a></li>
                                   <li><form action="<?php echo base_url('lang_setter/set_to/indonesia');?>" method="post">
                                  <select name='dropdown' onchange='this.form.submit()' class="btn-default">
                                  <option value="EN">English</option>
                                  <option value="ID">Indonesia</option>
                                  </select>
                                  </form>
                                  </li>
                                   <?php } ?>
                                </ul>
                            </nav>
                        </div><!-- end main-menu-content -->
                        <div class="logo-right-content">
                           
                            <div class="side-menu-open">
                                <span class="menu__bar"></span>
                                <span class="menu__bar"></span>
                                <span class="menu__bar"></span>
                            </div><!-- end side-menu-open -->
                        </div><!-- end logo-right-content -->
                    </div><!-- end menu-full-width -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-wrapper -->
    <div class="side-nav-container">
        <div class="humburger-menu">
            <div class="humburger-menu-lines side-menu-close"></div><!-- end humburger-menu-lines -->
        </div><!-- end humburger-menu -->
        <div class="side-menu-wrap">
            <ul class="side-menu-ul">
                     <li>
                        <a href="<?php echo base_url(); ?>"><?php if(get_cookie('lang_is') === 'in'){ ?>Beranda<?php }else{ ?>Home<?php } ?></a>
                                     </li>
                                    <?php foreach($mobile_menu as $mobile_menu){ 
                                       $page = strtolower($mobile_menu["page"]);
                                     ?> 
                                      <li>
                                  <a href="<?php echo base_url(); ?>company/<?php echo strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '.', $mobile_menu['slug_sub_page']))); ?>">
                                       <strong><?php echo ucwords($page); ?></strong></a>
                                      </li>
                                    <?php } ?>
                                  
                                   <?php if(get_cookie('lang_is') === 'in'){ ?>
                                   <li><a href="<?php echo base_url("jobs"); ?>">Karya</a></li>
                                 <li> <a href="<?php echo base_url("blog"); ?>">Artikel</a></li>
                                 <li><a href="<?php echo base_url("faq"); ?>">Bukutamu</a></li>
                                   
                                    <li>
                                  <form action="<?php echo base_url('lang_setter/set_to/english');?>" method="post">
                                  <select name='dropdown' onchange='this.form.submit()' class="btn-default">
                                  <option value="ID">Indonesia</option>
                                  <option value="EN">English</option>
                                  </select>
                                      <noscript><input type="submit" value="Submit"/></noscript></li>
                                      <?php }else{ ?>

                                 <li><a href="<?php echo base_url("jobs"); ?>">Portfolio</a></li>
                                 <li> <a href="<?php echo base_url("blog"); ?>">Blog</a></li>
                                 <li><a href="<?php echo base_url("faq"); ?>">Contact Us</a></li>
                                   <li><form action="<?php echo base_url('lang_setter/set_to/indonesia');?>" method="post">
                                  <select name='dropdown' onchange='this.form.submit()' class="btn-default">
                                  <option value="EN">English</option>
                                  <option value="ID">Indonesia</option>
                                  </select>
                                  </li>
                                  </form>
                                   <?php } ?>
                </ul>
            <div class="side-nav-button">
            </div><!-- end side-nav-button -->
        </div><!-- end side-menu-wrap -->
    </div><!-- end side-nav-container -->
</header>
<!-- ================================
         END HEADER AREA
================================= -->

<!-- ================================
    START HERO-WRAPPER AREA
================================= -->
<section class="hero-wrapper hero-wrapper-3">
    <div class="hero-overlay"></div><!-- end hero-overlay -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="hero-content-wrapper">
                    <div class="hero-heading">
                        <div class="section-heading">
                            <h2 class="sec__title line-height-65">  PT. Payung Anak Bangsa</h2>
                          <p class="sec__desc line-height-30 font-size-17 font-weight-medium color-white-rgba">
                                 <?php if(get_cookie('lang_is') === 'in'){ ?> adalah perusahaan yang bergerak di bidang IT Solution. Sebagai konsultan IT yang berpengalaman, kami dapat memberikan solusi yang tepat untuk semua jenis masalah dalam mengelola sistem TI dan arsitektur perusahaan Anda. Kami akan memberikan saran dan memasukkan dalam implementasi sistem Anda, sehingga dapat meningkatkan kinerja bisnis Anda.
                      Kami memiliki profesional yang terampil dan berpengalaman di bidangnya.
                    <?php }else{ ?>
                    is a company engaged in IT Solution. As an experienced IT consultant, we can provide the right solution for all kinds of the problems in managing your IT system and enterprise architecture. We'll provide advice and include in the implementation of your system ,so that it can improve the performance of your business. 
                      We have skilled and experienced professionals in their fields. <?php } ?>
                            </p>
                        </div>
                    </div><!-- end hero-heading -->
                    <div class="btn-box margin-top-35px">
                        <a href="<?php echo base_url(); ?>faq" class="theme-btn mr-2"><?php if(get_cookie('lang_is') === 'in'){ ?>
                          Hubungi Kami<?php }else{ ?>Contact Us <?php } ?></a>
                    </div>
                </div><!-- end hero-content-wrapper -->
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
                <div class="hero-form-wrap position-relative">
                    <div class="billing-form-item">
                        <div class="billing-title-wrap">
                            <h3 class="widget-title pb-0"><font color="white" size="2"> <b>
                       <div 0px="" 12px="" arial="" color:="" ff0000="" font:="" id="textDestination" margin:="" style="background-color: transparent;  color: white; text-shadow: 1px 1px 2px black, 0 0 25px black, 0 0 10px black; font-family: Arial;"></div></b> 
                              <script language="JavaScript">
                              javascript:startTyping(text, 30, "textDestination");
                              </script></center></font>
                              <hr>
                            </h3>
                              <div class="title-shape margin-top-10px"></div>
                        </div><!-- billing-title-wrap -->
                        <div class="billing-content">
  <div id="demo" class="carousel slide carousel-fade" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
  </ul>
  <div class="carousel-inner">
     <?php foreach($slide_active as $slide_active){ ?>
    <div class="carousel-item active">
      <img class="card-img-center" src="<?php echo base_url(); ?>assets/foto/<?php echo $slide_active['foto']; ?>" alt="<?php echo $slide_active['title']; ?>" width="750" height="400">
      <div class="carousel-caption">
        <font color="black">
        <h3 class="card-title"><?php echo $slide_active['title']; ?><hr></h3>
        <p><strong><?php echo $slide_active['sub_title']; ?></strong></p>
        <hr>
         <p class="card-text"><?php echo $slide_active['description']; ?><hr></p>
       </font>
      </div>   

    </div>
   <?php } ?>

   <?php foreach($slide_item as $slide_item){ ?>
    <div class="carousel-item">
       <video width="750" height="400" class="video-fluid" autoplay loop muted>
      <source src="<?php echo base_url(); ?>assets/foto/<?php echo $slide_item['foto']; ?>" type="video/mp4" />
      </video>
     <!--  <img class="card-img-top" src="<?php echo base_url(); ?>assets/foto/<?php echo $slide_item['foto']; ?>" alt="<?php echo $slide_item['title']; ?>" width="600" height="400"> -->
      <div class="carousel-caption">
     <font color="white"> 
      <h3 class="card-title "><?php echo $slide_item['title']; ?></h3>
      <div class="card-body">
            <p class="card-text"><?php echo $slide_item['description']; ?></p><br>
            <center><p ><?php echo $slide_item['sub_title']; ?></p></center>
          </font> 
          </div>
      </div>   
      
    </div>
     <?php } ?>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</section>
<!-- end hero-wrapper -->
<!-- ================================
    END HERO-WRAPPER AREA
================================= -->

<!-- ================================
    START TAG AREA
================================= -->

<style type="text/css">
  a.disabled {
  pointer-events: none;
  cursor: default;
}
</style>
  <?php $this->load->view($main);?>
  <div class="section-block"></div>
<!-- ================================
    START CTA AREA
================================= -->
<section class="cta-area cta-area-2 column-sm-center section-bg-2 padding-top-70px padding-bottom-70px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9">
                <div class="section-heading">
                    <h2 class="sec__title mb-2 text-white font-size-26 line-height-40">
                        Call Us at (+62) 85206451636 (WhatsApp/Phone) ,for asap response!
                    </h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-9 -->
            <div class="col-lg-3">
                <div class="btn-box">
                    <?php 
                  $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
                                  "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
                                  $_SERVER['REQUEST_URI']; 
                    //echo $link;
                  ?> 
                 <h2 class="sec__title mb-2 text-white font-size-26 line-height-40">Share :</h2>
                 <a href="http://www.facebook.com/share.php?u=<?php echo $link; ?>" target="_blank">
                <img title="custom-fb-share" src="<?php echo base_url(); ?>assets/facebook.png" alt="" width="40" height="40" /></a>
                &nbsp;&nbsp;
                <a href="http://twitter.com/intent/tweet?url=<?php echo $link; ?>&amp;text=PT.Payung Anak Bangsa&amp;hashtags=PT.Payung Anak Bangsa" target="_blank">
                <img title="custom-twitter-button" src="<?php echo base_url(); ?>assets/twitter.png" alt="" width="40" height="40" />
                &nbsp;&nbsp;
                <a target="_blank" href="mailto:info@payunganakbangsa.com?subject=PT.Payung Anak Bangsa&body=<?php echo $link; ?>"><img title="custom-email-button" src="<?php echo base_url(); ?>assets/email.png" alt="" width="50" height="45" /></a>
                &nbsp;&nbsp;<a target="_blank" href="whatsapp://send?text=<?php echo $link; ?>"><img title="custom-share-whatsaap-button" src="<?php echo base_url(); ?>assets/whatsapp.png" alt="" width="40" height="40" /></a>
                </div><!-- end btn-box -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end cta-area -->
<!-- ================================
    END CTA AREA
================================= -->

<!-- ================================
       START FOOTER AREA
================================= -->
<section class="footer-area padding-top-90px padding-bottom-30px">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 column-td-6">
                <div class="footer-item">
                    <div class="logo">
                        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/foto/icon.png" alt="logo" width="80" height="50"><strong><font color="black" size="2">PT.PAYUNG ANAK BANGSA</font></strong></a>
                        <p class="footer__desc line-height-30 mt-3">
                          <strong>Contact Details</strong><hr>
                            Jakarta ,Indonesia <br>
                            +62 85206451636 <br>
                           info@payunganakbangsa.com<br>
                           Monday - Friday: 09:00 AM to 17:00 PM
                        </p>
                    </div><!-- end logo -->
                     <h4 class="footer__title mt-4">Connect with us</h4>
                        <ul class="social-profile">
                            <li>
                                <a target="_blank" href="https://www.facebook.com/pages/category/Information-Technology-Company/PT-Payung-Anak-Bangsa-114959306569082/">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                               <a href="https://id.linkedin.com/in/payung-anak-bangsa-40590b193">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            
                        </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-6 column-td-6">
                <div class="footer-item">
                    <h4 class="footer__title">Our Office</h4>
                     <iframe style="width:100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3010936032174!2d106.84646331513959!3d-6.223972662690438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f38e8b03e1ad%3A0xa0613f821b2b9d80!2sJl.%20KH.%20Abdullah%20Syafei%20No.23%2C%20RT.4%2FRW.1%2C%20Manggarai%20Sel.%2C%20Kec.%20Tebet%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012810!5e0!3m2!1sid!2sid!4v1568819328985!5m2!1sid!2sid" width="600" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-2 -->
             <div class="col-lg-2 column-td-6">
                <div class="footer-item">
                    <h4 class="footer__title">Footer Menu</h4>
                    <ul class="list-items">
                      
                                    <?php foreach($menu_footer as $menu_footer){ 
                                       $page = strtolower($menu_footer["page"]);
                                     ?> 
                                      <li>
                                  <a href="<?php echo base_url(); ?>company/<?php echo strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '.', $menu_footer['slug_sub_page']))); ?>">
                                       <strong><?php echo ucwords($page); ?></strong></a>
                                      </li>
                                    <?php } ?>
                                  
                                   <?php if(get_cookie('lang_is') === 'in'){ ?>
                                    <strong>
                                   <li><a href="<?php echo base_url("jobs"); ?>">Karya</a></li>
                                 <li> <a href="<?php echo base_url("blog"); ?>">Artikel</a></li>
                                 <li><a href="<?php echo base_url("faq"); ?>">Bukutamu</a></li> </strong>
                                   
                                  
                                      <?php }else{ ?>
                                         <strong>
                                 <li><a href="<?php echo base_url("jobs"); ?>">Portfolio</a></li>
                                 <li> <a href="<?php echo base_url("blog"); ?>">Blog</a></li>
                                 <li><a href="<?php echo base_url("faq"); ?>">Contact Us</a></li> </strong>
                                   <?php } ?>
                        </ul>
                </div><!-- end footer-item -->
            </div>
            <!-- end col-lg-2 -->
        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="copy-right margin-top-50px padding-top-30px">
                    <p class="copy__desc">
                        Copyright &copy;<?php echo date('Y'); ?> Payung Anak Bangsa. Made with
                        <span class="la la-heart-o"></span> by PAB Development</a>
                    </p>
                   <!--  <ul class="list-items">
                        <li class="color-text-2 font-weight-medium">Browse by:</li>
                        <li><a href="#">Companies,</a></li>
                        <li><a href="#">Jobs,</a></li>
                        <li><a href="#">Locations</a></li>
                    </ul> -->
                </div><!-- end copy-right -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end footer-area -->
<!-- ================================
       START FOOTER AREA
================================= -->

<!-- start back-to-top -->
<div id="back-to-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>
<!-- end back-to-top -->

<!-- Template JS Files -->
<script src="<?php echo base_url(); ?>assets/desain_frontend/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/desain_frontend/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/desain_frontend/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/desain_frontend/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/desain_frontend/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/desain_frontend/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/desain_frontend/js/isotope-3.0.6.min.js"></script>
<script src="<?php echo base_url(); ?>assets/desain_frontend/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/desain_frontend/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/desain_frontend/js/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/desain_frontend/js/purecounter.js"></script>
<script src="<?php echo base_url(); ?>assets/desain_frontend/js/jquery.filer.min.js"></script>
<script src="<?php echo base_url(); ?>assets/desain_frontend/js/smooth-scrolling.js"></script>
<script src="<?php echo base_url(); ?>assets/desain_frontend/js/progresscircle.js"></script>
<script src="<?php echo base_url(); ?>assets/desain_frontend/js/main.js"></script>
</body>
</html>