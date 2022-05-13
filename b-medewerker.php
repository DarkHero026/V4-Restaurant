<?php
require_once("header.php");
include "b-procces.php";
?>
<div class="container-sm">
    <?php
    $postB = new PostB();

    if ($postB->getPost()) {
        echo '<h3>Ober moet tafel zelf toevogen en totaal prijs. <br>Daarna kan die de bron uitprinten en afhandelen.</h3>';
        echo ' <table class="table table-dark table-striped"> ';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Tafel</th>';
        echo '<th>Gerecht</th>';
        echo '<th>Aantal Gerecht</th>';
        echo '<th>Drank</th>';
        echo '<th>Aantal drank</th>';
        echo '<th>Totaal prijs</th>';
        echo '<th colspan="2">Action</th>';
        echo '</tr>';
        echo '</thead>';
        foreach ($postB->getPost() as $postR) {
            echo '<tr>';
            echo '<td>' . $postR['tafel'] . '</td>';
            echo '<td>' . $postR['product_eten'] . '</td>';
            echo '<td>' . $postR['aantal_eten'] . '</td>';
            echo '<td>' . $postR['product_drank'] . '</td>';
            echo '<td>' . $postR['aantal_drank'] . '</td>';
            echo '<td> €' . $postR['prijs'] . '</td>';
            echo '<td>';
            echo '<a href="b-edit.php?id=' . $postR['id'] . '" class="btn btn-warning m-1">Edit</a>';
            echo '<a href="b-procces.php?del&id=' . $postR['id'] . '" class="btn btn-danger">Afgehandeld</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '<form action="b-procces.php" method="post">';
        echo '<input type="submit" name="exportm" class="btn btn-success" value="Bon"/>';
        echo '</form>';
    } else {
        echo "<p class='mt-5 mx-auto'> empty </p>";
    }
    ?>

    <?php require_once("footer.php"); ?>