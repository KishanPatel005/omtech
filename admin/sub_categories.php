<?php
include 'header.php';
include '../includes/conneaction.php';

$message = "";

// Handle Add Sub Category
if (isset($_POST['add_sub_category'])) {
    $cat_id = $_POST['category_id'];
    $name = mysqli_real_escape_string($con, $_POST['sub_category_name']);
    
    $sql = "INSERT INTO sub_categories (category_id, sub_category_name) VALUES ($cat_id, '$name')";
    if (mysqli_query($con, $sql)) {
        $message = "<div class='alert alert-success'>Sub Category added successfully!</div>";
    }
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM sub_categories WHERE id = $id");
    $message = "<div class='alert alert-danger'>Sub Category deleted!</div>";
}

$categories_list = mysqli_query($con, "SELECT * FROM categories");
$sub_categories = mysqli_query($con, "SELECT sc.*, c.category_name FROM sub_categories sc JOIN categories c ON sc.category_id = c.id ORDER BY sc.id DESC");
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sub Categories Management</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php echo $message; ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Sub Category</h3>
                        </div>
                        <form method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                        <?php while($c = mysqli_fetch_assoc($categories_list)): ?>
                                            <option value="<?php echo $c['id']; ?>"><?php echo $c['category_name']; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sub Category Name</label>
                                    <input type="text" name="sub_category_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="add_sub_category" class="btn btn-primary">Add Sub Category</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sub Category List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = mysqli_fetch_assoc($sub_categories)): ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['category_name']; ?></td>
                                        <td><?php echo $row['sub_category_name']; ?></td>
                                        <td>
                                            <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'footer.php'; ?>
