<?php

$query_string = $_SERVER['QUERY_STRING'];
$array_query_string = explode('/', $query_string);
$new_query_string = '&page=1';

if (isset($array_query_string[1]) && !empty($array_query_string[1])) {
    $cut_array_query_string = explode('&', $array_query_string[1]);

    if (isset($cut_array_query_string[1]) && !empty($cut_array_query_string[1])) {
        $new_query_string = '&' . $cut_array_query_string[1];
    }
}

?>

<nav aria-label="Page navigation example">
    <ul class="pagination d-flex justify-content-center">
        <li class="page-item <?= !isset($_GET['page']) || $_GET['page'] == 1 ? 'disabled' : null ?>">
            <a class="page-link" href="<?= BASE_URL . '/admin/member?action=prev' . $new_query_string ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <?php if (isset($params['total_row'])) : ?>
            <?php for ($i = 1; $i <= $params['total_row']; $i++) : ?>
                <li class="page-item <?= (isset($_GET['page']) && $_GET['page'] == $i) || (!isset($_GET['page']) && $i == 1) ? 'active' : null ?>">
                    <a class="page-link" href="<?= BASE_URL . '/admin/member?page=' . $i ?>"><?= $i ?></a>
                </li>
            <?php endfor ?>
        <?php endif ?>
        <li class="page-item <?= isset($_GET['page']) && $_GET['page'] >= $params['total_row'] ? 'disabled' : null ?>">
            <a class="page-link" href="<?= BASE_URL . '/admin/member?action=next' . $new_query_string ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>