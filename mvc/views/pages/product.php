<?php

$query_string = $_SERVER['QUERY_STRING'];
$array_query_string = explode('/', $query_string);
$new_query_string = '&page=1';

if (isset($array_query_string[0]) && !empty($array_query_string[0])) {
    $cut_array_query_string = explode('&', $array_query_string[0]);

    if (isset($cut_array_query_string[1]) && !empty($cut_array_query_string[1])) {
        $new_query_string = '&' . $cut_array_query_string[1];
    }
}

?>

<main>
    <div class=" bg_top">
        <div class="bg_top-content ">
            <h1 class="bg_top-title">Product</h1>
            <div class="bg_top-info">
                <a href="<?= BASE_URL . "/" ?>" class="bg_top-link">Home</a>
                <i class="fa-solid fa-chevron-down bg_top-chevron"></i>
                <p class="bg_top-sub">Product</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="category row">
            <ul class="col-lg-3 category_list">
                <?php if (isset($params['categories']) && !empty($params['categories'])) : ?>
                    <?php foreach ($params['categories'] as $item) : ?>
                        <li class="category_item <?= isset($_GET['category_id']) && $_GET['category_id'] == $item['id'] ? 'active' : '' ?>">
                            <a class="category_link" href="<?= BASE_URL . '/product?category_id=' . $item['id'] ?>"><?= $item['name'] ?></a>
                        </li>
                    <?php endforeach ?>
                <?php endif ?>
            </ul>
            <div class="col-lg-9">
                <div class="row g-2 product">
                    <?php if (isset($params['product']) && !empty($params['product'])) : ?>
                        <?php foreach ($params['product'] as $item) : ?>
                            <div class="col-lg-3 col-sm-6 product_content">
                                <div class="card card-product h-100">
                                    <div class="card_img">
                                        <a href="<?= BASE_URL . '/product/detail/' . $item['id'] ?>" class="card_img_link">
                                            <img src="<?= UPLOAD_PRODUCT_PATH . $item['thumb'] ?>" class="card-img-top img-product">
                                        </a>
                                    </div>
                                    <div class="card-body ">
                                        <h5 class="card-title product-name text-center"><?= $item['name'] ?></h5>
                                        <p class="card-text text-center">Minato Kanae</p>
                                        <div class="text-center">
                                            <strong class="text-danger "><?= number_format($item['price']) . 'đ' ?>
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>

                <nav aria-label="Page navigation example">
                    <ul class="pagination d-flex justify-content-center">
                        <li class="page-item <?= !isset($_GET['page']) || $_GET['page'] == 1 ? 'disabled' : null ?>">
                            <a class="page-link" href="<?= BASE_URL . '/product?action=prev' . $new_query_string ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <?php if (isset($params['total_row'])) : ?>
                            <?php for ($i = 1; $i <= $params['total_row']; $i++) : ?>
                                <li class="page-item <?= (isset($_GET['page']) && $_GET['page'] == $i) || (!isset($_GET['page']) && $i == 1) ? 'active' : null ?>">
                                    <a class="page-link" href="<?= BASE_URL . '/product?page=' . $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor ?>
                        <?php endif ?>
                        <li class="page-item <?= isset($_GET['page']) && $_GET['page'] >= $params['total_row'] ? 'disabled' : null ?>">
                            <a class="page-link" href="<?= BASE_URL . '/product?action=next' . $new_query_string ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</main>