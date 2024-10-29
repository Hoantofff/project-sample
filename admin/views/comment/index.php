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
            Danh Sách <?= $title ?? '' ?>
            <a href="<?= BASE_URL_ADMIN ?>?act=category-create" class="btn btn-secondary btn-sm">Create Category</a>

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
                        <th>Tên Sản Phẩm</th>
                        <th>Ảnh Sản Phẩm</th>
                        <th>Lượt Bình Luận</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot> 
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Ảnh Sản Phẩm</th>
                        <th>Lượt Bình Luận</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($listAllComment as $comment): ?>
                        <tr>
                            <td><?= $comment['p_title'] ?></td>
                            <td>
                                <div style="height: 100px; width: 100px">
                                    <img style="max-width: 100%; max-height: 100%;" src="<?= BASE_URL . $comment['p_image'] ?>" >
                                </div>
                            </td>
                            <td><?= $comment['comment_count'] ?></td>
                            <td>
                                <a href="<?= BASE_URL_ADMIN  ?>?act=commentForProduct&id=<?= $comment['p_id'] ?>" class="btn btn-outline-primary btn-sm">Show</a>
                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

