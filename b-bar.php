<?php
require_once("header.php");
include "b-procces.php";
?>
<div class="container-sm">
    <?php
    $postB = new PostB();

    if ($postB->getPost()) {
        echo '<h3>Drank orders</h3>';
        echo ' <table class="table table-dark table-striped"> ';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Tafel</th>';
        echo '<th>Drank</th>';
        echo '<th>Aantal drank</th>';
        echo '</tr>';
        echo '</thead>';
        foreach ($postB->getPost() as $postR) {
            echo '<tr>';
            echo '<td>' . $postR['tafel'] . '</td>';
            echo '<td>' . $postR['product_drank'] . '</td>';
            echo '<td>' . $postR['aantal_drank'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "<p class='mt-5 mx-auto'> empty </p>";
    }
    ?>

    <?php require_once("footer.php"); ?>