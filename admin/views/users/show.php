<div class="container-fluid px-4">
    <h1 class="mt-4"><?= $title ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>?act=users">Danh Sách User</a></li>
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
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Trường Dữ Liệu</th>
                        <th>Dữ Liệu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($user as $fieldName => $value): ?>
                        <tr>
                            <td><?= $fieldName ?> </td>
                            <td><?php
                                switch($fieldName){
                                    case 'u_password':
                                    echo '***********';
                                    break;
                                    default:
                                    echo $value;
                                    break;
                                }
                            ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>