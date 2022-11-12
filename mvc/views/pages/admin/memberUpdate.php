<div class="container mt-4 d-flex justify-content-center flex-column">
    <div class="row justify-content-center">
        <div class="col-6">
            <h4 class="mb-4 text-center">Cập nhật người dùng</h4>

            <?php if (isset($params['message']) && !empty($params['message'])) : ?>
                <div class="alert alert-danger"><?= $params['message'] ?></div>
            <?php endif ?>

            <?php if (isset($params['member'])) : ?>
                <form action="<?= BASE_URL . "/admin/member/update/" . $params['member']['id'] ?>" , method="post">
                    <input type="text" name="fullname" class="form-control" placeholder="Nhập tên người dùng" value="<?= $params['member']['fullname'] ?>">

                    <input type="text" name="username" class="form-control mt-2" placeholder="Nhập username người dùng" value="<?= $params['member']['username'] ?>">

                    <select name="group_id" id="" class="form-control mt-2">
                        <option value="" disabled selected>--- Chọn phân quyền ---</option>
                        <?php if (isset($params['group_roles']) && count($params['group_roles'])) : ?>
                            <?php foreach ($params['group_roles'] as $role) : ?>
                                <option value="<?= $role['id'] ?>" <?= $params['member']['group_id'] == $role['id'] ? 'selected' : null ?>><?= $role['role'] ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>

                    <div class="d-flex justify-content-center mt-2">
                        <input type="text" hidden name="id" value="<?= $params['member']['id'] ?>">
                        <button type="submit" class="text-center btn bg_title text-white mb-5">Cập nhật</button>
                    </div>

                </form>
            <?php endif; ?>
        </div>
    </div>
</div>