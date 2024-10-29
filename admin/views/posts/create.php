<div class="container-fluid px-4">
    <h1 class="mt-4"><?= $title ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?= BASE_URL_ADMIN ?>?act=posts">Danh Sách Post</a></li>
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
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title"
                                value="<?= isset($_SESSION['data']) ? $_SESSION['data']['title'] : null ?>">
                        </div>
                        <label for="cate_id" class="form-label">Category:</label>
                            <select name="cate_id" class="form-control">
                                <?php foreach ($categories as $category): ?>
                                    <option <?= isset($_SESSION['data']) && $_SESSION['data']['cate_id'] == $category['id'] ? 'selected' : null ?> value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            
                            <label for="author_id" class="form-label">Authors:</label>
                            <select name="author_id" class="form-control">
                                <?php foreach ($authors as $author): ?>
                                    <option <?= isset($_SESSION['data']) && $_SESSION['data']['author_id'] == $author['id'] ? 'selected' : null ?> value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" name="image">
                        </div>

                    </div>
                    <div class="mb-3 mt-3">
                        <label for="content" class="form-label">Content:</label>
                        <textarea name="content" id="content"><?= isset($_SESSION['data']) ? $_SESSION['data']['content'] : null ?></textarea>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="excerpt" class="form-label">Excerpt:</label>
                        <textarea name="excerpt" id="excerpt"><?= isset($_SESSION['data']) ? $_SESSION['data']['excerpt'] : null ?></textarea>
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