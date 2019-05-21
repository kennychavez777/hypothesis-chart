<?php
    $n = $_POST['n'];
    $mu = $_POST['mu'];
    $x = $_POST['x'];
    $s = $_POST['s'];

    print_r($_POST);

    echo $result = ($x - $mu) / ($s / sqrt($n));