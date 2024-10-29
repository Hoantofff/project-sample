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
            <form action="<?= BASE_URL_ADMIN ?>?act=setting-save" method="POST">
                <table class="table">
                    <tr>
                        <th>Trường Dữ Liệu</th>
                        <th>Dữ Liệu</th>
                    </tr>

                    <tr>
                        <td>Logo</td>
                        <td>
                            <input type="text" class="form-control" name="logo" value="<?= $settings['logo'] ?? null ?>">
                        </td>
                    </tr>
                </table>

                <button type="submit" class="btn btn-success">Save</button>

                <a href="<?= BASE_URL_ADMIN ?>?act=products" class="btn btn-danger">Back To List</a>
            </form>
        </div>
    </div>
</div>