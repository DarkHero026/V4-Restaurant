 <?php
    require_once("header.php");
    include "r-procces.php";
    ?>
 <div class="container-sm">
     <h3>Je reservatie is succelvol</h3>
     <?php
        $postr = new PostR();

        if ($postr->getEndPost()) {

            echo ' <table class="table table-dark table-striped"> ';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Datum</th>';
            echo '<th>Tijd</th>';
            echo '<th>Tafel</th>';
            echo '<th>Naam</th>';
            echo '<th>email</th>';
            echo '<th>telefoon</th>';
            echo '<th>Aantal Personen</th>';
            echo '<th>jarig</th>';
            echo '<th>Opmerking</th>';
            echo '<th>Allergien</th>';
            echo '</tr>';
            echo '</thead>';
            foreach (array_slice($postr->getEndPost(), 0, 1) as $postR) {
                echo '<tr>';
                echo '<td>' . $postR['datum'] . '</td>';
                echo '<td>' . $postR['tijd'] . '</td>';
                echo '<td>' . $postR['tafel'] . '</td>';
                echo '<td>' . $postR['klantnaam'] . '</td>';
                echo '<td>' . $postR['email'] . '</td>';
                echo '<td>' . $postR['telefoon'] . '</td>';
                echo '<td>' . $postR['aantal'] . '</td>';
                echo '<td>' . $postR['jarig'] . '</td>';
                echo '<td>' . $postR['opmerking'] . '</td>';
                echo '<td>' . $postR['allergien'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '<form action="r-procces.php" method="post">';
            echo '<input type="submit" name="exportk" class="btn btn-success" value="Print uit"/>';
            echo '</form>';
        } else {
            echo "<p class='mt-5 mx-auto'> empty </p>";
        }
        ?>
 </div>
 <?php require_once("footer.php"); ?>