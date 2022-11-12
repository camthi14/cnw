<div class="container mt-4 d-flex justify-content-center flex-column">
    <div class="row justify-content-center">
        <div class="col-6">
            <h4 class="mb-4 text-center">Thêm danh mục</h4>

            <?php if (isset($params['message']) && !empty($params['message'])) : ?>
                <div class="alert alert-danger"><?= $params['message'] ?></div>
            <?php endif ?>

            <form action="<?= BASE_URL . "/admin/category/add" ?>" , method="post">
                <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục" value="<?= isset($params['data']['name']) ? $params['data']['name'] : null ?>">

                <div class="d-flex justify-content-center mt-2">
                    <button type="submit" class="text-center btn bg_title text-white mb-5">Thêm</button>
                </div>

            </form>
        </div>
    </div>
</div>