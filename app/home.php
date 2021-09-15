<?php
include 'db.php';

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    if ($keyword != "") {
        $sql = "SELECT DISTINCT(product_keywords) as product_keywords  FROM products where product_keywords LIKE '%$keyword%' LIMIT 8";
        $run_query = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($run_query)) {
            echo '<li class="d-flex serching_keyword_item"><a  href="filters.php?keyword=' . $row['product_keywords'] . '">' . $row['product_keywords'] . '</a><i class="fa fa-search order-first"></i></li>';
        }
    } else {
        echo 0;
    }
}