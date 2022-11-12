<?php if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-success" id="toast-alert"><?= $_SESSION['message'] ?></div>
    <?php unset($_SESSION['message']) ?>
<?php endif; ?>

<table class="table table-hover">
    <thead>
        <tr class="bg_green text-white">
            <th scope="col">ID</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Tên thành viên</th>
            <th scope="col">Tài khoản</th>
            <th scope="col">Quyền</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($params['members']) && count($params['members']) > 0) : ?>
            <?php foreach ($params['members'] as $item) : ?>
                <tr>
                    <th scope="row"><?= $item['id'] ?></th>
                    <td><img src="https://media.istockphoto.com/id/1370484158/photo/young-woman-using-smartphone-relaxing-at-home.jpg?b=1&s=170667a&w=0&k=20&c=Y6KtxTJkm62OI-OScO1b8_4nbQPrQ0gDRlWzLuUF0Ao=" alt="" class="img-thumbnail" style="width: 100px"></td>
                    <td><?= $item['fullname'] ?></td>
                    <td><?= $item['username'] ?></td>
                    <td><?= $item['role'] ?></td>
                    <td>
                        <a href="<?= BASE_URL . '/admin/member/update/' . $item['id'] ?>" class="btn btn-size-small bg-transparent"><i class="h4 text-title fa-regular fa-pen-to-square scaled-big"></i></a>

                        <form action="<?= BASE_URL . '/admin/member/delete/' . $item['id'] ?>" method="post" id="delete" class="d-inline">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="button" id="delete-member" data-toggle="modal" data-target="#modal-delete" class="btn btn-size-small bg-transparent"><i class="h4 text-danger fa-solid fa-trash-can scaled-big"></i></button>
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

<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-delete-member" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-delete-member">Xác nhận</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc muốn xóa ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                <button type="submit" class="btn btn-danger" id="delete-member-confirm">Xóa</button>
            </div>
        </div>
    </div>
</div>