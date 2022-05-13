<?php
require_once("header.php");
include "b-procces.php";

$postB = new PostB();

$postb = $postB->editPost($_GET['id']);
$id = $postb['id'];
$product_eten = $postb['product_eten'];
$product_drank = $postb['product_drank'];
$aantal_eten = $postb['aantal_eten'];
$aantal_drank = $postb['aantal_drank'];
$tafel = $postb['tafel'];
$prijs = $postb['prijs'];
?>

<div class="container contact-form">
    <form action="b-procces.php?update&id=<?= $id ?>" method="post">
        <h3>Bestelling</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Gerechten</label>
                    <select class="form-control" name="b_eten" required>
                        <option value="<?= $product_eten ?>"><?= $product_eten ?></option>
                        <option value="Bitter balletjes met mosterd €5,20">Bitter balletjes met mosterd €5,20</option>
                        <option value="Salade met geitenkaas €3,15">Salade met geitenkaas €3,15</option>
                        <option value="Bonengerecht met diverse groen €12,50">Bonengerecht met diverse groen €12,50</option>
                        <option value="Dame Blanche €4,00">Dame Blanche €4,00</option>
                    </select>
                    <div class="form-group">
                        <label>Aantal Gerechten</label>
                        <input type="number" name="aantal_eten" class="form-control" placeholder="" value="<?= $aantal_eten ?>" />
                    </div>
                </div>
                <label>Dranken</label>
                <select class="form-control" name="b_drank" required>
                    <option value="<?= $product_drank ?>"><?= $product_drank ?></option>
                    <option value="Pilsner €3,10">Pilsner €3,10</option>
                    <option value="Tonic €3.00">Tonic €3.00</option>
                    <option value="koffie €1,50">koffie €1,50</option>
                    <option value="Fles wijn €10,00">Fles wijn €10,00</option>
                </select>
                <div class="form-group">
                    <label>Aantal Gerechten</label>
                    <input type="number" name="aantal_drank" class="form-control" placeholder="" value="<?= $aantal_drank ?>" />
                </div>
            </div>
            <div class="form-group">
                <label>Tafel</label>
                <select class="form-control" name="b-tafel" required>
                    <option value="<?= $tafel ?>"><?= $tafel ?></option>
                    <option value="1A">1A: Bij de ramen[]</option>
                    <option value="2A">2A: Midden[]</option>
                    <option value="3B">3B: Zonder ramen[]</option>
                    <option value="4B">4B: Dicht bij de bar[]</option>
                </select>
            </div>
            <div class="form-group">
                <label>Prijs</label>
                <input type="number" name="total_prijs" class="form-control" placeholder="" value="€ <?= $prijs ?>" />
            </div>
            <div class="form-group">
                <input type="submit" name="update" class="btnContact" value="Bewerken" />
            </div>
        </div>
</div>
</form>
</div>


<?php require_once("footer.php"); ?>