<div class="container-fluid px-4">
    <h1 class="mt-4"><?= $title ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>?act=gallery">Danh Sách Gallery</a></li>
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
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                    <div class="mb-3 mt-3">
                            <label for="role_id" class="form-label">Sản Phẩm:</label>
                            <select name="product_id" class="form-control">
                                <?php foreach ($products as $product): ?>
                                    <option <?= isset($_SESSION['data']) && $_SESSION['data']['product_id'] == $product['p_id'] ? 'selected' : null ?> value="<?= $product['p_id'] ?>"><?= $product['p_title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input class="form-control" type="file" multiple="multiple" name="thumbnail[]">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tạo Mới</button>
            </form>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
} ?>