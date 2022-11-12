<?php if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-success" id="toast-alert"><?= $_SESSION['message'] ?></div>
    <?php unset($_SESSION['message']) ?>
<?php endif; ?>

<table class="table table-hover">
    <thead>
        <tr class="bg_green text-white">
            <th scope="col">ID</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Giá</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($params['products']) && !empty($params['products'])) : ?>
            <?php foreach ($params['products'] as $item) : ?>
                <tr>
                    <th scope="row"><?= $item['id'] ?></th>
                    <td>
                        <p><img class="img-thumbnail" style="width: 100px; height: 100px;" src=" <?= UPLOAD_PRODUCT_PATH . $item['thumb'] ?>" alt=""></p>
                    </td>
                    <td><?= $item['name'] ?></td>
                    <td><?= number_format($item['price'], 0, '', '.'). 'đ' ?></td>
                    <td>
                        <a href="<?= BASE_URL . '/admin/product/update/' . $item['id'] ?>" class="btn btn-size-small bg-transparent"><i class="h4 text-title fa-regular fa-pen-to-square scaled-big"></i></a>

                        <form action="<?= BASE_URL . '/admin/product/delete/' . $item['id'] ?>" method="post" id="delete" class="d-inline">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="button" id="delete-product" data-toggle="modal" data-target="#modal-delete" class="btn btn-size-small bg-transparent"><i class="h4 text-danger fa-solid fa-trash-can scaled-big"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </tbody>
</table>

<!-- Modal -->

<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-delete-product" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-delete-product">Xác nhận</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc muốn xóa ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                <button type="submit" class="btn btn-danger" id="delete-product-confirm">Xóa</button>
            </div>
        </div>
    </div>
</div>