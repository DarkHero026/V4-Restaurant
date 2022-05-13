<?php
require_once("header.php");
include "v-procces.php";

$postV = new PostV();

$postv = $postV->editPost($_GET['id']);
$id = $postv['id'];
$product = $postv['product'];
$aantal = $postv['aantal'];
?>
<!-- info from table inserted in the from -->
<div class="container contact-form">
    <form action="v-procces.php?update&id=<?= $id ?>" method="post">
        <h3>Voorraad</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Product</label>
                    <input type="text" name="product" class="form-control" placeholder="" value="<?= $product ?>" required />
                </div>
                <div class="form-group">
                    <label>Aantal</label>
                    <input type="number" name="aantal" class="form-control" placeholder="" value="<?= $aantal ?>" />
                </div>
                <div class="form-group">
                    <input type="submit" name="update" class="btnContact" value="Voeg In" />
                </div>
            </div>
        </div>
    </form>
</div>

<?php require_once("footer.php"); ?>