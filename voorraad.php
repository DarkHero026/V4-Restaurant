<?php
require_once("header.php");
include "v-procces.php";
?>
<div class="container-sm">
    <?php
    $postr = new PostV();

    if ($postr->getPost()) {

        echo ' <table class="table table-dark table-striped"> ';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID*</th>';
        echo '<th>Product</th>';
        echo '<th>Aantal</th>';
        echo '<th>Datum</th>';
        echo '<th colspan="2">Action</th>';
        echo '</tr>';
        echo '</thead>';
        foreach ($postr->getPost() as $postR) {
            echo '<tr>';
            echo '<td>' . $postR['id'] . '</td>';
            echo '<td>' . $postR['product'] . '</td>';
            echo '<td>' . $postR['aantal'] . '</td>';
            echo '<td>' . $postR['besteling_datum'] . '</td>';
            echo '<td>';
            echo '<a href="v-edit.php?id=' . $postR['id'] . '" class="btn btn-warning m-1">Bijwerken</a>';
            echo '<a href="v-procces.php?del&id=' . $postR['id'] . '" class="btn btn-danger">Verwijderen</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '<form action="v-procces.php" method="post">';
        echo '<input type="submit" name="exportm" class="btn btn-success" value="Export Excel"/>';
        echo '</form>';
    } else {
        echo "<p class='mt-5 mx-auto'> empty </p>";
    }
    ?>
</div>

<div class="container contact-form">
    <form action="v-procces.php?update&id=<?= $id ?>" method="post">
        <h3>Voorraad</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Product</label>
                    <input type="text" name="product" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Aantal</label>
                    <input type="number" name="aantal" class="form-control" placeholder="" />
                </div>
                <div class="form-group">
                    <input type="submit" name="submitv" class="btnContact" value="Voeg In" />
                </div>
            </div>
        </div>
    </form>
</div>

<?php require_once("footer.php"); ?>