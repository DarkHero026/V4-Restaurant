<?php
require_once("header.php");
include "b-procces.php";
?>

<div class="container contact-form">
    <form action="b-procces.php" method="post">
        <h3>Bestellen</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Gerechten</label>
                    <select class="form-control" name="b_eten" required>
                        <option value="kies">Kies</option>
                        <?php foreach ($postB->getPostEten() as $postR) {
                        ?>
                            <option value="<?= $postR['eten']; ?> €<?= $postR['prijs_eten']; ?>"><?= $postR['eten']; ?> €<?= $postR['prijs_eten']; ?></option>
                        <?php  } ?>
                    </select>
                    <div class="form-group">
                        <label>Aantal Gerechten</label>
                        <input type="number" name="aantal_eten" class="form-control" placeholder="" value="" />
                    </div>
                </div>
                <label>Dranken</label>
                <select class="form-control" name="b_drank" required>
                    <option value="kies">Kies</option>
                    <?php foreach ($postB->getPostDrank() as $postR) {
                    ?>
                        <option value="<?= $postR['drank']; ?> €<?= $postR['prijs_drank']; ?>"><?= $postR['drank']; ?> €<?= $postR['prijs_drank']; ?></option>
                    <?php  } ?>
                </select>
                <div class="form-group">
                    <label>Aantal Gerechten</label>
                    <input type="number" name="aantal_drank" class="form-control" placeholder="" value="" />
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="b-submit" class="btnContact" value="Voeg bestelling" />
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tafel</label>
                    <select class="form-control" name="b-tafel" readonly>

                    </select>
                </div>
                <div class="form-group">
                    <label>Prijs</label>
                    <input type="number" name="total_prijs" class="form-control" placeholder="" value="€ " readonly />
                </div>
            </div>
        </div>
</div>
</form>
</div>


<?php require_once("footer.php"); ?>