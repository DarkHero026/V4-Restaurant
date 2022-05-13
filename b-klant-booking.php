<?php
require_once("header.php");
include "b-procces.php";
?>
<div class="container-sm">
    <?php
    $postB = new PostB();

    if ($postB->getEndPost()) {
        echo '<h2>Bestelling</h2>';
        echo ' <table class="table table-dark table-striped"> ';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Gerecht</th>';
        echo '<th>Aantal gerecht</th>';
        echo '<th>Drank</th>';
        echo '<th>Aantal drank</th>';
        echo '</tr>';
        echo '</thead>';
        foreach (array_slice($postB->getEndPost(), 0, 1) as $postR) {
            echo '<tr>';
            echo '<td>' . $postR['product_eten'] . '</td>';
            echo '<td>' . $postR['aantal_eten'] . '</td>';
            echo '<td>' . $postR['product_drank'] . '</td>';
            echo '<td>' . $postR['aantal_drank'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '<form action="b-procces.php" method="post">';
        echo '<input type="submit" name="exportk" class="btn btn-success" value="Bon"/>';
        echo '</form>';
    } else {
        echo "<p class='mt-5 mx-auto'> empty </p>";
    }
    ?>
</div>

<?php require_once("footer.php"); ?>