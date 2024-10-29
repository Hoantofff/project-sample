<div class="container-fluid px-4">
    <h1 class="mt-4"><?= $title ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>?act=users">Danh Sách User</a></li>
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
                            <label for="full_name" class="form-label">full Name:</label>
                            <input type="text" class="form-control" id="full_name" placeholder="Enter Full Name" name="full_name" value="<?= $user['u_full_name'] ?>">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?= $user['u_email'] ?>">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone" value="<?= $user['u_phone'] ?>">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" name="image">
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" value="<?= $user['u_address'] ?>">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" value="<?= $user['u_password'] ?>">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="role_id" class="form-label">Role:</label>
                            <select name="role_id" class="form-control">
                                <?php foreach ($roles as $role): ?>
                                    <option <?= ($user['u_role_id'] == $role['id']) ? 'selected' : null ?> value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <div class="form-label" style="height: 60px; width: 60px">
                                <img style="max-width: 100%; max-height: 100%;" src="<?= BASE_URL . $user['u_image'] ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>