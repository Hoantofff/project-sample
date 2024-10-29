<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?= $title ?? 'admin' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?= BASE_URL ?>asset/admin/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" href="<?= BASE_URL ?>asset/admin/assets/favicon.ico" type="image/x-icon">

</head>

<body class="sb-nav-fixed">
    <!-- topbar -->
    <?php require_once PATH_VIEW_ADMIN . "layout/element/topbar.php"; ?>

    <div id="layoutSidenav">
        <!-- sidebar -->
        <?php require_once PATH_VIEW_ADMIN . "layout/element/sidebar.php"; ?>
        <!-- end sidebar -->
        <div id="layoutSidenav_content">
            <main>
                <?php require_once PATH_VIEW_ADMIN . $view . ".php";?>
            </main>
            <!-- footer -->
            <?php require_once PATH_VIEW_ADMIN . "layout/element/footer.php"; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= BASE_URL ?>asset/admin/js/scripts.js"></script>
    
    <?php 
    if(isset($script) && $script){
        require_once PATH_VIEW_ADMIN . "scripts/" . $script . ".php"; 
    }
    ?>
</body>

</html>