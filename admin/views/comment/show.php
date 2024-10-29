<div class="container-fluid px-4">
    <h1 class="mt-4"><?= $title ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>?act=comment">Danh Sách Bình Luận</a></li>
        <li class="breadcrumb-item active"><?= $title ?></li>
    </ol>
    <!-- <div class="card mb-4">
        <div class="card-body">
            DataTables is a third party plugin that is used to generate the demo table below. For more
            information about DataTables, please visit the.
        </div>
    </div> -->
    <div class=" mb-4 d-flex">
        
        <table class="table w-25 " >
            <thead >
                <tr class="table-secondary">
                    <th>Tên Sản Phẩm</th>
                    <th>Hình Ảnh</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $product['p_title'] ?></td>
                    <td>
                        <div style="height: 100px; width: 100px">
                            <img style="max-width: 100%; max-height: 100%;" src="<?= BASE_URL . $product['p_image'] ?>">
                        </div>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Bình Luận Sản phẩm <?= $product['p_title'] ?>

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
                        <th>Id Bình Luận</th>
                        <th>Id User</th>
                        <th>Name User</th>
                        <th>Nội Dung</th>
                        <th>Thời Gian </th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id Bình Luận</th>
                        <th>Id User</th>
                        <th>Name User</th>
                        <th>Nội Dung</th>
                        <th>Thời Gian </th>
                        <th>Action </th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($getCommentForProduct as $comment): ?>
                        <tr>
                            <td><?= $comment['c_id'] ?></td>
                            <td><?= $comment['c_user_id'] ?></td>
                            <td><?= $comment['u_full_name'] ?></td>
                            <td><?= $comment['c_content'] ?></td>
                            <td><?= $comment['c_date_comment'] ?></td>
                            <td><a href="<?= BASE_URL_ADMIN ?>?act=comment-delete&id=<?= $comment['c_id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa hay không?')" class="btn btn-outline-primary btn-sm">Delete</a></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>