<?php
    $n = $_POST['n'];
    $mu = $_POST['mu'];
    $x = $_POST['x'];
    $s = $_POST['s'];

    echo $result = ($x - $mu) / ($s / sqrt($n));