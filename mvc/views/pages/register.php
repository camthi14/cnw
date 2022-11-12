<main>
    <div class=" bg_top">
        <div class="bg_top-content ">
            <h1 class="bg_top-title">Register</h1>
            <div class="bg_top-info">
                <a href="<?= BASE_URL . "/" ?>" class="bg_top-link">Home</a>
                <i class="fa-solid fa-chevron-down bg_top-chevron"></i>
                <p class="bg_top-sub">Register</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div id="formRegister" class="formRegister">

            <form action="" class="form formRes" id="form2" method="post">

                <h1 class="form_title"><i class="fa-regular fa-pen-to-square"></i>Register</h1>

                <h2 class="form_sub">Great to have back!</h2>

                <?php if (isset($params['error']) && !empty($params['error'])) : ?>
                    <div class="alert alert-danger"><?= $params['error'] ?></div>
                <?php endif ?>


                <div class="form-group">
                    <input id="fullname" type="text" name="fullname" class="form_input form-control" placeholder="VD: Nhập fullname của bạn">
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <input id="username" type="text" name="username" class="form_input form-control" placeholder="VD: Nhập username của bạn">
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <input id="password" type="password" name="password" class="form_input form-control" placeholder="VD: matkhau123abc...">
                    <span class="form-message"></span>
                </div>

                <button type="submit" class="btn-signin btn-submit">Register</button>
            </form>

        </div>
    </div>
</main>