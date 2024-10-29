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
            <a href="<?= BASE_URL_ADMIN ?>?act=user-create" class="btn btn-secondary btn-sm">Create User</a>

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
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user['u_id'] ?> </td>
                            <td><?= $user['u_full_name'] ?></td>
                            <td><?= $user['u_email'] ?></td>
                            <td><?= $user['u_phone'] ?></td>
                            <td><?= $user['u_address'] ?></td>
                            <td><?= $user['r_name'] ?></td>
                            <td>
                                <div style="height: 100px; width: 100px">
                                    <img style="max-width: 100%; max-height: 100%;" src="<?= BASE_URL . $user['u_image'] ?>" >
                                </div>
                            </td>
                            <td>
                                <a href="<?= BASE_URL_ADMIN ?>?act=user-detail&id=<?= $user['u_id'] ?>" class="btn btn-outline-primary btn-sm">Show</a>
                                <a href="<?= BASE_URL_ADMIN ?>?act=user-update&id=<?= $user['u_id'] ?>" class="btn btn-outline-primary btn-sm">Update</a>
                                <a href="<?= BASE_URL_ADMIN ?>?act=user-delete&id=<?= $user['u_id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa hay không?')" class="btn btn-outline-primary btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>