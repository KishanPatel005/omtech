<?php include 'includes/header.php'; ?>

<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_box text-center">
                    <h2 class="breadcrumb-title">Blogs & News</h2>
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Blogs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<div class="site-wrapper-reveal">
    <!-- Blog Area Start -->
    <div class="blog-pages-wrapper section-space--ptb_100">
        <div class="container">
            <div class="row">
                <?php
                $blog_query = mysqli_query($con, "SELECT * FROM blogs WHERE status = 'active' ORDER BY created_at DESC");
                if(mysqli_num_rows($blog_query) > 0):
                    while($blog = mysqli_fetch_assoc($blog_query)):
                ?>
                <div class="col-lg-4 col-md-6 wow move-up mb-30">
                    <!-- Single Blog Item Start -->
                    <div class="single-blog-item blog-grid">
                        <div class="post-feature blog-thumbnail">
                            <a href="blog-details.php?id=<?php echo $blog['id']; ?>">
                                <img class="img-fluid" src="<?php echo !empty($blog['image1']) ? $blog['image1'] : 'assets/images/blog/blog-01-370x230.webp'; ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>" style="height: 230px; width: 100%; object-fit: cover;">
                            </a>
                        </div>
                        <div class="post-info lg-blog-post-info">
                            <div class="post-meta">
                                <div class="post-date">
                                    <span class="far fa-calendar meta-icon"></span>
                                    <?php echo date('M d, Y', strtotime($blog['created_at'])); ?>
                                </div>
                                <div class="post-author" style="display: inline-block; margin-left: 15px;">
                                    <span class="far fa-user meta-icon"></span>
                                    <?php echo htmlspecialchars($blog['author']); ?>
                                </div>
                            </div>
                            <h5 class="post-title font-weight--bold">
                                <a href="blog-details.php?id=<?php echo $blog['id']; ?>"><?php echo htmlspecialchars($blog['title']); ?></a>
                            </h5>
                            <div class="post-excerpt mt-15">
                                <p><?php echo htmlspecialchars($blog['short_description']); ?></p>
                            </div>
                            <div class="btn-text">
                                <a href="blog-details.php?id=<?php echo $blog['id']; ?>">Read more <i class="ml-1 button-icon fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog Item End -->
                </div>
                <?php 
                    endwhile;
                else:
                ?>
                <div class="col-12 text-center">
                    <h3>No blog posts found.</h3>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Blog Area End -->
</div>

<?php include 'includes/footer.php'; ?>