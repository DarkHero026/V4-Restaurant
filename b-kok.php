<?php
require_once("header.php");
include "b-procces.php";
?>
<div class="container-sm">
    <?php
    $postB = new PostB();

    if ($postB->getPost()) {
        echo '<h3>Gerechten orders</h3>';
        echo ' <table class="table table-dark table-striped"> ';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Tafel</th>';
        echo '<th>Gerecht</th>';
        echo '<th>Aantal gerecht</th>';
        echo '</tr>';
        echo '</thead>';
        foreach ($postB->getPost() as $postR) {
            echo '<tr>';
            echo '<td>' . $postR['tafel'] . '</td>';
            echo '<td>' . $postR['product_eten'] . '</td>';
            echo '<td>' . $postR['aantal_eten'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "<p class='mt-5 mx-auto'> empty </p>";
    }
    ?>

    <?php require_once("footer.php"); ?>