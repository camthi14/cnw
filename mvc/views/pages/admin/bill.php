<?php if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-success" id="toast-alert"><?= $_SESSION['message'] ?></div>
    <?php unset($_SESSION['message']) ?>
<?php endif; ?>

<table class="table table-hover">
    <thead>
        <tr class="bg_green text-white">
            <th scope="col">ID Bill</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Tên Khách hàng</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Tổng giá</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($params['bills']) && count($params['bills']) > 0) : ?>
            <?php foreach ($params['bills'] as $item) : ?>
                <tr>
                    <td><?= $item['id_bill']; ?></td>
                    <td><span class="cut-name"><?= $item['product_name']; ?></span></td>
                    <td><?= $item['customer_name']; ?></td>
                    <td><?= $item['quantity']; ?></td>
                    <td><?= number_format($item['quantity'] * $item['price'], 0, '', '.') . 'đ' ?></td>
                    <td>
                        <span class="<?= $this->getColorByStatusId($item['status_id']) ?>"><?= $item['status_name']; ?></span>
                    </td>
                    <td>
                        <form method="post" action="<?= BASE_URL . '/admin/bill/update' ?>">
                            <input type="text" value="<?= $item['status_id'] ?>" name="status_id" hidden>
                            <input type="text" value="<?= $item['id_bill'] ?>" name="id" hidden>
                            <button <?= $item['status_id'] == 3 || $item['status_id'] == 4 ? 'disabled' : null ?> type="submit" class="btn btn-outline-info btn-size-small">Xác nhận</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td colspan="3">Không có đơn hàng nào</td>
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