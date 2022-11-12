<div class="container mt-4 d-flex justify-content-center flex-column">
    <div class="row justify-content-center">
        <div class="col-12">
            <h4 class="mb-4 text-center">Cập nhật sản phẩm</h4>

            <?php if (isset($params['message']) && !empty($params['message'])) : ?>
                <div class="alert alert-danger"><?= $params['message'] ?></div>
            <?php endif ?>

            <?php if (isset($params['product'])) : ?>
                <form action="<?= BASE_URL . "/admin/product/update/" . $params['product']['id'] ?>" , method="post" enctype="multipart/form-data">
                    <div class="row">
                        <input type="text" name="name_product" class="form-control col" placeholder="Nhập tên sản phẩm" value="<?= $params['product']['name'] ?>">
                        <input type="text" name="price" class="form-control col ml-2" placeholder="Nhập giá sản phẩm" value="<?= $params['product']['price'] ?>">
                        <textarea id="message" rows="3" class="mt-2 col-12" placeholder="Your message..." name="description"><?= $params['product']['description'] ?></textarea>

                        <label for="image" class="form-label">
                            <span>Sản phẩm</span>
                            <div class="input-upload-img">
                                <img class="img-thumbnail" style="width: 200px; height: 150px; object-fit: cover;" src="<?= UPLOAD_PRODUCT_PATH . $params['product']['thumb']?>" alt="">
                            </div>
                        </label>

                        <input type="file" id="image" class="form-control hidden" id="" placeholder="" name="image" onchange="readURL(this);" value="<?= $params['product']['thumb'] ?>" >

                        <select name=" cate_id" id="" class="form-control mt-2">
                        <option value="" disabled selected>--- Chọn danh mục ---</option>
                        <?php if (isset($params['category']) && count($params['category'])) : ?>
                            <?php foreach ($params['category'] as $cate) : ?>
                                <option <?= $params['product']['category_id'] == $cate['id'] ? 'selected' : null ?> value="<?= $cate['id'] ?>"><?= $cate['name'] ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                        </select>
                    </div>


                    <div class="d-flex justify-content-center mt-2">
                        <button type="submit" class="text-center btn bg_title text-white mb-5">Cập nhật</button>
                    </div>

                </form>
            <?php endif ?>
        </div>
    </div>
</div>