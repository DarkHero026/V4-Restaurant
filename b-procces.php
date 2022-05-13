<?php
include "dbh.php";
include "b-database.php";

$postB = new PostB();

if (isset($_POST['b-submit'])) {
    $b_eten = $_POST['b_eten'];
    $aantal_eten = $_POST['aantal_eten'];
    $b_drank = $_POST['b_drank'];
    $aantal_drank = $_POST['aantal_drank'];
    $b_tafel = $_POST['b-tafel'];
    $total_pijs = $_POST['total_prijs'];

    $postB->addPost($b_eten, $b_drank, $aantal_eten, $aantal_drank, $b_tafel, $total_pijs);

    header("location: b-klant-booking.php?status=added");
} else if (isset($_GET['del'])) {
    $id = $_GET['id'];
    $postB->delPost($id);

    header("location: b-medewerker.php?status=deleted");
} else if (isset($_POST['update'])) {
    $id = $_GET['id'];

    $b_eten = $_POST['b_eten'];
    $aantal_eten = $_POST['aantal_eten'];
    $b_drank = $_POST['b_drank'];
    $aantal_drank = $_POST['aantal_drank'];
    $b_tafel = $_POST['b-tafel'];
    $total_pijs = $_POST['total_prijs'];

    $postB->updatePost($b_eten, $b_drank, $aantal_eten, $aantal_drank, $b_tafel, $total_pijs, $id);

    header("location: b-medewerker.php?status=updated");
}

if (isset($_POST["exportm"])) {
    // Excel file name for download 
    $fileName = "Bestelling-data_" . date('Y-m-d') . ".xls";

    // Fetch records from database 
    $mysqli = new mysqli('localhost', 'root', '', 'etaste') or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $query = "SELECT * FROM besteling";
    $result = mysqli_query($mysqli, $query);
    $output = '';
    if (mysqli_num_rows($result) > 0) {
        $output .= '
        <table class="table" bordered="1">  
        <h3>Bon klaten</h3>
        <thead>
        <tr>
        <th>Tafel</th>
        <th>Gerecht</th>
        <th>Aantal gerecht</th>
        <th>Drank</th>
        <th>Aantal drank</th>
        <th>Totaal Prijs</th>
        <th>Aantal Personen</th>
        </tr>
        </thead>
    ';
        while ($row = $result->fetch_assoc()) : {
                $output .= '
        <tr>
        <td>' . $row['tafel'] . '</td>
        <td>' . $row['product_eten'] . '</td>
        <td>' . $row['aantal_eten'] . '</td>
        <td>' . $row['product_drank'] . '</td>
        <td>' . $row['aantal_drank'] . '</td>
        <td>' . $row['prijs'] . '</td>
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

if (isset($_POST["exportk"])) {
    // Excel file name for download 
    $fileName = "Bon-data_" . date('Y-m-d') . ".xls";

    // Fetch records from database 
    $mysqli = new mysqli('localhost', 'root', '', 'etaste') or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $query = "SELECT * FROM besteling ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($mysqli, $query);
    $output = '';
    if (mysqli_num_rows($result) > 0) {
        $output .= '
        <table class="table" bordered="1">
        <h3>Bon</h3>  
        <thead>
        <tr>
        <th>Gerecht</th>
        <th>Aantal Gerecht</th>
        <th>Drank</th>
        <th>Aantal Drank</th>
        </tr>
        </thead>
       ';
        $row = $result->fetch_assoc(); {
            $output .= '
        <tr>
        <td>' . $row['product_eten'] . '</td>
        <td>' . $row['aantal_eten'] . '</td>
        <td>' . $row['product_drank'] . '</td>
        <td>' . $row['aantal_drank'] . '</td>
        </tr>      
        ';
        }
        $output .= '</table>';
        // Headers for download 
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");

        // Render excel data 
        echo $output;

        exit;
    }
}
