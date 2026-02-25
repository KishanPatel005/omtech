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
        <div class="section-title-wrap text-center section-space--mb_60">
            <h6 class="section-sub-title mb-20">Our Company</h6>
            <h3 class="heading">Share the joy of achieving <span class="text-color-primary">glorious <br> moments</span> & climbed up <span class="text-color-primary">the top.</span></h3>
        </div>
        </div>
</div>

<div class="cybersecurity-about-box" style="margin-left: calc(50% - 50vw); margin-right: calc(50% - 50vw); width: 100vw; max-width: 100vw; background: linear-gradient(rgba(245, 247, 250, 0.85), rgba(255, 255, 255, 0.95)), url('https://cgu-odisha.ac.in/wp-content/uploads/2023/05/mechatronics-engineering-jobs.jpg'); background-size: cover; background-position: center; background-attachment: fixed; min-height: auto; display: flex; align-items: center; padding: 100px 0;">
    <div class="container">
        <div class="row align-items-center">
            
            <div class="col-lg-5 text-center text-lg-start mb-5 mb-lg-0">
                <div class="company-images-wrapper" style="position: relative; display: inline-block;">
                    <img src="https://img.freepik.com/free-photo/close-up-portrait-handsome-smiling-young-man-white-t-shirt-blurry-outdoor-nature_176420-6305.jpg" alt="Er. OM S. PATEL - Founder" class="shadow-lg" style="width: 100%; max-width: 400px; aspect-ratio: 4/5; object-fit: cover; border-radius: 16px; border: 12px solid #ffffff;">
                    
                    <div style="position: absolute; bottom: -20px; right: -20px; background: #FF5F1F; color: #fff; padding: 15px 25px; border-radius: 8px; box-shadow: 0 10px 20px rgba(8, 106, 216, 0.3); text-align: left;">
                        <h5 style="color: #fff; margin: 0; font-weight: 700; font-size: 18px;">Er. OM S. PATEL</h5>
                        <span style="font-size: 14px; opacity: 0.9;">Founder & Mechatronics Engineer</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 ms-auto">
                <div class="faq-content-wrap p-5" style="background: rgba(255,255,255,0.95); border-radius: 16px; box-shadow: 0 15px 40px rgba(0,0,0,0.08); backdrop-filter: blur(10px); border: 1px solid rgba(0,0,0,0.05);">
                    <div class="faq-item">
                        <h5 class="heading mb-20" style="font-size: 28px; font-weight: 800; color: #FF5F1F;">OMACTUO Motion Systems</h5>
                        
                        <p class="mb-4" style="font-size: 16px; line-height: 1.8; color: #444;">
                            <strong>OMACTUO Motion Systems</strong> is an Indian electromechanical brand dedicated to advancing motion technology for robotics and automation. Founded in 2025 by Er. OM S. PATEL (Mechatronics engineer).
                        </p>
                        
                        <p class="mb-4" style="font-size: 16px; line-height: 1.8; color: #444;">
                            We specialize in the design and manufacturing of electromechanical rotary and linear actuators, along with high-precision motion components. Built on engineering excellence and innovation.
                        </p>
                        
                        <div style="border-left: 4px solid #FF5F1F; padding-left: 20px; margin-top: 30px; background: rgba(8, 106, 216, 0.05); padding: 15px 20px; border-radius: 0 8px 8px 0;">
                            <p style="font-size: 16px; line-height: 1.8; color: #222; font-style: italic; margin: 0; font-weight: 500;">
                                "OMACTUO delivers reliable, customizable, and performance-driven solutions that empower automation across industries & create long-term value for our clients."
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
                         <div class="row section-space--mt_60">
                            <div class="col-lg-4 col-md-4 mb-30">
                                <div class="image-box">
                                    <img src="<?php echo $img1; ?>" alt="Company Image 1" class="img-fluid rounded shadow-sm w-100" style="height: 250px; object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 mb-30">
                                <div class="image-box">
                                    <img src="<?php echo $img2; ?>" alt="Company Image 2" class="img-fluid rounded shadow-sm w-100" style="height: 250px; object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 mb-30">
                                <div class="image-box">
                                    <img src="<?php echo $img3; ?>" alt="Company Image 3" class="img-fluid rounded shadow-sm w-100" style="height: 250px; object-fit: cover;">
                                </div>
                            </div>
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
            <!-- <div class="contact-us-area appointment-contact-bg section-space--ptb_100">
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
                               <form id="contact-form" action="https://whizthemes.com/mail-php/jowel/omactuo/php/services-mail.php" method="post"> 
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
                                <h3 class="call-us"><a href="tel:+919409944101">(+91) 9409944101</a></h3>
                                <div class="text">Start the collaboration with us while figuring out the best solution based on your needs.</div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!--============ Contact Us Area End =================-->
            <div class="contact-us-section-wrappaer infotechno-contact-us-bg section-space--ptb_120">
    <div class="container">
        <div class="row align-items-center">
            
            <div class="col-lg-6">
                <div class="conact-us-wrap-one">
                    <h3 class="heading">Optimize your production by <span class="text-color-primary">partnering</span> with our engineering experts. </h3>
                    <div class="sub-heading">We are ready to tackle your toughest industrial challenges.<br>Contact us for a detailed feasibility analysis, system assessment, or custom automation quote.</div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="contact-info-one text-center">
                    <div class="icon">
                        <span class="fas fa-phone"></span>
                    </div>
                    <h6 class="heading font-weight--reguler">Call our technical team!</h6>
                    <h2 class="call-us"><a href="tel:+919409944101">+91 9409944101</a></h2>
                    <div class="contact-us-button mt-20">
                        <a href="contact-us.php" class="btn btn--secondary">Get a Quote</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
        </div>




<?php include 'includes/footer.php'; ?>

