<?php include 'includes/header.php'; ?>



    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_box text-center">
                        <h2 class="breadcrumb-title">Contact us</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Contact us </li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->











    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <!--====================  Conact us Section Start ====================-->
            <div class="contact-us-section-wrappaer section-space--pt_100 section-space--pb_70">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-lg-6">
                            <div class="conact-us-wrap-one mb-30">
                                <h3 class="heading">To make requests for <br>further information, <br><span class="text-color-primary">contact us</span> via our social channels. </h3>
                                <div class="sub-heading">We just need a couple of hours! <br> No more than 2 working days since receiving your issue ticket.</div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-lg-6">
                            <div class="contact-form-wrap">

                                <!-- <form id="contact-form" action="http://whizthemes.com/mail-php/jowel/omactuo/php/mail.php" method="post"> -->
                                <form id="contact-form" action="assets/php/mail.php" method="post">
                                    <div class="contact-form">
                                        <div class="contact-input">
                                            <div class="contact-inner">
                                                <input name="con_name" type="text" placeholder="Name *" required>
                                            </div>
                                            <div class="contact-inner">
                                                <input name="con_email" type="email" placeholder="Email *" required>
                                            </div>
                                        </div>
                                        <div class="contact-inner">
                                            <input name="con_subject" type="text" placeholder="Subject *" required>
                                        </div>
                                        <div class="contact-inner contact-message">
                                            <textarea name="con_message" placeholder="Please describe what you need." required></textarea>
                                        </div>
                                        <div class="submit-btn mt-20">
                                            <button class="ht-btn ht-btn-md" type="submit">Send message</button>
                                            <p class="form-messege"></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====================  Conact us Section End  ====================-->

            <!--====================  Conact us info Start ====================-->
          <div class="contact-us-info-wrappaer section-space--pb_100">
    <div class="container">
        <div class="row align-items-center">
            
            <div class="col-lg-4 col-md-6">
                <div class="conact-info-wrap mt-30">
                    <h5 class="heading mb-20">ABC Location 1</h5>
                    <ul class="conact-info__list">
                        <li>ABC Street, ABC Area, ABC City - 000000</li>
                        <li>
                            <a href="#" class="hover-style-link text-color-primary">
                                abc1@abc.com
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover-style-link text-black font-weight--bold">
                                +00 00000 00000
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="conact-info-wrap mt-30">
                    <h5 class="heading mb-20">ABC Location 2</h5>
                    <ul class="conact-info__list">
                        <li>ABC Building, ABC Road, ABC City - 000000</li>
                        <li>
                            <a href="#" class="hover-style-link text-color-primary">
                                abc2@abc.com
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover-style-link text-black font-weight--bold">
                                +00 00000 00001
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="conact-info-wrap mt-30">
                    <h5 class="heading mb-20">ABC Location 3</h5>
                    <ul class="conact-info__list">
                        <li>ABC Tower, ABC Business Park, ABC City</li>
                        <li>
                            <a href="#" class="hover-style-link text-color-primary">
                                abc3@abc.com
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover-style-link text-black font-weight--bold">
                                +00 00000 00002
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

            <!--====================  Conact us info End  ====================-->






            <!--========== Call to Action Area Start ============-->
            <div class="cta-image-area_one section-space--ptb_80 cta-bg-image_two">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-7">
                            <div class="cta-content md-text-center">
                                <h3 class="heading">We run all kinds of IT services that vow your <span class="text-color-primary"> success</span></h3>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="cta-button-group--two text-center">
                                <a href="#" class="btn btn--white btn-one"><span class="btn-icon me-2"><i class="far fa-comment-alt"></i></span> Let's talk</a>
                                <a href="#" class="btn btn--secondary btn-two "><span class="btn-icon me-2"><i class="fas fa-info-circle"></i></span> Get info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--========== Call to Action Area End ============-->




        </div>





<?php include 'includes/footer.php'; ?>

<script>
$(document).ready(function() {
    $('#contact-form').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        var submitBtn = form.find('button[type="submit"]');
        var messageBox = form.find('.form-messege');

        submitBtn.prop('disabled', true).text('Sending...');

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function(response) {
                if (response.trim() === 'success') {
                    messageBox.css('color', 'green').text('Message sent successfully!');
                    form[0].reset();
                } else {
                    messageBox.css('color', 'red').text('Error: ' + response);
                }
                submitBtn.prop('disabled', false).text('Send message');
            },
            error: function() {
                messageBox.css('color', 'red').text('An error occurred. Please try again.');
                submitBtn.prop('disabled', false).text('Send message');
            }
        });
    });
});
</script>

