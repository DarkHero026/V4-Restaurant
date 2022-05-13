<?php require_once("header.php");
include "r-procces.php";

?>

<div class="container contact-form">
    <div class="contact-image">
    </div>
    <form action="r-procces.php" method="post">
        <h3>Boek Reservering</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Datum</label>
                    <input type="date" name="datum" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Naam</label>
                    <input type="text" name="naam" class="form-control" placeholder="" required />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="" required />
                </div>
                <div class="form-group">
                    <label>Aantal personen</label>
                    <div>
                        <input type="number" name="aantal" class="form-control" placeholder="" pattern="[0-9]+" title="Alleen nummer mag je invoeren" required />
                    </div>
                    <div class="form-group">
                        <label>Allergien</label>
                        <input type="text" name="allergien" class="form-control" placeholder="" />
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="submitr" class="btnContact" value="Reserve" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tafel</label>
                    <select class="form-control" name="tafel" required>
                        <option value="kies">Kies</option>
                        <option value="1A: Bij de ramen">1A: Bij de ramen</option>
                        <option value="2A: Midden">2A: Midden</option>
                        <option value="3B: Zonder ramen">3B: Zonder ramen</option>
                        <option value="4B: Dicht bij de bar">4B: Dicht bij de bar</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tijd</label>
                    <select class="form-control" name="tijd" required>
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
                    <input type="text" name="telefoon" class="form-control" placeholder="" required />
                </div>
                <div class="form-group">
                    <label>Opmerking</label>
                    <input type="text" name="opmerking" class="form-control" placeholder="" />
                </div>
                <div class="form-group">
                    <label>Ben je Jarig?</label>
                    <select class="form-control" name="jarig" required>
                        <option value="kies">Kies</option>
                        <option value="nee">Nee</option>
                        <option value="ja">Ja</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>

<?php require_once("footer.php"); ?>