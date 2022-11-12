<footer>
    <div class="parlo_footer_top" id="section-footer-top">
        <div class="container">
            <div class="footer-top-2 pb-20">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 col-12 footer_content">
                        <div class="footer-widget m-40">
                            <a href="<?= BASE_URL . "/" ?>">
                                <img src="<?= PUBLIC_PATH . '/assets/img/logoshirley.avif' ?>" alt="">
                            </a>
                        </div>

                        <div class="address">
                            <i class="fa-solid fa-map-location-dot"></i>
                            <span class="address-name">Address: Dai Hoc Can Tho</span>
                            <p>
                                <i class="fa fa-phone"></i>
                                <a href="tel:+20-800-33-000">+20-800-33-000</a><br>
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:shirley@gmail.com">shirley@gmail.com</a>
                            </p>
                        </div>
                        <ul class="footer_list">
                            <li class="footer_item">
                                <a href="https://www.twitter.com/" class="footer_link">
                                    <i class="fa-brands fa-twitter" style="padding: 0 4px;"></i>
                                </a>
                            </li>
                            <li class="footer_item">
                                <a href="https://www.facebook.com/" class="footer_link">
                                    <i class="fa-brands fa-facebook-f" style="padding: 0 7px;"></i>
                                </a>
                            </li>
                            <li class="footer_item">
                                <a href="https://www.instagram.com/" class="footer_link">
                                    <i class="fa-brands fa-instagram" style="padding: 0 5px;"></i>
                                </a>

                            </li>
                            <li class="footer_item">
                                <a href="https://translate.google.com/" class="footer_link">
                                    <i class="fa-brands fa-google-plus-g" style="padding: 0 2px;"></i>
                                </a>

                            </li>

                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12 col-12 footer_content">
                        <div class="subscribe-style mt-45">
                            <p style="color: #1f2226;">Subscribe to our newsleter, Enter your email address</p>
                            <div class="subscribe-form mt-20">
                                <form action="" class="" id="">
                                    <div class="form-control">
                                        <input id="email" type="text" name="email" class="btn_input" placeholder="VD: abc@gmail.com">
                                        <div class="btn_icon"><i class="fa-solid fa-location-arrow"></i></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 footer_main">
                                <h4 class="footer_title">Account</h4>
                                <ul class="explore_list">
                                    <li class="explore_item <?= $params['page'] === 'login' ? 'active' : '' ?>">
                                        <span class="ex_chevron"></span>
                                        <a href="<?= BASE_URL . "/login" ?>" class="explore_link">Login</a>
                                    </li>
                                    <li class="explore_item <?= $params['page'] === 'register' ? 'active' : '' ?>">
                                        <span class="ex_chevron"></span>
                                        <a href="<?= BASE_URL . "/register" ?>" class="explore_link">Register</a>
                                    </li>
                                    <li class="explore_item <?= $params['page'] === 'account' ? 'active' : '' ?>">
                                        <span class="ex_chevron"></span>
                                        <a href="<?= BASE_URL . "/account" ?>" class="explore_link">My Account</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 footer_main">
                                <h4 class="footer_title">Footer Menu</h4>
                                <ul class="explore_list">
                                    <li class="explore_item <?= $params['page'] === 'product' ? 'active' : '' ?>">
                                        <span class="ex_chevron"></span>
                                        <a href="<?= BASE_URL . "/product" ?>" class="explore_link">Product</a>
                                    </li>
                                    <li class="explore_item <?= $params['page'] === 'contact' ? 'active' : '' ?>">
                                        <span class="ex_chevron"></span>
                                        <a href="<?= BASE_URL . "/contact" ?>" class="explore_link">Contact Us</a>
                                    </li>
                                    <li class="explore_item <?= $params['page'] === 'home' ? 'active' : '' ?>">
                                        <span class="ex_chevron"></span>
                                        <a href="<?= BASE_URL . "/" ?>" class="explore_link">Home</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 col-12 footer_content">
                        <h4 class="footer_title">About Store</h4>
                        <div class="footer_address">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.8414543437275!2d105.76842661401852!3d10.029938975271913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895a51d60719%3A0x9d76b0035f6d53d0!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBD4bqnbiBUaMah!5e0!3m2!1svi!2s!4v1662733819815!5m2!1svi!2s" width="280" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="footer_bottom">
        <span class=""> &copy; 2022 Shirley designed by NT</span>
        <div class='top_page'>
            <span class="icon-top">
                <i class="fa-solid fa-angles-down"></i>
            </span>
        </div>
    </div>
</footer>
</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php if (is_array($params['js'])) : ?>
    <?php foreach ($params['js'] as $key => $value) : ?>
        <script src="<?= $this->getJs($value) ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
<script>
    AOS.init();
</script>
</body>

</html>