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
            <a href="<?= BASE_URL_ADMIN ?>?act=post-create" class="btn btn-secondary btn-sm">Create Post</a>

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
                        <th>Image Post</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Category</th>
                        <th>view_count</th>
                        <th>Author</th>
                        <th>Avatar Author</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Image Post</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Category</th>
                        <th>view_count</th>
                        <th>Author</th>
                        <th>Avatar Author</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            <td><?= $post['p_id'] ?> </td>
                            <td><?= $post['p_title'] ?></td>
                            <td>
                                <div style="height: 100px; width: 100px">
                                    <img style="max-width: 100%; max-height: 100%;" src="<?= BASE_URL . $post['p_image'] ?>">
                                </div>
                            </td>
                            <td><?= $post['p_created_at'] ?></td>
                            <td><?= $post['p_updated_at'] ?></td>
                            <td><?= $post['c_name'] ?></td>
                            <td><?= $post['p_view_count'] ?></td>
                            <td><?= $post['a_name'] ?></td>
                            <td>
                                <div style="height: 100px; width: 100px">
                                    <img style="max-width: 100%; max-height: 100%;" src="<?= BASE_URL . $post['a_avatar'] ?>">
                                </div>
                            </td>
                            <td>
                                <a href="<?= BASE_URL_ADMIN ?>?act=post-detail&id=<?= $post['p_id'] ?>" class="btn btn-outline-primary btn-sm">Show</a>
                                <a href="<?= BASE_URL_ADMIN ?>?act=post-update&id=<?= $post['p_id'] ?>" class="btn btn-outline-primary btn-sm">Update</a>
                                <a href="<?= BASE_URL_ADMIN ?>?act=post-delete&id=<?= $post['p_id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa hay không?')" class="btn btn-outline-primary btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>