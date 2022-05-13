<?php
include "dbh.php";
include "r-database.php";

$postR = new PostR();

if (isset($_POST['submitr'])) {
    $naam = $_POST['naam'];
    $datum = $_POST['datum'];
    $tijd = $_POST['tijd'];
    $telefoon = $_POST['telefoon'];
    $email = $_POST['email'];
    $aantal = $_POST['aantal'];
    $tafel = $_POST['tafel'];
    $jarig = $_POST['jarig'];
    $opmerking = $_POST['opmerking'];
    $allergien = $_POST['allergien'];

    $postR->addPost($naam, $datum, $tijd, $telefoon, $email, $aantal, $tafel, $jarig, $opmerking, $allergien);

    header("location: r-klant-booking.php?status=added");
} else if (isset($_POST['submitm'])) {
    $naam = $_POST['naam'];
    $datum = $_POST['datum'];
    $tijd = $_POST['tijd'];
    $telefoon = $_POST['telefoon'];
    $email = $_POST['email'];
    $aantal = $_POST['aantal'];
    $tafel = $_POST['tafel'];
    $jarig = $_POST['jarig'];
    $opmerking = $_POST['opmerking'];
    $allergien = $_POST['allergien'];

    $postR->addPost($naam, $datum, $tijd, $telefoon, $email, $aantal, $tafel, $jarig, $opmerking, $allergien);

    header("location: r-medewerker.php?status=added");
} else if (isset($_GET['del'])) {
    $id = $_GET['id'];
    $postR->delPost($id);

    header("location: r-medewerker.php?status=deleted");
} else if (isset($_POST['update'])) {
    $id = $_GET['id'];

    $naam = $_POST['naam'];
    $datum = $_POST['datum'];
    $tijd = $_POST['tijd'];
    $telefoon = $_POST['telefoon'];
    $email = $_POST['email'];
    $aantal = $_POST['aantal'];
    $tafel = $_POST['tafel'];
    $jarig = $_POST['jarig'];
    $opmerking = $_POST['opmerking'];
    $allergien = $_POST['allergien'];

    $postR->updatePost($naam, $datum, $tijd, $telefoon, $email, $aantal, $tafel, $jarig, $opmerking, $allergien, $id,);

    header("location: r-medewerker.php?status=updated");
}

if (isset($_POST["exportm"])) {
    // Excel file name for download 
    $fileName = "klant-data_" . date('Y-m-d') . ".xls";

    // Fetch records from database 
    $mysqli = new mysqli('localhost', 'root', '', 'etaste') or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $query = "SELECT * FROM reserveer";
    $result = mysqli_query($mysqli, $query);
    $output = '';
    if (mysqli_num_rows($result) > 0) {
        $output .= '
        <table class="table" bordered="1">  
        <h3>Boeking klaten</h3>
        <thead>
        <tr>
        <th>Datum</th>
        <th>Tijd</th>
        <th>Tafel</th>
        <th>Naam</th>
        <th>Email</th>
        <th>Telefoon</th>
        <th>Aantal Personen</th>
        <th>jarig</th>
        <th>Opmerking</th>
        <th>Allergien</th>
        </tr>
        </thead>
    ';
        while ($row = $result->fetch_assoc()) : {
                $output .= '
        <tr>
        <td>' . $row['datum'] . '</td>
        <td>' . $row['tijd'] . '</td>
        <td>' . $row['tafel'] . '</td>
        <td>' . $row['klatnaam'] . '</td>
        <td>' . $row['email'] . '</td>
        <td>' . $row['telefoon'] . '</td>
        <td>' . $row['aantal'] . '</td>
        <td>' . $row['jarig'] . '</td>
        <td>' . $row['opmerking'] . '</td>
        <td>' . $row['allergien'] . '</td>
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
    $fileName = "Reservering-data_" . date('Y-m-d') . ".xls";

    // Fetch records from database 
    $mysqli = new mysqli('localhost', 'root', '', 'etaste') or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $query = "SELECT * FROM reserveer ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($mysqli, $query);
    $output = '';
    if (mysqli_num_rows($result) > 0) {
        $output .= '
        <table class="table" bordered="1">
        <h3>Reservering</h3>  
        <thead>
        <tr>
        <th>Datum</th>
        <th>Tijd</th>
        <th>Tafel</th>
        <th>Naam</th>
        <th>Email</th>
        <th>Telefoon</th>
        <th>Aantal Personen</th>
        <th>jarig</th>
        <th>Opmerking</th>
        <th>Allergien</th>
        </tr>
        </thead>
       ';
        $row = $result->fetch_assoc(); {
            $output .= '
        <tr>
        <td>' . $row['datum'] . '</td>
        <td>' . $row['tijd'] . '</td>
        <td>' . $row['tafel'] . '</td>
        <td>' . $row['klatnaam'] . '</td>
        <td>' . $row['email'] . '</td>
        <td>' . $row['telefoon'] . '</td>
        <td>' . $row['aantal'] . '</td>
        <td>' . $row['jarig'] . '</td>
        <td>' . $row['opmerking'] . '</td>
        <td>' . $row['allergien'] . '</td>
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
