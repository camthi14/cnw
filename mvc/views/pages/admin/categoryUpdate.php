<div class="container mt-4 d-flex justify-content-center flex-column">
    <div class="row justify-content-center">
        <div class="col-6">
            <h4 class="mb-4 text-center">Cập nhật danh mục</h4>
            <form action="<?= BASE_URL . "/admin/category/update" ?>" method="post">

                <input type="text" name="name" id="" value="<?= $params['category']['name'] ?>" class="form-control">

                <div class="d-flex justify-content-center mt-2">
                    <input type="hidden" name="id" value="<?= $params['category']['id'] ?>">
                    <button type="submit" class="text-center btn bg_title text-white mb-5">Cập nhật</button>
                </div>

            </form>
        </div>
    </div>
</div>