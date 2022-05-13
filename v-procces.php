<?php
include "dbh.php";
include "v-database.php";

$postV = new PostV();

if (isset($_POST['submitv'])) {
    $product = $_POST['product'];
    $aantal = $_POST['aantal'];

    $postV->addPost($product, $aantal);

    header("location: voorraad.php?status=added");
} else if (isset($_GET['del'])) {
    $id = $_GET['id'];
    $postV->delPost($id);

    header("location: voorraad.php?status=deleted");
} else if (isset($_POST['update'])) {
    $id = $_GET['id'];

    $product = $_POST['product'];
    $aantal = $_POST['aantal'];

    $postV->updatePost($product, $aantal, $id,);

    header("location: voorraad.php?status=updated");
}

if (isset($_POST["exportm"])) {
    // Excel file name for download 
    $fileName = "voorraad-data_" . date('Y-m-d') . ".xls";

    // Fetch records from database 
    $mysqli = new mysqli('localhost', 'root', '', 'etaste') or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $query = "SELECT * FROM vooraad";
    $result = mysqli_query($mysqli, $query);
    $output = '';
    if (mysqli_num_rows($result) > 0) {
        $output .= '
        <table class="table" bordered="1">  
        <h3>Voorraad</h3>
        <thead>
        <tr>
        <th>ID*</th>
        <th>Product</th>
        <th>Aantal</th>
        <th>Datum</th>
        </tr>
        </thead>
    ';
        while ($row = $result->fetch_assoc()) : {
                $output .= '
        <tr>
        <td>' . $row['id'] . '</td>
        <td>' . $row['product'] . '</td>
        <td>' . $row['aantal'] . '</td>
        <td>' . $row['besteling_datum'] . '</td>
        </tr>      
    ';
            }
        endwhile;
        $output .= '</table>';
        // Headers for download 
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");

        // Render excel data 
        echo $output;

        exit;
    }
}
