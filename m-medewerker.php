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
        echo '<th colspan="2">Action</th>';
        echo '</tr>';
        echo '</thead>';
        foreach ($postD->getPostDrank() as $postR) {
            echo '<tr>';
            echo '<td>' . $postR['drank'] . '</td>';
            echo '<td> €' . $postR['prijs_drank'] . '</td>';
            echo '<td>';
            echo '<a href="m-edit-drank.php?id=' . $postR['id'] . '" class="btn btn-warning m-1">Edit</a>';
            echo '<a href="m-procces.php?delD&id=' . $postR['id'] . '" class="btn btn-danger">Delete</a>';
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
        echo '<th colspan="2">Action</th>';
        echo '</tr>';
        echo '</thead>';
        foreach ($postD->getPostEten() as $postR) {
            echo '<tr>';
            echo '<td>' . $postR['eten'] . '</td>';
            echo '<td> €' . $postR['prijs_eten'] . '</td>';
            echo '<td>';
            echo '<a href="m-edit-eten.php?id=' . $postR['id'] . '"name="updateE" class="btn btn-warning m-1">Edit</a>';
            echo '<a href="m-procces.php?delE&id=' . $postR['id'] . '" class="btn btn-danger">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "<p class='mt-5 mx-auto'> empty </p>";
    }
    ?>
</div>

<div class="container contact-form">
    <div class="contact-image">
    </div>
    <form action="m-procces.php" method="post">
        <h3>Voeg gerecht in menu</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Naam</label>
                    <input type="text" name="naam_eten" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Prijs</label>
                    <input type="text" name="prijs_eten" class="form-control" placeholder="" required />
                </div>
                <div class="form-group">
                    <input type="submit" name="submit_eten" class="btnContact" value="Voeg in" />
                </div>
            </div>
        </div>
    </form>
</div>

<div class="container contact-form">
    <div class="contact-image">
    </div>
    <form action="m-procces.php" method="post">
        <h3>Voeg drank in menu</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Naam</label>
                    <input type="text" name="naam_drank" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Prijs</label>
                    <input type="text" name="prijs_drank" class="form-control" placeholder="" required />
                </div>
                <div class="form-group">
                    <input type="submit" name="submit_drank" class="btnContact" value="Voeg in" />
                </div>
            </div>
        </div>
    </form>
</div>


<?php require_once("footer.php"); ?>