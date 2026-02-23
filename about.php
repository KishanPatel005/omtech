<?php include 'includes/header.php'; ?>
<?php include 'includes/conneaction.php'; ?>
<?php 
$res = mysqli_query($con, "SELECT * FROM about_us WHERE id = 1");
$about_data = mysqli_fetch_assoc($res);
$img1 = (!empty($about_data['image1'])) ? $about_data['image1'] : "https://placehold.co/400x300/e8e8e8/999999?text=Company+Photo+1";
$img2 = (!empty($about_data['image2'])) ? $about_data['image2'] : "https://placehold.co/400x300/e8e8e8/999999?text=Company+Photo+2";
$img3 = (!empty($about_data['image3'])) ? $about_data['image3'] : "https://placehold.co/600x350/e8e8e8/999999?text=Company+Photo+3";
?>

    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <!--===========  feature-large-images-wrapper  Start =============-->
            <div class="feature-large-images-wrapper section-space--ptb_100">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section-title-wrap Start -->
                            <div class="section-title-wrap text-center section-space--mb_60">
                                <h6 class="section-sub-title mb-20">Our company</h6>
                                <h3 class="heading">Share the joy of achieving <span class="text-color-primary"> glorious   <br> moments</span> & climbed up <span class="text-color-primary">the top.</span></h3>
                            </div>
                            <!-- section-title-wrap Start -->
                        </div>
                    </div>

                    <div class="cybersecurity-about-box">
                        <div class="row">
                            <div class="col-lg-5 offset-lg-1">
                                <div class="company-images-wrapper">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <div class="image-placeholder">
                                                <img src="<?php echo $img1; ?>" alt="Company Image 1" class="img-fluid rounded">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="image-placeholder mt-4">
                                                <img src="<?php echo $img2; ?>" alt="Company Image 2" class="img-fluid rounded">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="image-placeholder">
                                                <img src="<?php echo $img3; ?>" alt="Company Image 3" class="img-fluid rounded">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="col-lg-5 ms-auto">
                                <div class="faq-wrapper">
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn-link" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        How can we help your business? <span> <i class="fas fa-chevron-down"></i>
                                        <i class="fas fa-chevron-up"></i> </span>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    <p>Through the collaboration with customers in discussing needs and demand, we're able to attain mutual understanding, gain customer trust to offer appropriate advice, and bring about suggestions on suitable technology to transform your business. </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <button class="btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        What are the advantages of OMACTUO?<span> <i class="fas fa-chevron-down"></i>
                                        <i class="fas fa-chevron-up"></i> </span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    <p>OMACTUOtakes into consideration every little detail to make sure the system run smoothly and responsively. OMACTUOemploys a new technique called Minified Technology for securing customers' database & building up highly confidential firewalls. </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button class="btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        How working process is simplified? <span> <i class="fas fa-chevron-down"></i>
                                        <i class="fas fa-chevron-up"></i> </span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    <p>We reduce redundant complex calculations and lengthy erroneous code texts with simpler ones to ensure OMACTUOwould run seamlessly and the design is reserved in its best form when viewed from a wide range of mobile devices & browsers. </p>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--=========== Founder Section Start =============-->
                        <div class="founder-section section-space--pt_80">
                            <div class="row align-items-center">
                                <div class="col-lg-5">
                                    <div class="founder-image">
                                        <img src="https://placehold.co/500x600/e8e8e8/999999?text=Founder+Photo" alt="Founder" class="img-fluid rounded">
                                    </div>
                                </div>
                                <div class="col-lg-6 ms-lg-5">
                                    <div class="founder-content">
                                        <h6 class="section-sub-title mb-15">Meet Our Founder</h6>
                                        <h3 class="heading mb-20">A Vision for Tomorrow's Technology</h3>
                                        <p class="mb-20">Our founder envisioned a company that bridges the gap between cutting-edge automation technology and practical industrial applications. With over two decades of experience in the automation sector, the vision has always been clear: to empower businesses with intelligent solutions that drive efficiency and growth.</p>
                                        <p class="mb-30">"Innovation is not just about creating new technology—it's about solving real problems and making a meaningful impact on industries that shape our world."</p>
                                        <div class="founder-signature">
                                            <h5 class="mb-1">John Doe</h5>
                                            <p class="text-color-primary mb-0">Founder & CEO</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--=========== Founder Section End =============-->

                    </div>
                </div>
            </div>
            <!--====================  Latest Blogs Section Start ====================-->
            <div class="feature-large-images-wrapper section-space--pt_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title-wrap text-center section-space--mb_30">
                                <h6 class="section-sub-title mb-20">Blogs & News</h6>
                                <h3 class="heading">Latest articles from <span class="text-color-primary"> our industry experts</span></h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="row row--35">
                                <?php
                                $blogs_query = mysqli_query($con, "SELECT * FROM blogs WHERE status = 'active' ORDER BY created_at DESC LIMIT 3");
                                if(mysqli_num_rows($blogs_query) > 0):
                                    while($blog = mysqli_fetch_assoc($blogs_query)):
                                ?>
                                <div class="col-lg-4 col-md-6 mt-30">
                                    <a href="blog-details.php?id=<?php echo $blog['id']; ?>" class="box-large-image__wrap wow move-up">
                                        <div class="box-large-image__box">
                                            <div class="box-large-image__midea">
                                                <div class="images-midea">
                                                    <img src="<?php echo !empty($blog['image1']) ? $blog['image1'] : 'assets/images/blog/blog-01-330x330.webp'; ?>" width="330" height="330" class="img-fluid" alt="<?php echo htmlspecialchars($blog['title']); ?>" style="height: 330px; width: 100%; object-fit: cover;">
                                                    <div class="button-wrapper">
                                                        <div class="btn tm-button">
                                                            <span class="button-text">Read More</span>
                                                        </div>
                                                    </div>
                                                    <div class="heading-wrap">
                                                        <h5 class="heading"><?php echo htmlspecialchars($blog['title']); ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-large-image__content mt-30 text-center">
                                                <p><?php echo htmlspecialchars($blog['short_description']); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php 
                                    endwhile;
                                endif; 
                                ?>
                            </div>
                            <div class="section-under-heading text-center section-space--mt_40">
                                <a href="blogs.php">View all blogs and articles <i class="ml-1 button-icon fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====================  Latest Blogs Section End ====================-->


           

            <!--===========  feature-icon-wrapper  Start =============-->
            <div class="feature-icon-wrapper section-space--pb_80 section-space--pt_80 border-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="feature-list__three">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="grid-item animate">
                                            <div class="ht-box-icon style-03">
                                                <div class="icon-box-wrap">
                                                    <div class="content-header">
                                                        <div class="icon">
                                                            <i class="far fa-life-ring"></i>
                                                        </div>
                                                        <h5 class="heading">
                                                            Quality Assurance System
                                                        </h5>
                                                    </div>
                                                    <div class="content">
                                                        <div class="text">Our service offerings enhance customer experience throughout secure & highly functional end-to-end warranty management.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="grid-item animate">
                                            <div class="ht-box-icon style-03">
                                                <div class="icon-box-wrap">
                                                    <div class="content-header">
                                                        <div class="icon">
                                                            <i class="fas fa-lock"></i>
                                                        </div>
                                                        <h5 class="heading">
                                                            Accurate Testing Processes
                                                        </h5>
                                                    </div>
                                                    <div class="content">
                                                        <div class="text">Develop and propose product improvements through periodical and accurate testing, repairing & refining every version.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="grid-item animate">
                                            <div class="ht-box-icon style-03">
                                                <div class="icon-box-wrap">
                                                    <div class="content-header">
                                                        <div class="icon">
                                                            <i class="fas fa-globe"></i>
                                                        </div>
                                                        <h5 class="heading">
                                                            Smart API Generation
                                                        </h5>
                                                    </div>
                                                    <div class="content">
                                                        <div class="text">Develop and propose product improvements through periodical and accurate testing, repairing & refining every version.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="grid-item animate">
                                            <div class="ht-box-icon style-03">
                                                <div class="icon-box-wrap">
                                                    <div class="content-header">
                                                        <div class="icon">
                                                            <i class="fas fa-medal"></i>
                                                        </div>
                                                        <h5 class="heading">
                                                            Infrastructure Integration Technology
                                                        </h5>
                                                    </div>
                                                    <div class="content">
                                                        <div class="text">At omactuo, we have a holistic and integrated approach towards core modernization to experience technological evolution.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--===========  feature-icon-wrapper  End =============-->



            <!--=========== fun fact Wrapper Start ==========-->
           
            <!--=========== fun fact Wrapper End ==========-->
            <!--============ Contact Us Area Start =================-->
            <div class="contact-us-area appointment-contact-bg section-space--ptb_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-title section-space--mb_50">
                                <h3 class="mb-20">Need a hand?</h3>
                                <p class="sub-title">Reach out to the world’s most reliable IT services.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="contact-form-wrap">
                                <!-- <form id="contact-form" action="https://whizthemes.com/mail-php/jowel/omactuo/php/services-mail.php" method="post"> -->
                                <form class="contact-form" id="contact-form" action="assets/php/services-mail.php" method="post">
                                    <div class="contact-form__two">
                                        <div class="contact-input">
                                            <div class="contact-inner">
                                                <input name="con_name" type="text" placeholder="Name *">
                                            </div>
                                            <div class="contact-inner">
                                                <input name="con_email" type="email" placeholder="Email *">
                                            </div>
                                        </div>
                                        <div class="contact-select">
                                            <div class="form-item contact-inner">
                                                <span class="inquiry">
                                        <select id="Visiting" name="Visiting">
                                            <option disabled selected>Select Department to email</option>
                                            <option value="Your inquiry about">Your inquiry about</option>
                                            <option value="General Information Request">General Information Request</option>
                                            <option value="Partner Relations">Partner Relations</option>
                                            <option value="Careers">Careers</option>
                                            <option value="Software Licencing">Software Licencing</option>
                                        </select>

                                    </span>
                                            </div>
                                        </div>
                                        <div class="contact-inner contact-message">
                                            <textarea name="con_message" placeholder="Please describe what you need."></textarea>
                                        </div>
                                        <div class="comment-submit-btn">
                                            <button class="ht-btn ht-btn-md" type="submit">Get a free consultation</button>
                                            <p class="form-messege"></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-5 ms-auto">
                            <div class="contact-info-three text-left">
                                <h6 class="heading font-weight--reguler">Reach out now!</h6>
                                <h3 class="call-us"><a href="tel:123 567990">(+00) 123 567990</a></h3>
                                <div class="text">Start the collaboration with us while figuring out the best solution based on your needs.</div>
                                <div class="location-button mt-20">
                                    <a href="#" class="location-text-button"><span class="button-icon"></span> <span class="button-text">View on Google map</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--============ Contact Us Area End =================-->

        </div>




<?php include 'includes/footer.php'; ?>

