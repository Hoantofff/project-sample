<div class="container-fluid px-4">
    <h1 class="mt-4"><?= $title ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>?act=products">Danh Sách Product</a></li>
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
            <?= $title ?>
            <?php if (isset($_SESSION['errors'])) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($_SESSION['errors'] as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php unset($_SESSION['errors']) ?>
                </div>
            <?php endif; ?>
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
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title"
                                value="<?= $product['p_title'] ?>">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="price" class="form-label">Price:</label>
                            <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price"
                                value="<?= $product['p_price'] ?>">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="discount" class="form-label">Discount:</label>
                            <input type="text" class="form-control" id="discount" placeholder="Enter discount" name="discount"
                                value="<?= $product['p_discount'] ?>">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" placeholder="Enter Quantity" name="quantity"
                                value="<?= $product['p_quantity'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="weight" class="form-label">weight:</label>
                            <input type="text" class="form-control" id="weight" placeholder="Enter Weight (...kg)" name="weight"
                                value="<?= $product['p_weight'] ?>">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="role_id" class="form-label">Category:</label>
                            <select name="cate_id" class="form-control">
                                <?php foreach ($categories as $category): ?>
                                    <option <?= $product['p_cate_id'] == $category['id'] ? 'selected' : null ?> value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" name="image">
                        </div>
                        <div class="mb-3 mt-3">
                            <div class="form-label" style="height: 60px; width: 60px">
                                <img style="max-width: 100%; max-height: 100%;" src="<?= BASE_URL . $product['p_image'] ?>">
                            </div>
                        </div>

                    </div>
                    <div class="mb-3 mt-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea name="description" id="description"><?= $product['p_description'] ?></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
} ?>