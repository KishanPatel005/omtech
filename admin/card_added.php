<?php
ob_start();
include '../includes/conneaction.php';

$message = "";

include 'header.php';

$cart_data = mysqli_query($con, "SELECT ca.*, p.product_name, p.image1, p.sku 
                                 FROM cart_added ca 
                                 JOIN products p ON ca.product_id = p.id 
                                 ORDER BY ca.created_at DESC");
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Cart Add History (Leads)</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Customer Interests Tracked</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="cartTable">
                        <thead>
                            <tr>
                                <th>Date & Time</th>
                                <th>Customer Name</th>
                                <th>Contact Info</th>
                                <th>Product Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($cart_data)): ?>
                            <tr>
                                <td><?php echo date('d-M-Y H:i', strtotime($row['created_at'])); ?></td>
                                <td><?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></td>
                                <td>
                                    <div><i class="fas fa-envelope text-primary"></i> <?php echo htmlspecialchars($row['email']); ?></div>
                                    <div><i class="fas fa-phone text-success"></i> <?php echo htmlspecialchars($row['phone']); ?></div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="../<?php echo $row['image1']; ?>" width="40" class="mr-2">
                                        <div>
                                            <strong><?php echo htmlspecialchars($row['product_name']); ?></strong><br>
                                            <small class="text-muted">SKU: <?php echo htmlspecialchars($row['sku']); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="mailto:<?php echo $row['email']; ?>" class="btn btn-sm btn-info" title="Send Email">
                                        <i class="fas fa-reply"></i>
                                    </a>
                                    <a href="tel:<?php echo $row['phone']; ?>" class="btn btn-sm btn-success" title="Call">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'footer.php'; ?>
