<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= BASE_URL ?>asset/client/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>asset/client/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>asset/client/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>asset/client/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>asset/client/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>asset/client/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>asset/client/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= BASE_URL ?>asset/client/css/style.css" type="text/css">

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <?php require_once PATH_VIEW . 'layout/element/humberger.php' ?>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <?php require_once PATH_VIEW . 'layout/element/header.php' ?>
    <!-- Header Section End -->
    <!-- Hero Section Begin -->
    <?php require_once PATH_VIEW . 'layout/element/hero.php' ?>
    <!-- Hero Section End -->
    <?php require_once PATH_VIEW . $view . '.php'; ?>

    <!-- Footer Section Begin -->
    <?php require_once PATH_VIEW . 'layout/element/footer.php'; ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="<?= BASE_URL ?>asset/client/js/jquery-3.3.1.min.js"></script>
    <script src="<?= BASE_URL ?>asset/client/js/bootstrap.min.js"></script>
    <script src="<?= BASE_URL ?>asset/client/js/jquery.nice-select.min.js"></script>
    <script src="<?= BASE_URL ?>asset/client/js/jquery-ui.min.js"></script>
    <script src="<?= BASE_URL ?>asset/client/js/jquery.slicknav.js"></script>
    <script src="<?= BASE_URL ?>asset/client/js/mixitup.min.js"></script>
    <script src="<?= BASE_URL ?>asset/client/js/owl.carousel.min.js"></script>
    <script src="<?= BASE_URL ?>asset/client/js/main.js"></script>



</body>

</html>