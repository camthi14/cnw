<div class="container mt-4 d-flex justify-content-center flex-column">
    <div class="row justify-content-center">
        <div class="col-12">
            <h4 class="mb-4 text-center">Thêm sản phẩm</h4>

            <?php if (isset($params['message']) && !empty($params['message'])) : ?>
                <div class="alert alert-danger"><?= $params['message'] ?></div>
            <?php endif ?>

            <form action="<?= BASE_URL . "/admin/product/add" ?>" , method="post" enctype="multipart/form-data">
                <div class="row">
                    <input type="text" name="name_product" class="form-control col" placeholder="Nhập tên sản phẩm">
                    <input type="text" name="price" class="form-control col ml-2" placeholder="Nhập giá sản phẩm">
                    <textarea id="message" rows="3" class="mt-2 col-12" placeholder="Your message..." name="description"></textarea>

                    <label for="image" class="form-label">
                        <span>Sản phẩm</span>
                        <div class="input-upload-img">
                            <img class="img-thumbnail" style="width: 200px; height: 150px; object-fit: cover;" src="https://media.istockphoto.com/id/1370484158/photo/young-woman-using-smartphone-relaxing-at-home.jpg?b=1&s=170667a&w=0&k=20&c=Y6KtxTJkm62OI-OScO1b8_4nbQPrQ0gDRlWzLuUF0Ao=" alt="">
                        </div>
                    </label>

                    <input type="file" id="image" class="form-control hidden" id="" placeholder="" name="image" onchange="readURL(this);">

                    <select name="cate_id" id="" class="form-control mt-2">
                        <option value="" disabled selected>--- Chọn danh mục ---</option>
                        <?php if (isset($params['category']) && count($params['category'])) : ?>
                            <?php foreach ($params['category'] as $cate) : ?>
                                <option value="<?= $cate['id'] ?>"><?= $cate['name'] ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                </div>


                <div class="d-flex justify-content-center mt-2">
                    <button type="submit" class="text-center btn bg_title text-white mb-5">Thêm</button>
                </div>

            </form>
        </div>
    </div>
</div>