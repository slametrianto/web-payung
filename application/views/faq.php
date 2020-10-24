
<section class="breadcrumb-area">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content d-flex flex-wrap justify-content-between align-items-center">
                        <div class="section-heading">
                            <h2 class="sec__title mb-2">Contact us</h2>
                        </div><!-- end section-heading -->
                        <ul class="list-items d-flex align-items-center mt-2">
                            <li class="active__list-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li>Contact us</li>
                        </ul>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START CONTACT AREA
================================= -->
<section class="contact-area padding-top-100px padding-bottom-85px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading mb-5">
                    <h2 class="sec__title font-size-28 line-height-35">How can we help you today?</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
            <!-- end col-lg-4 -->
        </div><!-- end row -->
        <div class="section-block margin-top-0px margin-bottom-100px"></div>
        <div class="row">
            <div class="col-lg-7">
                <div class="billing-form-item">
                    <div class="billing-title-wrap">
                        <h3 class="widget-title pb-0">Fill the form. It's easy.</h3>
                        <div class="title-shape margin-top-10px"></div>
                    </div><!-- billing-title-wrap -->
                    <div class="billing-content">
                        <div class="contact-form-action">
                           <form name="contactform" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>page/save_message" id="contactform1" >
                         <?php echo $this->session->flashdata('message'); ?>
                                <div class="input-box">
                                    <label class="label-text">Name</label>
                                    <div class="form-group">
                                        <span class="la la-user form-icon"></span>
                                        <input class="form-control" type="text" name="nama" placeholder="Name">
                                    </div> <?php echo form_error('nama'); ?>
                                </div><!-- end input-box -->
                                <div class="input-box">
                                    <label class="label-text">Email</label>
                                    <div class="form-group">
                                        <span class="la la-envelope-o form-icon"></span>
                                        <input class="form-control" type="email" name="email" placeholder="Email address">
                                    </div><?php echo form_error('email'); ?>
                                </div><!-- end input-box -->
                                <div class="input-box">
                                    <label class="label-text">Phone</label>
                                    <div class="form-group">
                                        <span class="la la-phone form-icon"></span>
                                        <input class="form-control" type="text" name="no_hp" placeholder="Phone number">
                                    </div>
                                </div><!-- end input-box -->
                                <div class="input-box">
                                    <label class="label-text">Website</label>
                                    <div class="form-group">
                                        <span class="la la-globe form-icon"></span>
                                        <input class="form-control" type="text" name="website" placeholder="Website">
                                    </div>
                                </div><!-- end input-box -->
                                <div class="input-box">
                                    <label class="label-text">Title</label>
                                    <div class="form-group">
                                        <span class="la la-briefcase form-icon"></span>
                                        <input class="form-control" type="text" name="title" placeholder="Message Title">
                                    </div>
                                </div>
                                <div class="input-box">
                                    <label class="label-text">Additional information</label>
                                    <div class="form-group">
                                        <span class="la la-pencil form-icon"></span>
                                        <textarea class="message-control form-control" name="description" placeholder="Write message"></textarea>
                                    </div>
                                </div>
                                <div class="btn-box">
                                    <button type="submit" class="theme-btn border-0">Send Message</button>
                                </div>
                            </form>
                        </div><!-- end contact-form-action -->
                    </div><!-- end billing-content -->
                </div><!-- end billing-form-item -->
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
                <div class="contact-details margin-bottom-30px">
                    <div class="contact-details-inner">
                        <div class="contact-item d-flex align-items-center">
                            <div class="contact-icon mr-3">
                                <i class="la la-map-marker icon-element font-size-24"></i>
                            </div>
                            <div class="contact-address">
                                <h4 class="widget-title text-white pb-2">Address</h4>
                                <p class="color-white-rgba font-weight-medium">Jl. KH. Abdullah Syafei No.23, RT.1/RW.1, Manggarai Sel., Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12810</p>
                            </div>
                        </div>
                        <div class="contact-item d-flex align-items-center">
                            <div class="contact-icon mr-3">
                                <i class="la la-phone icon-element font-size-24"></i>
                            </div>
                            <div class="contact-address">
                                <h4 class="widget-title text-white pb-2">Lets Talk</h4>
                                <p class="color-white-rgba font-weight-medium">+628506451636</p>
                            </div>
                        </div>
                        <div class="contact-item d-flex align-items-center">
                            <div class="contact-icon mr-3">
                                <i class="la la-envelope icon-element font-size-24"></i>
                            </div>
                            <div class="contact-address">
                                <h4 class="widget-title text-white pb-2">General Support</h4>
                                <p class="color-white-rgba font-weight-medium"><a href="mailto:info@payunganakbangsa.com" class="color-white-rgba">info@payunganakbangsa.com</a></p>
                                
                            </div>
                        </div>
                    </div>
                </div><!-- end contact-details -->
                      </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end contact-area -->
<!-- ================================
    END CONTACT AREA
================================= -->
