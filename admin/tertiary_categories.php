<?php
include 'header.php';
include '../includes/conneaction.php';

$message = "";

// Handle Add Tertiary Category
if (isset($_POST['add_tertiary'])) {
    $sub_cat_id = $_POST['sub_category_id'];
    $name = mysqli_real_escape_string($con, $_POST['tertiary_name']);
    
    $sql = "INSERT INTO tertiary_categories (sub_category_id, tertiary_category_name) VALUES ($sub_cat_id, '$name')";
    if (mysqli_query($con, $sql)) {
        $message = "<div class='alert alert-success'>Tertiary Category added successfully!</div>";
    }
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM tertiary_categories WHERE id = $id");
    $message = "<div class='alert alert-danger'>Tertiary Category deleted!</div>";
}

$sub_categories_list = mysqli_query($con, "SELECT sc.*, c.category_name FROM sub_categories sc JOIN categories c ON sc.category_id = c.id");
$tertiary = mysqli_query($con, "SELECT tc.*, sc.sub_category_name FROM tertiary_categories tc JOIN sub_categories sc ON tc.sub_category_id = sc.id ORDER BY tc.id DESC");
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tertiary Categories Management</h1>
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
                            <h3 class="card-title">Add Tertiary Category</h3>
                        </div>
                        <form method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Select Sub Category</label>
                                    <select name="sub_category_id" class="form-control" required>
                                        <option value="">Select Sub Category</option>
                                        <?php while($sc = mysqli_fetch_assoc($sub_categories_list)): ?>
                                            <option value="<?php echo $sc['id']; ?>"><?php echo $sc['category_name']; ?> -> <?php echo $sc['sub_category_name']; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tertiary Category Name</label>
                                    <input type="text" name="tertiary_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="add_tertiary" class="btn btn-primary">Add Tertiary Category</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tertiary Category List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Sub Category</th>
                                        <th>Tertiary Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = mysqli_fetch_assoc($tertiary)): ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['sub_category_name']; ?></td>
                                        <td><?php echo $row['tertiary_category_name']; ?></td>
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
