<?php

//print_r($_POST);

foreach ($_POST as $key => $value) {
    if (str_contains('new_color', $key)) {
        echo 'Found on Index ' . $key . '</br>';
    }
}

