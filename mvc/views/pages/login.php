 <main>
     <div class=" bg_top">
         <div class="bg_top-content ">
             <h1 class="bg_top-title">Login</h1>
             <div class="bg_top-info">
                 <a href="<?= BASE_URL . "/" ?>" class="bg_top-link">Home</a>
                 <i class="fa-solid fa-chevron-down bg_top-chevron"></i>
                 <p class="bg_top-sub">Login</p>
             </div>
         </div>
     </div>
     <div class="container">
         <div id="formLogin" class="formLogin">
             <div class="row">
                 <div data-aos="fade-right" data-aos-duration="1000" class="col-lg-6 account__signin">
                     <form action="<?= BASE_URL . '/login' ?>" class="form form_login" method="post" id="form1">
                         <h1 class="form_title">Sign in</h1>
                         <h2 class="form_sub">Great to have back!</h2>

                         <?php if (isset($_SESSION['message'])) : ?>
                             <div class="alert alert-success" id="toast-alert"><?= $_SESSION['message'] ?></div>
                             <?php unset($_SESSION['message']) ?>
                         <?php endif; ?>

                         <?php if (isset($params['error']) && !empty($params['error'])) : ?>
                             <div class="alert alert-danger"><?= $params['error'] ?></div>
                         <?php endif ?>

                         <div class="form-group">
                             <input id="email" type="text" name="username" class="form_input form-control" value="<?= isset($params['data']['username']) ? $params['data']['username'] : '' ?>" placeholder="VD: abc@gmail.com">
                             <span class="form-message"></span>
                         </div>
                         <div class="form-group">
                             <input id="password" type="password" name="password" class="form_input form-control" placeholder="VD: matkhau123abc..." value="<?= isset($params['data']['password']) ? $params['data']['password'] : '' ?>">
                             <span class="form-message"></span>
                         </div>
                         <a href="#" class="forgot-pass" data-bs-toggle="modal" data-bs-target="#exampleModal">Forgot
                             your password?</a>
                         <button type="submit" class="btn-signin btn-submit">Login</button>
                     </form>
                 </div>
                 <div data-aos="fade-left" data-aos-duration="1000" class="col-lg-6 account__signup">
                     <h1 class="account__title">Hello, Friend!</h1>
                     <span class="account__sub text-center">Enter your personal details and start your journey with us
                         to access your subscription login and nomz rewards points</span>
                     <a href="<?= BASE_URL . "/register" ?>" class="text-decoration-none">
                         <button type="submit" class="btn-submit btn-signup">Sign up</button>
                     </a>
                 </div>

             </div>

         </div>
     </div>
 </main>