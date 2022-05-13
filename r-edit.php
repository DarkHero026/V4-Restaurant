<?php
require_once("header.php");
include "r-procces.php";

$postr = new PostR();

$postE = $postr->editPost($_GET['id']);
$id = $postE['id'];
$naam = $postE['klantnaam'];
$datum = $postE['datum'];
$tijd = $postE['tijd'];
$telefoon = $postE['telefoon'];
$email = $postE['email'];
$aantal = $postE['aantal'];
$tafel = $postE['tafel'];
$jarig = $postE['jarig'];
$opmerking = $postE['opmerking'];
$allergien = $postE['allergien'];
?>
<!-- info from table inserted in the from -->
<div class="container contact-form">
    <form action="r-procces.php?update&id=<?= $id ?>" method="post">
        <h3>Boek Reservering</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Datum</label>
                    <input type="date" name="datum" class="form-control" placeholder="" value="<?= $datum ?>" required />
                </div>
                <div class="form-group">
                    <label>Naam</label>
                    <input type="text" name="naam" class="form-control" placeholder="" value="<?= $naam ?>" required />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="" value="<?= $email ?>" required />
                </div>
                <div class="form-group">
                    <label>Aantal personen</label>
                    <div>
                        <input type="number" name="aantal" class="form-control" placeholder="" pattern="[0-9]+" title="Alleen nummer mag je invoeren" value="<?= $aantal ?>" required />
                    </div>
                    <div class="form-group">
                        <label>Allergien</label>
                        <input type="text" name="allergien" class="form-control" value="<?= $allergien ?>" placeholder="" />
                    </div>
                </div>
                <div class="form-group">
                    <a href="r-medewerker.php" class="btnContact">Cancel</a>
                    <button type="submit" name="update" class="btnContact">Update</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tafel</label>
                    <select class="form-control" name="tafel" value="<?= $tafel ?>" required>
                        <option value="<?= $tafel ?>"><?= $tafel ?></option>
                        <option value="<?= $tafel ?>">1A: Bij de ramen[]</option>
                        <option value="<?= $tafel ?>">2A: Midden[]</option>
                        <option value="<?= $tafel ?>">3B: Zonder ramen[]</option>
                        <option value="<?= $tafel ?>">4B: Dicht bij de bar[]</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tijd</label>
                    <select class="form-control" name="tijd" value="<?= $tijd ?>" required>
                        <option value="<?= $tijd ?>"><?= $tijd ?></option>
                        <option value="11:00">11:00 Lunch</option>
                        <option value="12:00">12:00 Lunch</option>
                        <option value="14:00">14:00 Lunch</option>
                        <option value="15:00">15:00 Lunch</option>
                        <option value="16:00">16:00 Lunch</option>
                        <option value="18:00">18:00 Diner</option>
                        <option value="19:00">19:00 Diner</option>
                        <option value="20:00">20:00 Diner</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Telefoon</label>
                    <input type="text" name="telefoon" class="form-control" placeholder="" value="<?= $telefoon ?>" required />
                </div>
                <div class="form-group">
                    <label>Opmerking</label>
                    <input type="text" name="opmerking" class="form-control" placeholder="" value="<?= $opmerking ?>" />
                </div>
                <div class="form-group">
                    <label>Ben je Jarig?</label>
                    <select class="form-control" name="jarig" value="<?= $jarig ?>" required>
                        <option value="<?= $jarig ?>"><?= $jarig ?></option>
                        <option value="nee">Nee</option>
                        <option value="ja">Ja</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>

<?php require_once("footer.php"); ?>