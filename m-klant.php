<?php
require_once("header.php");
include "m-procces.php";
?>
<div class="container-sm">
    <?php
    $postD = new PostM();

    echo '<h3>Menu Dranken</h3>';
    if ($postD->getPostDrank()) {

        echo ' <table class="table table-dark table-striped"> ';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Naam Drank</th>';
        echo '<th>Prijs</th>';
        echo '</tr>';
        echo '</thead>';
        foreach ($postD->getPostDrank() as $postR) {
            echo '<tr>';
            echo '<td>' . $postR['drank'] . '</td>';
            echo '<td> €' . $postR['prijs_drank'] . '</td>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "<p class='mt-5 mx-auto'> empty </p>";
    }

    echo '<h3>Menu Gerechten</h3>';
    if ($postD->getPostEten()) {

        echo ' <table class="table table-dark table-striped"> ';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Naam Gerecht</th>';
        echo '<th>Prijs</th>';
        echo '</tr>';
        echo '</thead>';
        foreach ($postD->getPostEten() as $postR) {
            echo '<tr>';
            echo '<td>' . $postR['eten'] . '</td>';
            echo '<td> €' . $postR['prijs_eten'] . '</td>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "<p class='mt-5 mx-auto'> empty </p>";
    }
    ?>
</div>

<div class="container contact-form btn">
    <a href="b-klant.php"><input type="submit" name="submit_eten" class="btnContact bestel" value="Bestellen" /></a>
</div>
<?php require_once("footer.php"); ?>