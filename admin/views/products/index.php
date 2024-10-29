<div class="container-fluid px-4">
    <h1 class="mt-4"><?= $title ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>">Dashboard</a></li>
        <li class="breadcrumb-item active"><?= $title ?></li>
    </ol>
    <!-- <div class="card mb-4">
        <div class="card-body">
            DataTables is a third party plugin that is used to generate the demo table below. For more
            information about DataTables, please visit the.
        </div>
    </div> -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Danh Sách <?= $title ?>
            <a href="<?= BASE_URL_ADMIN ?>?act=product-create" class="btn btn-secondary btn-sm">Create Product</a>

            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <ul>
                        <li><?= $_SESSION['success'] ?></li>
                    </ul>
                    <?php unset($_SESSION['success']) ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>view_count</th>
                        <th>Quantity</th>
                        <th>Weight</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>view_count</th>
                        <th>Quantity</th>
                        <th>Weight</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= $product['p_id'] ?> </td>
                            <td><?= $product['p_title'] ?></td>
                            <td><?= number_format($product['p_price'], 0, ',', '.') ?> VNĐ</td>
                            <td><?= $product['p_discount'] ?></td>
                            <td><?= $product['p_created_at'] ?></td>
                            <td><?= $product['p_updated_at'] ?></td>
                            <td><?= $product['p_view_count'] ?></td>
                            <td><?= $product['p_quantity'] ?></td>
                            <td><?= $product['p_weight'] ?></td>
                            <td>
                                <div style="height: 100px; width: 100px">
                                    <img style="max-width: 100%; max-height: 100%;" src="<?= BASE_URL . $product['p_image'] ?>" >
                                </div>
                            </td>
                            <td><?= $product['c_name'] ?></td>
                            <td>
                                <a href="<?= BASE_URL_ADMIN ?>?act=product-detail&id=<?= $product['p_id'] ?>" class="btn btn-outline-primary btn-sm">Show</a>
                                <a href="<?= BASE_URL_ADMIN ?>?act=product-update&id=<?= $product['p_id'] ?>" class="btn btn-outline-primary btn-sm">Update</a>
                                <a href="<?= BASE_URL_ADMIN ?>?act=product-delete&id=<?= $product['p_id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa hay không?')" class="btn btn-outline-primary btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>