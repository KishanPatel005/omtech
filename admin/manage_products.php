<?php
ob_start();
include '../includes/conneaction.php';

$message = "";
$product = null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    $res = mysqli_query($con, "SELECT * FROM products WHERE id = $id");
    $product = mysqli_fetch_assoc($res);
}

if (isset($_POST['save_product'])) {
    $name = mysqli_real_escape_string($con, $_POST['product_name']);
    $sku = mysqli_real_escape_string($con, $_POST['sku']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $brand = mysqli_real_escape_string($con, $_POST['brand_name']);
    $cat_id = $_POST['category_id'] ?: 'NULL';
    $sub_cat_id = $_POST['sub_category_id'] ?: 'NULL';
    $ter_cat_id = $_POST['tertiary_category_id'] ?: 'NULL';
    $short_desc = mysqli_real_escape_string($con, $_POST['short_description']);
    $short_tech = mysqli_real_escape_string($con, $_POST['short_technical_specifications']);
    $desc = mysqli_real_escape_string($con, $_POST['description']);
    $long_spec = mysqli_real_escape_string($con, $_POST['long_specifications']);

    $img_paths = [];
    for ($i = 1; $i <= 4; $i++) {
        $field = "image" . $i;
        if (isset($_FILES[$field]) && $_FILES[$field]['error'] == 0) {
            $ext = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
            $img_name = "prod_" . $i . "_" . time() . "_" . rand(1000, 9999) . "." . $ext;
            if (move_uploaded_file($_FILES[$field]['tmp_name'], "../uploads/products/" . $img_name)) {
                $img_paths[$i] = "uploads/products/" . $img_name;
                // Delete old image if updating
                if ($product && !empty($product[$field]) && file_exists("../" . $product[$field])) {
                    unlink("../" . $product[$field]);
                }
            }
        } else {
            $img_paths[$i] = $product ? $product[$field] : "";
        }
    }

    if ($id) {
        $sql = "UPDATE products SET 
                product_name='$name', sku='$sku', price='$price', brand_name='$brand', 
                category_id=$cat_id, sub_category_id=$sub_cat_id, 
                tertiary_category_id=$ter_cat_id, short_description='$short_desc', 
                short_technical_specifications='$short_tech', description='$desc', 
                long_specifications='$long_spec', image1='{$img_paths[1]}', 
                image2='{$img_paths[2]}', image3='{$img_paths[3]}', image4='{$img_paths[4]}' 
                WHERE id = $id";
    } else {
        $sql = "INSERT INTO products (product_name, sku, price, brand_name, category_id, sub_category_id, tertiary_category_id, short_description, short_technical_specifications, description, long_specifications, image1, image2, image3, image4) 
                VALUES ('$name', '$sku', '$price', '$brand', $cat_id, $sub_cat_id, $ter_cat_id, '$short_desc', '$short_tech', '$desc', '$long_spec', '{$img_paths[1]}', '{$img_paths[2]}', '{$img_paths[3]}', '{$img_paths[4]}')";
    }

    if (mysqli_query($con, $sql)) {
        header("Location: products.php?msg=success");
        exit();
    } else {
        $message = "<div class='alert alert-danger'>Error saving product: " . mysqli_error($con) . "</div>";
    }
}

include 'header.php';
$categories = mysqli_query($con, "SELECT * FROM categories");
$sub_categories = mysqli_query($con, "SELECT * FROM sub_categories");
$tertiary_categories = mysqli_query($con, "SELECT * FROM tertiary_categories");
$brands_res = mysqli_query($con, "SELECT DISTINCT brand_name FROM products WHERE brand_name IS NOT NULL AND brand_name != ''");
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0"><?php echo $id ? 'Edit' : 'Add'; ?> Product</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php echo $message; ?>
            <form method="post" enctype="multipart/form-data">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="product_name" class="form-control" value="<?php echo $product ? $product['product_name'] : ''; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>SKU</label>
                                    <input type="text" name="sku" class="form-control" value="<?php echo $product ? $product['sku'] : ''; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" step="0.01" name="price" class="form-control" value="<?php echo $product ? $product['price'] : ''; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Brand Name</label>
                                    <select name="brand_name" id="brand_name" class="form-control select2" style="width: 100%;">
                                        <option value="">Select or Create</option>
                                        <?php if($product && $product['brand_name']): ?>
                                            <option value="<?php echo htmlspecialchars($product['brand_name']); ?>" selected><?php echo htmlspecialchars($product['brand_name']); ?></option>
                                        <?php endif; ?>
                                        <?php while($b = mysqli_fetch_assoc($brands_res)): ?>
                                            <?php if($product && $product['brand_name'] == $b['brand_name']) continue; ?>
                                            <option value="<?php echo htmlspecialchars($b['brand_name']); ?>"><?php echo htmlspecialchars($b['brand_name']); ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select</option>
                                        <?php while($c = mysqli_fetch_assoc($categories)): ?>
                                            <option value="<?php echo $c['id']; ?>" <?php if($product && $product['category_id'] == $c['id']) echo 'selected'; ?>><?php echo $c['category_name']; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sub Category</label>
                                    <select name="sub_category_id" class="form-control">
                                        <option value="">Select</option>
                                        <?php while($sc = mysqli_fetch_assoc($sub_categories)): ?>
                                            <option value="<?php echo $sc['id']; ?>" <?php if($product && $product['sub_category_id'] == $sc['id']) echo 'selected'; ?>><?php echo $sc['sub_category_name']; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tertiary Category</label>
                                    <select name="tertiary_category_id" class="form-control">
                                        <option value="">Select</option>
                                        <?php while($tc = mysqli_fetch_assoc($tertiary_categories)): ?>
                                            <option value="<?php echo $tc['id']; ?>" <?php if($product && $product['tertiary_category_id'] == $tc['id']) echo 'selected'; ?>><?php echo $tc['tertiary_category_name']; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6"><div class="form-group"><label>Short Description</label><textarea name="short_description" id="short_description" class="form-control" rows="3"><?php echo $product ? $product['short_description'] : ''; ?></textarea></div></div>
                            <div class="col-md-6"><div class="form-group"><label>Short technical Specifications</label><textarea name="short_technical_specifications" id="short_technical_specifications" class="form-control" rows="3"><?php echo $product ? $product['short_technical_specifications'] : ''; ?></textarea></div></div>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4"><?php echo $product ? $product['description'] : ''; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Long Specifications</label>
                            <textarea name="long_specifications" id="long_specifications" class="form-control" rows="4"><?php echo $product ? $product['long_specifications'] : ''; ?></textarea>
                        </div>

                        <div class="row">
                            <?php for($i=1; $i<=4; $i++): ?>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Image <?php echo $i; ?></label>
                                    <?php if($product && $product["image$i"]): ?>
                                        <div class="mb-2"><img src="../<?php echo $product["image$i"]; ?>" width="60"></div>
                                    <?php endif; ?>
                                    <input type="file" name="image<?php echo $i; ?>" class="form-control-file" accept="image/*">
                                </div>
                            </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="save_product" class="btn btn-primary">Save Product</button>
                        <a href="products.php" class="btn btn-default">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<?php include 'footer.php'; ?>

<script>
    $(document).ready(function() {
        $('#brand_name').select2({
            tags: true,
            placeholder: "Select or type to create new",
            allowClear: true
        });
    });

    CKEDITOR.replace('short_description');
    CKEDITOR.replace('short_technical_specifications');
    CKEDITOR.replace('description');
    CKEDITOR.replace('long_specifications');
</script>
