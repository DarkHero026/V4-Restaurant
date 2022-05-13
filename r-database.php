<?php

class PostR extends Dbh
{
    public function getPost()
    {
        $sql = "SELECT * FROM reserveer";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function getEndPost()
    {
        $sql = "SELECT * FROM reserveer ORDER BY id DESC LIMIT 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function addPost($naam, $datum, $tijd, $telefoon, $email, $aantal, $tafel, $jarig, $opmerking, $allergien)
    {
        $sql = "INSERT INTO reserveer(klantnaam, datum, tijd, telefoon, email, aantal, tafel, jarig, opmerking, allergien) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$naam, $datum, $tijd, $telefoon, $email, $aantal, $tafel, $jarig, $opmerking, $allergien]);
    }

    public function editPost($id)
    {
        $sql = "SELECT * FROM reserveer WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        return $result;
    }

    public function updatePost($naam, $datum, $tijd, $telefoon, $email, $aantal, $tafel, $jarig, $opmerking, $allergien, $id)
    {
        $sql = "UPDATE reserveer SET klantnaam = ?, datum = ?, tijd = ?, telefoon = ?, email = ?, aantal = ?, tafel = ?, jarig = ?, opmerking = ?, allergien = ? WHERE id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$naam, $datum, $tijd, $telefoon, $email, $aantal, $tafel, $jarig, $opmerking, $allergien, $id]);
    }

    public function delPost($id)
    {
        $sql = "DELETE FROM reserveer WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}
