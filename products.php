<?php include 'includes/header.php'; ?>

    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
        <br><br>

            <!-- Top Bar (Utility & Control) -->
            <div class="top-bar section-space--ptb_20" style="border-bottom: 1px solid #eaeaea;">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="search-container text-center" style="margin-top: 15px;margin-bottom:15px">
                                <form action="products.php" method="GET" class="search-form position-relative mx-auto" style="max-width: 750px;">
                                    <input type="text" name="search" class="form-control border-dark shadow-sm" style="border-radius: 30px; padding: 15px 30px; font-size: 17px; background: #fff;" placeholder="Search for automation products..." value="<?php echo $_GET['search'] ?? ''; ?>">
                                    <button type="submit" class="search-btn position-absolute" style="right: 6px; top: 6px; bottom: 6px; border: none; background: #FF5F1F; color: white; padding: 0 30px; border-radius: 25px; transition: all 0.3s ease;">
                                        <i class="fas fa-search me-2"></i> 
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Mobile Filter Button (visible on mobile and tablet) -->
            <div class="container-fluid d-lg-none d-md-block d-block">
                <div class="row">
                    <div class="col-12 text-center p-3">
                        <button class="btn btn-outline-primary w-100" type="button" onclick="openMobileFilter()">
                            <i class="fas fa-filter me-2"></i> Filter Products
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Main Content Area -->
            <div class="shop-page-wrapper section-space--ptb_30">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Left Sidebar (Technical Filters) - Hidden on mobile/tablet -->
                        <div class="col-lg-3 d-none d-lg-block">
                            <div class="sidebar-wrap" style="position: sticky; top: 20px; max-height: calc(100vh - 40px); overflow-y: auto; padding-right: 10px;">
                                
                                <!-- Category Accordion -->
                                <div class="widget widget_categories" style="padding: 15px;">
                                    <h5 class="widget-title">Product Categories</h5>
                                    <ul class="category-list">
                                        <?php
                                        include 'includes/conneaction.php';
                                        $categories_query = mysqli_query($con, "SELECT * FROM categories WHERE status = 'active' ORDER BY priority ASC, category_name ASC");
                                        while ($cat = mysqli_fetch_assoc($categories_query)) {
                                            $sub_query = mysqli_query($con, "SELECT * FROM sub_categories WHERE category_id = " . $cat['id'] . " AND status = 'active'");
                                            $has_sub = mysqli_num_rows($sub_query) > 0;
                                            
                                            echo '<li class="cat-item' . ($has_sub ? ' has-children' : '') . '">';
                                            echo '<div class="cat-header">';
                                            echo '<a href="products.php?cat=' . $cat['id'] . '" class="cat-link">' . htmlspecialchars($cat['category_name']) . '</a>';
                                            if ($has_sub) {
                                                echo '<span class="toggle-icon"><i class="fas fa-plus"></i></span>';
                                            }
                                            echo '</div>';
                                            
                                            if ($has_sub) {
                                                echo '<ul class="children" style="display: none;">';
                                                while ($sub = mysqli_fetch_assoc($sub_query)) {
                                                    $ter_query = mysqli_query($con, "SELECT * FROM tertiary_categories WHERE sub_category_id = " . $sub['id'] . " AND status = 'active'");
                                                    $has_ter = mysqli_num_rows($ter_query) > 0;
                                                    
                                                    echo '<li class="' . ($has_ter ? 'has-children' : '') . '">';
                                                    echo '<div class="cat-header">';
                                                    echo '<a href="products.php?sub=' . $sub['id'] . '">' . htmlspecialchars($sub['sub_category_name']) . '</a>';
                                                    if ($has_ter) {
                                                        echo '<span class="toggle-icon"><i class="fas fa-plus"></i></span>';
                                                    }
                                                    echo '</div>';
                                                    
                                                    if ($has_ter) {
                                                        echo '<ul class="tertiary-children" style="display: none; list-style: none; padding-left: 15px; font-size: 0.9em; border-left: 1px dotted #ccc; margin-top: 5px;">';
                                                        while ($ter = mysqli_fetch_assoc($ter_query)) {
                                                            echo '<li><a href="products.php?ter=' . $ter['id'] . '" style="color: #888;">' . htmlspecialchars($ter['tertiary_category_name']) . '</a></li>';
                                                        }
                                                        echo '</ul>';
                                                    }
                                                    echo '</li>';
                                                }
                                                echo '</ul>';
                                            }
                                            echo '</li>';
                                        }
                                        ?>
                                    </ul>
                                    <style>
                                        .sidebar-wrap::-webkit-scrollbar { width: 5px; }
                                        .sidebar-wrap::-webkit-scrollbar-track { background: #f1f1f1; }
                                        .sidebar-wrap::-webkit-scrollbar-thumb { background: #FF5F1F; border-radius: 10px; }
                                        .category-list, .category-list ul { list-style: none; padding-left: 0; }
                                        .cat-header { display: flex; justify-content: space-between; align-items: center; padding: 8px 0; border-bottom: 1px solid #f0f0f0; }
                                        .cat-link { color: #333; font-weight: 500; text-decoration: none; flex-grow: 1; }
                                        .toggle-icon { cursor: pointer; padding: 5px 10px; color: #FF5F1F; transition: transform 0.3s; }
                                        .cat-item.active > .cat-header .toggle-icon i:before { content: "\f068"; } /* Minus icon */
                                        .cat-item.active > .children { display: block !important; }
                                        .children li { padding-left: 15px; }
                                        .children li.active > .tertiary-children { display: block !important; }
                                        .children li.active > .cat-header .toggle-icon i:before { content: "\f068"; }
                                    </style>
                                </div>
                                
                                <!-- Price Filter -->
                                <div class="widget widget_price_filter">
                                    <h5 class="widget-title">Price Range</h5>
                                    <div class="price-filter__single">
                                        <form action="products.php" method="GET">
                                            <?php if(isset($_GET['cat'])): ?><input type="hidden" name="cat" value="<?php echo $_GET['cat']; ?>"><?php endif; ?>
                                            <?php if(isset($_GET['sub'])): ?><input type="hidden" name="sub" value="<?php echo $_GET['sub']; ?>"><?php endif; ?>
                                            <?php if(isset($_GET['ter'])): ?><input type="hidden" name="ter" value="<?php echo $_GET['ter']; ?>"><?php endif; ?>
                                            <?php if(isset($_GET['brand'])): ?><input type="hidden" name="brand" value="<?php echo $_GET['brand']; ?>"><?php endif; ?>
                                            
                                            <div class="row g-2 mb-3">
                                                <div class="col-6">
                                                    <input type="number" name="min_price" class="form-control form-control-sm" placeholder="Min" value="<?php echo $_GET['min_price'] ?? ''; ?>">
                                                </div>
                                                <div class="col-6">
                                                    <input type="number" name="max_price" class="form-control form-control-sm" placeholder="Max" value="<?php echo $_GET['max_price'] ?? ''; ?>">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm w-100" style="background: #FF5F1F;">Apply Filter</button>
                                        </form>
                                    </div>
                                </div>
                                
                                <!-- Brand Filter -->
                                <div class="widget widget_brand">
                                    <h5 class="widget-title">Brands</h5>
                                    <ul class="brand-list">
                                        <li><a href="products.php<?php echo isset($_GET['cat']) ? '?cat='.$_GET['cat'] : ''; ?>">All Brands</a></li>
                                        <?php
                                        $brands_query = mysqli_query($con, "SELECT DISTINCT brand_name FROM products WHERE brand_name IS NOT NULL AND brand_name != '' AND status = 'active'");
                                        while ($b = mysqli_fetch_assoc($brands_query)) {
                                            $active_class = (isset($_GET['brand']) && $_GET['brand'] == $b['brand_name']) ? 'style="color: #FF5F1F; font-weight: bold;"' : '';
                                            $url = "products.php?brand=" . urlencode($b['brand_name']);
                                            if(isset($_GET['cat'])) $url .= "&cat=".$_GET['cat'];
                                            echo '<li><a href="'.$url.'" '.$active_class.'>' . htmlspecialchars($b['brand_name']) . '</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        
                        <!-- Mobile Filters Drawer (Full Screen) -->
                        <div id="mobileFilterDrawer" class="mobile-filter-drawer">
                            <div class="filter-drawer-header">
                                <span class="filter-drawer-title">Filters</span>
                                <button class="filter-drawer-close" onclick="closeMobileFilter()">&times;</button>
                            </div>
                            <div class="filter-drawer-body">
                                <div class="filter-drawer-content">
                                    <div class="filter-categories">
                                        <div class="filter-category-item active" data-category="category">Category</div>
                                        <div class="filter-category-item" data-category="brand">Brand</div>
                                        <div class="filter-category-item" data-category="price">Price Range</div>
                                    </div>
                                    <div class="filter-options">
                                        <div class="filter-options-content" id="filter-options-category">
                                            <?php
                                            $m_cat_query = mysqli_query($con, "SELECT * FROM categories WHERE status = 'active'");
                                            while($m_cat = mysqli_fetch_assoc($m_cat_query)):
                                            ?>
                                            <a href="products.php?cat=<?php echo $m_cat['id']; ?>" class="filter-pill <?php echo (isset($_GET['cat']) && $_GET['cat'] == $m_cat['id']) ? 'selected' : ''; ?>">
                                                <?php echo htmlspecialchars($m_cat['category_name']); ?>
                                            </a>
                                            <?php endwhile; ?>
                                        </div>
                                        <div class="filter-options-content" id="filter-options-brand" style="display: none;">
                                            <?php
                                            $m_brand_query = mysqli_query($con, "SELECT DISTINCT brand_name FROM products WHERE brand_name IS NOT NULL AND status = 'active'");
                                            while($m_brand = mysqli_fetch_assoc($m_brand_query)):
                                            ?>
                                            <a href="products.php?brand=<?php echo urlencode($m_brand['brand_name']); ?>" class="filter-pill <?php echo (isset($_GET['brand']) && $_GET['brand'] == $m_brand['brand_name']) ? 'selected' : ''; ?>">
                                                <?php echo htmlspecialchars($m_brand['brand_name']); ?>
                                            </a>
                                            <?php endwhile; ?>
                                        </div>
                                        <div class="filter-options-content" id="filter-options-price" style="display: none;">
                                            <form action="products.php" method="GET" class="w-100 p-2">
                                                <?php foreach($_GET as $key => $val): if(!in_array($key, ['min_price', 'max_price', 'page'])): ?>
                                                    <input type="hidden" name="<?php echo $key; ?>" value="<?php echo htmlspecialchars($val); ?>">
                                                <?php endif; endforeach; ?>
                                                <div class="row g-3">
                                                    <div class="col-6">
                                                        <label class="form-label small">Min Price</label>
                                                        <input type="number" name="min_price" class="form-control" placeholder="0" value="<?php echo $_GET['min_price'] ?? ''; ?>">
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label small">Max Price</label>
                                                        <input type="number" name="max_price" class="form-control" placeholder="100000" value="<?php echo $_GET['max_price'] ?? ''; ?>">
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <button type="submit" class="btn btn-primary w-100" style="background: #FF5F1F;">Apply Price Filter</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-drawer-footer">
                                <button class="btn btn-primary w-100 filter-apply-btn"
                                        style="display: flex; justify-content: center; align-items: center;"
                                        onclick="closeMobileFilter()">
                                    DONE
                                </button>
                            </div>
                        </div>
                        
                        <!-- Main Product List (Increased Width) -->
                        <div class="col-lg-9">
                            <div class="shop-toolbar-wrap mb-4">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 text-center text-lg-start">
                                        <div class="toolbar-result">
                                            <?php
                                            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                            $limit = 12;
                                            $offset = ($page - 1) * $limit;

                                            $where = " WHERE status = 'active' ";
                                            $params = [];
                                            
                                            if (isset($_GET['cat'])) {
                                                $cat_id = (int)$_GET['cat'];
                                                $where .= " AND category_id = $cat_id ";
                                                $params['cat'] = $cat_id;
                                            } elseif (isset($_GET['sub'])) {
                                                $sub_id = (int)$_GET['sub'];
                                                $where .= " AND sub_category_id = $sub_id ";
                                                $params['sub'] = $sub_id;
                                            } elseif (isset($_GET['ter'])) {
                                                $ter_id = (int)$_GET['ter'];
                                                $where .= " AND tertiary_category_id = $ter_id ";
                                                $params['ter'] = $ter_id;
                                            }

                                            if (isset($_GET['brand']) && !empty($_GET['brand'])) {
                                                $brand_name = mysqli_real_escape_string($con, $_GET['brand']);
                                                $where .= " AND brand_name = '$brand_name' ";
                                                $params['brand'] = $brand_name;
                                            }

                                            if (isset($_GET['min_price']) && $_GET['min_price'] !== '') {
                                                $min = (float)$_GET['min_price'];
                                                $where .= " AND price >= $min ";
                                                $params['min_price'] = $min;
                                            }
                                            if (isset($_GET['max_price']) && $_GET['max_price'] !== '') {
                                                $max = (float)$_GET['max_price'];
                                                $where .= " AND price <= $max ";
                                                $params['max_price'] = $max;
                                            }

                                            if (isset($_GET['search']) && !empty($_GET['search'])) {
                                                $search = mysqli_real_escape_string($con, $_GET['search']);
                                                $where .= " AND (product_name LIKE '%$search%' OR sku LIKE '%$search%' OR brand_name LIKE '%$search%') ";
                                                $params['search'] = $search;
                                            }

                                            $sort = $_GET['sort'] ?? 'latest';
                                            $order_by = " ORDER BY id DESC ";
                                            if ($sort == 'price_low') $order_by = " ORDER BY price ASC ";
                                            if ($sort == 'price_high') $order_by = " ORDER BY price DESC ";
                                            $params['sort'] = $sort;

                                            // Count total for pagination
                                            $total_res = mysqli_query($con, "SELECT COUNT(*) as total FROM products $where");
                                            $total_row = mysqli_fetch_assoc($total_res);
                                            $total_products = $total_row['total'];
                                            $total_pages = ceil($total_products / $limit);

                                            $prod_res = mysqli_query($con, "SELECT * FROM products $where $order_by LIMIT $limit OFFSET $offset");
                                            ?>
                                            <p class="mb-0">Showing <?php echo mysqli_num_rows($prod_res); ?> of <?php echo $total_products; ?> products</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-center text-lg-end mt-3 mt-lg-0">
                                        <div class="toolbar-sorter d-flex justify-content-center justify-content-lg-end align-items-center flex-wrap gap-3">
                                            <div class="currency-switcher d-flex align-items-center">
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <button type="button" class="btn btn-outline-dark active" data-currency="INR">INR</button>
                                                    <button type="button" class="btn btn-outline-dark" data-currency="USD">USD</button>
                                                    <button type="button" class="btn btn-outline-dark" data-currency="EUR">EUR</button>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <label class="me-2 mb-0">Sort:</label>
                                                <select class="form-select border border-dark w-auto" style="border-radius: 4px;" onchange="location = this.value;">
                                                <?php
                                                function getSortUrl($s) {
                                                    $p = $_GET;
                                                    $p['sort'] = $s;
                                                    return 'products.php?' . http_build_query($p);
                                                }
                                                ?>
                                                <option value="<?php echo getSortUrl('latest'); ?>" <?php echo $sort == 'latest' ? 'selected' : ''; ?>>Latest</option>
                                                <option value="<?php echo getSortUrl('price_low'); ?>" <?php echo $sort == 'price_low' ? 'selected' : ''; ?>>Price: Low to High</option>
                                                <option value="<?php echo getSortUrl('price_high'); ?>" <?php echo $sort == 'price_high' ? 'selected' : ''; ?>>Price: High to Low</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-sm btn-dark px-3" onclick="resetAllFilters()" title="Reset all filters, sort and currency">
                                            <i class="fas fa-sync-alt me-1"></i> Reset All
                                        </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-product-wrap grid" style="max-width: 100%;">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 g-4">
                                    <?php
                                    if (mysqli_num_rows($prod_res) > 0) {
                                        while ($prod = mysqli_fetch_assoc($prod_res)) {
                                            ?>
                                            <div class="col mb-3">
                                                <!-- Product Grid Card -->
                                                <div class="product-grid-card h-100 d-flex flex-column" style="border: 1px solid #eee; background: #fff; border-radius: 12px; transition: all 0.3s ease; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,0.04);">
                                                    <div class="product-image-wrapper" style="position: relative; aspect-ratio: 0/0; background: #f9f9f9; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                                        <a href="product-details.php?id=<?php echo $prod['id']; ?>" class="w-100 h-100 d-flex align-items-center justify-content-center">
                                                            <img src="<?php echo $prod['image1']; ?>" class="img-fluid" alt="<?php echo htmlspecialchars($prod['product_name']); ?>" style="max-height: 90%; max-width: 90%; width: auto; height: auto; object-fit: contain;">
                                                        </a>
                                                        <div class="sku-tag" style="position: absolute; top: 10px; right: 10px; font-size: 8px; background: rgba(255,255,255,0.9); padding: 2px 6px; border-radius: 4px; border: 1px solid #efefef; z-index: 1;">SKU: <?php echo htmlspecialchars($prod['sku']); ?></div>
                                                    </div>
                                                    
                                                    <div class="product-details-content p-3 flex-grow-1 d-flex flex-column" style="background: #fff;">
                                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                                            <div class="brand-label">
                                                                <span class="text-primary fw-bold" style="font-size: 10px; text-transform: uppercase; letter-spacing: 0.8px;"><?php echo htmlspecialchars($prod['brand_name']); ?></span>
                                                            </div>
                                                            <div class="stock-status-badge">
                                                                <?php
                                                                $status = $prod['stock_status'];
                                                                $badge_style = 'background: #28a745; color: #fff;'; // Available
                                                                if ($status == 'Limited Stock') $badge_style = 'background: #ffc107; color: #000;';
                                                                if ($status == 'Out of Stock') $badge_style = 'background: #dc3545; color: #fff;';
                                                                ?>
                                                                <span style="font-size: 8px; font-weight: 700; padding: 2px 6px; border-radius: 10px; text-transform: uppercase; <?php echo $badge_style; ?>">
                                                                    <?php echo $status; ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <h6 class="product-name-heading mb-2" style="font-size: 13.5px; line-height: 1.4; height: 38px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; margin-top: 2px;">
                                                            <a href="product-details.php?id=<?php echo $prod['id']; ?>" class="text-decoration-none text-dark hover-blue"><?php echo htmlspecialchars($prod['product_name']); ?></a>
                                                        </h6>
                                                        <div class="price-section mt-auto mb-2 text-center">
                                                            <?php if (isset($prod['mrp']) && $prod['mrp'] > $prod['price']): ?>
                                                                <span class="mrp-val mr-2 text-muted" style="text-decoration: line-through; font-size: 13px;">Rs. <?php echo number_format($prod['mrp'], 2); ?></span>
                                                            <?php endif; ?>
                                                            <div class="current-price-val d-inline-block" style="font-weight: 800; font-size: 16px; color: #FF5F1F;">Rs. <?php echo number_format($prod['price'], 2); ?></div>
                                                        </div>

                                                        <!-- Quantity Selector -->
                                                        <div class="quantity-wrapper mb-3 d-flex justify-content-center">
                                                            <div class="quantity-input d-flex align-items-center" style="border: 1px solid #ddd; border-radius: 4px; overflow: hidden;">
                                                                <button class="qty-btn quantity-decrease" style="border: none; background: #f8f9fa; padding: 2px 10px; font-weight: bold;">-</button>
                                                                <input type="number" min="1" value="1" class="quantity-number text-center" style="width: 45px; border: none; font-size: 12px; font-weight: 600; background: transparent; -moz-appearance: textfield;">
                                                                <button class="qty-btn quantity-increase" style="border: none; background: #f8f9fa; padding: 2px 10px; font-weight: bold;">+</button>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="grid-actions-group">
                                                            <div class="row g-2">
                                                                <div class="col-12">
                                                                    <button class="btn btn-primary btn-sm w-100 py-2 d-flex align-items-center justify-content-center gap-2" style="background: #FF5F1F; border: none; font-size: 11px; font-weight: 700; border-radius: 6px;" onclick="addToCart({id: <?php echo $prod['id']; ?>, title: '<?php echo addslashes($prod['product_name']); ?>', sku: '<?php echo addslashes($prod['sku']); ?>', price: <?php echo $prod['price']; ?>, image: '<?php echo $prod['image1']; ?>', qty: this.closest('.product-details-content').querySelector('.quantity-number').value})">
                                                                        <i class="fas fa-shopping-cart"></i> ADD TO CART
                                                                    </button>
                                                                </div>
                                                                <div class="col-12">
                                                                    <a href="product-details.php?id=<?php echo $prod['id']; ?>" class="btn btn-warning btn-sm w-100 py-2 d-flex align-items-center justify-content-center gap-2" style="background: #0B0B45; color: #fff; border: none; font-size: 11px; font-weight: 700; border-radius: 6px;">
                                                                        <i class="fas fa-bolt"></i> BUY NOW
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        echo "<div class='col-12 text-center'><div class='alert alert-info py-4'>No products found matching your catalog.</div></div>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <style>
                                .hover-blue:hover { color: #FF5F1F !important; }
                                .product-grid-card:hover { transform: translateY(-5px); box-shadow: 0 8px 24px rgba(0,0,0,0.08) !important; border-color: #FF5F1F !important; }
                            </style>
                            
                            <!-- Pagination -->
                            <div class="page-pagination section-space--mt_60 text-center">
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <?php if($page > 1): ?>
                                            <li class="page-item"><a class="page-link" href="products.php?<?php $p = $_GET; $p['page'] = $page - 1; echo http_build_query($p); ?>"><i class="fas fa-chevron-left"></i></a></li>
                                        <?php endif; ?>

                                        <?php for($i = 1; $i <= $total_pages; $i++): ?>
                                            <li class="page-item <?php echo $page == $i ? 'active' : ''; ?>">
                                                <a class="page-link" href="products.php?<?php $p = $_GET; $p['page'] = $i; echo http_build_query($p); ?>"><?php echo $i; ?></a>
                                            </li>
                                        <?php endfor; ?>

                                        <?php if($page < $total_pages): ?>
                                            <li class="page-item"><a class="page-link" href="products.php?<?php $p = $_GET; $p['page'] = $page + 1; echo http_build_query($p); ?>"><i class="fas fa-chevron-right"></i></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <style>
        /* Overall Page & Product Grid Improvements */
        .shop-page-wrapper {
            background-color: #fbfbfb;
        }
        .product-row {
            background: #fff;
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
            overflow: hidden;
            border: 1px solid rgba(0,0,0,0.05) !important;
        }
        .product-row:hover {
            box-shadow: 0 14px 28px rgba(0,0,0,0.05), 0 10px 10px rgba(0,0,0,0.02);
            transform: translateY(-2px);
            border-color: #FF5F1F !important;
        }
        .add-to-cart-btn {
            background-color: #FF5F1F !important;
            color: #fff !important;
            border: none !important;
            border-radius: 8px !important;
            padding: 12px 20px !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
            transition: all 0.3s ease !important;
            box-shadow: 0 4px 15px rgba(11, 11, 69, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .add-to-cart-btn:hover {
            background-color: #0B0B45 !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(11, 11, 69, 0.25);
        }
.btn-buy-now {
            background-color: #0B0B45 !important;
            color: #fff !important;
            border: none !important;
            border-radius: 8px !important;
            padding: 12px 20px !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
            transition: all 0.3s ease !important;
            box-shadow: 0 4px 15px rgba(11, 11, 69, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-buy-now:hover {
            background-color: #0B0B45 !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(11, 11, 69, 0.25);
            color: #fff !important;
        }
        .quantity-input {
            border: 2px solid #FF5F1F !important;
            border-radius: 8px !important;
            overflow: hidden;
            background: #fff;
            display: flex;
            align-items: center;
        }
        .quantity-input .qty-btn {
            background: #FF5F1F !important;
            color: #fff !important;
            border: none !important;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            transition: all 0.2s;
            padding: 0;
            text-decoration: none !important;
        }
        .quantity-input .qty-btn:hover {
            background: #0B0B45 !important;
        }
        .quantity-number {
            width: 45px;
            border: none !important;
            text-align: center;
            font-weight: 700;
            color: #333;
            font-size: 14px;
        }
        .current-price {
            font-weight: 700;
            color: #FF5F1F !important;
        }
        .product-title a {
            color: #333;
            font-weight: 700;
            font-size: 18px;
        }
        .product-title a:hover {
            color: #FF5F1F;
        }
        
        /* Updated Sidebar Styling */
        .sidebar-wrap {
            padding-right: 20px;
        }
        .widget {
            margin-bottom: 40px;
            padding: 20px;
            background: #fff;
            border: 1px solid #f0f0f0;
            border-radius: 4px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }
        .widget-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #FF5F1F;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
        }
        .category-list, .brand-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .category-list li, .brand-list li {
            margin-bottom: 12px;
        }
        .category-list li a, .brand-list li a {
            color: #555;
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
            font-size: 15px;
        }
        .category-list li a:hover, .brand-list li a:hover {
            color: #FF5F1F;
            padding-left: 5px;
        }
        .children {
            list-style: none;
            padding-left: 20px;
            margin-top: 8px;
            border-left: 1px solid #eee;
        }
        .children li {
            margin-bottom: 8px;
        }
        .children li a {
            font-size: 14px;
            color: #777;
        }
        
        /* Existing Mobile Filter styles... */
        .mobile-filter-drawer {

            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            z-index: 9999;
            flex-direction: column;
        }
        
        .mobile-filter-drawer.active {
            display: flex;
        }
        
        .filter-drawer-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 20px;
            border-bottom: 1px solid #e0e0e0;
            background: #fff;
            flex-shrink: 0;
        }
        
        .filter-drawer-title {
            font-weight: 700;
            font-size: 18px;
            color: #333;
        }
        
        .filter-drawer-close {
            background: none;
            border: none;
            font-size: 28px;
            color: #666;
            cursor: pointer;
            padding: 0;
            line-height: 1;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .filter-drawer-close:hover {
            color: #333;
        }
        
        .filter-drawer-body {
            flex: 1;
            overflow: hidden;
        }
        
        .filter-drawer-content {
            display: flex;
            height: 100%;
        }
        
        .filter-categories {
            width: 35%;
            min-width: 100px;
            background: #f8f9fa;
            overflow-y: auto;
            border-right: 1px solid #e0e0e0;
        }
        
        .filter-category-item {
            padding: 14px 16px;
            font-size: 14px;
            color: #555;
            cursor: pointer;
            border-bottom: 1px solid #eee;
            transition: all 0.2s ease;
        }
        
        .filter-category-item:hover {
            background: #eee;
        }
        
        .filter-category-item.active {
            background: #fff;
            color: #FF5F1F;
            font-weight: 600;
            border-left: 3px solid #FF5F1F;
        }
        
        .filter-options {
            width: 65%;
            overflow-y: auto;
            padding: 16px;
        }
        
        .filter-options-content {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .filter-pill {
            padding: 8px 16px;
            border: 1px solid #ddd;
            border-radius: 20px;
            background: #fff;
            color: #555;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .filter-pill:hover {
            border-color: #FF5F1F;
            color: #FF5F1F;
        }
        
        .filter-pill.selected {
            background: #FF5F1F;
            border-color: #FF5F1F;
            color: #fff;
        }
        
        .filter-drawer-footer {
            padding: 16px 20px;
            border-top: 1px solid #e0e0e0;
            background: #fff;
            flex-shrink: 0;
        }
        
        .filter-apply-btn {
            background-color: #FF5F1F !important;
            border-color: #FF5F1F !important;
            padding: 14px 24px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 4px;
        }
        
        .filter-apply-btn:hover {
            background-color: #0B0B45 !important;
            border-color: #0B0B45 !important;
        }
        
        body.filter-open {
            overflow: hidden;
        }
        
        body.filter-open .header-area--default,
        body.filter-open .preloader-activate {
            display: none !important;
        }
        
        @media (min-width: 992px) {
            .mobile-filter-drawer {
                display: none !important;
            }
        }
        /* Hide standard spinners */
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
        }
    </style>

    <script>
        // Quantity selector functionality
        document.querySelectorAll('.quantity-decrease').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.closest('.quantity-input').querySelector('.quantity-number');
                let value = parseInt(input.value) || 1;
                if(value > 1) {
                    input.value = value - 1;
                    input.dispatchEvent(new Event('change'));
                }
            });
        });
        
        document.querySelectorAll('.quantity-increase').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.closest('.quantity-input').querySelector('.quantity-number');
                let value = parseInt(input.value) || 0;
                input.value = value + 1;
                input.dispatchEvent(new Event('change'));
            });
        });

        document.querySelectorAll('.quantity-number').forEach(input => {
            input.addEventListener('change', function() {
                let value = parseInt(this.value);
                if (isNaN(value) || value < 1) {
                    this.value = 1;
                }
            });
            input.addEventListener('keyup', function() {
                this.dispatchEvent(new Event('change'));
            });
        });
        
        // Mobile Filter Drawer Functions
        function openMobileFilter() {
            document.getElementById('mobileFilterDrawer').classList.add('active');
            document.body.classList.add('filter-open');
        }
        
        function closeMobileFilter() {
            document.getElementById('mobileFilterDrawer').classList.remove('active');
            document.body.classList.remove('filter-open');
        }
        
        // Filter category selection
        document.querySelectorAll('.filter-category-item').forEach(item => {
            item.addEventListener('click', function() {
                // Remove active class from all categories
                document.querySelectorAll('.filter-category-item').forEach(cat => {
                    cat.classList.remove('active');
                });
                // Add active class to clicked category
                this.classList.add('active');
                
                // Hide all option panels
                document.querySelectorAll('.filter-options-content').forEach(panel => {
                    panel.style.display = 'none';
                });
                
                // Show selected option panel
                const category = this.getAttribute('data-category');
                document.getElementById('filter-options-' + category).style.display = 'flex';
            });
        });
        
        // Filter pill selection (toggle)
        document.querySelectorAll('.filter-pill').forEach(pill => {
            pill.addEventListener('click', function() {
                this.classList.toggle('selected');
            });
        });
        
        // Category Toggle Functionality
        document.querySelectorAll('.toggle-icon').forEach(icon => {
            icon.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const li = this.closest('li');
                const submenu = li.querySelector('ul');
                const iconTag = this.querySelector('i');
                
                if (submenu) {
                    if (submenu.style.display === 'none' || submenu.style.display === '') {
                        submenu.style.display = 'block';
                        iconTag.classList.remove('fa-plus');
                        iconTag.classList.add('fa-minus');
                        li.classList.add('active');
                    } else {
                        submenu.style.display = 'none';
                        iconTag.classList.remove('fa-minus');
                        iconTag.classList.add('fa-plus');
                        li.classList.remove('active');
                    }
                }
            });
        });

        // Currency Conversion Logic (using globals from header.php)
        function applyCurrency(currency) {
            const rate = window.exchangeRates[currency] || 1;
            const symbol = window.currencySymbols[currency];
            
            // Update all price displays on this page
            document.querySelectorAll('.current-price').forEach(el => {
                const basePrice = parseFloat(el.getAttribute('data-base-price'));
                if (!isNaN(basePrice)) {
                    const converted = basePrice * rate;
                    el.textContent = symbol + converted.toLocaleString(undefined, {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
                }
            });

            // Update currency switcher UI
            document.querySelectorAll('.currency-switcher .btn').forEach(btn => {
                if (btn.getAttribute('data-currency') === currency) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });

            localStorage.setItem('selectedCurrency', currency);
            window.currentCurrency = currency;
            
            // Also update the global cart display
            if (typeof updateCartDisplay === 'function') {
                updateCartDisplay();
            }
        }

        function resetAllFilters() {
            // Reset currency to INR in localStorage
            localStorage.setItem('selectedCurrency', 'INR');
            // Redirect to products.php without any params to clear filters/sort
            window.location.href = 'products.php';
        }

        document.querySelectorAll('.currency-switcher .btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const currency = this.getAttribute('data-currency');
                applyCurrency(currency);
            });
        });

        // The rates are initialized in header.php, apply the saved currency here
        if (window.exchangeRates && window.exchangeRates.USD !== 0) {
            applyCurrency(window.currentCurrency);
        }

        // Close filter on escape key
        document.addEventListener('keydown', function(e) {
            if(e.key === 'Escape') {
                closeMobileFilter();
            }
        });
    </script>

<?php include 'includes/footer.php'; ?>
