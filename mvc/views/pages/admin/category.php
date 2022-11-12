<?php if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-success" id="toast-alert"><?= $_SESSION['message'] ?></div>
    <?php unset($_SESSION['message']) ?>
<?php endif; ?>

<table class="table table-hover">
    <thead>
        <tr class="bg_green text-white">
            <th scope="col">ID</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($params['categories']) && count($params['categories']) > 0) : ?>
            <?php foreach ($params['categories'] as $item) : ?>
                <tr>
                    <th scope="row"><?= $item['id'] ?></th>
                    <td><?= $item['name'] ?></td>
                    <td>
                        <a href="<?= BASE_URL . '/admin/category/update/' . $item['id'] ?>" class="btn btn-size-small bg-transparent"><i class="h4 text-title fa-regular fa-pen-to-square scaled-big"></i></a>

                        <form action="<?= BASE_URL . '/admin/category/delete/' . $item['id'] ?>" method="post" id="delete" class="d-inline">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="button" id="delete-category" data-toggle="modal" data-target="#modal-delete" class="btn btn-size-small bg-transparent"><i class="h4 text-danger fa-solid fa-trash-can scaled-big"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="3">Không có danh mục nào</td>
            </tr>
        <?php endif; ?>

    </tbody>
</table>

<!-- Modal -->

<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-delete-category" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-delete-category">Xác nhận</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc muốn xóa ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                <button type="submit" class="btn btn-danger" id="delete-category-confirm">Xóa</button>
            </div>
        </div>
    </div>
</div>