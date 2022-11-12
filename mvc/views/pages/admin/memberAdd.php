<div class="container mt-4 d-flex justify-content-center flex-column">
    <div class="row justify-content-center">
        <div class="col-6">
            <h4 class="mb-4 text-center">Thêm người dùng</h4>

            <?php if (isset($params['message']) && !empty($params['message'])) : ?>
                <div class="alert alert-danger"><?= $params['message'] ?></div>
            <?php endif ?>

            <form action="<?= BASE_URL . "/admin/member/add" ?>" , method="post">
                <input type="text" name="fullname" class="form-control" placeholder="Nhập tên người dùng" value="<?= isset($params['data']['fullname']) ? $params['data']['fullname'] : null ?>">

                <input type="text" name="username" class="form-control mt-2" placeholder="Nhập username người dùng" value="<?= isset($params['data']['username']) ? $params['data']['username'] : null ?>">

                <input type="password" name="password" class="form-control mt-2" placeholder="Nhập mật khẩu" value="<?= isset($params['data']['password']) ? $params['data']['password'] : null ?>">

                <select name="group_id" id="" class="form-control mt-2">
                    <option value="" disabled selected>--- Chọn phân quyền ---</option>
                    <?php if (isset($params['group_roles']) && count($params['group_roles'])) : ?>
                        <?php foreach ($params['group_roles'] as $role) : ?>
                            <option value="<?= $role['id'] ?>"><?= $role['role'] ?></option>
                        <?php endforeach ?>
                    <?php endif ?>
                </select>

                <div class="d-flex justify-content-center mt-2">
                    <button type="submit" class="text-center btn bg_title text-white mb-5">Thêm</button>
                </div>

            </form>
        </div>
    </div>
</div>