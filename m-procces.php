<?php
include "dbh.php";
include "m-database.php";

$postM = new PostM();

if (isset($_POST['submit_eten'])) {
    $naam_eten = $_POST['naam_eten'];
    $prijs_eten = $_POST['prijs_eten'];

    $postM->addPostEten($naam_eten, $prijs_eten);

    header("location: m-medewerker.php?status=added");
} else if (isset($_POST['submit_drank'])) {
    $naam_drank = $_POST['naam_drank'];
    $prijs_drank = $_POST['prijs_drank'];

    $postM->addPostDrank($naam_drank, $prijs_drank);

    header("location: m-medewerker.php?status=added");
} else if (isset($_GET['delE'])) {
    $id = $_GET['id'];
    $postM->delPostEten($id);

    header("location: m-medewerker.php?status=deleted");
} else if (isset($_GET['delD'])) {
    $id = $_GET['id'];
    $postM->delPostDrank($id);

    header("location: m-medewerker.php?status=deleted");
} else if (isset($_POST['updateE'])) {
    $id = $_GET['id'];

    $naam_eten = $_POST['naam_eten'];
    $prijs_eten = $_POST['prijs_eten'];

    $postM->updatePostEten($naam_eten, $prijs_eten, $id);

    header("location: m-medewerker.php?status=updated");
} else if (isset($_POST['updateD'])) {
    $id = $_GET['id'];

    $naam_drank = $_POST['naam_drank'];
    $prijs_drank = $_POST['prijs_drank'];

    $postM->updatePostDrank($naam_drank, $prijs_drank, $id);

    header("location: m-medewerker.php?status=updated");
}
