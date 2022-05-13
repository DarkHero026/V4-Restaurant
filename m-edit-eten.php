<?php
require_once("header.php");
include "m-procces.php";

$postr = new PostM();

$postE = $postr->editPostEten($_GET['id']);
$id_eten = $postE['id'];
$naam_eten = $postE['eten'];
$prijs_eten = $postE['prijs_eten'];

?>

<div class="container contact-form">
    <div class="contact-image">
    </div>
    <form action="m-procces.php?updateE&id=<?= $id_eten ?>" method="post">
        <h3>Bewerk Eten</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Naam</label>
                    <input type="text" name="naam_eten" class="form-control" placeholder="" value="<?= $naam_eten ?>" required />
                </div>
                <div class="form-group">
                    <label>Prijs</label>
                    <input type="text" name="prijs_eten" class="form-control" placeholder="" value="<?= $prijs_eten ?>" required />
                </div>
                <div class="form-group">
                    <a href="m-medewerker.php" class="btnContact">Cancel</a>
                    <button type="submit" name="updateE" class="btnContact">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>


<?php require_once("footer.php"); ?>